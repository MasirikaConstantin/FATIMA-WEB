@section("titre",'Lecture du jour');

<x-app-layout>

        <!-- En-tête -->
        <header class="bg-blue-900 text-white py-6">
            <div class="container mx-auto text-center">
                <h1 class="text-3xl font-bold">Lectures du jour</h1>
                <p class="text-lg mt-2">Découvrez les lectures spirituelles et méditations quotidiennes</p>
            </div>
        </header>
    
        <!-- Section Lecture du Jour -->
        <section class="py-12">
            <div class="container mx-auto bg-white shadow-lg rounded-lg p-8">
                <!-- Date de la lecture -->
                <div class="text-center mb-8">
                    <p class="text-lg text-gray-500">Mardi, le 5 septembre 2024</p>
                    <h2 class="text-4xl font-bold text-gray-900 mt-2">1ère Lecture : 1 Corinthiens 6, 1-11</h2>
                </div>
    
                <!-- Contenu de la lecture -->
                <div class="prose prose-lg max-w-full text-gray-700 mx-auto leading-loose">
                    <p>
                        Frères, lorsque l’un de vous a un différend avec un autre, comment ose-t-il porter l’affaire devant des juges païens, au lieu de s’adresser à ceux qui sont saints ? Ne savez-vous pas que le peuple saint jugera le monde ? Et si c’est par vous que le monde doit être jugé, seriez-vous incapables de rendre de petites sentences ? Ne savez-vous pas que nous jugerons les anges ? Alors, pourquoi pas des affaires de la vie quotidienne ?
                    </p>
    
                    <blockquote>
                        <p class="text-xl italic text-gray-600 mt-6">"Bienheureux ceux qui sont persécutés pour la justice, car le Royaume des cieux est à eux."</p>
                    </blockquote>
                </div>
            </div>
        </section>
    
        <!-- Méditation ou commentaire -->
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Méditation du jour</h2>
                <p class="max-w-3xl mx-auto text-gray-700 leading-loose">
                    Aujourd'hui, le message de la première lecture nous invite à réfléchir sur la justice et la fraternité. Il nous rappelle que la foi chrétienne ne se limite pas à la prière mais doit aussi se manifester dans notre manière de résoudre nos conflits, dans la paix et l'amour de Dieu.
                </p>
            </div>
        </section>
    
        <!-- Section pour les lectures des jours passés -->
        <section class="py-12">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Lectures passées</h2>
    
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Lecture passée 1 -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <p class="text-lg text-gray-500">Lundi, le 4 septembre 2024</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-2">Évangile : Luc 6, 1-5</h3>
                        <p class="mt-4 text-gray-700">Jésus et ses disciples traversaient des champs de blé. Le jour du sabbat, les disciples arrachaient des épis et les mangeaient, après les avoir frottés dans leurs mains...</p>
                        <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Lire plus</a>
                    </div>
    
                    <!-- Lecture passée 2 -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <p class="text-lg text-gray-500">Dimanche, le 3 septembre 2024</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-2">2ème Lecture : Romains 12, 9-21</h3>
                        <p class="mt-4 text-gray-700">Que votre amour soit sincère. Détestez le mal, attachez-vous au bien. Soyez unis les uns aux autres par l'affection fraternelle, rivalisez de respect les uns pour les autres...</p>
                        <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Lire plus</a>
                    </div>
    
                    <!-- Lecture passée 3 -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <p class="text-lg text-gray-500">Samedi, le 2 septembre 2024</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-2">Psaume 33</h3>
                        <p class="mt-4 text-gray-700">Je bénirai le Seigneur en tout temps, sa louange sans cesse à mes lèvres. Je me glorifierai dans le Seigneur : que les pauvres m'entendent et soient en fête !...</p>
                        <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Lire plus</a>
                    </div>
                </div>
            </div>

        </section>



        

      
    
</x-app-layout>
