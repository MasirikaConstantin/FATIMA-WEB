@section('titre',"Lecture")
<x-app-layout>

    <div class="bg-gray-100 py-10">
    
        <div class="container mx-auto px-4 max-w-2xl">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h1 class="text-2xl font-bold mb-6 text-center">Mettre à jours la lecture</h1>
               
                <form {{route($actus->exists ? 'lecture.modiflect': 'lecture.newlecture', $actus->id)}}   id="myForm"  method="POST"  >
                    @if ($actus->exists) 
                        @method('PUT')
                    @endif

                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" autocomplete="off" >

                    <div class="w-1/2">
                        <label for="date" class="block text-gray-700 font-medium">Date </label>
                        <input type="date" id="date" name="date" value="{{ old('date',$actus->date) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            @error('date')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Titre') }} 1er lecture + verset </label>
                            <input type="text" @error("titre_1")
                            class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                            @enderror name="titre_1" id="name" value="{{ old('titre_1',$actus->titre_1) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="">
                           
                            @error('titre_1')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>

                            @enderror
                        </div>
                        <div>
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Description 1er lecture') }}</label>
                            <textarea id="description_1" name="description_1" @error("description_1")
                            class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                            @enderror rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('Write a description...') }}">{{ old('description_1',$actus->description_1 ) }}</textarea> 
                            @error('description_1')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                            @enderror
                        </div>


                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Titre') }} 2ème lecture + verset </label>
                            <input type="text" @error("titre_2")
                            class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                            @enderror name="titre_2" id="name" value="{{ old('titre_2',$actus->titre_2) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="">
                           
                            @error('titre_2')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>

                            @enderror
                        </div>
                        <div>
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Description 2ème lecture') }}</label>
                            <textarea id="description_2" name="description_2" @error("description_2")
                            class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                            @enderror rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('Write a description...') }}">{{ old('description_2',$actus->description_2 ) }}</textarea> 
                            @error('description_2')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                            @enderror
                        </div>


                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Titre') }} Evengile + verset </label>
                            <input type="text" @error("titre_3")
                            class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                            @enderror name="titre_3" id="name" value="{{ old('titre_3',$actus->titre_3) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="">
                           
                            @error('titre_3')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>

                            @enderror
                        </div>
                        <div>
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Description de l\'évangile') }}</label>
                            <textarea id="description_3" name="description_3" @error("description_3")
                            class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                            @enderror rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('Write a description...') }}">{{ old('description_3',$actus->description_3 ) }}</textarea> 
                            @error('description_3')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                            @enderror
                        </div>

                        
                        <div class="sm:col-span-2">
                            <label for="meditation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Méditation du jour</label>
                            <textarea id="meditation" name="meditation" @error("meditation")
                            class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                            @enderror rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('Write a description...') }}">{{ old('meditation',$actus->meditation ) }}</textarea>                    
                        </div>
                    </div>
                   
                    
                    <div class="flex items-center space-x-4">
                        <button type="submit" class="text-primary-600 inline-flex items-center hover:text-white border border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">
                            <svg class="mr-1 -ml-1 w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z"/>
                              </svg>
                              
                            Enregistrer
                        </button>
                       
                    </div>
                    
                </form>
                
            </div>
        </div>


    </div>
    
</x-app-layout>
