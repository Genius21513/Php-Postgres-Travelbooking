@extends('layouts.app')

@section('content')
	<main class="max-w-6xl mx-auto">
        <section class="sm:px-6 lg:px-8">
            <div class="md:flex items-center justify-between">
                <div class="lg:w-2/5 md:w-1/2 md:mr-6 ">
                    <h1 class="lg:text-5xl text-3xl font-bold mt-4 text-gray-800">Taking you through Sahara desert</h1>
                    <div class="flex items-center lg:mt-8 mt-6">
                        <img src="https://i.ibb.co/87cJQ5G/Mask-Group.png" alt="profile-picture" class="w-10 h-10" />
                        <div>
                            <p class="text-base text-gray-800 ml-4">By <span class="underline cursor-pointer">Rowan Aguilar</span></p>
                        </div>
                    </div>
                    <p class="text-base leading-6 text-gray-600 lg:mt-16 mt-12">
                        A good idiom for kids is "It's raining cats and dogs." Kids know what both cats and dogs are from an early age so they can understand it's not literally raining cats and dogs, and it's just raining really hard. This is an simple way to illustrate what an idiom is that kids can easily conceptualize.A good idiom for kids is "It's raining cats and dogs." Kids know what both cats and dogs are from an early age so they can understand it's not literally raining cats and dogs, and it's just raining really hard. This is an simple way to illustrate what an idiom is that kids can
                        easily conceptualize.
                    </p>
                    <button class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-700  focus:outline-none text-lg lg:mt-8 mt-6 font-semibold text-gray-800 flex items-center justify-center">
                        Continue Reading
                        <div class="ml-3 mt-1.5">
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.16602 4H12.8327" stroke="#1F2937" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.5 7.33333L12.8333 4" stroke="#1F2937" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.5 0.666656L12.8333 3.99999" stroke="#1F2937" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                </div>
                <div class="lg:w-2/5 md:w-1/2 h-full md:mt-0 mt-6">
                    <img src="https://i.ibb.co/G5Q79bL/jeep.png" alt="old land rover" class="h-full object-cover object-center rounded-md md:block hidden" />
                    <img src="https://i.ibb.co/hcJDTb2/pexels-oziel-g-mez-2893696-1.png" alt="old land rover" class="h-auto sm:w-auto w-full object-cover object-center rounded-md md:hidden block" />
                </div>
            </div>

            <div role="article" tabindex="0" class="focus:outline-none container my-10 pt-16">
                <div role="contentinfo" class="mb-12 xl:w-full lg:w-full w-11/12 mx-auto">
                    <h1 tabindex="0" class="focus:outline-none xl:text-3xl text-2xl pt-4 xl:pt-0 text-gray-800 xl:text-left font-bold mb-4">Related Blog Posts</h1>
                </div>
                <div tabindex="0" aria-label="group of cards" class="focus:outline-none lg:flex md:flex sm:flex xl:justify-around flex-wrap md:justify-around sm:justify-around lg:justify-around">
                    <div tabindex="0" aria-label="card 1" class="focus:outline-none xl:mb-0 mb-8 lg:w-1/4 xl:w-1/4 w-11/12 mx-auto xl:mx-0 sm:w-2/5 md:w-5/12 sm:mx-auto xl:pr-4 lg:pl-0 lg:pr-4 xl:pl-0">
                        <div class="shadow">
                            <div class="h-48 bg-cover rounded">
                                <img tabindex="0" role="img" aria-label="people" src="https://cdn.tuk.dev/assets/photo-1557804506-669a67965ba0.jfif" alt="people" class="focus:outline-none h-full w-full object-cover overflow-hidden rounded shadow" />
                            </div>
                            <div class="px-4 pt-4 pb-5 bg-white border-b border-gray-300">
                                <p tabindex="0" class="focus:outline-none text-center text-xl font-semibold pb-4">How To Build Diverse Networks That Last</p>
                                <p tabindex="0" class="focus:outline-none text-sm text-gray-600 text-center">
                                    May 13, 2019 by
                                    <a class="focus:text-indigo-400  hover:text-indigo-400 text-indigo-700 cursor-pointer" href="javascript:void(0)"><span >Sameul Guzman</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div tabindex="0" aria-label="card 2" class="focus:outline-none xl:mb-0 mb-8 lg:w-1/4 xl:w-1/4 w-11/12 mx-auto xl:mx-0 sm:w-2/5 md:w-5/12 sm:mx-auto xl:pr-4 lg:pl-4 lg:pr-0">
                        <div class="shadow">
                            <div class="h-48 bg-cover rounded">
                                <img tabindex="0" role="img" aria-label="books" src="https://cdn.tuk.dev/assets/photo-1547306843-f8fea4d65f9b.jfif" alt="books" class="focus:outline-none h-full w-full object-cover overflow-hidden rounded shadow" />
                            </div>
                            <div class="px-4 pt-4 pb-5 bg-white border-b border-gray-300">
                                <p tabindex="0" class="focus:outline-none text-center text-xl font-semibold pb-4">How To Build Diverse Networks That Last</p>
                                <p tabindex="0" class="focus:outline-none text-sm text-gray-600 text-center">
                                    May 13, 2019 by
                                    <a class="focus:text-indigo-400  hover:text-indigo-400 text-indigo-700 cursor-pointer"  href="javascript:void(0)"><span >Sameul Guzman</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div tabindex="0" aria-label="card 3" class="focus:outline-none xl:mb-0 mb-8 lg:w-1/4 xl:w-1/4 w-11/12 mx-auto xl:mx-0 sm:w-2/5 md:w-5/12 sm:mx-auto xl:pr-4 lg:pl-4 lg:pr-0">
                        <div class="shadow">
                            <div class="h-48 bg-cover rounded">
                                <img tabindex="0" role="img" aria-label="Origami" src="https://cdn.tuk.dev/assets/photo-1559125148-869baf508c95.jfif" alt="Origami " class="focus:outline-none h-full w-full object-cover overflow-hidden rounded shadow" />
                            </div>
                            <div class="px-4 pt-4 pb-5 bg-white border-b border-gray-300">
                                <p tabindex="0" class="focus:outline-none text-center text-xl font-semibold pb-4">How To Build Diverse Networks That Last</p>
                                <p tabindex="0" class="focus:outline-none text-sm text-gray-600 text-center">
                                    May 13, 2019 by
                                    <a class="focus:text-indigo-400  hover:text-indigo-400 text-indigo-700 cursor-pointer"  href="javascript:void(0)"><span >Sameul Guzman</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div tabindex="0" aria-label="card 4" class="focus:outline-none xl:mb-0 mb-8 lg:w-1/4 xl:w-1/4 w-11/12 mx-auto xl:mx-0 sm:w-2/5 md:w-5/12 sm:mx-auto xl:pr-4 lg:pl-4 lg:pr-0">
                        <div class="shadow">
                            <div class="h-48 bg-cover rounded">
                                <img tabindex="0" role="img" aria-label="people in sunset" src="https://cdn.tuk.dev/assets/photo-1513759565286-20e9c5fad06b.jfif" alt="people in sunset" class="focus:outline-none h-full w-full object-cover overflow-hidden rounded shadow" />
                            </div>
                            <div class="px-4 pt-4 pb-5 bg-white border-b border-gray-300">
                                <p tabindex="0" class="focus:outline-none text-center text-xl font-semibold pb-4">How To Build Diverse Networks That Last</p>
                                <p tabindex="0" class="focus:outline-none text-sm text-gray-600 text-center">
                                    May 13, 2019 by
                                    <a class="focus:text-indigo-400  hover:text-indigo-400 text-indigo-700 cursor-pointer" href="javascript:void(0)"><span >Sameul Guzman</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <x-newsletter/>
	</main>
@endsection
