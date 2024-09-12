@section("titre",'Administration')

<x-app-layout>
    <style>
        .nav{
          margin-top:5%;
          margin-left: 3%;

        }

        @media (max-width: 650px)  {
            .nav{
          margin-top: 20%;
          margin-left: 3%;
        }

                }

                .ii{
                  border-radius: 50%;
                  width: 35%;
                  object-fit: cover;
                }
      </style>

@php
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');

@endphp
    <div name="header" class="nav" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </div>

    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" p-6 bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                          <span class="font-medium"> {{ session('success') }} </span>
                        </div>
                      </div>
                    @endif
                     
                </div>
                

               

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

                  <div class="mb-6">
                    <ul class="flex flex-wrap items-center justify-center text-gray-900 dark:text-white">
                      <li class="me-3 mb-3">
                        <a href="{{ route('admin.newprogramme') }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          Créer un Programme
                      </a>
                      </li>
                      <li class="me-3 mb-3">
                        <a href="{{ route('admin.newevent') }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          Créer un Evénement
                        </a>
                      </li>
                      <li class="me-3 mb-3">
                        <a href="{{ route('admin.newactus') }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          Créer une Actus
                        </a>
                                          </li>
                      <li class="me-3 mb-3">
                        <a href="{{ route('lecture.newlecture') }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          Mettre à jour la lecture
                        </a>
                      </li>

                      <li class="me-3 mb-3">
                        <a href="{{ route('admin.nouvgallerie') }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
Ajouter à la gallerie                        </a>
                      </li>
                    
                  </ul>
                  </div>
                
                
                    <div class="mt-3" >
                      <ul class="flex flex-wrap items-center justify-center text-gray-900 dark:text-white">
                      
                        <li class="me-3 mb-3">
                          <a href="{{ route('admin.allpro') }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Tous les Programmes
                        </a>
                        </li>
                        <li class="me-3 mb-3">
                          <a href="{{ route('admin.alleve') }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Tous les Evénements
                          </a>
                        </li>
                        <li class="me-3 mb-3">
                          <a href="{{ route('admin.allnew') }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Toutes les  Actus
                          </a>
                        </li>
      
                        <li class="me-3 mb-3">
                          <a href="{{ route('lecture.alllecture') }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Toutes les  Lectures
                          </a>
                        </li>

                        <li class="me-3 mb-3">
                          <a href="{{ route('admin.allgalleries') }}" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Toutes les galleries
                          </a>
                        </li>
                    </ul>
                </div>
              </div>

                  






                    <h1 class="text-3xl font-bold mb-6">Actualités</h1>
        
                    <!-- Grille pour les articles avec tailles variées -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

                        <!-- Article 1 - Grande taille -->
                        <div class="col-span-1 lg:col-span-1 row-span-2 bg-white rounded-lg shadow-md overflow-hidden p-6">
                            
                          

<div class="relative overflow-x-auto">
  <div class="lg:flex lg:items-center lg:justify-between lg:gap-4 mb-3">
  <p class="text-sm mb-2">Administrateur</p>


      <form method="GET" class="mt-4  gap-4 sm:flex sm:items-center sm:justify-end lg:mt-0">
      
      <label for="simple-search" class="sr-only">Search</label>
      <div class="relative w-full flex-1 lg:max-w-sm">
          <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
          <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
          </svg>
          </div>
          <input type="text" name="titre" onkeyup="filterTable()" name="titre"value="{{ request('titre') }}" id="myInput" class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 ps-9 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Rechercher par titre"  />
      </div>

      </form>
</div>
  <table id="myTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-2 py-3">
                  {{ __('User Name') }}
              </th>
              <th scope="col" class="px-2 py-3">
                  {{ __('Email') }}
              </th>
              <th scope="col" class="px-2 py-3">
                  Category
              </th>
              
          </tr>
      </thead>
      <tbody>
        @php
                $count_eves=0;
                $count_eve1="a";
                $count_eve2="coco";
              @endphp
          @forelse ($admins as $a)
          @php
          $count_eves++;
                $count_eve1 =  $count_eve1 . $count_eves;
                $count_eve2 =  $count_eve2 . $count_eves;
                  
                  @endphp
              <tr id="trs" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-2 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                  @if (Auth::id() ==$a->id)
                  <button class=" focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm  text-center inline-flex items-center dark:focus:ring-[#3b5998]/55  ">
                    <svg class="w-4 h-4 me-2 text-gray-800 dark:text-white " style="color:#1A56DB" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    {{ Str::limit($a->name,13) }}
                  </button>
                  @else
                  {{ Str::limit($a->name,13) }}
                  @endif
                  
                    
                </th>
                <td class="px-2 py-3">
                  {{ Str::limit($a->email, 15) }}
                </td>
                <td class="px-2 py-3">
                  <x-mondanger-button  
                  data-modal-target="popup-modal{{  $count_eve2 }}" data-modal-toggle="popup-modal{{  $count_eve2 }}" 
                  >{{ __('Bannir') }}</x-mondanger-button>
                  <x-mon-button  href="{{ route('admin.supprimer_admin',['id'=>$a->id]) }}"
                                            data-modal-target="popup-modal{{  $count_eve1 }}" data-modal-toggle="popup-modal{{  $count_eve1 }}" 
                                            >{{ __('Admin ') }}</x-mon-button>

                </td>
                
            </tr>

            <div id="popup-modal{{  $count_eve1 }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-md max-h-full">
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                      <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{  $count_eve1 }}">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                      <div class="p-4 md:p-5 text-center">
                          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                          </svg>
                          <h3 class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">Voulez vous supprimer {{ $a->name }} des {{ __('Admin') }}s ?</h3>
                          
                          <form method="POST" action="{{ route('admin.supprimer_admin',$a) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                          <button type="submit"  data-modal-hide="popup-modal{{  $count_eve1 }}" type="button" class="text-white text-xs bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                              Oui je suis sur
                          </button>
                          <button data-modal-hide="popup-modal{{  $count_eve1 }}" type="button" class="py-2.5 px-5 ms-3 text-xs font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non, Annuler</button>
                        </form>


                      </div>
                  </div>
              </div>
          </div>



          <!---- supprimer l'utilisateur -->

          <div id="popup-modal{{  $count_eve2 }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{  $count_eve2 }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">Voulez vous supprimer {{ $a->name }}  ?</h3>
                        
                        <form method="POST" action="{{ route('admin.supprimer_admin',$a) }}" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                        <button type="submit"  data-modal-hide="popup-modal{{  $count_eve2 }}" type="button" class="text-white text-xs bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Oui je suis sur
                        </button>
                        <button data-modal-hide="popup-modal{{  $count_eve2 }}" type="button" class="py-2.5 px-5 ms-3 text-xs font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non, Annuler</button>
                      </form>


                    </div>
                </div>
            </div>
        </div>
          @empty
            
          @endforelse
          
      </tbody>
  </table>
</div>



                          </div>          
                          
                          <div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
<div class="relative overflow-x-auto">
                           
                            <p class="text-sm mb-2">{{ __('User') }}</p>
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            {{ __('User Name') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            {{ __('Email') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Category
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  @php
                                    $count_eve =0;
                                    $count_eve3="co";

                                  @endphp
                                    @forelse ($users as $u )
                                    @php
                                        $count_eve++;
                                        $count_eve3 =  $count_eve3 . $count_eve;

                                  @endphp
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ Str::limit($u->name,15) }}
                                          </th>
                                          <td class="px-6 py-4">
                                            {{ Str::limit($u->email, 15) }}
                                          </td>
                                          
                                          <td class="px-6 py-4">
                                            <x-mondanger-button
                                            data-modal-target="popup-modal{{  $count_eve3 }}" data-modal-toggle="popup-modal{{  $count_eve3 }}"   >{{ __('Bannir') }}</x-mondanger-button>
                                            <x-mon-button  href="{{ route('admin.nommer_admin',['id'=>$u->id]) }}"
                                            data-modal-target="popup-modal{{  $count_eve }}" data-modal-toggle="popup-modal{{  $count_eve }}" 
                                            >{{ __('Admin ') }}</x-mon-button>

                                          </td>
                                      </tr>


                                      <div id="popup-modal{{  $count_eve }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{  $count_eve }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-xl text-gray-500 dark:text-gray-400">Voulez vous nommer cette utilisateur en tant qu'{{ __("Admin") }}?</h3>
                                                    
                                                    <form method="POST" action="{{ route('admin.nommer_admin',$u) }}" enctype="multipart/form-data">
                                                      @csrf
                                                      @method('PUT')
                                                  
                                                          
                                                      
                  
                                                    <button type="submit"  data-modal-hide="popup-modal{{  $count_eve }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Oui je suis sur
                                                    </button>
                                                    <button data-modal-hide="popup-modal{{  $count_eve }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non, Annuler</button>
                                                  </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                     <!---- supprimer l'utilisateur -->

                                            <div id="popup-modal{{  $count_eve3 }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                              <div class="relative p-4 w-full max-w-md max-h-full">
                                                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                      <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{  $count_eve3 }}">
                                                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                          </svg>
                                                          <span class="sr-only">Close modal</span>
                                                      </button>
                                                      <div class="p-4 md:p-5 text-center">
                                                          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                          </svg>
                                                          <h3 class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">Voulez vous supprimer {{ $u->name }}  ?</h3>
                                                          
                                                          <form method="POST" action="{{ route('admin.supprimer_user',$u) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                          <button type="submit"  data-modal-hide="popup-modal{{  $count_eve3 }}" type="button" class="text-white text-xs bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                              Oui je suis sur
                                                          </button>
                                                          <button data-modal-hide="popup-modal{{  $count_eve3 }}" type="button" class="py-2.5 px-5 ms-3 text-xs font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non, Annuler</button>
                                                        </form>


                                                      </div>
                                                  </div>
                                              </div>
                                          </div>


                                    @empty
                                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                      </svg>
                                      <span class="sr-only">Info</span>
                                      <div>
                                        <span class="font-medium"> {{ ("Aucun utilisateur disponible") }} </span>
                                      </div>
                                    </div>
                                    @endforelse
                                    
                                </tbody>
                                
                            </table>
                            <div>
                              {{ $users->links() }}
                            </div>
                          </div>

                        
        
                        
                    </div>
       
                </main>







                  </div>
                </section>



            </div>

            
        </div>
    </div>
</x-app-layout>
