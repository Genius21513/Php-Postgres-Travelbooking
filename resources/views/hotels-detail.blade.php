@extends('layouts.app')

@section('content')

    <script>
        let base_url = 'http://rest.resvoyage.com';
        let token = '';


        // get params
        let s = <?php echo json_encode($s);?>;
        let h = <?php echo json_encode($h);?>;
        let detail = {};

        getToken();

        async function getToken() {
            let token_url = base_url + '/api/v1/public/token?clientname=VslYXzycTIi';
            await fetch(token_url)
            .then((res) => res.json())
            .then((response) => {
                token = response.Token;
            });
        }

        function itemData() {
            return {
                isLoading : false,
                data : {},
                hotel : {},
                isData : false,
                async init() {
                    this.isLoading = true;
                    this.isData = false;
                    let url = base_url + '/api/v1/hotel/details?SessionId='+s+'&HotelId='+h;
                    await fetch(url, {
                        headers: { Authorization: `Bearer ${token}` }
                    })
                    .then((res) => res.json())
                    .then((response) => {
                        this.isLoading = false;
                        if (response && response.Hotels.length == 1) {
                            this.data = response;
                            this.hotel = response.Hotels[0];
                            this.isData = true;
                        }
                    });
                },
            }
        }
    </script>

    <main class="max-w-6xl mx-auto">
        
            <section class="relative" x-data="itemData()" x-init="init()">
                <template x-if="isData">
                <div :class="'px-8 my-12 '+ (isLoading? 'animate-pulse' : '')">
                    <div class="flex w-full my-5">
                        <div class="w-9/12">
                            <h1 class="text-2xl font-extrabold">
                                <span x-text="hotel.HotelName"></span>
                            </h1>
                            <p class="font-medium">
                                <span x-text="hotel.ChainName + ', ' + hotel.HotelCityCode"></span>
                            </p>
                            <p>
                                <template x-for="aw in hotel.HotelAwards">
                                    <span x-text="aw.Rating + ':' + aw.Provider + ' '"></span>
                                </template>
                            </p>
                        </div>
                        <div class="w-3/12 text-right">
                            <p><span class="text-xl font-extrabold">
                                    $<span x-text="data.MinPrice + ' ~ ' + data.MaxPrice"></span>
                                </span></p>
                            <p class="text-sm">
                                <p x-text="'Phone : ' + hotel.HotelPhone"></p>
                                <p x-text="'Fax : ' + hotel.HotelFax"></p>
                            </p>
                        </div>
                    </div>

                    <div class="container mx-auto">
                        <div class="grid-cols-3 space-y-2 lg:space-y-0 lg:grid lg:gap-3 lg:grid-rows-2">
                            <div class="w-full col-span-2 row-span-2">
                                <img class="w-full h-full rounded-r-none rounded-xl" :src="hotel.HotelMainImage"
                                    alt="image" />
                            </div>
                            
                            <div class="w-full rounded">
                                <img class="w-full h-full rounded-l-none rounded-br-none rounded-xl" 
                                    :src="(hotel.HotelImages)? hotel.HotelImages[0]:''" alt="image" />
                            </div>
                            <div class="relative w-full rounded">
                                <img class="w-full h-full rounded-l-none rounded-tr-none rounded-xl" 
                                    :src="(hotel.HotelImages)? hotel.HotelImages[1]:''" alt="image" />
                                <button class="absolute p-2 text-gray-700 bg-white right-2 bottom-2 rounded-xl">View all photos</button>
                            </div>
                        </div>
                    </div>

                    <div class="container mx-auto" x-data="{ mh : 'max-h-48', open : false }">
                        <div class="flex">
                            <div class="w-1/2 py-6 space-y-4 transition-all ease-in-out duration-300">
                                <h2 class="text-2xl font-extrabold">Description</h2>
                                <p :class=" mh + ' overflow-hidden overflow-ellipsis'">
                                    <span x-text="hotel.HotelDescription">
                                    </span>
                                </p>
                                <button class="p-2 px-4 mt-2 border border-gray-200 rounded-md" @click="mh = open? 'max-h-auto': 'max-h-48'; open = !open">Read more</button>
                            </div>
                            <div class="w-1/2 py-6">
                                <h2 class="text-2xl font-extrabold">Rating</h2>
                                <template x-for="aw in hotel.HotelAwards">
                                    <div class="flex py-6 space-x-4">
                                        <div class="w-24 h-24 p-3 bg-green-500 rounded-md">
                                            <span class="text-4xl font-bold text-white">
                                                <span x-text="aw.Rating"></span>
                                            </span>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold">
                                            <span x-text="aw.Provider"></span></h3>                                        
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
                </template>
                <div x-show="isLoading" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex flex-col items-center justify-center w-full h-screen overflow-hidden bg-gray-700 opacity-75" style="display:none">
                    <div class="w-12 h-12 mb-4 ease-linear border-4 border-t-4 border-gray-200 rounded-full loader"></div>
                    <h2 class="text-xl font-semibold text-center text-white">Loading...</h2>
                    <p class="w-1/3 text-center text-white">This may take a few seconds, please don't close this page.</p>
                </div>
            </section>

        <x-testimonial/>
        <x-newsletter/>
    </main>
@endsection