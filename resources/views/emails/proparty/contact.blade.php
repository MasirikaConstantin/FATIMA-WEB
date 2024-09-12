<x-mail::message>
# Nouvelle demande de contact

L'utilisateur :  
- **Nom** : {{ $data['nom'] }}  
- **Email** : {{ $data['email'] }}

Vous a envoyé ce message :

---

**Message :**  
{{ $data['message'] }}

<x-mail::button :url="'mailto:' . $data['email']">
Répondre via Gmail
</x-mail::button>

</x-mail::message>
