@extends('layout')
@section('content')
<div id="message" class="text-success m-5 h3"></div>
<ul class="list-group m-5">
    @foreach ($contacts as $contact)
    <li class="list-group-item">{{ $contact->nom }} <button class="btn btn-danger  delete-contact" data-id="{{ $contact->id }}">Supprimer</button></li>
    @endforeach
</ul>
<script>
    document.querySelectorAll('.delete-contact').forEach(button => {
        button.addEventListener('click', async function() {
            const contactId = this.getAttribute('data-id');
            const message = document.getElementById('message');

            try {
                // Consommer l'API pour supprimer le contact concérné
                const response = await fetch(`https://seomaniak-test-laravel.ddev.site/api/supprimer-contact/${contactId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                });

                const jsonResponse = await response.json();
                console.log('Réponse de l\'API:', jsonResponse);

                // Le message sera affiché au cas où la création a été effectuée avec succès
                message.textContent = jsonResponse.message;

                // On retourne l'utilisateur vers la même page après la suppression
                setTimeout(() => {
                    window.location.href = '/contacts';
                }, 3000); 
            } catch (error) {
                console.error('Erreur:', error);
            }
        });
    });
</script>
@endsection