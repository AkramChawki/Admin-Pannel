@extends('layouts.admin')
@section('content')
<section id="dashboards">
    <div class="container">
        <h2 class="section-title">Dashboard</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="dashboard">
                    <i class="fas fa-project-diagram"></i><h2>{{$projects->count()}}</h2>
                    <p>Projets</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="dashboard">
                    <i class="fas fa-user"></i><h2>{{$clients->count()}}</h2>
                    <p>Clients</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mx-auto">
                <div class="dashboard">
                    <i class="fas fa-users"></i><h2>{{$users->count()}}</h2>
                    <p>Employe</p>
                </div>
            </div>
        </div>
    </div>
</section>
@can('project_access')
<section id="dashboards">
  <div class="container">
    <h2 class="section-title">Projects</h2>    
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="table-responsive">
                <table id="Projects" style="width:100%" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <th>
                            Nom du Projet
                        </th>
                        <th>
                            Client
                        </th>
                        <th>
                            Employes
                        </th>
                        <th>
                          Progress
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $key => $project)
                        <tr data-entry-id="{{ $project->id }}">
                            <td>
                                {{ $project->id ?? '' }}
                            </td>
                            <td>
                                {{ $project->Nom_projet ?? '' }}
                            </td>
                            <td>
                                {{ $project->clients->Intitule ?? '' }}
                            </td>
                            <td>
                                @foreach($project->users as $id => $users)
                                    <span class="label label-info label-many">{{ $users->name }}, </span>
                                @endforeach
                            </td>
                            <td>
                              <div class="progress-wrap progress" data-progress-percent="{{App\Progress::prog($project)}}" style="height: 10px;">
                                <div class="progress-bar progress"></div>
                              </div>
                              <center><h5>{{App\Progress::prog($project)}}%</h5></center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
@endcan
@can('task_access')
<section id="dashboards">
  <div class="container">
    <h2 class="section-title">Tasks</h2>    
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="table-responsive">
                <table id="Tasks" style="width:100%" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>
                          {{ trans('cruds.task.fields.id') }}
                      </th>
                      <th>
                          Nom de la tache
                      </th>
                      <th>
                          User
                      </th>
                      <th>
                          Date d'écheance
                      </th>
                      <th>
                          Type
                      </th>
                      <th>
                          Status
                      </th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($tasks as $key => $task)
                                    <tr data-entry-id="{{ $task->id }}">
                                        <td>
                                            {{ $task->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $task->Nom_tache ?? '' }}
                                            @if ($task->Jalon != "NULL")
                                            <button class="myBtn"><i class="fas fa-exclamation"></i></button>
                                            <div class="modal myModal">
                                                <div class="modal-content">
                                                  <span class="close">&times;</span>
                                                  <p>{{$task->Jalon}}</p>
                                                </div>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $task->users->name }}
                                        </td>
                                        <td>
                                            {{ $task->Date_echeance }}
                                        </td>
                                        <td>
                                            {{ $task->type }}
                                        </td>
                                        <td>
                                            {{ $task->value }}
                                        </td>
                                    </tr>
                                @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
@endcan
@can('reminder_access')
<section id="dashboards">
  <div class="container">
    <h2 class="section-title">Reminders</h2>    
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="table-responsive">
                <table id="Reminders" style="width:100%" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.reminder.fields.id') }}
                        </th>
                        <th>
                            Nom du Reminder
                        </th>
                        <th>
                            Receptionist
                        </th>
                        <th>
                            Date d'echeance
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reminders as $key => $reminder)
                        <tr data-entry-id="{{ $reminder->id }}">
                            <td>
                                {{ $reminder->id ?? '' }}
                            </td>
                            <td>
                                {{ $reminder->Nom_reminder ?? '' }}
                            </td>
                            <td>
                                {{ $reminder->users->name }}
                            </td>
                            <td>
                                {{ $reminder->Date_echeance }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
@endcan
@endsection
@section('scripts')
@parent
<script>
$(function() {
    $(document).ready(function() {
      $('#Projects').DataTable();
    });
  });
$(function() {
    $(document).ready(function() {
      $('#Tasks').DataTable();
    });
  });
$(function() {
    $(document).ready(function() {
      $('#Reminders').DataTable();
    });
  });
</script>
<script>
  // on page load...
  moveProgressBar();
    // on browser resize...
    $(window).resize(function() {
        moveProgressBar();
    });

    // SIGNATURE PROGRESS
    function moveProgressBar() {
      $('.progress-wrap').each(function () {
    var getPercent = ($(this).data('progress-percent') / 100);
        var getProgressWrapWidth = $(this).width();
        var progressTotal = getPercent * getProgressWrapWidth;
        var animationLength = 2500;
        $(this).find('.progress-bar').stop().animate({
            left: progressTotal
        }, animationLength);
  })
    }
</script>
<script>
  var modal = document.getElementById("myModal");
  var span = document.getElementsByClassName("close")[0];
  $('.myBtn').on('click', function() {
    $(this).next().show()
  })
  $('.close').on('click', function() {
    $('.myModal').hide()
  })
  $('.modal').on('click', function() {
    $('.myModal').hide()
  })
  </script>
@endsection