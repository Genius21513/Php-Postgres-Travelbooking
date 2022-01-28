<div class="w-full px-6">
    <div class="relative rounded-lg bg-indigo-700 container mx-auto flex flex-col items-center py-12">
        <img class="mr-2 lg:mr-12 mt-2 lg:mt-12 absolute right-0 top-0"  src="https://tuk-cdn.s3.amazonaws.com/can-uploader/center_aligned_with_image-svg2.svg" alt="bg"/>
        <img class="ml-2 lg:ml-12 mb-2 lg:mb-12 absolute bottom-0 left-0" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/center_aligned_with_image-svg3.svg" alt="bg"/>

        <div class="w-11/12 sm:w-2/3">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl text-center text-white font-bold leading-tight">{{$slot}}</h1>
            @isset($description)
            <p class="mt-6 max-w-lg mx-auto text-center text-xl text-indigo-200 sm:max-w-3xl">
              {{ $description }}
            </p>
            @endisset
        </div>
        {{-- <div class="flex justify-center items-center mb-10 sm:mb-20">
            <button class="hover:text-white hover:bg-transparent lg:text-xl hover:border-white border bg-white transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-indigo-700	focus:ring-white rounded text-indigo-700 px-4 sm:px-8 py-1 sm:py-3 text-sm">Get Started</button>
            <button class="hover:bg-white hover:text-indigo-600 lg:text-xl hover:border-indigo-600 ml-3 sm:ml-6 bg-transparent transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-indigo-700 focus:ring-white hover:bg-indigo-700-800 rounded border border-white text-white px-4 sm:px-8 py-1 sm:py-3 text-sm">Learn More</button>
        </div> --}}
    </div>
</div>
