@extends('layouts.interface')

@section('title', 'Projects')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 margin-tb d-flex align-items-center justify-content-between mb-3">
            <div>
                <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                    {{ __('List') }}
                </h2>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('projects.create') }}" title="Add project"> <i
                        class="fas fa-plus-circle"></i>
                    {{ __('Add') }}
                </a>
            </div>
        </div>

        <table id="projects-table" class="display nowrap table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Actions</th>
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
            let table = $('#projects-table').DataTable({
                ajax: {
                    url: '{{ url("projects/data") }}',
                    dataSrc: '',
                },
                columns: [
                    { data: 'id' },
                    { data: 'name', className: 'draggable' },
                    { data: 'created_at' },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <button class="btn btn-secondary edit-btn" data-id="${row.id}">Edit</button>
                                <button class="btn btn-danger delete-btn" data-id="${row.id}">Delete</button>
                            `;
                        }
                    }
                ],
                responsive: true,
                scrollX: true,
                autoWidth: false,
                language: {
                    emptyTable: "No projects found",
                    loadingRecords: "Loading...",
                    zeroRecords: "Nothing matches your search",
                }
            });

            $('#projects-table tbody').on('dblclick', 'tr', function () {
                let data = table.row(this).data();
                if (data) {
                    window.location.href = '{{ url("projects") }}/' + data.id + '/edit';
                }
            });

            $('#projects-table tbody').on('click', '.edit-btn', function() {
                let id = $(this).data('id');
                window.location.href = '/projects/' + id + '/edit';
            });

            $('#projects-table tbody').on('click', '.delete-btn', function() {
                let id = $(this).data('id');
                if(confirm('Are you sure you want to delete this task?')) {
                    $.ajax({
                        url: '/projects/' + id,
                        type: 'DELETE',
                        data: { _token: '{{ csrf_token() }}' },
                        success: function(res) {
                            table.ajax.reload();
                            alert('Task deleted successfully!');
                        }
                    });
                }
            });
        });
    </script>
@endpush

<style>
    td {
        cursor: pointer;
    }
</style>
