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
                        <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 w-48 pb-1 transition duration-300 bg-white rounded shadow dark:bg-gray-800">
                            <template x-for="type in $store.flights.tripTypes" :key="type">
                                <li x-on:click="$store.flights.chageTripType(`${type}`); isOpen = false; ">
                                    <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:no-underline focus:text-gray-400">
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
                            <div class="flex flex-col overflow-hidden">
                                <table class="min-w-full">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <template x-for="item in $store.flights.membersList">
                                            <tr>
                                                <td class="px-6 py-2 whitespace-nowrap">
                                                    <div class="font-medium text-gray-900 text-md"><span x-text="item.title"></span></div>
                                                    <div class="text-sm font-normal"><span x-text="item.desc"></span></div>
                                                </td>
                                                <td class="px-2 py-2 whitespace-nowrap">
                                                    <button @click="$store.flights.changeMembers(item.short, 'dec')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <line x1="5" y1="12" x2="19" y2="12" />
                                                        </svg>
                                                    </button>
                                                </td>
                                                <td class="px-2 py-2 whitespace-nowrap">
                                                    <div class="font-medium text-gray-900 text-md">
                                                        <span x-text="$store.flights.getNumbers(item.short)"></span>
                                                    </div>
                                                </td>
                                                <td class="px-2 py-2 whitespace-nowrap">
                                                    <button @click="$store.flights.changeMembers(item.short, 'inc')" class="justify-center px-3 py-3 bg-indigo-500 rounded-md focus:outline-none hover:bg-indigo-800">
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

                                <div class="flex justify-end max-w-full px-4 py-1">
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
                        <ul x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 w-48 pb-1 transition duration-300 bg-white rounded shadow mt- dark:bg-gray-800" style="display:none">
                            <template x-for="plan in $store.flights.plans" :key="plan">
                                <li @click=" $store.flights.changePlan(`${plan}`); isOpen = false ">
                                    <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:no-underline focus:text-gray-400"><div class="px-3 py-3 text-sm font-normal leading-3 tracking-normal text-gray-600 cursor-pointer dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white hover:bg-gray-100">
                                    <span x-text="plan"></span></a>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
                <div class="items-center gap-2 md:flex">
                    <div class="relative rounded-md w-96">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg viewBox="0 0 24 24" class="w-5 h-5 text-gray-400" fill="currentColor" aria-hidden="true">
                                <path d="M2 12C2 6.48 6.48 2 12 2s10 4.48 10 10-4.48 10-10 10S2 17.52 2 12zm10 6c3.31 0 6-2.69 6-6s-2.69-6-6-6-6 2.69-6 6 2.69 6 6 6z"></path>
                            </svg>
                        </div>
                        <input type="text" class="block w-full py-3 pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-md" placeholder="Leaving From" value="Shanghai (PVG - Pudong Intl.)">
                    </div>
                    
                    <div class="absolute z-50 mt-96">
                        <div class="bg-white border rounded">
                            <div class="flex p-4 text-gray-500">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="currentColor" aria-hidden="true">
                                    <path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path>
                                </svg>
                                <input value="Shanghai" name="select" id="select" class="w-full px-4 text-gray-800 outline-none appearance-none" checked />
                            </div>
                            <div class="border-t-2 border-gray-100">
                                <div class="cursor-pointer group">
                                    <div class="flex items-center pl-3 group-hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="currentColor" aria-hidden="true">
                                            <path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path>
                                        </svg>
                                        <a class="block p-4 border-l-4 border-transparent ">
                                            <p>Shanghai, China</p>
                                            <p class="text-sm text-gray-600">Municipality in China</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="cursor-pointer group">
                                    <div class="flex items-center pl-8 group-hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="currentColor" aria-hidden="true">
                                            <path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path>
                                        </svg>
                                        <a class="block p-4 border-l-4 border-transparent ">
                                            <p>Shanghai, China</p>
                                            <p class="text-sm text-gray-600">Municipality in China</p>
                                        </a>
                                    </div>
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


    <!-- component -->
<div>
            <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

            <button class="flex items-center justify-between w-64 p-4 text-sm font-medium leading-none text-gray-800 bg-white rounded shadow cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 focus:bg-gray-100" onclick="dropdownHandler()">
                Channels
                <div>
                    <div class="hidden" id="close">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.00016 0.666664L9.66683 5.33333L0.333496 5.33333L5.00016 0.666664Z" fill="#1F2937" />
                        </svg>
                    </div>
                    <div id="open">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.00016 5.33333L0.333496 0.666664H9.66683L5.00016 5.33333Z" fill="#1F2937" />
                        </svg>
                    </div>
                </div>
            </button>
            <div class="absolute w-64 p-4 mt-2 bg-white rounded shadow" id="dropdown">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg role="button" aria-label="dropdown" tabindex="0" onclick="toggleSubDir(1)" onkeypress="toggleSubDir(1)" class="rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.5 3L7.5 6L4.5 9" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <div class="flex items-center pl-4">
                            <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                <input aria-labelledby="fb1" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                    <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                </div>
                            </div>
                            <p id="fb1" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">Facebook</p>
                        </div>
                    </div>
                    <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">2,381</p>
                </div>
                <div id="sublist1" class="hidden pt-5 pl-8">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center pl-4">
                            <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                <input aria-labelledby="usa1" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                    <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                </div>
                            </div>
                            <p id="usa1" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">USA</p>
                        </div>
                        <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">2,381</p>
                    </div>
                    <div class="flex items-center justify-between pt-4">
                        <div class="flex items-center pl-4">
                            <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                <input aria-labelledby="ger1" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                    <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                </div>
                            </div>
                            <p id="ger1" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">Germany</p>
                        </div>
                        <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">2,381</p>
                    </div>
                    <div class="flex items-center justify-between pt-4">
                        <div class="flex items-center pl-4">
                            <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                <input aria-labelledby="italy1" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                    <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                </div>
                            </div>
                            <p id="italy1" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">Italy</p>
                        </div>
                        <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">2,381</p>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center">
                            <svg role="button" aria-label="dropdown" tabindex="0" onclick="toggleSubDir(2)" onkeypress="toggleSubDir(2)" class="rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.5 3L7.5 6L4.5 9" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <div class="flex items-center pl-4">
                                <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                    <input aria-labelledby="twitter2" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                    <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                        <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                    </div>
                                </div>
                                <p id="twitter2" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">Twitter</p>
                            </div>
                        </div>
                        <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">3,521</p>
                    </div>
                    <div id="sublist2" class="hidden pt-5 pl-8">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center pl-4">
                                <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                    <input aria-labelledby="usa2" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                    <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                        <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                    </div>
                                </div>
                                <p id="usa2" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">USA</p>
                            </div>
                            <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">2,381</p>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div class="flex items-center pl-4">
                                <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                    <input aria-labelledby="ger2" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                    <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                        <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                    </div>
                                </div>
                                <p id="ger2" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">Germany</p>
                            </div>
                            <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">2,381</p>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div class="flex items-center pl-4">
                                <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                    <input aria-labelledby="italy2" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                    <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                        <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                    </div>
                                </div>
                                <p id="italy2" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">Italy</p>
                            </div>
                            <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">2,381</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center">
                            <svg role="button" aria-label="dropdown" tabindex="0" onclick="toggleSubDir(3)" onkeypress="toggleSubDir(3)" class="rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"  width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.5 3L7.5 6L4.5 9" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <div class="flex items-center pl-4">
                                <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                    <input aria-labelledby="insta3" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                    <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                        <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                    </div>
                                </div>
                                <p id="insta3" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">Instagram</p>
                            </div>
                        </div>
                        <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">5,142</p>
                    </div>
                    <div id="sublist3" class="pt-5 pl-8">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center pl-4">
                                <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                    <input aria-labelledby="usa3" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                    <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                        <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                    </div>
                                </div>
                                <p id="usa3" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">USA</p>
                            </div>
                            <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">2,381</p>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div class="flex items-center pl-4">
                                <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                    <input aria-labelledby="germany3" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                    <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                        <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                    </div>
                                </div>
                                <p id="germany3" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">Germany</p>
                            </div>
                            <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">2,381</p>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div class="flex items-center pl-4">
                                <div class="relative flex items-center justify-center flex-shrink-0 w-3 h-3 bg-gray-100 border border-gray-200 rounded-sm dark:bg-gray-800 dark:border-gray-700">
                                    <input aria-labelledby="italy3" type="checkbox" class="absolute w-full h-full opacity-0 cursor-pointer focus:opacity-100 checkbox" />
                                    <div class="hidden text-white bg-indigo-700 rounded-sm check-icon">
                                        <svg class="icon icon-tabler icon-tabler-check" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                    </div>
                                </div>
                                <p id="italy3" tabindex="0" class="ml-2 text-sm leading-normal text-gray-800 focus:outline-none">Italy</p>
                            </div>
                            <p tabindex="0" class="w-8 text-xs leading-3 text-right text-indigo-700 focus:outline-none">2,381</p>
                        </div>
                    </div>
                </div>

                <button class="w-full py-2 mt-6 text-xs font-medium leading-3 text-indigo-700 bg-indigo-100 rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none focus:bg-indigo-200 hover:bg-indigo-200">Select</button>
            </div>
        </div>
        <style>.checkbox:checked + .check-icon {
  display: flex;
}
</style>
<script>let dropdown = document.getElementById("dropdown");
let open1 = document.getElementById("open");
let close1 = document.getElementById("close");

let flag = false;
const dropdownHandler = () => {
  if (!flag) {
    dropdown.classList.add("hidden");
    open1.classList.add("hidden");
    close1.classList.remove("hidden");
    flag = true;
  } else {
    dropdown.classList.remove("hidden");
    close1.classList.add("hidden");
    open1.classList.remove("hidden");
    flag = false;
  }
};
const toggleSubDir = (check) => {
  let subList1 = document.getElementById("sublist1");
  let subList2 = document.getElementById("sublist2");
  let subList3 = document.getElementById("sublist3");
  switch (check) {
    case 1:
      subList3.classList.add("hidden");
      subList2.classList.add("hidden");
      subList1.classList.remove("hidden");
      break;
    case 2:
      subList3.classList.add("hidden");
      subList2.classList.remove("hidden");
      subList1.classList.add("hidden");
      break;
    case 3:
      subList3.classList.remove("hidden");
      subList2.classList.add("hidden");
      subList1.classList.add("hidden");
      break;
  }
};
</script>


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
                        desc: "-",
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
