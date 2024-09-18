<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
 // Pour afficher tous les contacts
 public function index(){
    $contacts = Contact::all();
    return view('contact.index', compact('contacts'));
}

// Pour afficher le formulaire d'ajout
public function create(){
    return view('contact.create');
}

// Pour afficher le formulaire de modification
public function edit($id){
    $contact = Contact::findOrFail($id);
    return view('contact.edit', compact('contact'));
}

// Pour afficher chaque contact tout seul
public function show($id){
    $contact = Contact::findOrFail($id);
    return view('contact.show', compact('contact'));
}

// Pour enregistrer un nouveau contact
public function store(Request $request){
    $new_contact = new Contact();
    $new_contact->nom = $request['nom'];
    $new_contact->gsm = $request['gsm'];
    $new_contact->email = $request['email'];
    $new_contact->save();
    return response()->json(['message'=>'Vous avez crée le nouveau contact avec succès','contact'=>$new_contact], 201);
}

// Pour modifier un contact
public function update(Request $request, $id){
    $contact = Contact::findOrFail($id);
    $contact->nom = $request['nom'];
    $contact->gsm = $request['gsm'];
    $contact->email = $request['email'];
    $contact->save();
    return response()->json(['message'=>'Vous avez modifié le contact avec succès','contact'=>$contact], 201);
}

// Pour supprimer un contact
public function destroy($id){
    $contact = Contact::findOrFail($id);
    $contact->delete();
    return response()->json(['message'=>'Vous avez supprimé le contact avec succès'], 201);
}   
}
