@extends('layouts.admin')
@section('style')

@endsection

@section('content')

<div class="wrapper">
    <div class="title">
       Modifier un Client
    </div>
    <div class="form pt-4">
      <form action="{{ route("admin.clients.update", [$client->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="line">
        <div class="inputfield">
          <label>Intitulé :</label>
          <input id="Intitule" type="text" class="input" name="Intitule" value="{{ old('Intitule', isset($client) ? $client->Intitule : '') }}" required>
        </div>  
        <div class="inputfield">
          <label>Abrégé :</label>
          <input id="Abrege" type="text" class="input" name="Abrege" value="{{ old('Abrege', isset($client) ? $client->Abrege : '') }}" required>
        </div>
        </div>
        <div class="line">
        <div class="inputfield">
          <label>Compte collectif :</label>
          <input id="Compte_collectif" type="text" class="input" name="Compte_collectif" value="{{ old('Compte_collectif', isset($client) ? $client->Compte_collectif : '') }}" required>
        </div> 
        <div class="inputfield">
          <label>Interlocuteur :</label>
          <input id="Interlocuteur" type="text" class="input" name="Interlocuteur" value="{{ old('Interlocuteur', isset($client) ? $client->Interlocuteur : '') }}" required>
        </div>
        </div>
        <div class="line">
        <div class="inputfield">
          <label>Adresse :</label>
          <input id="Adresse" type="text" class="input" name="Adresse" value="{{ old('Adresse', isset($client) ? $client->Adresse : '') }}" required>
        </div> 
        <div class="inputfield">
          <label>Code Postal :</label>
          <input id="Code_postal" type="text" class="input" name="Code_postal" value="{{ old('Code_postal', isset($client) ? $client->Code_postal : '') }}" required>
        </div> 
        </div>
        <div class="line">
        <div class="inputfield">
          <label>Ville :</label>
          <input id="Ville" type="text" class="input" name="Ville" value="{{ old('Ville', isset($client) ? $client->Ville : '') }}" required>
        </div> 
        <div class="inputfield">
          <label>Region :</label>
          <input id="Region" type="text" class="input" name="Region" value="{{ old('Region', isset($client) ? $client->Region : '') }}" required>
        </div> 
        </div>
        <div class="line">
        <div class="inputfield">
          <label>Pays :</label>
          <input id="Pays" type="text" class="input" name="Pays" value="{{ old('Pays', isset($client) ? $client->Pays : '') }}" required>
        </div> 
        <div class="inputfield">
          <label>Téléphone :</label>
          <input id="Telephone" type="text" class="input" name="Telephone" value="{{ old('Telephone', isset($client) ? $client->Telephone : '') }}" required>
        </div> 
        </div>
        <div class="line">
        <div class="inputfield">
          <label>E-mail :</label>
          <input id="Email" type="text" class="input" name="Email" value="{{ old('Email', isset($client) ? $client->Email : '') }}" required>
        </div> 
        <div class="inputfield">
          <label>Site Web :</label>
          <input id="Site_web" type="text" class="input" name="Site_web" value="{{ old('Site_web', isset($client) ? $client->Site_web : '') }}" required>
        </div> 
        </div>
        <div class="line">
        <div class="inputfield">
          <label>SIRET :</label>
          <input id="SIRET" type="text" class="input" name="SIRET" value="{{ old('SIRET', isset($client) ? $client->SIRET : '') }}" required>
        </div> 
        <div class="inputfield">
          <label>Code NAF :</label>
          <input id="Code_NAF" type="text" class="input" name="Code_NAF" value="{{ old('Code_NAF', isset($client) ? $client->Code_NAF : '') }}" required>
        </div> 
        </div>
        <div class="line">
        <div class="inputfield">
          <label>ID TVA :</label>
          <input id="ID_TVA" type="text" class="input" name="ID_TVA" value="{{ old('ID_TVA', isset($client) ? $client->ID_TVA : '') }}" required>
        </div> 
        </div>
        <div class="inputfield pt-4">
          <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
      </form>
    </div>
</div>
@endsection