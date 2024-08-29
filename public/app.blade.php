<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="{{asset('flowbite.min.css')}}" rel="stylesheet" />
        <!-- Scripts -->
        <!--link rel="stylesheet" href="http://127.0.0.1:5173/resources/css/app.css">
        <script type="module" src="http://127.0.0.1:5173/resources/js/app.js"></script-->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screens bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        

        </div>


        <!-- Footer container -->
        <footer
        class="max-w-7xl mx-auto shadow-md bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        
        <!-- Main container div: holds the entire content of the footer, including four sections (TW Elements, Products, Useful links, and Contact), with responsive styling and appropriate padding/margins. -->
        <div class="mx-6 py-10 text-center md:text-left">
          <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <!-- TW Elements section -->
            <div class="">
              <h6
                class="mb-4 flex items-center justify-center font-semibold uppercase md:justify-start">
                <span class="me-3 [&>svg]:h-4 [&>svg]:w-4">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                      d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 00.372.648l8.628 5.033z" />
                  </svg>
                </span>
                TW Elements
              </h6>
              <p>
                Here you can use rows and columns to organize your footer
                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                elit.
              </p>
              <p>{{__('Thème : ')}}
                <button id="theme-toggle" class="p-2 rounded bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                  <div class="icon-container">
                      <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 icon-sun" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2m8.66-8.66h-2M5.34 12H3m16.66 4.66l-1.41 1.41M6.75 6.75 5.34 5.34M18 12a6 6 0 11-12 0 6 6 0 0112 0zm-3.66 4.66l1.41 1.41m-12-1.41l1.41 1.41"/>
                      </svg>
                      <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 icon-moon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 118.646 3.646 7 7 0 0020.354 15.354z"/>
                      </svg>
                  </div>
              </button> 
            </p>
            </div>
           
            <!-- Contact section -->
            <div>
              <h6
                class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                Contact
              </h6>
              <p class="mb-4 flex items-center justify-center md:justify-start">
                <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                      d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                    <path
                      d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                  </svg>
                </span>
                New York, NY 10012, US
              </p>
              <p class="mb-4 flex items-center justify-center md:justify-start">
                <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                      d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                    <path
                      d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                  </svg>
                </span>
                info@example.com
              </p>
              <p class="mb-4 flex items-center justify-center md:justify-start">
                <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                      fill-rule="evenodd"
                      d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                      clip-rule="evenodd" />
                  </svg>
                </span>
                + 01 234 567 88
              </p>
              <p class="flex items-center justify-center md:justify-start">
                <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                      fill-rule="evenodd"
                      d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
                      clip-rule="evenodd" />
                  </svg>
                </span>
                + 01 234 567 89
              </p>
            </div>
          </div>
        </div>
        
        <!--Copyright section-->
        <div class="bg-black/5 p-6 text-center">
          <span>© 2023 Copyright:</span>
          <a class="font-semibold" href="https://tw-elements.com/"
            >TW Elements</a
          >
        </div>
        </footer>

    </body>
    <script src="{{asset('flowbite.min.js.js')}}"></script>

    <script src="{{asset('theme.js')}}"></script>
</html>
