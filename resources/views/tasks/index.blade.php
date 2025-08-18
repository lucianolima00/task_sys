@extends('layouts.interface')

@section('title', 'Tasks')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 margin-tb d-flex align-items-center justify-content-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('List') }}
                </h2>
            </div>
            <div>
                <select id="project-filter">
                    <option value="">All Projects</option>
                    @foreach (\App\Models\Project::all() as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
                <a class="btn btn-success" href="{{ route('tasks.create') }}" title="Add a task"> <i
                            class="fas fa-plus-circle"></i>
                    {{ __('Add') }}
                </a>
            </div>
        </div>

        <table id="tasks-table" class="display nowrap table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Priority</th>
                <th>Project</th>
                <th>Created At</th>
            </tr>
            </thead>
        </table>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
@stop

@push('scripts')
    <script>
        $(function () {
            let table = $('#tasks-table').DataTable({
                ajax: {
                    url: '{{ url("tasks/data") }}',
                    data: function(d) {
                        d.project_id = $('#project-filter').val(); // send project filter
                    },
                    dataSrc: '',
                },
                columns: [
                    { data: 'name', className: 'draggable' },
                    { data: 'priority' },
                    { data: 'project' },
                    { data: 'created_at' }
                ],
                rowReorder: {
                    dataSrc: 'priority'
                },
                order: [[1, 'asc']],
                responsive: true,
                language: {
                    emptyTable: "No tasks found",
                    loadingRecords: "Loading...",
                    zeroRecords: "Nothing matches your search",
                }
            });

            $('#project-filter').on('change', function () {
                table.ajax.reload();
            });

            $('#tasks-table tbody').on('dblclick', 'tr', function () {
                let data = table.row(this).data();
                if (data) {
                    window.location.href = '{{ url("tasks") }}/' + data.id + '/edit';
                }
            });

            table.on('row-reorder', function (e, diff, edit) {
                let updates = [];

                diff.forEach(function (change) {
                    let rowData = table.row(change.node).data();
                    updates.push({
                        id: rowData.id,
                        priority: change.newData
                    });
                });

                if (updates.length > 0) {
                    $.ajax({
                        url: '{{ url("tasks/reorder") }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            updates: updates
                        },
                        success: function (res) {
                            console.log('Reorder saved!', res);
                        }
                    });
                }
            });

            $("#project").select2({
                language: "en-US",
                allowClear: true,
                ajax: {
                    url: "{{route('tasks.projects')}}",
                    type: "get",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            search: params.term,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endpush

<style>
    td {
        cursor: pointer;
    }
    td.draggable {
        cursor: move;
    }
</style>