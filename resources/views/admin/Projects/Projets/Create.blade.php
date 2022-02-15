@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="wrapper">
    <div class="title">
       Ajouter un Projet
    </div>
    <div class="form pt-4">
      <form action="{{ route("admin.projects.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="line">
        <div class="inputfield">
          <label>Nom du Projet :</label>
          <input type="text" class="input" id="Nom_projet" name="Nom_projet" value="{{ old('Nom_projet', isset($project) ? $project->Nom_projet : '') }}" required>
        </div>  
        <div class="inputfield">
          <label>Société :</label>
          <input type="text" class="input" id="Societe" name="Societe" value="{{ old('Societe', isset($project) ? $project->Societe : '') }}" required>
        </div>
        </div>
        <div class="line">
        <div class="inputfield">
          <label>Responsable :</label>
          <input type="text" class="input" id="Responsable" name="Responsable" value="{{ old('Responsable', isset($project) ? $project->Responsable : '') }}" required>
        </div> 
        </div>
        <div class="line">
        <div class="inputfield">
          <label>Date de début :</label>
          <input type="date" class="input" id="Date_debut" name="Date_debut" value="{{ old('Date_debut', isset($project) ? $project->Date_debut : '') }}" required>
        </div>
        <div class="inputfield">
          <label>Date d'échéance :</label>
          <input type="date" class="input" id="Date_echeance" name="Date_echeance" value="{{ old('Date_echeance', isset($project) ? $project->Date_echeance : '') }}" required>
        </div> 
      </div>
      <div class="line">
      <div class="inputfield">
        <label>Client :</label>
        <div class="custom_select">
          <select name="client_id" id="clients" class="custom_select" required>
            @foreach ($clients as $client)
                <option value="{{$client->id}}">{{$client->Intitule}}</option>
            @endforeach
        </select>
        </div>
      </div> 
      <div class="inputfield">
      <label>Team :</label>
      <div class="custom_select">
        <select name="users[]" id="users" class="form-control select2" multiple="multiple" required>
          @foreach($users as $id => $users)
              <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || isset($project) && $project->users->contains($id)) ? 'selected' : '' }}>{{ $users }}</option>
          @endforeach
      </select>
      </div>
      </div> 
      </div>
        <div class="inputfield pt-4">
          <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
      </form>
    </div>
</div>
@endsection