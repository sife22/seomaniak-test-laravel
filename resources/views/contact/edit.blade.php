@extends('layout')
@section('content')
<div class="p-5">
    <div id="message" class="text-success m-5 h3"></div>
    <form class="m-5" id="contactForm">
        <input type="hidden" name="contactId" id="contactId" value="{{$contact->id}}">
        <h2 class="mb-5">Modifier le contact {{ $contact->nom }}</h2>
        <div class="form-group mb-3">
            <label for="">Nom</label>
            <input type="text" class="form-control" id="nom" aria-describedby="nameHelp" placeholder="Entrer le nom :"
                value="{{$contact->nom}}">
        </div>
        <div class="form-group mb-3">
            <label for="">Téléphone</label>
            <input type="number" class="form-control" id="gsm" placeholder="Entrer le téléphone : "
                value="{{$contact->gsm}}">
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Entrer l'email : "
                value="{{$contact->email}}">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Modifier</button>
    </form>
</div>
<script>
    // On gère la soumission du formulaire
    document.getElementById('contactForm').addEventListener('submit', async function(e) {

        // Pour éviter l'actualisation de la page
        e.preventDefault(); 

        // On récupère des données saisies
        const nom = document.getElementById('nom').value;
        const gsm = document.getElementById('gsm').value;
        const email = document.getElementById('email').value;
        const contactId = document.getElementById('contactId').value;


        // On récupère le div du message de succès
        const message = document.getElementById('message');

        try {
            // Consommer l'API modifier-contact pour modifier un nouveau
            const response = await fetch(`https://seomaniak-test-laravel.ddev.site/api/modifier-contact/${contactId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ nom, gsm, email }),
            });

            // On récupère la réponse envoyée par le back-end
            const jsonResponse = await response.json();

            // On affiche le résultat sur la console avant de renvoyer l'utilisateur vers la page contacts
            console.log('Réponse de l\'API:', jsonResponse);
            
            // On affiche le message de succès au cas où la création a été effectuée avec succès
            message.textContent = jsonResponse.message;

            // On retourne l'utilisateur vers la page contacts après la modification
            setTimeout(() => {
                window.location.href = '/contacts';
            }, 3000); 

        } catch (error) {
            console.error('Erreur:', error);
        }
    });
</script>
@endsection