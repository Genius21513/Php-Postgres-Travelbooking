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
                <div class="items-center gap-2 md:flex">
                    <div 
                        x-data="toSelect()"
                        class="relative w-2/5 rounded-md">
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

                    <!-- <div class="relative rounded-md">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="text" class="block w-full py-3 pl-10 bg-gray-100 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Check-In">
                    </div>
                    <div class="relative rounded-md">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="text" class="block w-full py-3 pl-10 bg-gray-100 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Check-Out">
                    </div> -->

                    <div class="relative rounded-md" x-data="dateSelect()">
                        <!-- <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input datepicker datepicker-orientation="bottom" x-model="departure1" datepicker-format="yyyy-mm-dd" id="departure1" readonly type="text" class="block w-full py-3 pl-10 bg-gray-100 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Select Date">
                        </div> -->
                        
                        <div date-rangepicker datepicker-orientation="bottom" class="flex items-center">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input name="start" readonly type="text" class="block w-full py-3 pl-10 bg-gray-100 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Check-In" />
                            </div>
                            <div class="relative mx-4">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input name="end" readonly type="text" class="block w-full py-3 pl-10 bg-gray-100 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Check-Out" />
                            </div>
                        </div>
                    </div>

                    <div class="relative w-1/12 rounded-md">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="relative" x-data="{ isOpen: false}">
                            <button class="flex items-center justify-between w-full pl-10 border border-gray-300 rounded-md cursor-pointer focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                                <p class="flex items-center px-0 py-3 font-medium tracking-normal text-gray-600 border-0 dark:text-gray-400 text-md" multiple>1</p>
                                <div class="mx-3 text-gray-600 cursor-pointer dark:text-gray-400">
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
                            <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 w-48 pb-1 mt-2 transition duration-300 bg-white rounded shadow dark:bg-gray-800">
                                <li class="focus:outline-none focus:underline focus:text-gray-400">
                                    <div  class="flex flex-col px-3 pt-4 pb-3 mb-1 text-sm font-bold leading-3 tracking-normal text-white bg-indigo-700 rounded-t cursor-pointer">
                                        <span class="font-medium">Steven Johnson</span>
                                        <span class="mt-2 font-normal">stevedoe@gmail.com</span>
                                    </div>
                                </li>
                                <li>
                                    <ul>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">Interface Settings</div></a></li>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">Color Theme</div></a></li>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">Wallpaper</div></a></li>
                                    </ul>
                                    <hr class="my-1 border-gray-200" />
                                </li>
                                <li>
                                    <ul>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">Notifications</div></a></li>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">Alerts</div></a></li>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">Email</div></a></li>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">Push Notifications</div></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="items-center justify-end hidden md:flex">
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
                    
                    <div x-show="isLoading" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex flex-col items-center justify-center w-full h-screen overflow-hidden bg-gray-700 opacity-75" style="display:none">
                        <div class="w-12 h-12 mb-4 ease-linear border-4 border-t-4 border-gray-200 rounded-full loader"></div>
                        <h2 class="text-xl font-semibold text-center text-white">Loading...</h2>
                        <p class="w-1/3 text-center text-white">This may take a few seconds, please don't close this page.</p>
                    </div>
                </div>
                
                <div class="w-full p-8 mt-3 bg-white border border-gray-100 shadow-md rounded-xl">
                    <div class="flex flex-col">
                        <template x-if="noData">
                            <p class="text-gray-600"> There are no data to show. </div>
                        </template>

                        <template x-for="d in data" x-if="!noData">
                            <div class="flex items-center border border-gray-300 rounded-md mt-3">
                                <div class="w-3/12">
                                    <img class="w-full rounded-md rounded-r-none" :src="d.HotelMainImage" />
                                </div>
                                <div class="w-5/12 px-3 space-y-0.5 items-center">
                                    <p class="text-left text-gray-600" x-text="d.HotelName"></p>
                                    <p class="text-left text-gray-600" x-text="d.ChainName"></p>
                                    <p class="text-left text-gray-500 text-sm" x-text="d.HotelAwards[0].Rating"></p>
                                    <template x-if="d.HotelAddress !== null">
                                        <p class="text-left text-gray-500 text-sm" x-text="d.HotelAddress.StreetAddress"></p>
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
        function memberSelect() {
            return {
                isOpen : false,
                membersList: [ 
                    { title : "Adults", desc: "", short: "adu", },
                    { title : "Childrens", desc: "Aged 2-11", short: "chi", },
                    { title : "Infants", desc: "In seat", short: "ifs", },
                    { title : "Infants", desc: "In lap", short: "ifl", },
                ],
                members: { adu : 1, chi : 0, ifs : 0, ifl : 0, all : 1, },
                init() {
                    membs = JSON.parse(JSON.stringify(this.members));
                },
                getNumbers(short) {
                    switch (short) {
                        case 'adu':
                            return this.members.adu;
                            break;
                        case 'chi':
                            return this.members.chi;
                            break;
                        case 'ifs':
                            return this.members.ifs;
                            break;
                        case 'ifl':
                            return this.members.ifl;
                            break;
                    }
                },
                changeMembers(type, met) {
                    // change the members object value with validation
                    //params 
                    ///// type String  adu, chi, ifs, ifl
                    ///// met String inc, dec

                    if (type === "adu") {
                        let o = this.members.adu;
                        met === 'inc'? this.members.adu ++: this.members.adu --;
                        if (this.members.adu < 0) this.members.adu = o;
                    }
                    else if (type === "chi")
                    {
                        let o = this.members.chi;
                        met === 'inc'? this.members.chi ++: this.members.chi --;
                        if (this.members.chi < 0) this.members.chi = o;
                    }
                    else if (type === "ifs")
                    {
                        let o = this.members.ifs;
                        met === 'inc'? this.members.ifs ++: this.members.ifs --;
                        if (this.members.ifs < 0) this.members.ifs = o;
                    }
                    else if (type === "ifl")
                    {
                        let o = this.members.ifl;
                        met === 'inc'? this.members.ifl ++: this.members.ifl --;
                        if (this.members.ifl < 0) this.members.ifl = o;
                    }  
                },
                setMembers() {
                    this.members.all = this.members.adu + this.members.chi + this.members.ifs + this.members.ifl;
                    membs = JSON.parse(JSON.stringify(this.members));
                },
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
        
    </script>
    
@endsection
