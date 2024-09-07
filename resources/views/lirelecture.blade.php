<x-app-layout>
    
    @php
// Définir la timezone et la localisation en français
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.UTF-8');
\Carbon\Carbon::setLocale('fr');
if (isset($dernier)) {
    # code...
    
// Créer un objet Carbon à partir de la chaîne de date
$date = \Carbon\Carbon::createFromFormat('Y-m-d', $dernier['date'])->startOfDay();

}
@endphp
        <!-- En-tête -->
        <div class="bg-blue-900 text-white py-6 mt-20">
            <div class="container mx-auto text-center">
                <h1 class="text-3xl font-bold">Lectures du jour</h1>
                <p class="text-lg mt-2">Découvrez les lectures spirituelles et méditations quotidiennes</p>
            </div>
        </div>
   
        @if (isset($dernier))
        <section class="py-12 ">
            <div class="container mx-auto bg-white shadow-lg rounded-lg p-8">
                <!-- Date de la lecture -->
                <div class="text-center mb-8">
                    <p class="text-lg text-gray-500">{{ $date->translatedFormat('l, ') }} le {{ $date->translatedFormat('d/m/Y ') }} </p>
                    <h2 class="text-2xl font-bold text-gray-900 mt-2 truncate">Évangile : {{ Str::limit($dernier['titre_3'], 100) }}</h2>
                </div>
        
                <!-- Contenu de la lecture -->
                <div class="prose prose-lg max-w-full text-gray-700 mx-auto leading-loose break-words">
                    <p>
                        {{ Str::limit($dernier['description_3'], 200) }}
                    </p>
        
                    <blockquote class="break-words">
                        <p class="text-xl italic text-gray-600 mt-6">{{ Str::limit($dernier['description_3'], 150) }}</p>
                    </blockquote>
                </div>
            </div>
        </section>
        
        <section class="py-12" style="overflow: hidden">
            <div class="container mx-auto bg-white shadow-lg rounded-lg p-8">
                <!-- Date de la lecture -->
                <div class="text-center mb-8" style="overflow: hidden">
                    <p class="text-lg text-gray-500">{{ $date->translatedFormat('l, ') }} le {{ $date->translatedFormat('d/m/Y ') }} </p>
                    <h2 class="text-2xl font-bold text-gray-900 mt-2">2ème Lecture : {{  $dernier['titre_2'] }}</h2>
                </div>
    
                <!-- Contenu de la lecture -->
                <div class="prose prose-lg max-w-full text-gray-700 mx-auto leading-loose">
                    <p>
                        
                        {{  $dernier['description_2'] }}
                    </p>
    
                    
                </div>
            </div>
        </section>

        <section class="py-12">
            <div class="container mx-auto bg-white shadow-lg rounded-lg p-8">
                <!-- Date de la lecture -->
                <div class="text-center mb-8">
                    <p class="text-lg text-gray-500">{{ $date->translatedFormat('l, ') }} le {{ $date->translatedFormat('d/m/Y ') }} </p>
                    <h2 class="text-2xl font-bold text-gray-900 mt-2">Evangile : {{  $dernier['titre_3'] }}</h2>
                </div>
    
                <!-- Contenu de la lecture -->
                <div class="prose prose-lg max-w-full text-gray-700 mx-auto leading-loose">
                    <p>
                        
                        
                    </p>
    
                    <blockquote>
                        <p class="text-xl italic text-gray-600 mt-6">{{  $dernier['description_3'] }}</p>
                    </blockquote>
                </div>
            </div>
        </section>
    
        <!-- Méditation ou commentaire -->
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Méditation du jour</h2>
                <blockquote>
                    <p class="text-xx italic text-gray-600 mt-6">{{  $dernier['meditation'] }}</p>
                </blockquote>
            </div>
        </section>
    
        @endif
       
        <!-- Section pour les lectures des jours passés -->
        <section class="py-12">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Lectures passées</h2>
    
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Lecture passée 1 -->
                   
                    @forelse ($autres as $a )
                        @php
                            $dates = \Carbon\Carbon::createFromFormat('Y-m-d', $a->date)->startOfDay();
                        @endphp
                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <p class="text-lg text-gray-500">{{ $dates->translatedFormat('l, ') }} le {{ $dates->translatedFormat('d/m/Y ') }}</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-2">Évangile :   {{Str::limit($a->titre_3,100)}}</h3>
                            <p class="mt-4 text-gray-700"> {{Str::limit($a->description_3,150)}}</p>
                            <a href="{{ route("lectureid",["id" =>$a->id]) }}" class="text-blue-600 hover:underline mt-4 inline-block">Lire plus</a>
                        </div>
                    @empty
                        
                    @endforelse
    
                   
                </div>
            </div>

        </section>



        

</x-app-layout>
