@section('titre','A propos')
<x-app-layout>
    
      
      <section class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
          <!-- Section principale À propos -->
          <div class="flex flex-col lg:flex-row items-center mb-12">
            <!-- Image à gauche -->
            <div class="lg:w-1/2 w-full mb-8 lg:mb-0">
              <img class="rounded-lg shadow-lg object-cover w-full h-96" src="{{ asset('presentation/presentation.jpg') }}" alt="Image de l'église">
            </div>
            
            <!-- Texte à droite -->
            <div class="lg:w-1/2 w-full lg:pl-12">
              <h2 class="text-3xl font-extrabold text-gray-900 mb-4">À propos de la Paroisse Notre Dame de Fatima</h2>
              <p class="text-gray-700 leading-relaxed mb-6">
                La Paroisse Notre Dame de Fatima est une communauté accueillante située au cœur de la ville. Nous nous engageons à offrir des services spirituels, sociaux, et culturels à nos membres. Nous croyons en la charité, la foi et l'espoir comme piliers de notre mission.
              </p>
              <!--a href="#contact" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition-colors">
                Contactez-nous
              </a-->
            </div>
          </div>
      
          <!-- Section supplémentaire avec les biens de l'église -->
          <div class="bg-white p-8 rounded-lg shadow-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Nos biens et établissements</h3>
      
            <!-- Grid pour afficher les biens de l'église -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              <!-- Succursales -->
              <div class="flex flex-col items-center text-center">
                <img class="w-32 h-32 rounded-full mb-4" src="https://via.placeholder.com/150" alt="Succursales">
                <h4 class="text-xl font-semibold text-gray-900">Succursales</h4>
                <p class="text-gray-700">Nous avons plusieurs succursales dans la région, chacune offrant des services religieux et communautaires.</p>
              </div>
      
              <!-- Orphelinat -->
              <div class="flex flex-col items-center text-center">
                <img class="w-32 h-32 rounded-full mb-4" src="https://via.placeholder.com/150" alt="Orphelinat">
                <h4 class="text-xl font-semibold text-gray-900">Orphelinat</h4>
                <p class="text-gray-700">Notre orphelinat accueille des enfants dans le besoin, leur offrant un foyer sûr et chaleureux.</p>
              </div>
      
              <!-- Écoles -->
              <div class="flex flex-col items-center text-center">
                <img class="w-32 h-32 rounded-full mb-4" src="https://via.placeholder.com/150" alt="Écoles">
                <h4 class="text-xl font-semibold text-gray-900">Écoles</h4>
                <p class="text-gray-700">Nous gérons plusieurs écoles qui offrent une éducation de qualité aux jeunes de la communauté.</p>
              </div>
      
              <!-- Autres biens -->
              <div class="flex flex-col items-center text-center">
                <img class="w-32 h-32 rounded-full mb-4" src="https://via.placeholder.com/150" alt="Autres biens">
                <h4 class="text-xl font-semibold text-gray-900">Autres biens</h4>
                <p class="text-gray-700">Nous possédons également d'autres infrastructures destinées à soutenir nos activités et notre mission.</p>
              </div>
            </div>
          </div>


          
        </div>

        
        
      </section>
      
</x-app-layout>
       