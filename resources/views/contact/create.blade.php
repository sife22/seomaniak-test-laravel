@extends('layout')
@section('content')
<div class="p-5">
    <form class="m-5" id="contactForm">
        <div class="form-group mb-3">
            <label for="">Nom</label>
            <input type="text" class="form-control" id="nom" aria-describedby="nameHelp" placeholder="Entrer le nom :">
        </div>
        <div class="form-group mb-3">
            <label for="">Téléphone</label>
            <input type="number" class="form-control" id="gsm" placeholder="Entrer le téléphone : ">
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Entrer l'email : ">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
    </form>
</div>
<script>
    document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault(); 

    // On récupère les données saisies
    const nom = document.getElementById('nom').value;
    const gsm = document.getElementById('gsm').value;
    const email = document.getElementById('email').value;

    try {
        // Consommer l'API ajouter-contact pour créer un nouveau contact
        const response = await fetch('https://seomaniak-test-laravel.ddev.site/api/ajouter-contact', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ nom, gsm, email }),
        });

        
        // if (!response.ok) {
        //     throw new Error('Il y a un erreur');
        // }

        // On récupère la réponse envoyée par le back-end
        const jsonResponse = await response.json();
        
        // On affiche le résultat sur la console avant de renvoyer l'utilisateur vers la page contacts
        console.log('Réponse de l\'API:', jsonResponse);
        setTimeout(() => {
                window.location.href = '/contact';
        }, 3000); 
        
    } catch (error) {
        console.error('Erreur:', error);
    }
});
</script>
@endsection