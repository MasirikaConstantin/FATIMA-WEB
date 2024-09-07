@php
    // Définir la timezone et la localisation en français
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.UTF-8');
\Carbon\Carbon::setLocale('fr');
@endphp
<x-app-layout>
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
            <div class="mt-3" >
                {{ $autres->links() }}
            </div>
        </div>

    </section>
</x-app-layout>

