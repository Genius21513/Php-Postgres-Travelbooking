@extends('layouts.app')

@section('content')
	<main class="max-w-6xl mx-auto">
        <section class="relative">
            <div class="sm:px-6 lg:px-8">
                <div class="relative">
                    <div class="absolute inset-0">
                        <img class="h-full w-full object-cover" src="{{ asset('svg/hotel.svg') }}" alt="People working on laptops">
                        <div class="absolute inset-0 mix-blend-multiply"></div>
                    </div>
                    <div class="relative px-4 py-16 sm:px-6 sm:py-16 lg:py-20 lg:px-8">
                        <h1 class="text-center text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl">
                        <span class="block text-indigo-500">Find the right hotel, vacation home</span>
                        </h1>
                        <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                        <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid">
                            <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 bg-opacity-80 hover:bg-opacity-70 sm:px-8">
                            Call Us For Hidden Fares
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sm:px-6 lg:px-8 flex-col flex items-center justify-center my-8">
            <div class="bg-white shadow-md rounded-xl border border-gray-100 p-8">
                <div class="md:flex items-center gap-2">
                    <div class="relative rounded-md w-2/5">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 py-3 sm:text-md border-gray-300 rounded-md" placeholder="Going To">
                    </div>
                    <div class="relative rounded-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="text" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 py-3 sm:text-md border-gray-300 rounded-md" placeholder="Check-In">
                    </div>
                    <div class="relative rounded-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="text" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 py-3 sm:text-md border-gray-300 rounded-md" placeholder="Check-Out">
                    </div>
                    <div class="relative rounded-md w-1/12">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="relative" x-data="{ isOpen: false}">
                            <button class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-md border border-gray-300 rounded-md flex items-center justify-between cursor-pointer" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                                <p class="px-0 py-3 text-gray-600 dark:text-gray-400 text-md tracking-normal font-medium flex items-center border-0" multiple>1</p>
                                <div class="cursor-pointer text-gray-600 dark:text-gray-400 mx-3">
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
                            <ul x-show="isOpen" @click.away="isOpen = false" class="transition duration-300 bg-white dark:bg-gray-800 shadow rounded mt-2 pb-1 w-48 absolute z-10">
                                <li class="focus:outline-none focus:underline focus:text-gray-400">
                                    <div  class="cursor-pointer rounded-t text-sm flex flex-col font-bold leading-3 tracking-normal pt-4 pb-3 mb-1 bg-indigo-700 text-white px-3">
                                        <span class="font-medium">Steven Johnson</span>
                                        <span class="font-normal mt-2">stevedoe@gmail.com</span>
                                    </div>
                                </li>
                                <li>
                                    <ul>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm dark:hover:bg-gray-600 dark:hover:text-white leading-3 tracking-normal py-3  hover:bg-gray-100 px-3 font-normal">Interface Settings</div></a></li>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm dark:hover:bg-gray-600 dark:hover:text-white leading-3 tracking-normal py-3 hover:bg-gray-100 px-3 font-normal">Color Theme</div></a></li>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm dark:hover:bg-gray-600 dark:hover:text-white leading-3 tracking-normal py-3 hover:bg-gray-100  px-3 font-normal">Wallpaper</div></a></li>
                                    </ul>
                                    <hr class="border-gray-200 my-1" />
                                </li>
                                <li>
                                    <ul>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm dark:hover:bg-gray-600 dark:hover:text-white leading-3 tracking-normal py-3 hover:bg-gray-100 px-3 font-normal">Notifications</div></a></li>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm dark:hover:bg-gray-600 dark:hover:text-white leading-3 tracking-normal py-3 hover:bg-gray-100 px-3 font-normal">Alerts</div></a></li>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm dark:hover:bg-gray-600 dark:hover:text-white leading-3 tracking-normal py-3 hover:bg-gray-100 px-3 font-normal">Email</div></a></li>
                                        <li> <a tabindex="0" class="hover:bg-gray-100 focus:outline-none focus:underline focus:text-gray-400"><div class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm dark:hover:bg-gray-600 dark:hover:text-white leading-3 tracking-normal py-3 hover:bg-gray-100 px-3 font-normal">Push Notifications</div></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:flex hidden items-center justify-end">
                        <button class="focus:outline-none justify-center rounded-md py-3 px-3 bg-indigo-500">
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
@endsection
