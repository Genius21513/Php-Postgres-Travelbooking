@extends('layouts.app')

@section('content')
	<main class="max-w-6xl mx-auto">
        <section class="relative">
            <div class="sm:px-6 lg:px-8">
                <div class="relative">
                    <div class="absolute inset-0">
                        <img class="h-full w-full object-cover" src="{{ asset('svg/car.svg') }}" alt="People working on laptops">
                        <div class="absolute inset-0 mix-blend-multiply"></div>
                    </div>
                    <div class="relative px-4 py-16 sm:px-6 sm:py-16 lg:py-20 lg:px-8">
                        <h1 class="text-center text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl">
                        <span class="block text-indigo-500">Book good car</span>
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
                <div class="md:flex items-start gap-3">
                    <div class="relative" x-data="{ isOpen: false}">
                        <button class="bg-white dark:bg-gray-800 flex items-center justify-between rounded w-auto cursor-pointer" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="pl-3 py-3 text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal font-medium flex items-center"><svg enable-background="new 0 0 24 24" height="20" viewBox="0 0 24 24" width="20" focusable="false" class="mr-2" fill="currentColor"><g><g><polygon points="8.41,12.41 7,11 2,16 7,21 8.41,19.59 5.83,17 21,17 21,15 5.83,15"></polygon><polygon points="15.59,11.59 17,13 22,8 17,3 15.59,4.41 18.17,7 3,7 3,9 18.17,9"></polygon></g></g></svg> Round trip</p>
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
                        <ul x-show="isOpen" @click.away="isOpen = false" class="transition duration-300 bg-white dark:bg-gray-800 shadow rounded mt-2 pb-1 w-48 absolute z-10" style="display:none">
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
                    <div class="relative" x-data="{ isOpen: false}">
                        <button class="bg-white dark:bg-gray-800 flex items-center justify-between rounded w-auto cursor-pointer" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="pl-3 py-3 text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal font-medium flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg> 4</p>
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
                        <ul x-show="isOpen" @click.away="isOpen = false" class="transition duration-300 bg-white dark:bg-gray-800 shadow rounded mt-2 pb-1 w-48 absolute z-10" style="display:none">

                        </ul>
                    </div>
                    <div class="relative" x-data="{ isOpen: false}">
                        <button class="bg-white dark:bg-gray-800 flex items-center justify-between rounded w-auto cursor-pointer" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                            <p class="pl-3 py-3 text-gray-600 dark:text-gray-400 text-sm tracking-normal font-medium flex items-center">
                                <span class="h-5">Economy</span>
                            </p>
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
                        <ul x-show="isOpen" @click.away="isOpen = false" class="transition duration-300 bg-white dark:bg-gray-800 shadow rounded mt-2 pb-1 w-48 absolute z-10" style="display:none">

                        </ul>
                    </div>
                </div>
                <div class="md:flex items-center gap-2">
                    <div class="relative rounded-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" fill="currentColor" aria-hidden="true"><path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path></svg>
                        </div>
                        <input type="text" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 py-3 sm:text-md border-gray-300 rounded-md" placeholder="Leaving From">
                    </div>
                    <div class="relative self-center">
                        <button class="text-gray-600 focus:outline-none justify-center hover:text-indigo-600 focus:text-indigo-600 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="relative rounded-md">
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
