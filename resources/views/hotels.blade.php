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
                    <div class="relative rounded-md">
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
                data : [
                    // {
                    //     "Id": "34f6935e-bd8a-4f80-b761-dd3d2be22256",
                    //     "CurrencyCode": "USD",
                    //     "DailyRatePerRoom": 285.88,
                    //     "CheckInDate": "2022-02-15T00:00:00",
                    //     "CheckOutDate": "2022-02-20T00:00:00",
                    //     "CheckInTime": null,
                    //     "CheckOutTime": null,
                    //     "ChainName": "",
                    //     "ChainCode": "PU",
                    //     "HotelName": "PULLMAN PARIS MONTPARNASSE",
                    //     "HotelCode": "ME2",
                    //     "HotelCodeContext": "1A",
                    //     "HotelAddress": null,
                    //     "HotelMainImage": "https://d2573qu6qrjt8c.cloudfront.net/8BDFCA56EE3B4F179FC42988D0845A5D/J.JPEG",
                    //     "HotelImages": [],
                    //     "HotelMainText": [],
                    //     "HotelDescription": [
                    //         "After 4 years of spectacular transformation, Pullman is unveiling its brand new flagship hotel. Work, business, leisure: Pullman Paris Montparnasse is a must in the capital city, with 32 floors, including 3 for events and meetings, 957 bedrooms, 2 restaurants, a rooftop bar, and of course 4 stars. "
                    //     ],
                    //     "LocationDescription": null,
                    //     "AttractionDescription": null,
                    //     "RoomInfoDescription": null,
                    //     "Recreation": [],
                    //     "OnSiteServices": null,
                    //     "HotelPhone": "0/0",
                    //     "HotelFax": "0/0",
                    //     "HotelCityCode": "PAR",
                    //     "HotelAmenities": {
                    //         "HAC33": "Elevators",
                    //         "HAC22": "Concierge desk",
                    //         "HAC68": "Parking",
                    //         "PHY39": "Telephone for hearing impaired",
                    //         "PHY102": "Accessible baths",
                    //         "PHY28": "Public areas wheelchair accessible for disabled",
                    //         "PHY6": "Complies with Local/State/Federal laws for disabled",
                    //         "SEC9": "Complies with Local/State/Federal fire laws",
                    //         "SEC50": "Smoke detector in public areas",
                    //         "SEC15": "Emergency back-up generators",
                    //         "SEC22": "Fire detectors in public areas",
                    //         "SEC19": "Emergency lighting",
                    //         "HAC191": "Ballroom",
                    //         "HAC192": "Bus parking",
                    //         "HAC179": "Wireless internet connection in public areas",
                    //         "HAC115": "220 AC",
                    //         "HAC92": "Translation services",
                    //         "HAC218": "Children welcome",
                    //         "HAC53": "Indoor parking",
                    //         "HAC76": "Restaurant",
                    //         "HAC77": "Room service",
                    //         "HAC78": "Safe deposit box",
                    //         "HAC165": "Lounges/bars",
                    //         "HAC1": "24-hour front desk",
                    //         "HAC223": "Internet services",
                    //         "HAC224": "Pets allowed",
                    //         "HAC4": "Adjoining rooms",
                    //         "HAC106": "Bell staff/porter",
                    //         "HAC8": "Baby sitting",
                    //         "BUS46": "Meeting/board rooms",
                    //         "BUS2": "Copier",
                    //         "BUS48": "Overhead projector",
                    //         "BUS37": "Audio visual equipment",
                    //         "BUS39": "Business center",
                    //         "BUS41": "Computer rental",
                    //         "BUS96": "Meeting facilities"
                    //     },
                    //     "RoomAmenities": {
                    //         "RMA55": "Iron",
                    //         "RMA51": "High speed internet connection",
                    //         "RMA13": "Bathtub",
                    //         "RMA3": "Alarm clock",
                    //         "RMA25": "Cordless phone",
                    //         "RMA118": "Voice mail",
                    //         "RMA119": "Wake-up calls",
                    //         "RMA50": "Hairdryer",
                    //         "RMA123": "Wireless internet connection",
                    //         "RMA20": "Color television",
                    //         "RMA2": "Air conditioning",
                    //         "RMA111": "Trouser/Pant press",
                    //         "RMA74": "Non-smoking"
                    //     },
                    //     "HotelAmenitiesCollection": [
                    //         {
                    //             "Code": "HAC33",
                    //             "Name": "Elevators"
                    //         },
                    //         {
                    //             "Code": "HAC22",
                    //             "Name": "Concierge desk"
                    //         },
                    //         {
                    //             "Code": "HAC68",
                    //             "Name": "Parking"
                    //         },
                    //         {
                    //             "Code": "PHY39",
                    //             "Name": "Telephone for hearing impaired"
                    //         },
                    //         {
                    //             "Code": "PHY102",
                    //             "Name": "Accessible baths"
                    //         },
                    //         {
                    //             "Code": "PHY28",
                    //             "Name": "Public areas wheelchair accessible for disabled"
                    //         },
                    //         {
                    //             "Code": "PHY6",
                    //             "Name": "Complies with Local/State/Federal laws for disabled"
                    //         },
                    //         {
                    //             "Code": "SEC9",
                    //             "Name": "Complies with Local/State/Federal fire laws"
                    //         },
                    //         {
                    //             "Code": "SEC50",
                    //             "Name": "Smoke detector in public areas"
                    //         },
                    //         {
                    //             "Code": "SEC15",
                    //             "Name": "Emergency back-up generators"
                    //         },
                    //         {
                    //             "Code": "SEC22",
                    //             "Name": "Fire detectors in public areas"
                    //         },
                    //         {
                    //             "Code": "SEC19",
                    //             "Name": "Emergency lighting"
                    //         },
                    //         {
                    //             "Code": "HAC191",
                    //             "Name": "Ballroom"
                    //         },
                    //         {
                    //             "Code": "HAC192",
                    //             "Name": "Bus parking"
                    //         },
                    //         {
                    //             "Code": "HAC179",
                    //             "Name": "Wireless internet connection in public areas"
                    //         },
                    //         {
                    //             "Code": "HAC115",
                    //             "Name": "220 AC"
                    //         },
                    //         {
                    //             "Code": "HAC92",
                    //             "Name": "Translation services"
                    //         },
                    //         {
                    //             "Code": "HAC218",
                    //             "Name": "Children welcome"
                    //         },
                    //         {
                    //             "Code": "HAC53",
                    //             "Name": "Indoor parking"
                    //         },
                    //         {
                    //             "Code": "HAC76",
                    //             "Name": "Restaurant"
                    //         },
                    //         {
                    //             "Code": "HAC77",
                    //             "Name": "Room service"
                    //         },
                    //         {
                    //             "Code": "HAC78",
                    //             "Name": "Safe deposit box"
                    //         },
                    //         {
                    //             "Code": "HAC165",
                    //             "Name": "Lounges/bars"
                    //         },
                    //         {
                    //             "Code": "HAC1",
                    //             "Name": "24-hour front desk"
                    //         },
                    //         {
                    //             "Code": "HAC223",
                    //             "Name": "Internet services"
                    //         },
                    //         {
                    //             "Code": "HAC224",
                    //             "Name": "Pets allowed"
                    //         },
                    //         {
                    //             "Code": "HAC4",
                    //             "Name": "Adjoining rooms"
                    //         },
                    //         {
                    //             "Code": "HAC106",
                    //             "Name": "Bell staff/porter"
                    //         },
                    //         {
                    //             "Code": "HAC8",
                    //             "Name": "Baby sitting"
                    //         },
                    //         {
                    //             "Code": "BUS46",
                    //             "Name": "Meeting/board rooms"
                    //         },
                    //         {
                    //             "Code": "BUS2",
                    //             "Name": "Copier"
                    //         },
                    //         {
                    //             "Code": "BUS48",
                    //             "Name": "Overhead projector"
                    //         },
                    //         {
                    //             "Code": "BUS37",
                    //             "Name": "Audio visual equipment"
                    //         },
                    //         {
                    //             "Code": "BUS39",
                    //             "Name": "Business center"
                    //         },
                    //         {
                    //             "Code": "BUS41",
                    //             "Name": "Computer rental"
                    //         },
                    //         {
                    //             "Code": "BUS96",
                    //             "Name": "Meeting facilities"
                    //         }
                    //     ],
                    //     "RoomAmenitiesCollection": [
                    //         {
                    //             "Code": "RMA55",
                    //             "Name": "Iron"
                    //         },
                    //         {
                    //             "Code": "RMA51",
                    //             "Name": "High speed internet connection"
                    //         },
                    //         {
                    //             "Code": "RMA13",
                    //             "Name": "Bathtub"
                    //         },
                    //         {
                    //             "Code": "RMA3",
                    //             "Name": "Alarm clock"
                    //         },
                    //         {
                    //             "Code": "RMA25",
                    //             "Name": "Cordless phone"
                    //         },
                    //         {
                    //             "Code": "RMA118",
                    //             "Name": "Voice mail"
                    //         },
                    //         {
                    //             "Code": "RMA119",
                    //             "Name": "Wake-up calls"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA123",
                    //             "Name": "Wireless internet connection"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA2",
                    //             "Name": "Air conditioning"
                    //         },
                    //         {
                    //             "Code": "RMA111",
                    //             "Name": "Trouser/Pant press"
                    //         },
                    //         {
                    //             "Code": "RMA74",
                    //             "Name": "Non-smoking"
                    //         }
                    //     ],
                    //     "Latitude": "48.83835",
                    //     "Longitude": "2.32077",
                    //     "PolicyType": null,
                    //     "PaymentTerms": null,
                    //     "HotelAwards": [
                    //         {
                    //             "Provider": "Local Star Rating",
                    //             "Rating": "4"
                    //         },
                    //         {
                    //             "Provider": "Northstar Travel Media",
                    //             "Rating": "4"
                    //         }
                    //     ],
                    //     "PaymentDetails": null,
                    //     "Rooms": [],
                    //     "KeyCollectionInfo": null,
                    //     "HotelType": null,
                    //     "GuestCount": 1,
                    //     "HotelFeatures": []
                    // },
                    // {
                    //     "Id": "1090794b-7d32-4e28-934b-94340bba1cc1",
                    //     "CurrencyCode": "USD",
                    //     "DailyRatePerRoom": 193.25,
                    //     "CheckInDate": "2022-02-15T00:00:00",
                    //     "CheckOutDate": "2022-02-20T00:00:00",
                    //     "CheckInTime": null,
                    //     "CheckOutTime": null,
                    //     "ChainName": "Synxis Corporation",
                    //     "ChainCode": "YX",
                    //     "HotelName": "25HOURS HOTEL TERMINUS NORD",
                    //     "HotelCode": "HTN",
                    //     "HotelCodeContext": "1A",
                    //     "HotelAddress": {
                    //         "CountryCode": "FR",
                    //         "CountryName": null,
                    //         "ZIP": "75010",
                    //         "DistrictName": null,
                    //         "CityName": "PARIS",
                    //         "StreetAddress": "12 BOULEVARD DE DENAIN",
                    //         "RegionName": null
                    //     },
                    //     "HotelMainImage": "https://d2573qu6qrjt8c.cloudfront.net/7980236741284B07864A421AF2AB20D1/J.JPEG",
                    //     "HotelImages": [],
                    //     "HotelMainText": [],
                    //     "HotelDescription": [
                    //         "Opposite the central Gare du Nord train station you can find the 25hours Hotel Paris Terminus Nord which is a declaration of love for the vibrant spirit of this district. Local heroes from the district serve as the inspiration for the interior design concept; A playful hodgepodge of vibrant colourful wall murals in street-art style adorn the public spaces. The rooms are relaxing retreats - inspired by Africa and Asia. The NENI restaurant and the Sape Bar form the pulsing heart of the hotel. The hotel is situated right across the main train station of Paris - Gare du Nord. SERVICE CHARGES MAY APPLY - PLEASE CHECK SEAMLESS AVAILABILITY OR PRICING RESPONSE/DISPLAY TO GET SERVICE CHARGE DETAILS TAXES AND SERVICE CHARGES MAY APPLY - PLEASE CHECK SEAMLESS AVAILABILITY OR PRICING RESPONSE/DISPLAY TO GET TAXES DETAILS "
                    //     ],
                    //     "LocationDescription": null,
                    //     "AttractionDescription": null,
                    //     "RoomInfoDescription": null,
                    //     "Recreation": [],
                    //     "OnSiteServices": null,
                    //     "HotelPhone": "00-33-1-42808200",
                    //     "HotelFax": "00-49-40-257777777",
                    //     "HotelCityCode": "PAR",
                    //     "HotelAmenities": {
                    //         "PHY102": "Accessible baths",
                    //         "PHY3": "Bathroom vanity in guest rooms for disabled person height",
                    //         "PHY15": "Light switches in guest rooms for disabled persons height",
                    //         "PHY42": "Wheelchair accessible elevators",
                    //         "PHY32": "Toilet seat in guest rooms for disabled person",
                    //         "PHY104": "Adapted room doors",
                    //         "PHY50": "Handicapped parking",
                    //         "PHY38": "Grab bars in bathroom",
                    //         "PHY28": "Public areas wheelchair accessible for disabled",
                    //         "PHY29": "Service animals allowed on property for people with disabilities",
                    //         "PHY106": "Special needs menus",
                    //         "PHY71": "Staff trained in service to disabled guests",
                    //         "PHY45": "Closed caption TV",
                    //         "PHY108": "Wide corridors",
                    //         "PHY107": "Wide entrance",
                    //         "PHY109": "Wide restaurant entrance",
                    //         "PHY105": "Bedroom wheelchair access",
                    //         "SEC19": "Emergency lighting",
                    //         "SEC22": "Fire detectors in public areas",
                    //         "SEC34": "Patrolled parking area",
                    //         "SEC93": "U.S. Fire Safety compliant",
                    //         "SEC57": "Staff trained in first aid",
                    //         "SEC62": "Video cameras in public areas",
                    //         "HAC224": "Pets allowed",
                    //         "HAC218": "Children welcome",
                    //         "HAC20": "Coffee shop",
                    //         "HAC45": "Gift/News stand",
                    //         "HAC220": "Hotel does not provide pornographic films/TV",
                    //         "HAC33": "Elevators",
                    //         "HAC198": "Non-smoking rooms (generic)",
                    //         "HAC76": "Restaurant",
                    //         "HAC165": "Lounges/bars",
                    //         "HAC26": "Currency exchange",
                    //         "BUS96": "Meeting facilities",
                    //         "BUS39": "Business center",
                    //         "HAC223": "Internet services",
                    //         "HAC222": "Free high speed internet connection",
                    //         "HAC221": "Hotspots",
                    //         "HAC178": "High speed internet access for laptop in public areas",
                    //         "HAC179": "Wireless internet connection in public areas"
                    //     },
                    //     "RoomAmenities": {
                    //         "RMA31": "Direct dial phone number",
                    //         "RMA59": "Kitchen",
                    //         "RMA20": "Color television",
                    //         "RMA50": "Hairdryer",
                    //         "RMA69": "Minibar",
                    //         "RMA78": "Pay per view movies on TV"
                    //     },
                    //     "HotelAmenitiesCollection": [
                    //         {
                    //             "Code": "PHY102",
                    //             "Name": "Accessible baths"
                    //         },
                    //         {
                    //             "Code": "PHY3",
                    //             "Name": "Bathroom vanity in guest rooms for disabled person height"
                    //         },
                    //         {
                    //             "Code": "PHY15",
                    //             "Name": "Light switches in guest rooms for disabled persons height"
                    //         },
                    //         {
                    //             "Code": "PHY42",
                    //             "Name": "Wheelchair accessible elevators"
                    //         },
                    //         {
                    //             "Code": "PHY32",
                    //             "Name": "Toilet seat in guest rooms for disabled person"
                    //         },
                    //         {
                    //             "Code": "PHY104",
                    //             "Name": "Adapted room doors"
                    //         },
                    //         {
                    //             "Code": "PHY50",
                    //             "Name": "Handicapped parking"
                    //         },
                    //         {
                    //             "Code": "PHY38",
                    //             "Name": "Grab bars in bathroom"
                    //         },
                    //         {
                    //             "Code": "PHY28",
                    //             "Name": "Public areas wheelchair accessible for disabled"
                    //         },
                    //         {
                    //             "Code": "PHY29",
                    //             "Name": "Service animals allowed on property for people with disabilities"
                    //         },
                    //         {
                    //             "Code": "PHY106",
                    //             "Name": "Special needs menus"
                    //         },
                    //         {
                    //             "Code": "PHY71",
                    //             "Name": "Staff trained in service to disabled guests"
                    //         },
                    //         {
                    //             "Code": "PHY45",
                    //             "Name": "Closed caption TV"
                    //         },
                    //         {
                    //             "Code": "PHY108",
                    //             "Name": "Wide corridors"
                    //         },
                    //         {
                    //             "Code": "PHY107",
                    //             "Name": "Wide entrance"
                    //         },
                    //         {
                    //             "Code": "PHY109",
                    //             "Name": "Wide restaurant entrance"
                    //         },
                    //         {
                    //             "Code": "PHY105",
                    //             "Name": "Bedroom wheelchair access"
                    //         },
                    //         {
                    //             "Code": "SEC19",
                    //             "Name": "Emergency lighting"
                    //         },
                    //         {
                    //             "Code": "SEC22",
                    //             "Name": "Fire detectors in public areas"
                    //         },
                    //         {
                    //             "Code": "SEC34",
                    //             "Name": "Patrolled parking area"
                    //         },
                    //         {
                    //             "Code": "SEC93",
                    //             "Name": "U.S. Fire Safety compliant"
                    //         },
                    //         {
                    //             "Code": "SEC57",
                    //             "Name": "Staff trained in first aid"
                    //         },
                    //         {
                    //             "Code": "SEC62",
                    //             "Name": "Video cameras in public areas"
                    //         },
                    //         {
                    //             "Code": "HAC224",
                    //             "Name": "Pets allowed"
                    //         },
                    //         {
                    //             "Code": "HAC218",
                    //             "Name": "Children welcome"
                    //         },
                    //         {
                    //             "Code": "HAC20",
                    //             "Name": "Coffee shop"
                    //         },
                    //         {
                    //             "Code": "HAC45",
                    //             "Name": "Gift/News stand"
                    //         },
                    //         {
                    //             "Code": "HAC220",
                    //             "Name": "Hotel does not provide pornographic films/TV"
                    //         },
                    //         {
                    //             "Code": "HAC33",
                    //             "Name": "Elevators"
                    //         },
                    //         {
                    //             "Code": "HAC198",
                    //             "Name": "Non-smoking rooms (generic)"
                    //         },
                    //         {
                    //             "Code": "HAC76",
                    //             "Name": "Restaurant"
                    //         },
                    //         {
                    //             "Code": "HAC165",
                    //             "Name": "Lounges/bars"
                    //         },
                    //         {
                    //             "Code": "HAC26",
                    //             "Name": "Currency exchange"
                    //         },
                    //         {
                    //             "Code": "BUS96",
                    //             "Name": "Meeting facilities"
                    //         },
                    //         {
                    //             "Code": "BUS39",
                    //             "Name": "Business center"
                    //         },
                    //         {
                    //             "Code": "HAC223",
                    //             "Name": "Internet services"
                    //         },
                    //         {
                    //             "Code": "HAC222",
                    //             "Name": "Free high speed internet connection"
                    //         },
                    //         {
                    //             "Code": "HAC221",
                    //             "Name": "Hotspots"
                    //         },
                    //         {
                    //             "Code": "HAC178",
                    //             "Name": "High speed internet access for laptop in public areas"
                    //         },
                    //         {
                    //             "Code": "HAC179",
                    //             "Name": "Wireless internet connection in public areas"
                    //         },
                    //         {
                    //             "Code": "",
                    //             "Name": ""
                    //         },
                    //         {
                    //             "Code": "",
                    //             "Name": ""
                    //         },
                    //         {
                    //             "Code": "",
                    //             "Name": ""
                    //         }
                    //     ],
                    //     "RoomAmenitiesCollection": [
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA59",
                    //             "Name": "Kitchen"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA59",
                    //             "Name": "Kitchen"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA59",
                    //             "Name": "Kitchen"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA59",
                    //             "Name": "Kitchen"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA59",
                    //             "Name": "Kitchen"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA59",
                    //             "Name": "Kitchen"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA59",
                    //             "Name": "Kitchen"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         }
                    //     ],
                    //     "Latitude": "48.87965",
                    //     "Longitude": "2.35492",
                    //     "PolicyType": null,
                    //     "PaymentTerms": null,
                    //     "HotelAwards": [
                    //         {
                    //             "Provider": "Local Star Rating",
                    //             "Rating": "4"
                    //         }
                    //     ],
                    //     "PaymentDetails": null,
                    //     "Rooms": [],
                    //     "KeyCollectionInfo": null,
                    //     "HotelType": null,
                    //     "GuestCount": 1,
                    //     "HotelFeatures": []
                    // },
                    // {
                    //     "Id": "b3f14d48-06d0-4d1f-949b-65f19c52a481",
                    //     "CurrencyCode": "USD",
                    //     "DailyRatePerRoom": 521.44,
                    //     "CheckInDate": "2022-02-15T00:00:00",
                    //     "CheckOutDate": "2022-02-20T00:00:00",
                    //     "CheckInTime": null,
                    //     "CheckOutTime": null,
                    //     "ChainName": "",
                    //     "ChainCode": "IW",
                    //     "HotelName": "LE PONT-NEUF MAISON ALBAR",
                    //     "HotelCode": "MNA",
                    //     "HotelCodeContext": "1A",
                    //     "HotelAddress": {
                    //         "CountryCode": "FR",
                    //         "CountryName": null,
                    //         "ZIP": "75001",
                    //         "DistrictName": null,
                    //         "CityName": "PARIS",
                    //         "StreetAddress": "23 RUE DU PONT NEUF",
                    //         "RegionName": null
                    //     },
                    //     "HotelMainImage": "https://d2573qu6qrjt8c.cloudfront.net/AE227A73FEAB4573AB92FDFA325DA4C3/J.JPEG",
                    //     "HotelImages": [],
                    //     "HotelMainText": [],
                    //     "HotelDescription": [
                    //         "***COVID-19- Hygiene standards in place and in compliance with local regulation - Certified by SOCOTEC Group- Health Risk Management System Certification- \nExamples of rules- Reinforced disinfection process- hand sanitizer available at the reception desk- social distancing- hotel services adapted- a point-person to inform guests***\n\nFeaturing free WiFi and a restaurant- Maison Albar Hotels Le Pont-Neuf offers accommodations in center of Paris. The hotel has a hot tub and hammam- and guests can enjoy a meal at the restaurant. Every room at this hotel is air conditioned and has a flat-screen TV with cable channels. Some rooms have a sitting area to relax in after a busy day. You will find a coffee machine in the room. Every room comes with a private bathroom. Extras include free toiletries and a hairdryer. There is a 24-hour front desk at the property. Louvre is 501 m from Maison Albar Hotel Paris Celine- and Pompidou Center is 600 m from the property. The nearest airport is Orly Airport- 14.5 km from the property.1st arr. is a great choice for travelers interested in food- shopping and museums. This is a really good location- you can shop til you drop for popular brands like H and M- Zara- Chanel. From Paris Charles de Gaulle- take A1 at Roissy en France. Follow A1 and ringroad direction Paris. Take exit Maillot Bois de Boulogne. Take Avenue de la Grande Armee- then Avenue des Champs Elysees- Quai des Tuileries - Quai Francois Mitterand direction Rue du Pont Neuf. SERVICE CHARGES MAY APPLY - PLEASE CHECK SEAMLESS AVAILABILITY OR PRICING RESPONSE/DISPLAY TO GET SERVICE CHARGE DETAILS TAXES AND SERVICE CHARGES MAY APPLY - PLEASE CHECK SEAMLESS AVAILABILITY OR PRICING RESPONSE/DISPLAY TO GET TAXES DETAILS "
                    //     ],
                    //     "LocationDescription": null,
                    //     "AttractionDescription": null,
                    //     "RoomInfoDescription": null,
                    //     "Recreation": [],
                    //     "OnSiteServices": null,
                    //     "HotelPhone": "33-1-44889260",
                    //     "HotelFax": "33-1-44889274",
                    //     "HotelCityCode": "PAR",
                    //     "HotelAmenities": {
                    //         "PHY15": "Light switches in guest rooms for disabled persons height",
                    //         "PHY42": "Wheelchair accessible elevators",
                    //         "PHY32": "Toilet seat in guest rooms for disabled person",
                    //         "PHY104": "Adapted room doors",
                    //         "PHY28": "Public areas wheelchair accessible for disabled",
                    //         "PHY29": "Service animals allowed on property for people with disabilities",
                    //         "PHY106": "Special needs menus",
                    //         "PHY108": "Wide corridors",
                    //         "PHY107": "Wide entrance",
                    //         "PHY105": "Bedroom wheelchair access",
                    //         "SEC19": "Emergency lighting",
                    //         "SEC57": "Staff trained in first aid",
                    //         "SEC62": "Video cameras in public areas",
                    //         "HAC224": "Pets allowed",
                    //         "HAC218": "Children welcome",
                    //         "HAC78": "Safe deposit box",
                    //         "HAC33": "Elevators",
                    //         "HAC198": "Non-smoking rooms (generic)",
                    //         "HAC76": "Restaurant",
                    //         "HAC165": "Lounges/bars",
                    //         "HAC61": "Massage services",
                    //         "HAC8": "Baby sitting",
                    //         "HAC46": "Hairdresser/barber",
                    //         "HAC68": "Parking",
                    //         "HAC91": "Tour/sightseeing desk",
                    //         "HAC77": "Room service",
                    //         "HAC223": "Internet services",
                    //         "HAC222": "Free high speed internet connection",
                    //         "HAC221": "Hotspots",
                    //         "HAC178": "High speed internet access for laptop in public areas",
                    //         "HAC179": "Wireless internet connection in public areas"
                    //     },
                    //     "RoomAmenities": {
                    //         "RMA31": "Direct dial phone number",
                    //         "RMA69": "Minibar",
                    //         "RMA20": "Color television",
                    //         "RMA27": "Data port",
                    //         "RMA50": "Hairdryer",
                    //         "RMA78": "Pay per view movies on TV"
                    //     },
                    //     "HotelAmenitiesCollection": [
                    //         {
                    //             "Code": "PHY15",
                    //             "Name": "Light switches in guest rooms for disabled persons height"
                    //         },
                    //         {
                    //             "Code": "PHY42",
                    //             "Name": "Wheelchair accessible elevators"
                    //         },
                    //         {
                    //             "Code": "PHY32",
                    //             "Name": "Toilet seat in guest rooms for disabled person"
                    //         },
                    //         {
                    //             "Code": "PHY104",
                    //             "Name": "Adapted room doors"
                    //         },
                    //         {
                    //             "Code": "PHY28",
                    //             "Name": "Public areas wheelchair accessible for disabled"
                    //         },
                    //         {
                    //             "Code": "PHY29",
                    //             "Name": "Service animals allowed on property for people with disabilities"
                    //         },
                    //         {
                    //             "Code": "PHY106",
                    //             "Name": "Special needs menus"
                    //         },
                    //         {
                    //             "Code": "PHY108",
                    //             "Name": "Wide corridors"
                    //         },
                    //         {
                    //             "Code": "PHY107",
                    //             "Name": "Wide entrance"
                    //         },
                    //         {
                    //             "Code": "PHY105",
                    //             "Name": "Bedroom wheelchair access"
                    //         },
                    //         {
                    //             "Code": "SEC19",
                    //             "Name": "Emergency lighting"
                    //         },
                    //         {
                    //             "Code": "SEC57",
                    //             "Name": "Staff trained in first aid"
                    //         },
                    //         {
                    //             "Code": "SEC62",
                    //             "Name": "Video cameras in public areas"
                    //         },
                    //         {
                    //             "Code": "HAC224",
                    //             "Name": "Pets allowed"
                    //         },
                    //         {
                    //             "Code": "HAC218",
                    //             "Name": "Children welcome"
                    //         },
                    //         {
                    //             "Code": "HAC78",
                    //             "Name": "Safe deposit box"
                    //         },
                    //         {
                    //             "Code": "HAC33",
                    //             "Name": "Elevators"
                    //         },
                    //         {
                    //             "Code": "HAC198",
                    //             "Name": "Non-smoking rooms (generic)"
                    //         },
                    //         {
                    //             "Code": "HAC76",
                    //             "Name": "Restaurant"
                    //         },
                    //         {
                    //             "Code": "HAC165",
                    //             "Name": "Lounges/bars"
                    //         },
                    //         {
                    //             "Code": "HAC61",
                    //             "Name": "Massage services"
                    //         },
                    //         {
                    //             "Code": "HAC8",
                    //             "Name": "Baby sitting"
                    //         },
                    //         {
                    //             "Code": "HAC46",
                    //             "Name": "Hairdresser/barber"
                    //         },
                    //         {
                    //             "Code": "HAC68",
                    //             "Name": "Parking"
                    //         },
                    //         {
                    //             "Code": "HAC91",
                    //             "Name": "Tour/sightseeing desk"
                    //         },
                    //         {
                    //             "Code": "HAC77",
                    //             "Name": "Room service"
                    //         },
                    //         {
                    //             "Code": "HAC223",
                    //             "Name": "Internet services"
                    //         },
                    //         {
                    //             "Code": "HAC222",
                    //             "Name": "Free high speed internet connection"
                    //         },
                    //         {
                    //             "Code": "HAC221",
                    //             "Name": "Hotspots"
                    //         },
                    //         {
                    //             "Code": "HAC178",
                    //             "Name": "High speed internet access for laptop in public areas"
                    //         },
                    //         {
                    //             "Code": "HAC179",
                    //             "Name": "Wireless internet connection in public areas"
                    //         },
                    //         {
                    //             "Code": "",
                    //             "Name": ""
                    //         },
                    //         {
                    //             "Code": "",
                    //             "Name": ""
                    //         },
                    //         {
                    //             "Code": "",
                    //             "Name": ""
                    //         }
                    //     ],
                    //     "RoomAmenitiesCollection": [
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA27",
                    //             "Name": "Data port"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA27",
                    //             "Name": "Data port"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA27",
                    //             "Name": "Data port"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA27",
                    //             "Name": "Data port"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA27",
                    //             "Name": "Data port"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA27",
                    //             "Name": "Data port"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA27",
                    //             "Name": "Data port"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA20",
                    //             "Name": "Color television"
                    //         },
                    //         {
                    //             "Code": "RMA31",
                    //             "Name": "Direct dial phone number"
                    //         },
                    //         {
                    //             "Code": "RMA78",
                    //             "Name": "Pay per view movies on TV"
                    //         },
                    //         {
                    //             "Code": "RMA27",
                    //             "Name": "Data port"
                    //         },
                    //         {
                    //             "Code": "RMA69",
                    //             "Name": "Minibar"
                    //         },
                    //         {
                    //             "Code": "RMA50",
                    //             "Name": "Hairdryer"
                    //         }
                    //     ],
                    //     "Latitude": "48.86061",
                    //     "Longitude": "2.34419",
                    //     "PolicyType": null,
                    //     "PaymentTerms": null,
                    //     "HotelAwards": [
                    //         {
                    //             "Provider": "Local Star Rating",
                    //             "Rating": "5"
                    //         }
                    //     ],
                    //     "PaymentDetails": null,
                    //     "Rooms": [],
                    //     "KeyCollectionInfo": null,
                    //     "HotelType": null,
                    //     "GuestCount": 1,
                    //     "HotelFeatures": []
                    // },
                ],

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
