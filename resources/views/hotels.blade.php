@extends('layouts.app')

@section('content')
	<main class="max-w-6xl mx-auto">
        <section class="relative">
            <div class="sm:px-6 lg:px-8">
                <div class="relative">
                    <div class="absolute inset-0">
                        <img class="object-cover w-full h-full" src="{{ asset('svg/hotel.svg') }}" alt="People working on laptops">
                        <div class="absolute inset-0 mix-blend-multiply"></div>
                    </div>
                    <div class="relative px-4 py-16 sm:px-6 sm:py-16 lg:py-20 lg:px-8">
                        <h1 class="text-3xl font-bold tracking-tight text-center sm:text-4xl lg:text-5xl">
                        <span class="block text-indigo-500">Find the right hotel, vacation home</span>
                        </h1>
                        <div class="max-w-sm mx-auto mt-10 sm:max-w-none sm:flex sm:justify-center">
                        <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid">
                            <a href="#" class="flex items-center justify-center px-4 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm bg-opacity-80 hover:bg-opacity-70 sm:px-8">
                            Call Us For Hidden Fares
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section 
            x-data="searchHotel()"
            x-init="init()"
            class="flex flex-col items-center justify-center my-8 sm:px-6 lg:px-8" >
            
            <div class="w-full p-8 bg-white border border-gray-100 shadow-md rounded-xl">
                <div class="w-full md:flex">
                    <div class="relative w-4/12 rounded-md" 
                        x-data="toSelect()">

                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        
                        <input
                        x-model="toCity"
                        @click="isOpen = true"
                        type="text"
                        readonly
                        class="block w-full py-3 pl-10 bg-gray-100 border-2 border-gray-300 rounded-md outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-md"
                        placeholder="Going To">
                        
                        <div 
                        x-show="isOpen"
                        x-trap="isOpen"
                        @click.away="isOpen = false"
                        class="absolute z-50 w-96" 
                        style="display:none">
                            
                            <div class="bg-white border rounded">
                                <div class="flex p-4 text-gray-500">
                                    <input
                                    x-model="toCity"
                                    @input.debounce="getCities()"
                                    class="px-4 text-gray-800 border-b-2 outline-none appearance-none" />
                                </div>
                                <div class="p-4 border-t-2 border-gray-100">
                                    <template x-for="item in cities">
                                        <div class="cursor-pointer group" @click="select(item.Name);">
                                            <div class="flex items-center pl-3 group-hover:bg-indigo-100">
                                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="currentColor" aria-hidden="true">
                                                    <path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path>
                                                </svg>
                                                
                                                <a class="block p-4 border-l-4 border-transparent">
                                                    <p x-text="item.Name"></p>
                                                    <p x-text="item.Region" class="text-sm text-gray-600"></p>
                                                </a>
                                            </div>
                                        </div>    
                                    </template>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="relative w-4/12"
                        x-data="dateSelect()">
                        <div class="flex items-center px-6"
                            date-rangepicker 
                            datepicker-orientation="bottom">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input class="block w-full py-3 pl-10 bg-gray-100 border-2 border-gray-800 rounded-md outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" name="start" readonly type="text"  placeholder="Check-In" />
                            </div>
                            <div class="relative ml-4">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input class="block w-full py-3 pl-10 bg-gray-100 border-2 border-gray-800 rounded-md outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" name="end" readonly type="text"  placeholder="Check-Out" />
                            </div>
                        </div>
                    </div>

                    <div class="relative w-3/12" x-data="numSelect()" x-init="init()">
                        <button class="flex items-center justify-between h-full min-w-full py-3 text-gray-200 bg-gray-100 border-2 rounded-md outline-none cursor-pointer focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800" 
                            @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="flex items-center pl-3 font-medium leading-3 tracking-normal text-gray-600 text-md dark:text-gray-400">
                                <svg class="w-5 h-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span x-text="numText"></span>
                            </p>
                            <div class="mx-3 text-gray-600 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" x-show="isOpen" class="icon icon-tabler icon-tabler-chevron-up" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 15 12 9 18 15" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" x-show="!isOpen" class="icon icon-tabler icon-tabler-chevron-up" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </div>
                        </button>

                        <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 transition duration-300 bg-white border rounded shadow dark:bg-gray-800" style="display:none">
                            <div class="flex flex-col p-3">
                                <table class="bg-white">
                                    <tbody>
                                        <template x-for="item in numsList">
                                            <tr class="border border-t-0 border-l-0 border-r-0">
                                                <td class="w-12 px-6 py-2 whitespace-nowrap">
                                                    <div class="font-medium text-gray-900 text-md"><span x-text="item.title"></span></div>
                                                </td>
                                                <td class="w-8 px-2 py-2 whitespace-nowrap">
                                                    <button @click="changeNums(item.short, 'dec')" class="justify-center px-3 py-3 bg-indigo-500 rounded-full focus:outline-none hover:bg-indigo-800">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <line x1="5" y1="12" x2="19" y2="12" />
                                                        </svg>
                                                    </button>
                                                </td>
                                                <td class="w-8 px-2 py-2 whitespace-nowrap">
                                                    <div class="font-medium text-gray-900 text-md">
                                                        <span x-text="getNumbers(item.short)"></span>
                                                    </div>
                                                </td>
                                                <td class="w-8 px-2 py-2 whitespace-nowrap">
                                                    <button @click="changeNums(item.short, 'inc')" class="justify-center px-3 py-3 bg-indigo-500 rounded-full focus:outline-none hover:bg-indigo-800">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <line x1="12" y1="5" x2="12" y2="19" />
                                                            <line x1="5" y1="12" x2="19" y2="12" />
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                                <button @click="setNumtext(); isOpen = false" class="px-2 py-1 mt-2 text-white bg-indigo-500 rounded-full focus:outline-none">Done</button>
                            </div>
                        </ul>
                    </div>

                    <div class="items-center justify-end w-1/12 md:flex">
                        <button 
                            @click="goSearch()"
                            class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="26" height="26" viewBox="0 0 24 24" stroke-width="2" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="10" cy="10" r="7" />
                                <line x1="21" y1="21" x2="15" y2="15" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <div class="p-4 mt-3 bg-white border border-gray-100 shadow-md rounded-xl">
                    <div class="flex flex-col">
                        <template x-if="noData">
                            <p class="text-gray-600"> There are no data to show. </div>
                        </template>

                        <template x-for="d in data" x-if="!noData">
                            <div class="flex items-center mt-3 border border-gray-300 rounded-md">
                                <div class="w-3/12">
                                    <img class="w-full rounded-md rounded-r-none" :src="d.HotelMainImage" />
                                </div>
                                <div class="w-5/12 px-3 space-y-0.5 items-center">
                                    <p class="text-left text-gray-600" x-text="d.HotelName"></p>
                                    <p class="text-left text-gray-600" x-text="d.ChainName"></p>
                                    <p class="text-sm text-left text-gray-500" x-text="d.HotelAwards[0].Rating"></p>
                                    <template x-if="d.HotelAddress !== null">
                                        <p class="text-sm text-left text-gray-500" x-text="d.HotelAddress.StreetAddress"></p>
                                    </template>
                                </div>
                                <div class="w-4/12 px-3 space-y-0.5 items-center">
                                    <p class="text-right text-gray-600" x-text="d.DailyRatePerRoom + ' ' + d.CurrencyCode"></p>
                                    <p class="text-right text-gray-500" >TEL : <span x-text="d.HotelPhone"></span> </p>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div x-show="isLoading" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex flex-col items-center justify-center w-full h-screen overflow-hidden bg-gray-700 opacity-75" style="display:none">
                    <div class="w-12 h-12 mb-4 ease-linear border-4 border-t-4 border-gray-200 rounded-full loader"></div>
                    <h2 class="text-xl font-semibold text-center text-white">Loading...</h2>
                    <p class="w-1/3 text-center text-white">This may take a few seconds, please don't close this page.</p>
                </div>
            </div>
        </section>
        
        <x-testimonial/>
        <x-newsletter/>
	</main>


    <script>
        let base_url = 'http://rest.resvoyage.com';
        let token = '';

        
        let toCity;
        let cinDate = '', coutDate = '';
        let membs = {};

        //Get Token
        async function getToken() {
            let token_url = base_url + '/api/v1/public/token?clientname=VslYXzycTIi';
            await fetch(token_url)
            .then((res) => res.json())
            .then((response) => {
                token = response.Token;
            });
        }

        //search
        function searchHotel() {
            return {
                isLoading : false,
                noData : true,
                data : [],

                init () {
                    getToken();
                },
                async goSearch() {
                    this.data = {};
                    
                    // members url
                    // let mem = '';
                    // if (membs.adu !== 0) {
                    //     mem += '&Adults=' + membs.adu;
                    // }

                    // if (membs.chi !== 0) {
                    //     mem += '&Children=' + membs.chi
                    // }

                    // if ((membs.ifs + membs.ifl) !== 0) {
                    //     mem += '&Infants=' + (membs.ifs + membs.ifl);
                    // }

                    // input url
                    //let departure1 = document.querySelector('#departure1').value;

                    // if (from1 === '' || to1 === '' || departure1 === '') return;
                    
                    let url = base_url + '/api/v1/hotel/search?HotelCityCode=PAR&CheckInDate=2022-02-15&CheckoutDate=2022-02-20&Adults=1&RoomCount=1';
                    
                    this.isLoading = true;
                    await fetch(url, {
                        headers: { Authorization: `Bearer ${token}` }
                    })
                    .then((res) => res.json())
                    .then((response) => {
                        this.data = response.Hotels;
                        this.isLoading = false;
                        this.noData = false;
                    });
                }
            }
        }
        
        //Member Select
        function numSelect() {
            return {
                isOpen : false,
                numsList: [ 
                    { title : "Adults", short: "adu", },
                    { title : "Childrens", short: "chi", },
                    { title : "Rooms", short: "rms", },
                ],
                nums : { adu : 1, chi : 0, rms : 1 },
                numText : '',
                init() {
                    // nums = JSON.parse(JSON.stringify(this.nums));
                    this.setNumtext();
                },
                getNumbers(short) {
                    switch (short) {
                        case 'adu':
                            return this.nums.adu;
                            break;
                        case 'chi':
                            return this.nums.chi;
                            break;
                        case 'rms':
                            return this.nums.rms;
                            break;
                    }
                },
                changeNums(type, met) {
                    // change the members object value with validation
                    //params 
                    ///// type String  adu, chi, ifs, ifl
                    ///// met String inc, dec

                    if (type === "adu") {
                        let o = this.nums.adu;
                        met === 'inc'? this.nums.adu ++: this.nums.adu --;
                        if (this.nums.adu < 0) this.nums.adu = o;
                    }
                    else if (type === "chi")
                    {
                        let o = this.nums.chi;
                        met === 'inc'? this.nums.chi ++: this.nums.chi --;
                        if (this.nums.chi < 0) this.nums.chi = o;
                    }
                    else if (type === "rms")
                    {
                        let o = this.nums.rms;
                        met === 'inc'? this.nums.rms ++: this.nums.rms --;
                        if (this.nums.rms < 0) this.nums.ifs = o;
                    }
                },
                setNumtext() {
                    this.numText = this.nums.rms + ' Room, ' + ( this.nums.adu + this.nums.chi) + ' Guest';
                }
            }
        }
        
        // Going To Select
        function toSelect() {
            return {
                isOpen: false,
                toCity : '',
                cities: [],
                init() { this.isOpen = false; },
                async getCities() {
                    let url = base_url + '/api/v1/hotel/references/destination/' + this.toCity.toLowerCase();
                    await fetch(url, {
                        headers: { Authorization: `Bearer ${token}` }
                    })
                    .then((res) => res.json())
                    .then((response) => {
                        if (response && response.length > 0)
                            this.cities = [...response];
                    });
                },
                select(t) {
                    this.toCity = t;
                    this.isOpen = false;
                    toCity = t;
                }
            }
        }

        function dateSelect() {
            return {
                departure1 : "",
            }
        }
    </script>
    
@endsection
