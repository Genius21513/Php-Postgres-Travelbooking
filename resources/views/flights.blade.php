@extends('layouts.app')

@section('content')

    <style>
        .loader {
            border-top-color: #3498db;
            -webkit-animation: spinner 1.5s linear infinite;
            animation: spinner 1.5s linear infinite;
        }

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>

	<main class="max-w-6xl mx-auto" x-data="search" x-init="init()">
        <section class="flex flex-col">
            <div class="sm:px-6 lg:px-8">
                <div class="relative">
                    <div class="absolute inset-0">
                        <img class="object-cover w-full h-full" src="{{ asset('svg/flights.svg') }}" alt="People working on laptops">
                        <div class="absolute inset-0 mix-blend-multiply"></div>
                    </div>
                    <div class="relative px-4 py-16 sm:px-6 sm:py-16 lg:py-20 lg:px-8">
                        <h1 class="text-3xl font-bold tracking-tight text-center sm:text-4xl lg:text-5xl">
                        <span class="block text-indigo-500">Book the right flight</span>
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
        
        <section class="flex flex-col my-8 sm:px-6 lg:px-8">
            <div class="p-8 bg-white border border-gray-100 shadow-md rounded-xl">
                <div class="items-center gap-3 md:flex">
                    <div class="relative" x-data="tripSelect()">
                        <button class="flex items-center justify-between w-auto bg-white rounded cursor-pointer dark:bg-gray-800" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="py-3 text-sm font-medium text-gray-600 dark:text-gray-400">
                                <span x-text="tripInput"></span>
                            </p>
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
                        
                        <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 w-48 transition duration-300 bg-white border rounded shadow dark:bg-gray-800">
                            <template x-for="trip in trips" :key="trip">
                                <li x-on:click="chage(trip); isOpen = false;" class="flex flex-row px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">
                                    <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:no-underline focus:text-gray-400" x-text="trip"></a>
                                </li>
                            </template>
                        </ul>
                    </div>
                    

                    
                    <div class="relative" x-data="memberSelect()">
                        <button class="flex items-center justify-between w-auto bg-white rounded cursor-pointer dark:bg-gray-800" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="flex items-center py-3 pl-3 text-sm font-medium leading-3 tracking-normal text-gray-600 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span x-text="members.all"></span>
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

                        <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 transition duration-300 bg-white border rounded shadow dark:bg-gray-800">
                            <div class="flex flex-col p-3">
                                <table class="bg-white">
                                    <tbody>
                                        <template x-for="item in membersList">
                                            <tr class="border border-t-0 border-l-0 border-r-0">
                                                <td class="w-12 px-6 py-2 whitespace-nowrap">
                                                    <div class="font-medium text-gray-900 text-md"><span x-text="item.title"></span></div>
                                                    <div class="text-sm font-normal"><span x-text="item.desc"></span></div>
                                                </td>
                                                <td class="w-8 px-2 py-2 whitespace-nowrap">
                                                    <button @click="changeMembers(item.short, 'dec')" class="justify-center px-3 py-3 bg-indigo-500 rounded-full focus:outline-none hover:bg-indigo-800">
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
                                                    <button @click="changeMembers(item.short, 'inc')" class="justify-center px-3 py-3 bg-indigo-500 rounded-full focus:outline-none hover:bg-indigo-800">
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
                                <button @click="setMembers(); isOpen = false" class="px-2 py-1 mt-2 text-white bg-blue-500 rounded-full focus:outline-none">Done</button>
                            </div>
                        </ul>
                    </div>
                    

                    <div class="relative" x-data="planSelect()">
                        <button class="flex items-center justify-between w-auto bg-white rounded cursor-pointer dark:bg-gray-800" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="flex items-center py-3 pl-3 text-sm font-medium tracking-normal text-gray-600 dark:text-gray-400">
                                <span class="h-5" x-text="planInput"></span>
                            </p>
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
                        <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 w-48 transition duration-300 bg-white border rounded shadow dark:bg-gray-800">
                            <template x-for="plan in plans" :key="plan">
                                <li @click="change(plan); isOpen = false" class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">
                                    <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:no-underline focus:text-gray-400" x-text="plan"></a>
                                </li>
                            </template>
                        </ul>
                    </div>
                    
                </div>
                
                <div class="items-center gap-3 my-2 md:flex">  
                    <div class="relative rounded-md" x-data="fromSelect()">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input @click="isOpen = true" x-model="textInput" type="text" class="block py-3 pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Leaving From" />

                        <div class="absolute z-50" x-show="isOpen" style="display:none" @click.away="isOpen = false">
                            <div class="bg-white border rounded">
                                <div class="flex p-4 text-gray-500">
                                    <input x-model="textInput" @input="search()" class="px-4 text-gray-800 outline-none appearance-none" />
                                </div>
                                <div class="border-t-2 border-gray-100">
                                    <template x-for="item in items" :key="item.title">
                                        <div class="cursor-pointer group" @click="select(item.title);">
                                            <div class="flex items-center pl-3 group-hover:bg-indigo-100">
                                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="currentColor" aria-hidden="true">
                                                    <path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path>
                                                </svg>
                                                <a class="block p-4 border-l-4 border-transparent ">
                                                    <p x-text="item.title"></p>
                                                    <p x-text="item.desc" class="text-sm text-gray-600"></p>
                                                </a>
                                            </div>
                                        </div>    
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative self-center">
                        <button class="justify-center py-3 text-gray-600 focus:outline-none hover:text-indigo-600 focus:text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="relative rounded-md" x-data="toSelect()">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input @click="isOpen = true" x-model="textInput" type="text" class="block py-3 pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Going To" />

                        <div class="absolute z-50" x-show="isOpen" style="display:none" @click.away="isOpen = false">
                            <div class="bg-white border rounded">
                                <div class="flex p-4 text-gray-500">
                                    <input x-model="textInput" @input="search()" class="px-4 text-gray-800 outline-none appearance-none" />
                                </div>
                                <div class="border-t-2 border-gray-100">
                                    <template x-for="item in items" :key="item.title">
                                        <div class="cursor-pointer group" @click="select(item.title);">
                                            <div class="flex items-center pl-3 group-hover:bg-indigo-100">
                                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="currentColor" aria-hidden="true">
                                                    <path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path>
                                                </svg>
                                                <a class="block p-4 border-l-4 border-transparent ">
                                                    <p x-text="item.title"></p>
                                                    <p x-text="item.desc" class="text-sm text-gray-600"></p>
                                                </a>
                                            </div>
                                        </div>    
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative rounded-md">
                        <div date-rangepicker datepicker-orientation="bottom" class="flex items-center">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input name="start" type="text" class="block w-full py-3 pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Check-In">
                            </div>
                            <div class="relative mx-4">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input name="end" type="text" class="block w-full py-3 pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Check-Out">
                            </div>
                        </div>
                    </div>

                    <div class="items-center justify-end hidden md:flex">
                        <button @click="goSearch()" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="26" height="26" viewBox="0 0 24 24" stroke-width="2" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="10" cy="10" r="7" />
                                <line x1="21" y1="21" x2="15" y2="15" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="flex flex-col px-8 my-8">
            <div class="relative p-8 bg-white border border-gray-100 shadow-md rounded-xl">
                <div class="border border-gray-300 divide-y divide-gray-300 rounded-md">
                    <template x-for="d_1 in data">
                        <template x-for="d_2 in d_1.AirItinerary.OriginDestinationOptions">
                            <template x-for="seg in d_2.FlightSegments">
                                <div class="flex items-center py-5">
                                    <div class="w-1/12 px-3 text-center">                                    
                                        <img class="w-12 h-auto rounded-full" :src="'http://rest.resvoyage.com/' + seg.AirlineLogo" alt="">
                                    </div>
                                    <div class="w-5/12 px-3 space-y-0.5 text-center">
                                        <p class="text-left text-gray-600" x-text="seg.DepartureDate + '->' + seg.ArrivalDate"></p>
                                        <p class="text-left text-gray-500" x-text="seg.MarketingAirlineName"></p>
                                    </div>
                                    <div class="w-3/12 px-3 space-y-0.5 text-center">
                                        <p class="text-left text-gray-600" x-text="seg.Duration"></p>
                                        <p class="text-left text-gray-500" x-text="seg.DepartureAirport + '->' + seg.ArrivalAirport"></p>
                                    </div>                                    
                                    <div class="w-3/12 px-3 space-y-0.5 text-center">
                                        <p class="text-left text-gray-600" x-text="d_1.AirItineraryPricingInfo.TotalPrice + d_1.AirItineraryPricingInfo.CurrencyCode"></p>
                                        <p class="text-left text-gray-500">**</p>
                                    </div>
                                </div>
                            </template>
                        </template>
                    </template>
                </div>
            </div>
        </section> -->
        
        <section class="flex flex-col px-8 my-8">
            <div class="relative p-8 bg-white border border-gray-100 shadow-md rounded-xl">
                <div class="border border-gray-300 divide-y divide-gray-300 rounded-md">
                    <template x-for="d_1 in data">
                        <template x-for="d_2 in d_1.AirItinerary.OriginDestinationOptions">
                            <template x-for="seg in d_2.FlightSegments">
                                <div class="flex items-center py-5">
                                    <div class="w-1/12 px-3 text-center">                                    
                                        <img class="w-12 h-auto rounded-full" :src="'http://rest.resvoyage.com/' + seg.AirlineLogo" alt="">
                                    </div>
                                    <div class="w-5/12 px-3 space-y-0.5 text-center">
                                        <p class="text-left text-gray-600" x-text="seg.DepartureDate + '->' + seg.ArrivalDate"></p>
                                        <p class="text-left text-gray-500" x-text="seg.MarketingAirlineName"></p>
                                    </div>
                                    <div class="w-3/12 px-3 space-y-0.5 text-center">
                                        <p class="text-left text-gray-600" x-text="seg.Duration"></p>
                                        <p class="text-left text-gray-500" x-text="seg.DepartureAirport + '->' + seg.ArrivalAirport"></p>
                                    </div>                                    
                                    <div class="w-3/12 px-3 space-y-0.5 text-center">
                                        <p class="text-left text-gray-600" x-text="d_1.AirItineraryPricingInfo.TotalPrice + d_1.AirItineraryPricingInfo.CurrencyCode"></p>
                                        <p class="text-left text-gray-500">**</p>
                                    </div>
                                </div>
                            </template>
                        </template>
                    </template>
                </div>
            </div>
        </section>
        

        <div x-show="isLoading" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex flex-col items-center justify-center w-full h-screen overflow-hidden bg-gray-700 opacity-75">
            <div class="w-12 h-12 mb-4 ease-linear border-4 border-t-4 border-gray-200 rounded-full loader"></div>
            <h2 class="text-xl font-semibold text-center text-white">Loading...</h2>
            <p class="w-1/3 text-center text-white">This may take a few seconds, please don't close this page.</p>
        </div>
        
        <x-testimonial/>
        <x-newsletter/>
	</main>

    

    <script>

        let a = {
                    "PricedItineraries": [
                        {
                            "AirItinerary": {
                                "DirectionInd": "OneWay",
                                "OriginDestinationOptions": [
                                    {
                                        "SectorSequence": 1,
                                        "FlightSegments": [
                                            {
                                                "RouteNumber": "SU111",
                                                "FlightNumber": "111",
                                                "MarketingAirlineCode": "SU",
                                                "MarketingAirlineName": "Aeroflot",
                                                "OperatingAirlineName": "Aeroflot",
                                                "OperatingAirlineCode": "SU",
                                                "Duration": "00:00:00",
                                                "DepartureDate": "2022-02-13T13:55:00",
                                                "ArrivalDate": "2022-02-14T08:35:00",
                                                "DepartureAirport": "MIA",
                                                "DepartureCountryCode": "US",
                                                "ArrivalAirport": "SVO",
                                                "ArrivalCountryCode": "RU",
                                                "Aircraft": null,
                                                "BookingClass": "R",
                                                "ArrivalAirportName": "Moscow-Sheremetyevo Intl, Russian Federation",
                                                "DepartureAirportName": "Miami-Miami Intl, FL, United States",
                                                "BaggageFeeUrl": "https://bags.amadeus.com/Display.aspx?a=SU",
                                                "FreeBaggages": null,
                                                "Cabin": "Economy",
                                                "AirlineLogo": "content/airline-logos/SU.png",
                                                "DepartureTerminal": null,
                                                "ArrivalTerminal": null,
                                                "DepartureCityName": null,
                                                "ArrivalCityName": null,
                                                "SeatsLeft": 7
                                            },
                                            {
                                                "RouteNumber": "SU2454",
                                                "FlightNumber": "2454",
                                                "MarketingAirlineCode": "SU",
                                                "MarketingAirlineName": "Aeroflot",
                                                "OperatingAirlineName": "Aeroflot",
                                                "OperatingAirlineCode": "SU",
                                                "Duration": "00:00:00",
                                                "DepartureDate": "2022-02-14T10:15:00",
                                                "ArrivalDate": "2022-02-14T12:25:00",
                                                "DepartureAirport": "SVO",
                                                "DepartureCountryCode": "RU",
                                                "ArrivalAirport": "CDG",
                                                "ArrivalCountryCode": "FR",
                                                "Aircraft": "AIRBUS INDUSTRIE A320-100/200 JET",
                                                "BookingClass": "R",
                                                "ArrivalAirportName": "Paris-Charles De Gaulle, France",
                                                "DepartureAirportName": "Moscow-Sheremetyevo Intl, Russian Federation",
                                                "BaggageFeeUrl": "https://bags.amadeus.com/Display.aspx?a=SU",
                                                "FreeBaggages": null,
                                                "Cabin": "Economy",
                                                "AirlineLogo": "content/airline-logos/SU.png",
                                                "DepartureTerminal": null,
                                                "ArrivalTerminal": null,
                                                "DepartureCityName": null,
                                                "ArrivalCityName": null,
                                                "SeatsLeft": 7
                                            }
                                        ],
                                        "Cabin": "Economy",
                                        "JourneyTotalDuration": "16:30:00"
                                    }
                                ],
                                "TicketTimeLimit": "2022-02-12T23:59:00"
                            },
                            "AirItineraryPricingInfo": {
                                "TotalPrice": 471.7,
                                "BasePrice": 220.0,
                                "Tax": 251.7,
                                "Markup": 0.0,
                                "ServiceFee": 0.0,
                                "Discount": 0.0,
                                "PromotionalDiscount": 0.0,
                                "CurrencyCode": "USD",
                                "PTC_FareBreakdowns": [
                                    {
                                        "PTCIdentifier": null,
                                        "Baggages": [
                                            {
                                                "SequenceNumber": 1,
                                                "FlightNumber": "111",
                                                "FreeQuantity": 0.0,
                                                "Id": null,
                                                "PassengerId": null,
                                                "Title": null,
                                                "Description": null,
                                                "Amount": null,
                                                "PassengerCode": "ADT",
                                                "BagAllowanceType": "Piece",
                                                "BagAllowanceUnit": "K"
                                            },
                                            {
                                                "SequenceNumber": 2,
                                                "FlightNumber": "2454",
                                                "FreeQuantity": 0.0,
                                                "Id": null,
                                                "PassengerId": null,
                                                "Title": null,
                                                "Description": null,
                                                "Amount": null,
                                                "PassengerCode": "ADT",
                                                "BagAllowanceType": "Piece",
                                                "BagAllowanceUnit": "K"
                                            }
                                        ],
                                        "FlightExtrasInfo": null,
                                        "BasePriceFromItinerary": 220.0,
                                        "BasePrice": 220.0,
                                        "Markup": 0.0,
                                        "Discount": 0.0,
                                        "Tax": 251.7,
                                        "DKFpbpAauncutUi4MFAAFCDAv8vRQvS1qG": 0.0,
                                        "PromotionalDiscount": 0.0,
                                        "TotalPrice": 471.7,
                                        "PassengerCount": 1,
                                        "PassengerType": "ADT",
                                        "CodeContext": null,
                                        "MarkupBreakdown": [],
                                        "DiscountBreakdown": [],
                                        "PromotionalDiscountBreakdown": [],
                                        "ContractManagerDiscountBreakdown": null,
                                        "FareBasisCodes": [
                                            "RNOLA",
                                            "RNOLA"
                                        ]
                                    }
                                ],
                                "PricingSource": null,
                                "IsNegotiatedPrice": false,
                                "FareType": "Published",
                                "FareFamily": null,
                                "ValidatingAirlineCode": "SU",
                                "AdditionalFareInfos": [
                                    {
                                        "FareReference": "RNOLA",
                                        "ValidatingAirlineCode": "",
                                        "FareFamily": null,
                                        "Cabin": "",
                                        "DepartureAirport": "MIA",
                                        "DepartureDate": "2022-02-13T13:55:00",
                                        "ArrivalAirport": "SVO",
                                        "Penalty": {
                                            "Type": "TICKETS ARE NON-REFUNDABLE",
                                            "Amount": 0.0,
                                            "IsPercent": null
                                        }
                                    },
                                    {
                                        "FareReference": "RNOLA",
                                        "ValidatingAirlineCode": "",
                                        "FareFamily": null,
                                        "Cabin": "",
                                        "DepartureAirport": "SVO",
                                        "DepartureDate": "2022-02-14T10:15:00",
                                        "ArrivalAirport": "CDG",
                                        "Penalty": {
                                            "Type": "TICKETS ARE NON-REFUNDABLE",
                                            "Amount": 0.0,
                                            "IsPercent": null
                                        }
                                    }
                                ]
                            },
                            "Id": "96f24587-fca4-4104-9456-8ce42594200f",
                            "PolicyType": null,
                            "DeepLinkUrl": "",
                            "Provider": "Amadeus",
                            "OfficeId": "SJC1S2400"
                        },
                    ]
        };
        
        
        //Alpine Data
        document.addEventListener('alpine:init', () => {
            Alpine.data('search', () => ({
                isLoading : false,
                data : a.PricedItineraries,
                

                init () {
                    // console.log(this.data);
                },
                async goSearch() {
                    this.isLoading = true;
                    
                    let base_url = 'http://rest.resvoyage.com';
                    let url = base_url + '/api/v1/air/search?from1=MIA&to1=PAR&DepartureDate1=2022-02-13&Adults=1';
                    
                    // let token_url = base_url + '/api/v1/public/token?clientname=VslYXzycTIi';
                    // let token;
                    // await fetch(url)
                    // .then((res) => res.json())
                    // .then((response) => {
                    //     token = response.Token;
                    // });
                    
                    let token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1bmlxdWVfbmFtZSI6IlRyYXZlbGNvIiwiQ2xpZW50SWQiOiIzNTcwIiwicm9sZSI6IkIyQyIsIlRyYXZlbEdyb3VwSWQiOiIzNzM3IiwiaXNzIjoiaHR0cDovL3Jlc3ZveWFnZS5jb20iLCJhdWQiOiJyZXN2b3lhZ2UiLCJleHAiOjE2NDQ3NjI0NTcsIm5iZiI6MTY0NDc0NDQ1N30.gd74nIHAzw-LZ08g4ecbQ79toxZh3NKlw_BR6EdOz5k';

                    await fetch(url, {
                        headers: { Authorization: `Bearer ${token}` }
                    })
                    .then((res) => res.json())
                    .then((response) => {
                        this.data = response.PricedItineraries;
                        this.isLoading = false;
                    });
                }
            }))
        })

        //Trip Select
        function tripSelect() {
            return {
                isOpen : false,
                trips : ["Round trip", "One way", "Multi-city"],
                tripInput :  "Round trip",
                chage(t) {
                    this.tripInput = t;
                },
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
                },
            }
        }
        
        //Plan Select
        function planSelect() {
            return {
                isOpen : false,
                plans : ["Economy", "Premium economy", "Business", "First"],
                planInput :  "Economy",
                change(p) {
                    this.planInput = p;
                },
            }
        }
        
        // Leaving From Select
        function fromSelect() {
            return {
                isOpen: false,
                textInput: '',
                items: [
                    {
                        title : "MIA",
                        desc :  "Municiplaity",
                    },
                    {
                        title : "PAR",
                        desc :  "Rodiciplaity",
                    },
                ],
                init() {
                
                },
                search() {
                    console.log(this.textInput);
                },
                select(t) {
                    this.textInput = t;
                }
            }
        }

        // To Select
        function toSelect() {
            return {
                isOpen: false,
                textInput: '',
                items: [
                    {
                        title : "MIA",
                        desc :  "Municiplaity",
                    },
                    {
                        title : "PAR",
                        desc :  "Rodiciplaity",
                    },
                ],
                init() {
                
                },
                search() {
                    console.log(this.textInput);
                },
                select(t) {
                    this.textInput = t;
                }
            }
        }

    </script>
@endsection
