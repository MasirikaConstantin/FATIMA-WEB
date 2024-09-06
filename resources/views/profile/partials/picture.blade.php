<section>
    <header>
        <h2 class="text-lg font-medium text-body-900">
            {{ __('Ajouter une Photo de Profil') }}
        </h2>

        <p class="mt-1 text-sm text-body-600">
            {{ __('Ajouter une photo pour une meilleur identification') }}
        </p>
    </header>
   

    <form method="post" action="{{route('photo')}}" class="" enctype="multipart/form-data" >
        @csrf
        @method('put')

        





        <main class="mt-1">
          
          {{ Auth::user()->name }}
            <div class="row" data-masonry='{"percentPosition": true }'>
              
              <div class="mr-auto place-self-center lg:col-span-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                <input name="image" id='fileUpload' class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"   >SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                @error('image')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
                @enderror
            </div>
              

              <div class="col-sm mb-3 ">
                <div class="card" style="width: 322px!important; height: 250px;">
                
                    
                    <img id='imageDiv' class="h-s100" style=" height:220px ; width: 100% ; height: 250px; object-fit: cover "  />
                  
                  
                  
                </div>
                @error('image')
                {{$message}}
              @enderror

              </div>
            </div>
            
          
          </main>
          <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-body-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
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

</section>
