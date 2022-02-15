@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="wrapper">
    <div class="title">
       Ajouter un Reminder
    </div>
    <div class="form pt-4">
      <form action="{{ route("admin.reminders.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="line">
        <div class="inputfield">
          <label>Nom du Reminder :</label>
          <input type="text" class="input" id="Nom_reminder" name="Nom_reminder" value="{{ old('Nom_reminder', isset($reminder) ? $reminder->Nom_reminder : '') }}" required>
        </div>  
        <div class="inputfield">
          <label>Employe :</label>
          <div class="custom_select">
            <select name="user_id" id="users" class="custom_select" required>
              @foreach ($users as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>
          </div>
          </div>
        </div>
        <div class="line">
          <div class="inputfield">
            <label>Date début :</label>
            <input type="date" class="input" id="Date_debut" name="Date_debut" value="{{ old('Date_debut', isset($reminder) ? $reminder->Date_debut : '') }}" required>
          </div>
          <div class="inputfield">
            <label>Date d'échéance' :</label>
            <input type="date" class="input" id="Date_echeance" name="Date_echeance" value="{{ old('Date_echeance', isset($reminder) ? $reminder->Date_echeance : '') }}" required>
          </div>
        </div>
        <div class="inputfield pt-4">
          <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
      </form>
    </div>
</div>
@endsection