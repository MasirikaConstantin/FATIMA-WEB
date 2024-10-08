<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('titre' ,'Site Officiel Notre dame de Fatima')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('mas-product.ico') }}"/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('mas-product.ico') }}"/>
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('fancybox.umd.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('fancybox.css') }}">
    </head>
    <style>
        @font-face {
                        font-family: 'Google';
                        src: url('{{asset('ProductSans-Light.ttf')}}');
                        font-weight: 500;
                        
                    }
                    body{
                        font-family: 'Google' !important;
                    }
                    
    </style>
    <body class="font-sans  antialiased" style="width: 100% ;" >

                            


        <!------Body classe  (bg-gradient-to-br from-gray-900 to-blue-900) -->


        <div class="min-h-screen bg-gradient-to-br from-gray-900 to-blue-900 ">
            
        
            @include('layouts.navigation')

            <!-- Page Heading -->
           

            <!-- Page Content -->

            
            <main  class="{{ Route::currentRouteName() == 'dons' ? 'bg-gradient-to-br from-gray-500 to-blue-500' : '' }} " >
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

            
           

    <!-- Footer Futuriste -->
<footer class="bg-gray-900 text-white py-10 px-4">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Section À Propos -->
        <div>
            <h3 class="text-2xl font-semibold mb-4">À propos de nous</h3>
            <p class="text-gray-400 mb-6">La Paroisse Notre Dame de Fatima est un lieu de paix et de foi, dédié à la communauté et à la spiritualité.</p>
            <div class="flex space-x-4">
                <a href="https://facebook.com" class="text-gray-400 hover:text-blue-500"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="youtube.com" class="text-gray-400 hover:text-red-500"><i class="fab fa-youtube fa-2x"></i></a>
                <!--a href="#" class="text-gray-400 hover:text-yellow-500"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="#" class="text-gray-400 hover:text-yellow-500"><i class="fab fa-instagram fa-2x"></i></a-->
            </div>

            <!--div class="container mx-auto">
                <h2 class="text-2xl font-semibold mb-4 text-center">NOS CÉLÉBRATIONS</h2>
                
                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <h3 class="text-lg font-medium mb-2 text-blue-300">En semaine</h3>
                        <ul class="space-y-2 text-sm">
                            <li>
                                <span class="font-bold">Mercredi :</span>
                                <p class="ml-4">Adoration et Chapelet : 17h-18h30</p>
                                <p class="ml-4">Messe du soir : 18h30</p>
                            </li>
                            <li>
                                <span class="font-bold">Vendredi :</span>
                                <p class="ml-4">Lecture biblique : 17h-18h30</p>
                                <p class="ml-4">Vêpres : 18h30</p>
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-medium mb-2 text-blue-300">Dimanche</h3>
                        <ul class="space-y-2 text-sm">
                            <li>Messe de l'Aurore : 7h00</li>
                            <li>Grand-Messe : 10h00 <span class="text-red-400 font-bold">(en direct 🔴)</span></li>
                            <li>Messe du soir : 18h00</li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-medium mb-2 text-blue-300">Autres</h3>
                        <ul class="space-y-2 text-sm">
                            <li><span class="font-bold">Confessions :</span> 30 min avant chaque messe</li>
                            <li><span class="font-bold">1er samedi du mois :</span></li>
                            <li class="ml-4">Messe votive : 9h00, suivie du Rosaire</li>
                        </ul>
                    </div>
                </div>
            </div-->

            
        </div>

        <!-- Section Liens Utiles -->
        <div>
            <h3 class="text-2xl font-semibold mb-4">Liens Utiles</h3>
            <ul class="text-gray-400 space-y-2">
                <li><a href="{{route('welcome')}}" class="hover:text-yellow-500">Accueil</a></li>
                <li><a href="{{route('programme.tous')}}" class="hover:text-yellow-500">Nos Programmes</a></li>
                <li><a href="{{ route('event.tousevent') }}" class="hover:text-yellow-500">Événements</a></li>
                <li><a href="{{ route('news') }}" class="hover:text-yellow-500">Actualités</a></li>
                <li><a href="{{ route('lecture.lecture') }}" class="hover:text-yellow-500">Lectures</a></li>
                <li><a href="{{ route('galerie') }}" class="hover:text-yellow-500">Galerie</a></li>
                <li><a href="{{ route('apropos') }}" class="hover:text-yellow-500">A - propos</a></li>
            </ul>
        </div>

        <!-- Section Nous Contacter -->
        <div>
            <h3 class="text-2xl font-semibold mb-4">Nous Contacter</h3>
            <form action="{{ route("contact.update") }}" method="post">
                @csrf
                <div class="mb-4">
                    <input type="text" name="nom" placeholder="Votre nom"  class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    @error("nom")
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                        
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Votre email"  class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    @error("email")
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                        
                    @enderror
                </div>
                <div class="mb-4">
                    <textarea placeholder="Votre message" name="message" rows="4" class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"></textarea>
                    @error("message")
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                        
                    @enderror
                </div>
                <button type="submit" class="w-full bg-yellow-500 text-black py-3 px-4 rounded-lg hover:bg-yellow-600 font-semibold">Envoyer</button>
            </form>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="mt-4 border-t border-gray-800 pt-2 text-center text-gray-400">
        <p>&copy; 2024 Paroisse Notre Dame de Fatima. Tous droits réservés.</p>
        <p>Réaliser par <a href="https://mas-product.kesug.com/">Mas Code Product</a> </p>
    </div>
</footer>

<!-- FontAwesome Icons (optional for social icons) -->
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>



              @vite(['resources/js/app.js'])
              <script>
                
                // Sélectionnez tous les éléments du tableau
        var elements = document.querySelectorAll("table #tr");

        // Parcourez tous les éléments
        for(var i = 0; i < elements.length; i++) {
            // Si l'élément est supérieur à 3, cachez-le
            if(i >= 15) {
                elements[i].style.display = "none";
            }
        }

        // Sélectionnez tous les éléments du tableau
        var elements = document.querySelectorAll("table #trs");

        // Parcourez tous les éléments
        for(var i = 0; i < elements.length; i++) {
            // Si l'élément est supérieur à 3, cachez-le
            if(i >= 5) {
                elements[i].style.display = "none";
            }
        }

        function filterTable() {

            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        }

</script>

<script>
    Fancybox.bind("[data-fancybox]", {
    // Your custom options
    });
  
  </script>
              
        </body>
</html>
