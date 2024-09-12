@section('titre', "Créer une gallerie")
<x-app-layout>
    <div class="min-h-screen bg-gray-100 text-gray-100 flex flex-col items-center">
        <!-- Section du formulaire de création de post -->
        <div class="w-full max-w-4xl p-6 bg-gray-100 rounded-lg shadow-lg mt-10">
          <h1 class="text-3xl font-bold mb-6 text-gray-900">Ajouter une photo à la gallerie</h1>
      
          <form class="space-y-6" {{route($galleries->exists ? 'admin.edit_evnt': 'admin.newevent', $galleries->id)}} method="POST" enctype="multipart/form-data">
            @csrf
            @if ($galleries->exists) 
            @method('PUT')
            @endif
            <!-- Champ Titre -->
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" autocomplete="off" id="">
            <div>
              <label class="block text-sm font-medium text-gray-900 mb-1">Titre</label>
              <input type="text" @error("titre")
              class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
              @enderror name="titre"  value="{{ old('titre',$galleries->titre) }}" class="w-full p-3 bg-gray-200 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Saisissez le titre de la gallerie" >
              @error('titre')
            <p class="text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
    
            @enderror
            </div>


            <div>
              <label class="block text-sm font-medium text-gray-900 mb-1">Lien</label>
              <input type="text" @error("lien")
              class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
              @enderror name="lien"  value="{{ old('lien',$galleries->lien) }}" class="w-full p-3 bg-gray-200 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ajouter une gallerie photos" >
              @error('lien')
            <p class="text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
    
            @enderror
            </div>
            
      
            <!-- Champ Catégorie -->
           
           
            <!-- Champ Message -->
            <div>
              <label class="block text-sm font-medium mb-2 text-gray-900">{{ __('Description') }}</label>
              <textarea name="description" @error("description")
              class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
              @enderror class="w-full p-4 bg-gray-920 text-gray-900 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Écrivez votre description ici..." rows="3" >{{ old('description',$galleries->description) }}</textarea>
              @error('description')
            <p class="text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
    
            @enderror
            </div>
            <div class="">
                <div class="mr-auto place-self-center lg:col-span-4">
                <label for="image" class="block text-gray-700 font-medium">Image de l'événement</label>

                    <input name="image" id='fileUpload' class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"   >SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    @error('image')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                    @enderror
                </div>
                <div class=" border lg:mt-0 lg:col-span-5 lg:flex">
                    <img id='imageDiv'>
                </div>                
            </div>

      
            <!-- Bouton de soumission -->
            <button type="submit" class="mt-4 px-6 py-3 bg-blue-500 rounded-lg text-white hover:bg-blue-400">Soumettre</button>
          </form>
        </div>
      </div>
    <script>
            document.getElementById('fileUpload').addEventListener('change', function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imageDiv').src = e.target.result;
                }
                reader.readAsDataURL(this.files[0]);
            });
        
            document.getElementById('fileUpload').addEventListener('change', function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    document.getElementById('imageDiv').appendChild(img);
                }
                reader.readAsDataURL(this.files[0]);
            });
        </script>
      
    
    
    
    
    
    
    
    
    
    </x-app-layout>