@extends('layouts.app')

@section('content')
	<main class="max-w-6xl mx-auto">
        <section class="sm:px-6 lg:px-8">
            <div role="article" tabindex="0" class="focus:outline-none container mx-auto py-8 px-4">
                <h1 tabindex="0"  class="focus:outline-none text-5xl text-center f-m-w text-indigo-700 font-bold pt-0">Our Blogs</h1>
                <div class="pt-14 xl:px-0 px-4">
                    <div class="w-full lg:flex">
                        <div class="lg:w-1/2">
                            <img tabindex="0" role="img" aria-label=" Beautiful italy street" src="https://cdn.tuk.dev/assets/components/111220/blg-17/blog1.png" class="focus:outline-none w-full" alt="Beautiful italy street" />
                            <div class="mt-8 lg:mb-0 mb-8">
                                <h2 tabindex="0" class="focus:outline-none f-m-m text-2xl font-semibold leading-7">Beautiful Italy, Travel Blog</h1>
                                <p tabindex="0" class="focus:outline-none text-base f-m-m leading-loose mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <div class="mt-6">
                                    <div>
                                        <a class="hover:text-indigo-900 text-indigo-700 underline text-base font-semibold f-m-m" role="link" href="{{ route('blog.show', 1) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:w-1/2 lg:ml-8">
                            <div class="lg:flex items-start mb-8">
                                <img tabindex="0" role="img" aria-label="bag on a table"  alt="bag on table" src="https://cdn.tuk.dev/assets/components/111220/blg-17/blog2.png" class="focus:outline-none w-full" />
                                <div class="lg:ml-6">
                                    <h3 tabindex="0" class="focus:outline-none f-m-m text-2xl font-semibold leading-7 lg:mt-0 mt-8">A Broken Backpack</h1>
                                    <p tabindex="0" class="focus:outline-none text-base f-m-m leading-loose mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries.</p>
                                    <div class="mt-4">
                                        <a class="hover:text-indigo-900 text-indigo-700 underline text-base font-semibold f-m-m" role="link" href="{{ route('blog.show', 1) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:flex items-start mb-8">
                                <img tabindex="0" role="img" aria-label="car in desert" alt="car in desert" src="https://cdn.tuk.dev/assets/components/111220/blg-17/blog3.png" class="focus:outline-none w-full" />
                                <div class="lg:ml-6">
                                    <h3  tabindex="0" class="focus:outline-none f-m-m text-2xl font-semibold leading-7 lg:mt-0 mt-8">My life’s a Movie</h1>
                                    <p tabindex="0" class="focus:outline-none text-base f-m-m leading-loose mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries.</p>
                                    <div class="mt-4">
                                        <a class="hover:text-indigo-900 text-indigo-700 underline text-base font-semibold f-m-m" role="link" href="{{ route('blog.show', 1) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:flex items-start mb-8">
                                <img tabindex="0" role="img" aria-label="man with camel" alt="man with camel" src="https://cdn.tuk.dev/assets/components/111220/blg-17/blog4.png" class="focus:outline-none w-full" />
                                <div class="lg:ml-6">
                                    <h3 tabindex="0" class="focus:outline-none -m-m text-2xl font-semibold leading-7 lg:mt-0 mt-8">Lilii’s Travel Plans</h1>
                                    <p tabindex="0" class="focus:outline-none text-base f-m-m leading-loose mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries.</p>
                                    <div class="mt-4">
                                        <a class="hover:text-indigo-900 text-indigo-700 underline text-base font-semibold f-m-m" role="link" href="{{ route('blog.show', 1) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center my-16 w-full">
                    <button class="border border-indigo-700 focus:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 border-2 lg:text-2xl md:text-lg text-sm rounded f-m-m font-semibold text-indigo-700 focus:outline-none lg:px-12 px-6 lg:py-6 py-3 xl:leading-4 hover:bg-gray-200">Browse More</button>
                </div>
            </div>
        </section>
        <x-newsletter/>
	</main>
@endsection
