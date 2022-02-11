@extends('layouts.app')

@section('content')

	<main class="max-w-6xl mx-auto">
        <section class="relative">
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
        <section class="flex flex-col items-center justify-center my-8 sm:px-6 lg:px-8">
            <div class="p-8 bg-white border border-gray-100 shadow-md rounded-xl">
                <div class="items-start gap-3 md:flex">
                    <div class="relative" x-data="{ isOpen: false }">
                        <button class="flex items-center justify-between w-auto bg-white rounded cursor-pointer dark:bg-gray-800" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="flex items-center py-3 pl-3 text-sm font-medium leading-3 tracking-normal text-gray-600 dark:text-gray-400"><svg enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" focusable="false" class="mr-2" fill="currentColor"><g><g><polygon points="8.41,12.41 7,11 2,16 7,21 8.41,19.59 5.83,17 21,17 21,15 5.83,15"></polygon><polygon points="15.59,11.59 17,13 22,8 17,3 15.59,4.41 18.17,7 3,7 3,9 18.17,9"></polygon></g></g></svg> 
                            <span x-text="$store.flights.tripType"></span>
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
                        <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 w-48 pb-1 transition duration-300 bg-white rounded shadow dark:bg-gray-800" style="display:none">
                            <template x-for="type in $store.flights.tripTypes" :key="type">
                                <li x-on:click="$store.flights.chageTripType(`${type}`); isOpen = false; ">
                                    <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400">
                                        <div class="flex flex-row px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">
                                            <span x-text="type"></span>
                                        </div>
                                    </a>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <div class="relative" x-data="{ isOpen : false }">
                        <button class="flex items-center justify-between w-auto bg-white rounded cursor-pointer dark:bg-gray-800" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="flex items-center py-3 pl-3 text-sm font-medium leading-3 tracking-normal text-gray-600 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg> 
                                <span x-text="$store.flights.members.all"></span>
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

                        <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 pb-1 transition duration-300 bg-white rounded shadow dark:bg-gray-800 w-96" style="display:none">
                            <div class="min-w-full">
                                <table class="min-w-full py-6 divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <template x-for="item in $store.flights.membersList">
                                            <tr class="">
                                                <td class="px-6 py-3 whitespace-nowrap">
                                                    <div class="items-center">
                                                        <div class="font-medium text-gray-900 text-md"><span x-text="item.title"></span></div>
                                                        <div class="text-sm font-normal text-gray-900"><span x-text="item.desc"></span></div>
                                                    </div>
                                                </td>
                                                <td class="px-6 whitespace-nowrap">
                                                    <button @click="$store.flights.changeMembers(item.short, 'dec')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <line x1="5" y1="12" x2="19" y2="12" />
                                                        </svg>
                                                    </button>
                                                </td>
                                                <td>
                                                    <div class="font-medium text-gray-900 text-md">
                                                        <span x-text="$store.flights.getNumbers(item.short)"></span>
                                                    </div>
                                                </td>
                                                <td class="px-6 whitespace-nowrap">
                                                    <button @click="$store.flights.changeMembers(item.short, 'inc')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <line x1="12" y1="5" x2="12" y2="19" />
                                                            <line x1="5" y1="12" x2="19" y2="12" />
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>

                                        <!-- <tr class="">
                                            <td class="px-6 py-3 whitespace-nowrap">
                                                <div class="font-medium text-gray-900 text-md">Adults</div>
                                            </td>
                                            <td class="px-6 whitespace-nowrap">
                                                <button  @click="$store.flights.changeMembers('adu', 'dec')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <line x1="5" y1="12" x2="19" y2="12" />
                                                    </svg>
                                                </button>
                                            </td>
                                            <td>
                                                <div class="font-medium text-gray-900 text-md">
                                                    <span x-text="$store.flights.members.adults"></span>
                                                </div>
                                            </td>
                                            <td class="px-6 whitespace-nowrap">
                                                <button  @click="$store.flights.changeMembers('adu', 'inc')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <line x1="12" y1="5" x2="12" y2="19" />
                                                        <line x1="5" y1="12" x2="19" y2="12" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="px-6 py-3 whitespace-nowrap">
                                                <div class="items-center">
                                                    <div class="font-medium text-gray-900 text-md">Children</div>
                                                    <div class="text-sm font-normal text-gray-900">Aged 2-11</div>
                                                </div>
                                            </td>
                                            <td class="px-6 whitespace-nowrap">
                                                <button @click="$store.flights.changeMembers('chi', 'dec')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <line x1="5" y1="12" x2="19" y2="12" />
                                                    </svg>
                                                </button>
                                            </td>
                                            <td>
                                                <div class="font-medium text-gray-900 text-md">
                                                <span x-text="$store.flights.members.childrens"></span>
                                                </div>
                                            </td>
                                            <td class="px-6 whitespace-nowrap">
                                                <button @click="$store.flights.changeMembers('chi', 'inc')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <line x1="12" y1="5" x2="12" y2="19" />
                                                        <line x1="5" y1="12" x2="19" y2="12" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="px-6 py-3 whitespace-nowrap">
                                                <div class="items-center">
                                                    <div class="font-medium text-gray-900 text-md">Infants</div>
                                                    <div class="text-sm font-normal text-gray-900">In seat</div>
                                                </div>
                                            </td>
                                            <td class="px-6 whitespace-nowrap">
                                                <button @click="$store.flights.changeMembers('ifs', 'dec')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <line x1="5" y1="12" x2="19" y2="12" />
                                                    </svg>
                                                </button>
                                            </td>
                                            <td>
                                                <div class="font-medium text-gray-900 text-md">
                                                    <span x-text="$store.flights.members.ifseats"></span>
                                                </div>
                                            </td>
                                            <td class="px-6 whitespace-nowrap">
                                                <button @click="$store.flights.changeMembers('ifs', 'inc')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <line x1="12" y1="5" x2="12" y2="19" />
                                                        <line x1="5" y1="12" x2="19" y2="12" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td class="px-6 py-3 whitespace-nowrap">
                                                <div class="items-center">
                                                    <div class="font-medium text-gray-900 text-md">Infants</div>
                                                    <div class="text-sm font-normal text-gray-900">On lap</div>
                                                </div>
                                            </td>
                                            <td class="px-6 whitespace-nowrap">
                                                <button @click="$store.flights.changeMembers('ifl', 'dec')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <line x1="5" y1="12" x2="19" y2="12" />
                                                    </svg>
                                                </button>
                                            </td>
                                            <td>
                                                <div class="font-medium text-gray-900 text-md">
                                                    <span x-text="$store.flights.members.iflaps"></span>
                                                </div>
                                            </td>
                                            <td class="px-6 whitespace-nowrap">
                                                <button @click="$store.flights.changeMembers('ifl', 'inc')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <line x1="12" y1="5" x2="12" y2="19" />
                                                        <line x1="5" y1="12" x2="19" y2="12" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>

                                <div class="flex justify-end max-w-full px-4 py-3">
                                    <div class="items-end">
                                        <button @click="isOpen = false" class="justify-center px-2 py-1 text-indigo-700 bg-white rounded-md focus:outline-none">Cancel</button>
                                        <button @click="$store.flights.setMembers(); isOpen = false" class="justify-center px-2 py-1 text-indigo-700 bg-white rounded-md focus:outline-none">Done</button>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                    <div class="relative" x-data="{ isOpen: false }">
                        <button class="flex items-center justify-between w-auto bg-white rounded cursor-pointer dark:bg-gray-800" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="flex items-center py-3 pl-3 text-sm font-medium tracking-normal text-gray-600 dark:text-gray-400">
                                <span class="h-5" x-text="$store.flights.plan"></span>
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
                        <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 w-48 pb-1 mt-2 transition duration-300 bg-white rounded shadow dark:bg-gray-800" style="display:none">
                            <template x-for="plan in $store.flights.plans" :key="plan">
                                <li @click=" $store.flights.changePlan(`${plan}`); isOpen = false ">
                                    <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">
                                    <span x-text="plan"></span></a>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
                <div class="items-center gap-2 md:flex">
                    <div class="relative rounded-md">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="currentColor" aria-hidden="true"><path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path></svg>
                        </div>
                        <input type="text" class="block w-full py-3 pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Leaving From">
                    </div>
                    <div class="relative self-center">
                        <button class="justify-center py-3 text-gray-600 focus:outline-none hover:text-indigo-600 focus:text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="relative rounded-md">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" class="block w-full py-3 pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Going To">
                    </div>
                    
                    <div class="relative rounded-md">
                        <div date-rangepicker class="flex items-center">
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
                        <button class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none">
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

        <x-testimonial/>
        <x-newsletter/>
	</main>


    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('flights', {
                // trip
                tripTypes : ["Round trip", "One way", "Multi-city"],
                tripType :  "Round trip",
                chageTripType(t) {
                    this.tripType = t;
                },

                // members
                membersList: [
                    {
                        title : "Adults",
                        desc: "",
                        short: "adu",
                    },
                    {
                        title : "Childrens",
                        desc: "Aged 2-11",
                        short: "chi",
                    },
                    {
                        title : "Infants",
                        desc: "In seat",
                        short: "ifs",
                    },
                    {
                        title : "Infants",
                        desc: "In lap",
                        short: "ifl",
                    },
                ],
                members: {
                    adu : 1,
                    chi : 0,
                    ifs : 0,
                    ifl : 0,
                    all : 1,
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
                        met === 'inc'? this.members.adu ++: this.members.adu --;
                    }
                    else if (type === "chi")
                    {
                        met === 'inc'? this.members.chi ++: this.members.chi --;
                    }
                    else if (type === "ifs")
                    {
                        met === 'inc'? this.members.ifs ++: this.members.ifs --;
                    }
                    else if (type === "ifl")
                    {
                        met === 'inc'? this.members.ifl ++: this.members.if --;
                    }
                },
                setMembers() {
                    this.members.all = this.members.adu + this.members.chi + this.members.ifs + this.members.ifl; 
                },

                // plan
                plans : ["Economy", "Premium economy", "Business", "First"],
                plan :  "Economy",
                changePlan(p) {
                    this.plan = p;
                },
            })
        })
    </script>
@endsection
