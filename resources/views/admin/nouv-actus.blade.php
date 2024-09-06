<x-app-layout>

    <div class="bg-gray-100 py-10">
    
        <div class="container mx-auto px-4 max-w-2xl">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h1 class="text-2xl font-bold mb-6 text-center">Créer une Actualités</h1>
    
                <form {{route($actus->exists ? 'admin.edit_actus': 'admin.newactus', $actus->id)}} method="POST" enctype="multipart/form-data" class="space-y-6">
                    @if ($actus->exists) 
                        @method('PUT')
                        @endif
                    @csrf
                    <input type="hidden"  autocomplete="off" name="user_id" value="{{ Auth::user()->id }}" >
                    @error('user_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                            @enderror
                    <!-- Titre -->
                    <div>
                        <label for="titre" class="block text-gray-700 font-medium">Titre</label>
                        <input type="text" id="titre" name="titre" dddd value="{{ old('titre',$actus->titre) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            @error('titre')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                            @enderror
                            @error('slug')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                            @enderror
                    </div>
    
                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-gray-700 font-medium">Description</label>
                        <textarea id="description" name="description" rows="4" dddd 
                            class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description',$actus->description) }}</textarea>
                            @error('description')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
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
                    <div class="text-center">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-500 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Enregistrer l'actus
                        </button>
                    </div>
                </form>
            </div>
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
        </script>
        <script>
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
    