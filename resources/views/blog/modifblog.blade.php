@section("titre", "Modif comm")
<x-app-layout>

<div class="min-h-screen bg-gray-100 text-gray-100 flex flex-col items-center">
    <!-- Section du formulaire de création de post -->
    <div class="w-full max-w-4xl p-6 bg-gray-100 rounded-lg shadow-lg mt-10">
      <h1 class="text-3xl font-bold mb-6 text-gray-900">Modifier votre commentaire</h1>
  
      <form class="space-y-6" action="{{ route('comment.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')

       
       
        <!-- Champ Message -->
        <div>
          <label class="block text-sm font-medium mb-2 text-gray-900">Message</label>
          <textarea name="contenus" @error("contenus")
          class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
          @enderror class="w-full p-4 bg-gray-920 text-gray-900 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Écrivez votre message ici..." rows="6" >{{ old('contenus',$comment->contenus) }}</textarea>
          @error('contenus')
        <p class="text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>

        @enderror
        </div>
  
        <!-- Bouton de soumission -->
        <button type="submit" class="mt-4 px-6 py-3 bg-blue-500 rounded-lg text-white hover:bg-blue-400">Soumettre</button>
      </form>
    </div>
  </div>

  









</x-app-layout>