@extends('layouts.app')

@section('content')

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
                    <div class="relative" x-data="tripSelect()" x-init="init()">
                        <button class="flex items-center justify-between w-auto bg-white rounded cursor-pointer dark:bg-gray-800" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="py-3 text-sm font-medium text-gray-600 dark:text-gray-400">
                                <span id="trip" x-text="tripInput"></span>
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
                                <li x-on:click="change(trip); isOpen = false;" class="flex flex-row px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">
                                    <a tabindex="0" class="focus:no-underline focus:text-gray-400" x-text="trip"></a>
                                </li>
                            </template>
                        </ul>
                    </div>



                    <div class="relative" x-data="memberSelect()" x-init="init()">
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

                        <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 transition duration-300 bg-white border rounded shadow dark:bg-gray-800" style="display:none">
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
                                <button @click="setMembers(); isOpen = false" class="px-2 py-1 mt-2 text-white bg-indigo-500 rounded-full focus:outline-none">Done</button>
                            </div>
                        </ul>
                    </div>
                    


                    <div class="relative" x-data="planSelect()" x-init="init()">
                        <button class="flex items-center justify-between w-auto bg-white rounded cursor-pointer dark:bg-gray-800" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="flex items-center py-3 pl-3 text-sm font-medium tracking-normal text-gray-600 dark:text-gray-400">
                                <span id="plan" class="h-5" x-text="planInput"></span>
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
                        <input readonly id="from1" type="text" @click="isOpen = true" x-model="fromInput" class="block py-3 pl-10 bg-gray-100 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Leaving From" />

                        <div class="absolute z-50 w-96" x-show="isOpen" x-trap="isOpen" style="display:none" @click.away="isOpen = false">
                            <div class="bg-white border rounded">
                                <div class="flex p-4 text-gray-500">
                                    <input x-model="fromInput" @input="search()" class="px-4 text-gray-800 border-b-2 outline-none appearance-none" />
                                </div>
                                <div class="p-4 border-t-2 border-gray-100">
                                    <template x-for="item in items">
                                        <div class="cursor-pointer group" @click="select(item.Code);">
                                            <div class="flex items-center pl-3 group-hover:bg-indigo-100">
                                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="currentColor" aria-hidden="true">
                                                    <path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path>
                                                </svg>
                                                
                                                <a class="block p-4 border-l-4 border-transparent ">
                                                    <p x-text="item.City + '(' + item.Code + '-' + item.Name + ')'"></p>
                                                    <p x-text="item.Region + ',' + item.Country" class="text-sm text-gray-600"></p>
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
                        <input readonly id="to1" type="text" @click="isOpen = true" x-model="toInput" class="block py-3 pl-10 bg-gray-100 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Going To" />

                        <div class="absolute z-50 w-96" x-show="isOpen" x-trap="isOpen" style="display:none" @click.away="isOpen = false">
                            <div class="bg-white border rounded">
                                <div class="flex p-4 text-gray-500">
                                    <input x-model="toInput" @input="search()" class="px-4 text-gray-800 border-b-2 outline-none appearance-none" />
                                </div>
                                <div class="p-4 border-t-2 border-gray-100">
                                    <template x-for="item in items">
                                        <div class="cursor-pointer group" @click="select(item.Code);">
                                            <div class="flex items-center pl-3 group-hover:bg-indigo-100">
                                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="currentColor" aria-hidden="true">
                                                    <path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path>
                                                </svg>
                                                
                                                <a class="block p-4 border-l-4 border-transparent ">
                                                    <p x-text="item.City + '(' + item.Code + '-' + item.Name + ')'"></p>
                                                    <p x-text="item.Region + ',' + item.Country" class="text-sm text-gray-600"></p>
                                                </a>
                                            </div>
                                        </div>    
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="relative rounded-md" x-data="dateSelect()">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input datepicker datepicker-orientation="bottom" x-model="departure1" datepicker-format="yyyy-mm-dd" id="departure1" readonly type="text" class="block w-full py-3 pl-10 bg-gray-100 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Select Date">
                        </div>
                        
                        <!-- <div x-show="false" date-rangepicker datepicker-orientation="bottom" class="flex items-center">
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
                        </div> -->
                    </div>

                    <div class="items-center justify-end hidden md:flex">
                        <button @click="goSearch(); " class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none">
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
        
        
        <section class="flex flex-col px-8 my-8">
            <div class="relative p-8 bg-white border border-gray-100 shadow-md rounded-xl">
                <template x-if="noData">
                    <div> There are no data to show. </div>
                </template>
                <template x-if="(data.DirectAirlines !== undefined)">
                    <template x-for="d in data.DirectAirlines">
                        <div class="flex items-center py-5 mt-2 border border-gray-300">
                            <div class="items-center w-2/12 px-6">                                    
                                <img class="w-12 h-auto rounded-full" :src="'http://rest.resvoyage.com/content/airline-logos/' + d.AirlineCode + '.png'" alt="">
                            </div>
                            <div class="w-5/12 px-6 space-y-0.5 items-center">
                                <p class="text-left text-gray-600" x-text="d.Departure"></p>
                                <p class="text-left text-gray-500" x-text="d.Airline"></p>
                            </div>
                            <div class="w-5/12 px-6 space-y-0.5 items-center">
                                <p class="text-right text-gray-600" x-text="d.Price + d.Currency"></p>
                                <p class="text-right text-gray-500">Nonstop</p>
                            </div>
                        </div>
                    </template>
                </template>
                <template x-if="(data.OneStopAirlines !== undefined)">
                    <template x-for="d in data.DirectAirlines">
                        <div class="flex items-center py-5 mt-2 border border-gray-300">
                            <div class="items-center w-2/12 px-6">                                    
                                <img class="w-12 h-auto rounded-full" :src="'http://rest.resvoyage.com/content/airline-logos/' + d.AirlineCode + '.png'" alt="">
                            </div>
                            <div class="w-5/12 px-6 space-y-0.5 items-center">
                                <p class="text-left text-gray-600" x-text="d.Departure"></p>
                                <p class="text-left text-gray-500" x-text="d.Airline"></p>
                            </div>
                            <div class="w-5/12 px-6 space-y-0.5 items-center">
                                <p class="text-right text-gray-600" x-text="d.Price + d.Currency"></p>
                                <p class="text-right text-gray-500">1 stop</p>
                            </div>
                        </div>
                    </template>
                </template>
                <template x-if="(data.TwoStopAirlines !== undefined)">
                    <template x-for="d in data.DirectAirlines">
                        <div class="flex items-center py-5 mt-2 border border-gray-300">
                            <div class="items-center w-2/12 px-6">                                    
                                <img class="w-12 h-auto rounded-full" :src="'http://rest.resvoyage.com/content/airline-logos/' + d.AirlineCode + '.png'" alt="">
                            </div>
                            <div class="w-5/12 px-6 space-y-0.5 items-center">
                                <p class="text-left text-gray-600" x-text="d.Departure"></p>
                                <p class="text-left text-gray-500" x-text="d.Airline"></p>
                            </div>
                            <div class="w-5/12 px-6 space-y-0.5 items-center">
                                <p class="text-right text-gray-600" x-text="d.Price + d.Currency"></p>
                                <p class="text-right text-gray-500">2 stop</p>
                            </div>
                        </div>
                    </template>
                </template>
            </div>
        </section>
        

        <div x-show="isLoading" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex flex-col items-center justify-center w-full h-screen overflow-hidden bg-gray-700 opacity-75" style="display:none">
            <div class="w-12 h-12 mb-4 ease-linear border-4 border-t-4 border-gray-200 rounded-full loader"></div>
            <h2 class="text-xl font-semibold text-center text-white">Loading...</h2>
            <p class="w-1/3 text-center text-white">This may take a few seconds, please don't close this page.</p>
        </div>
        


        <x-testimonial/>
        <x-newsletter/>
	</main>




    <script>
        let base_url = 'http://rest.resvoyage.com';
        let token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1bmlxdWVfbmFtZSI6IlRyYXZlbGNvIiwiQ2xpZW50SWQiOiIzNTcwIiwicm9sZSI6IkIyQyIsIlRyYXZlbEdyb3VwSWQiOiIzNzM3IiwiaXNzIjoiaHR0cDovL3Jlc3ZveWFnZS5jb20iLCJhdWQiOiJyZXN2b3lhZ2UiLCJleHAiOjE2NDQ3ODkzODcsIm5iZiI6MTY0NDc3MTM4N30.uuodUIafvSkpjuSRfOBj57LeItJPqG_akmtve_O1qsk';

        let trip = '', plan = '', membs = {};
        let from1 = '', to1 = '', from2 = '', to2 = '';
        let departure1 = '', departure2 = '';

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
        function search() {
            return {
                isLoading : false,
                noData : true,
                data : {},
                init () {
                    getToken();
                },

                async goSearch() {
                    this.data = {};

                    let departure1 = document.querySelector('#departure1').value;

                    if (from1 === '' || to1 === '' || departure1 === '' || membs.all == 0 || membs.adu == 0) {
                        alert('Please, Input data');
                        return;
                    }
                    
                    // selection url
                    let sel = '';
                    sel = '&FlightClass=' + plan;

                    // members url
                    let mem = '';
                    if (membs.adu !== 0) {
                        mem += '&Adults=' + membs.adu;
                    }

                    if (membs.chi !== 0) {
                        mem += '&Children=' + membs.chi
                    }

                    if ((membs.ifs + membs.ifl) !== 0) {
                        mem += '&Infants=' + (membs.ifs + membs.ifl);
                    }

                    let url = base_url + `/api/v1/air/search?from1=${from1}&to1=${to1}&DepartureDate1=${departure1}` + mem;

                    this.isLoading = true;
                    await fetch(url, {
                        headers: { Authorization: `Bearer ${token}` }
                    })
                    .then((res) => res.json())
                    .then((response) => {
                        this.data = response.Matrix;
                        this.isLoading = false;
                        // determine data show
                        this.noData = false;
                    });
                }
            }
        }

        //Trip Select
        function tripSelect() {
            return {
                isOpen : false,
                trips : ["One way", "Round trip", "Multi-city"],
                tripInput :  "One way",
                init() {
                    trip = this.tripInput;
                },
                change(t) {
                    this.tripInput = t;
                    trip = t;
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
        
        //Plan Select
        function planSelect() {
            return {
                isOpen : false,
                plans : ["Economy", "Premium economy", "Business", "First"],
                planInput :  "Economy",
                init() {
                    plan = this.planInput;
                },
                change(p) {
                    this.planInput = p;
                    plan = p;
                },
            }
        }
        
        // Leaving From Select
        function fromSelect() {
            return {
                isOpen: false,
                fromInput: '',
                items: [],
                init() { },
                async search() {                    
                    let url = base_url + '/api/v1/air/references/airports?search=' + this.fromInput.toLowerCase();
                    await fetch(url, {
                        headers: { Authorization: `Bearer ${token}` }
                    })
                    .then((res) => res.json())
                    .then((response) => {
                        if (response && response.length > 0)
                            this.items = [...response];
                            // this.items = Array.from(response);
                    });
                },
                select(t) {
                    this.fromInput = t;
                    this.isOpen = false;
                    from1 = t;
                }
            }
        }

        // To Select
        function toSelect() {
            return {
                isOpen: false,
                toInput: '',
                items: [],
                init() { },
                async search() {
                    let url = base_url + '/api/v1/air/references/airports?search=' + this.toInput.toLowerCase();
                    await fetch(url, {
                        headers: { Authorization: `Bearer ${token}` }
                    })
                    .then((res) => res.json())
                    .then((response) => {
                        if (response && response.length > 0)
                            this.items = [...response];
                            // this.items = Array.from(response);
                    });
                },
                select(t) {
                    this.toInput = t;
                    this.isOpen = false;
                    to1 = t;
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
