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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        html{
            width: 100%;
        }
    </style>
    <body class="font-sans antialiased" style="width: 100% ;" >

                            


        



        <div class="min-h-screen bg-gray-100 bg-white">
            
        
            @include('layouts.navigation')

            <!-- Page Heading -->
           

            <!-- Page Content -->

            
            <main style="width: 100%" >
                {{ $slot }}

                
            </main>

            <style>
                main{
                    margin-top: 3%; 
                }
                @media (max-width: 1464px)  {
                    main {
                        margin-top: 6%;
                    }
                }

                @media (max-width: 630px)  {
                    main {
                        margin-top: 8%;
                    }
                }
                @media (max-width: 430px)  {
                    main {
                        margin-top: 12%;
                    }
                }
                .footer {
                    position: relative; /* Position relative pour permettre le positionnement absolu si nécessaire */
                    z-index: 2; /* Assure que le contenu passe au-dessus de l'image fixe */
                    padding: 20px; /* Ajoute du padding autour du contenu */
                    margin-top: 55px; /* Décale le contenu pour qu'il commence en dessous de l'image fixe */
                }


            </style>
            </div>

            
            <footer class="footer bg-gray-50 dark:bg-gray-800 antialiased" style="margin-top: 0px;!important z-index: 5;" >
                    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">

                <div class="p-4 py-6 mx-auto max-w-screen-xl md:p-8 lg:p-10">
                    <div class="grid grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-5">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h2>
                            <ul class="text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class=" hover:underline">About</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Careers</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Brand Center</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Blog</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Help center</h2>
                            <ul class="text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Discord Server</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Twitter</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Facebook</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                            <ul class="text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Privacy Policy</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Licensing</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Terms</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h2>
                            <ul class="text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class=" hover:underline">About</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Careers</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Brand Center</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Blog</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Download</h2>
                            <ul class="text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">iOS</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Android</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Windows</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">MacOS</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"-->
                    
                </div>
              </footer>
    


              @vite(['resources/js/app.js'])
        
              
        </body>
</html>
