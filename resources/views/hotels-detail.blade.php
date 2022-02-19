@extends('layouts.app')

@section('content')
    <main class="max-w-6xl mx-auto">
        @if (isset($data['Hotels']) && count($data['Hotels']) > 0)
            @php
                $hotel = $data['Hotels'][0];
            @endphp
            <section class="relative">
                <div>
                    <div class="px-8 my-12">
                        <div class="flex w-full">
                            <div class="w-9/12">
                                <h1 class="text-2xl font-extrabold">{{ $hotel['HotelName'] }}</h1>
                                <p class="font-medium">
                                {{ $hotel['HotelAddress']['StreetAddress'].', '.$hotel['HotelAddress']['CityName']}}
                                </p>
                                <p>{{ 'Phone : '.$hotel['HotelPhone'].', Fax : '.$hotel['HotelFax'] }}</p>
                            </div>
                            <div class="w-3/12">
                                <p>
                                    <span class="text-xl font-extrabold">
                                        {{ '$'.$data['MinPrice'].' ~ $'.$data['MaxPrice']}}
                                    </span>
                                </p>
                                {{-- <p class="text-sm">Elite World Business Hotel</p>
                                <p>8.6 Great 1,545 reviews</p> --}}
                            </div>
                        </div>

                        <div class="container mx-auto">
                            <div class="grid-cols-3 space-y-2 lg:space-y-0 lg:grid lg:gap-3 lg:grid-rows-2 p-2">
                                <div class="w-full col-span-2 row-span-2">
                                    <img class="w-full h-full rounded-r-none rounded-xl" src={{ $hotel['HotelMainImage'] }} alt="image">
                                </div>
                                @if (count($hotel['HotelImages']) > 2)
                                    @for ( $i = 0; $i < 2; $i ++)
                                        <div class="w-full rounded">
                                            <img class="w-full h-full rounded-l-none rounded-br-none rounded-xl" src={{ $hotel['HotelImages'][$i] }} alt="image">
                                        </div>
                                    @endfor
                                @endif
                            </div>
                        </div>

                        <div class="container mx-auto">
                            <div class="flex p-2">
                                <div class="w-full space-y-4">
                                    <h2 class="text-2xl font-extrabold">Description</h2>
                                    <p class="max-h-48 overflow-ellipse overflow-hidden">
                                    {{ $hotel['HotelDescription'][0] }}</p>
                                    <button class="p-2 px-4 border border-gray-200 rounded-md">Read more</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show="isLoading" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex flex-col items-center justify-center w-full h-screen overflow-hidden bg-gray-700 opacity-75" style="display:none">
                        <div class="w-12 h-12 mb-4 ease-linear border-4 border-t-4 border-gray-200 rounded-full loader"></div>
                        <h2 class="text-xl font-semibold text-center text-white">Loading...</h2>
                        <p class="w-1/3 text-center text-white">This may take a few seconds, please don't close this page.</p>
                    </div>
                </div>
            </section>
        @endif

        <x-testimonial/>
        <x-newsletter/>
    </main>
@endsection
