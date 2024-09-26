@section('titre','Faire un don')
<x-app-layout>

    <div class="container min-h-screen bg-gradient-to-br from-gray-500 to-blue-500  mx-auto px-5 py-3    ">
        <!-- En-tête -->
        <div class="text-center mb-8 " >
            <h1 class="text-3xl font-bold mb-4 mt-10">Faire un Don</h1>
            <p class="text-gray-700">Merci pour votre générosité. Choisissez un mode de paiement et contribuez selon le type de don qui vous convient.</p>
        </div>

        <!-- Options de Paiement -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-center">Choisissez votre mode de paiement :</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Airtel -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('sociaux/airtel.png') }}" alt="Airtel Money" class="w-full h-32 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center">
                            <p class="text-white text-lg font-semibold">Airtel Money</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-lg font-medium">+243 123 456 789</p>
                    </div>
                </div>

                <!-- Orange -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('sociaux/orange.jpg') }}" alt="Orange Money" class="w-full h-32 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center">
                            <p class="text-white text-lg font-semibold">Orange Money</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-lg font-medium">+243 855 654 321</p>
                    </div>
                </div>

                <!-- Vodacom -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('sociaux/mpesa.jpg') }}" alt="Vodacom" class="w-full h-32 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center">
                            <p class="text-white text-lg font-semibold">Vodacom</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-lg font-medium">+243 815 789 123</p>
                    </div>
                </div>

                <!-- Africell -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('sociaux/affri.png') }}" alt="Africell" class="w-full h-32 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center">
                            <p class="text-white text-lg font-semibold">Africell</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-lg font-medium">+243 321 654 987</p>
                    </div>
                </div>

                <!-- Numéro Bancaire -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('sociaux/raw.jpg') }}" alt="Numéro Bancaire" class="w-full h-32 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center">
                            <p class="text-white text-lg font-semibold">Numéro RwaBank</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-lg font-medium">123456789-24</p>
                    </div>
                </div>

                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('sociaux/equi.png') }}" alt="Numéro Bancaire" class="w-full h-32 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center">
                            <p class="text-white text-lg font-semibold">Numéro Equity BCDC</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-lg font-medium">123456789</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Explications des Types de Don -->
        <section class="mb-4">
            <h2 class="text-2xl font-semibold mb-4 text-center">Types de Don :</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Don pour l'Orphelinat -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ asset('sociaux/orhp.jpg') }}" alt="Orphelinat" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Don pour l'Orphelinat</h3>
                        <p class="text-gray-600">Aidez les orphelins en faisant un don pour soutenir leur hébergement, leur éducation et leur bien-être général.</p>
                    </div>
                </div>

                <!-- Offrande -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-4">
                    <img src="{{ asset('sociaux/offra.jpg') }}" alt="Offrande" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">L'Offrande</h3>
                        <p class="text-gray-600">L'offrande est un don volontaire pour soutenir les œuvres de charité et les projets de l'église.</p>
                    </div>
                </div>

            </div>
        </section>
    </div>      
</x-app-layout>
