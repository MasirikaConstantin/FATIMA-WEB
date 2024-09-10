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
    <body class="font-sans bg-gray-100 antialiased" style="width: 100% ;" >

                            


        



        <div class="min-h-screen bg-gray-100 bg-white">
            
        
            @include('layouts.navigation')

            <!-- Page Heading -->
           

            <!-- Page Content -->

            
            <main style="width: 100%" class=" bg-gray-100" >
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
<footer class="bg-gray-900 text-white py-16">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Section À Propos -->
        <div>
            <h3 class="text-2xl font-semibold mb-4">À propos de nous</h3>
            <p class="text-gray-400 mb-6">La Paroisse Notre Dame de Fatima est un lieu de paix et de foi, dédié à la communauté et à la spiritualité.</p>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-yellow-500"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="#" class="text-gray-400 hover:text-yellow-500"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="#" class="text-gray-400 hover:text-yellow-500"><i class="fab fa-instagram fa-2x"></i></a>
            </div>
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
            </ul>
        </div>

        <!-- Section Nous Contacter -->
        <div>
            <h3 class="text-2xl font-semibold mb-4">Nous Contacter</h3>
            <form>
                <div class="mb-4">
                    <input type="text" placeholder="Votre nom" class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
                <div class="mb-4">
                    <input type="email" placeholder="Votre email" class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
                <div class="mb-4">
                    <textarea placeholder="Votre message" rows="4" class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"></textarea>
                </div>
                <button type="submit" class="w-full bg-yellow-500 text-black py-3 px-4 rounded-lg hover:bg-yellow-600 font-semibold">Envoyer</button>
            </form>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="mt-12 border-t border-gray-800 pt-8 text-center text-gray-400">
        <p>&copy; 2024 Paroisse Notre Dame de Fatima. Tous droits réservés.</p>
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
              
        </body>
</html>
