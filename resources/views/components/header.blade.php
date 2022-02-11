<header>
    <div class="relative bg-white" x-data="Components.popoverGroup()" x-init="init()">
      <div class="flex justify-between items-center max-w-6xl mx-auto px-4 py-3 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
        <div class="flex justify-start">
          <a href="/">
            <span class="sr-only">Workflow</span>
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
          </a>
        </div>
        <div class="-mr-2 -my-2 md:hidden">
          <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
        <nav class="hidden md:flex space-x-10">
          <div class="relative" x-data="Components.popover({ open: false, focus: false })" x-init="init()" @keydown.escape="onEscape" @close-popover-group.window="onClosePopoverGroup">
            <button type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false" x-state:on="Item active" x-state:off="Item inactive" @click="toggle" @mousedown="if (open) $event.preventDefault()">
              <span>More Travels</span>
              <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
            <div class="absolute z-10 -ml-1 mt-3 transform w-screen max-w-md lg:max-w-xs" x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" x-description="'More' flyout menu, show/hide based on flyout menu state." x-ref="panel" @click.away="open = false" style="display: none;">
              <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                  <a href="{{ route('flights') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.64 14.26l2.86.95 4.02-4.02-8-4.59 1.16-1.16c.1-.1.26-.14.41-.1l9.3 2.98c1.58-1.58 3.15-3.2 4.77-4.75.31-.33.7-.58 1.16-.73.45-.16.87-.27 1.25-.34.55-.05.98.4.93.93-.07.38-.18.8-.34 1.25-.15.46-.4.85-.73 1.16l-4.75 4.78 2.97 9.29c.05.15 0 .29-.1.41l-1.17 1.16-4.57-8.02L8.8 17.5l.95 2.84L8.6 21.5l-2.48-3.62L2.5 15.4l1.14-1.14z"></path>
                    </svg>
                    <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                        International Flights
                    </p>
                    </div>
                  </a>
                  <a href="{{ route('cruises') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" x-description="Heroicon name: outline/chart-bar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.34 10.96v1.68c0 .13-.06.24-.14.32-2.21 1.99-3.51 4.72-4.58 7.45-.24.62-.4 1.05-.48 1.3a.4.4 0 01-.39.29h-5.5a.4.4 0 01-.4-.3c-.07-.24-.23-.67-.47-1.3-1.06-2.7-2.4-5.47-4.58-7.44a.44.44 0 01-.14-.32v-1.68c0-.18.11-.33.3-.4l6.5-2.17c.23-.05.54.08.54.35L12 16l1-7.26c0-.28.3-.4.54-.35l6.5 2.16c.19.08.3.23.3.41zM5.83 8.2L12 6.12l6.17 2.07-1.72-3.14h1.66l-.47-1.37a.4.4 0 00-.39-.3h-4.14v-.97c0-.23-.2-.41-.4-.41H11.3c-.21 0-.41.18-.41.41v.98H6.75a.4.4 0 00-.4.29L5.9 5.05h1.66L5.83 8.19z"></path>
                    </svg>
                    <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                        Cruises
                    </p>
                    </div>
                  </a>
                  <a href="{{ route('jets') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                        Private Jet Charter
                    </p>
                    </div>
                  </a>
                  <a href="{{ route('yachts') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                    </svg>
                    <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                        Luxury Yacht Charter
                    </p>
                    </div>
                  </a>
                  <a href="{{ route('hotels') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" x-description="Heroicon name: outline/chart-bar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                        Hotels
                    </p>
                    </div>
                  </a>
                  <a href="{{ route('cars') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" x-description="Heroicon name: outline/chart-bar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.86 11.16L20.2 9.62l-1.66-5.53a.39.39 0 00-.14-.21.4.4 0 00-.25-.08H5.85a.4.4 0 00-.25.08.4.4 0 00-.14.2l-1.8 5.54-1.54 1.54a.38.38 0 00-.1.14.44.44 0 00-.02.16v4.94l.03.15c.02.06.05.1.09.14l.72.7v2.37c0 .11.04.22.12.3.08.08.17.13.29.13h3.34c.12 0 .21-.05.3-.13a.43.43 0 00.11-.3v-2.37h10v2.37c0 .11.04.22.12.3.08.08.17.13.29.13h3.34c.12 0 .21-.05.3-.13a.43.43 0 00.11-.3v-2.37l.72-.7a.38.38 0 00.1-.14l.02-.15v-4.92a.39.39 0 00-.04-.18.52.52 0 00-.1-.14zM6.8 5.46h10.4l1.25 4.16H5.54l1.25-4.16zm-.9 9.16a1.6 1.6 0 01-1.18-.49 1.6 1.6 0 01-.48-1.17c0-.46.16-.85.48-1.17a1.6 1.6 0 011.18-.49c.45 0 .84.16 1.17.49.32.32.49.71.49 1.17 0 .46-.17.85-.5 1.17a1.6 1.6 0 01-1.16.49zm12.22 0a1.6 1.6 0 01-1.17-.49 1.6 1.6 0 01-.49-1.17c0-.46.17-.85.5-1.17a1.6 1.6 0 011.16-.49c.46 0 .85.16 1.18.49.32.32.48.71.48 1.17 0 .46-.16.85-.48 1.17a1.6 1.6 0 01-1.18.49z"></path>
                    </svg>
                    <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                        Cars
                    </p>
                    </div>
                  </a>


                </div>
              </div>
            </div>
          </div>
        </nav>
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0 space-x-10">
          <a href="/documents" class="text-base font-medium text-gray-500 hover:text-gray-900">
            Documents
          </a>
          <a href="/insurance" class="text-base font-medium text-gray-500 hover:text-gray-900">
            Insurance
          </a>
          <a href="{{ route('blog') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">
            Blog
          </a>
          <a href="/corporate" class="ml-4 text-base font-medium text-gray-500 hover:text-gray-900">
            Corporate
          </a>
          <a href="{{ route('login') }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">
            Sign in
          </a>
        </div>
      </div>
      <div class="absolute z-30 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
          <div class="pt-5 pb-6 px-5">
            <div class="flex items-center justify-between">
              <div>
                <x-logo class="h-8 w-auto" />
              </div>
              <div class="-mr-2">
                <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                  <span class="sr-only">Close menu</span>
                  <!-- Heroicon name: outline/x -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="mt-6">
              <nav class="grid grid-cols-1 gap-7">
                <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                  <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                    <!-- Heroicon name: outline/inbox -->
                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.64 14.26l2.86.95 4.02-4.02-8-4.59 1.16-1.16c.1-.1.26-.14.41-.1l9.3 2.98c1.58-1.58 3.15-3.2 4.77-4.75.31-.33.7-.58 1.16-.73.45-.16.87-.27 1.25-.34.55-.05.98.4.93.93-.07.38-.18.8-.34 1.25-.15.46-.4.85-.73 1.16l-4.75 4.78 2.97 9.29c.05.15 0 .29-.1.41l-1.17 1.16-4.57-8.02L8.8 17.5l.95 2.84L8.6 21.5l-2.48-3.62L2.5 15.4l1.14-1.14z"></path>
                    </svg>
                  </div>
                  <div class="ml-4 text-base font-medium text-gray-900">
                    International Flights
                  </div>
                </a>

                <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                  <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                    <!-- Heroicon name: outline/annotation -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                  </div>
                  <div class="ml-4 text-base font-medium text-gray-900">
                    Messaging
                  </div>
                </a>

                <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                  <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                    <!-- Heroicon name: outline/chat-alt-2 -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                  </div>
                  <div class="ml-4 text-base font-medium text-gray-900">
                    Live Chat
                  </div>
                </a>

                <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                  <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                    <!-- Heroicon name: outline/question-mark-circle -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <div class="ml-4 text-base font-medium text-gray-900">
                    Knowledge Base
                  </div>
                </a>
              </nav>
            </div>
          </div>
          <div class="py-6 px-5">
            <div class="grid grid-cols-2 gap-4">
              <a href="/documents" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Documents
              </a>
              <a href="/insurance" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Insurance
              </a>
              <a href="{{ route('blog') }}" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Blog
              </a>
              <a href="/corporate" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Corporate
              </a>
            </div>
            <div class="mt-6">
              <a href="{{ route('register') }}" class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">
                Sign up
              </a>
              <p class="mt-6 text-center text-base font-medium text-gray-500">
                Existing customer?
                <a href="{{ route('login') }}" class="text-gray-900">
                  Sign in
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>