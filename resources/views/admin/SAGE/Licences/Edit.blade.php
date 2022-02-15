@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="wrapper">
    <div class="title">
       Ajouter une Licence
    </div>
    <div class="form pt-4">
      <form action="{{ route("admin.licences.update", [$licence->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="line">
        <div class="inputfield">
          <label>Nom de la licence :</label>
          <input type="text" id="title" class="form-control" name="Nom_licence"  value="{{ old('Nom_licence', isset($licence) ? $licence->Nom_licence : '') }}" required>
        </div>  
        <div class="inputfield">
          <label>date d'achat :</label>
          <input type="date" id="title" class="form-control" name="Date_achat"  value="{{ old('Date_achat', isset($licence) ? $licence->Date_achat : '') }}" required>
        </div>
        </div>
        <div class="line">
        <div class="inputfield">
          <label>date d'expiration :</label>
          <input type="date" id="title" class="form-control" name="Date_expir"  value="{{ old('Date_expir', isset($licence) ? $licence->Date_expir : '') }}" required>
        </div> 
        <div class="inputfield">
          <label>Code de licence :</label>
          <input type="text" id="title" class="form-control" name="Code_licence"  value="{{ old('Code_licence', isset($licence) ? $licence->Code_licence : '') }}" required>
        </div>
        </div>
        <div class="line">
          <div class="inputfield">
            <label>Client :</label>
            <div class="custom_select">
              <select name="client_id" id="clients" class="custom_select" required>
                @foreach ($clients as $client)
              <option {{$licence && $licence->client_id == $client->id?'selected':''}} value="{{$client->id}}">{{$client->Intitule}}</option>
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