@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="wrapper">
    <div class="title">
       Modifier une Tache
    </div>
    <div class="form pt-4">
      <form action="{{ route("admin.tasks.update", [$task->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="line">
        <div class="inputfield">
          <label>Nom de la Tache :</label>
          <input type="text" class="input" id="Nom_tache" name="Nom_tache" value="{{ old('Nom_tache', isset($task) ? $task->Nom_tache : '') }}" required>
        </div>  
        <div class="inputfield">
          <label>Employe :</label>
          <div class="custom_select">
            <select name="user_id" id="users" class="custom_select" required>
              @foreach ($users as $user)
              <option {{$task && $task->user_id == $user->id?'selected':''}} value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
            </select>
          </div>
          </div>
        </div>
      <div class="line">
        <div class="inputfield">
          <label>Date début :</label>
          <input type="text" class="input" id="Date_debut" name="Date_debut" value="{{ old('Date_debut', isset($task) ? $task->Date_debut : '') }}" required>
        </div>
        <div class="inputfield">
          <label>Date d'échéance' :</label>
          <input type="text" class="input" id="Date_echeance" name="Date_echeance" value="{{ old('Date_echeance', isset($task) ? $task->Date_echeance : '') }}" required>
        </div>
      </div>
      <div class="line">
        <div class="inputfield">
          <label>type :</label>
          <div class="custom_select">
            <select name="type" id="main" class="custom_select" required>
              @foreach (['Individual','Projects'] as $c)
                <option {{$task && $task->type == $c?'selected':''}} value="{{$c}}">{{$c}}</option>
              @endforeach  
          </select>
          </div>
        </div> 
        <div class="inputfield">
        <label id="label">Project :</label>
        <div class="custom_select project">
          <select name="project_id" id="second" class="custom_select" >
            @if ($task->project_id)
              <option selected disabled hidden>Select Project</option>
            @endif
            @foreach ($projects as $project)
              <option {{$task && $task->project_id == $project->id?'selected':''}} value="{{$project->id}}">{{$project->Nom_projet}}</option>
            @endforeach
        </select>
        </div>
        </div> 
        </div>
        <div class="line">
          <div id="btnchk" class="inputfield toggle-btn active">
            <input type="checkbox"  checked class="cb-value" id="cb"/>
            <span class="round-btn"></span>
          </div>
          <div class="inputfield">
            <label>Jalon</label>
            <input type="text" class="input" id="Jalon" name="Jalon" value="{{ old('Jalon', isset($task) ? $task->Jalon : '') }}" >
          </div>
        </div>
        <div class="inputfield pt-4">
          <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
      </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
$('.cb-value').click(function() {
  var mainParent = $(this).parent('.toggle-btn');
  if($(mainParent).find('input.cb-value').is(':checked')) {
    $(mainParent).addClass('active');
  } else {
    $(mainParent).removeClass('active');
  }
})
document.getElementById('cb').onchange = function() {
    document.getElementById('Jalon').disabled = !this.checked;
};
</script>
<script>
  const source = document.querySelector("#main");
  const target1 = document.querySelector("#second");
  const target2 = document.querySelector("#label");

  const displayWhenSelected = (source, value, target1, target2) => {
    const selectedIndex = source.selectedIndex;
    const isSelected = source[selectedIndex].value === value;
    target1.classList[isSelected
        ? "add"
        : "remove"
    ]("show");
    target2.classList[isSelected
        ? "add"
        : "remove"
    ]("show");
};
source.addEventListener("change", (evt) =>
    displayWhenSelected(source, "Projects", target1, target2)
);
displayWhenSelected(source, "Projects", target1, target2)
</script>
@endsection