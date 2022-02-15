@extends('layouts.admin')
@section('styles')

@endsection
@section('content')
<div class="content">
    @can('project_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.projects.create") }}" style="float: right; margin-top: 10px;" >
                    {{ trans('global.add') }} {{ trans('cruds.project.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.project.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Project">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
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
                                        Responsable
                                    </th>
                                    <th>
                                        Employes
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $key => $project)
                                    <tr data-entry-id="{{ $project->id }}">
                                        <td>

                                        </td>
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
                                            {{ $project->Responsable ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($project->users as $id => $users)
                                                <span class="label label-info label-many">{{ $users->name }}, </span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('project_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.projects.show', $project->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('project_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.projects.edit', $project->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('project_delete')
                                                <form class="Formbtn" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                                <button class="btn btn-xs btn-danger Deletebtn">{{ trans('global.delete') }}</button>
                                            @endcan

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
@endsection
@section('scripts')
@parent
<script>
    $('.Deletebtn').on('click', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
          Swal.fire({
              title: 'Are you sure ?',
              text: "You won't be able to revert this !",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.isConfirmed) {
                  $(this).prev().submit();
              }
          })
      });
</script>
<script>
    $(function() {
let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
let printButtonTrans = '{{ trans('global.datatables.print') }}'
let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'

let languages = {
'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
};

$.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
$.extend(true, $.fn.dataTable.defaults, {
language: {
  url: languages['{{ app()->getLocale() }}']
},
columnDefs: [{
    orderable: false,
    className: 'select-checkbox',
    targets: 0
}, {
    orderable: false,
    searchable: false,
    targets: -1
}],
select: {
  style:    'multi+shift',
  selector: 'td:first-child'
},
order: [],
scrollX: true,
pageLength: 100,
dom: 'lBfrtip<"actions">',
buttons: [
  {
    extend: 'copy',
    className: 'btn-default',
    text: copyButtonTrans,
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'csv',
    className: 'btn-default',
    text: csvButtonTrans,
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'excel',
    className: 'btn-default',
    text: excelButtonTrans,
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'pdf',
    className: 'btn-default',
    text: pdfButtonTrans,
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'print',
    className: 'btn-default',
    text: printButtonTrans,
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'colvis',
    className: 'btn-default',
    text: colvisButtonTrans,
    exportOptions: {
      columns: ':visible'
    }
  }
]
});

$.fn.dataTable.ext.classes.sPageButton = '';
});

</script>
<script>
    $(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can('project_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.projects.massDestroy') }}",
        className: 'btn-danger',
        action: function (e, dt, node, config) {
        var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
        });

        if (ids.length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            showCancelButton: true,
            cancelButtonColor: '#d33',
              
          })

        return
        }
        
        Swal.fire({
            title: 'Are you sure ?',
            text: "You won't be able to revert this !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {'x-csrf-token': _token},
                    method: 'POST',
                    url: config.url,
                    data: { ids: ids, _method: 'DELETE' }
                        })
            .done(function () { location.reload() })
        }
        })
        }
        }
        dtButtons.push(deleteButton)
    @endcan

    $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
    });
    $('.datatable-Project:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection