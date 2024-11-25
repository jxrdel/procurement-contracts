@extends('layout')

@section('title')
    <title>External Companies | Contracts</title>
@endsection

@section('content')
    @livewire('delete-record-modal')
    <div class="card">
        <div class="card-body">

            <div class="d-sm-flex align-items-center justify-content-between mb-7">
                <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i
                            class="fa-solid fa-building-circle-check"></i> &nbsp; External Companies</strong></h1>
            </div>

            <div class="row mb-8">
                <a href="{{ route('external-companies.create') }}"
                    class="btn btn-primary waves-effect waves-light w-25 m-auto">
                    <span class="tf-icons ri-add-circle-line me-1_5"></span>Create Company
                </a>
            </div>
            <table id="myTable" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th style="width: 20%">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->phone1 }}</td>
                            <td>{{ $company->email }}</td>
                            <td class="text-center">

                                <a href="#" type="button" class="btn btn-primary">
                                    <i class="ri-eye-line me-1"></i>
                                </a>

                                <a href="#" type="button" class="btn btn-danger">
                                    <i class="ri-delete-bin-2-line me-1"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No external companies added</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var userCanDelete =
            @can('delete-records')
                true
            @else
                false
            @endcan ;

        $(document).ready(function() {
            $('#myTable').DataTable({
                "pageLength": 10,
                order: [
                    [0, 'desc']
                ],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getexternalcompanies') }}",
                    "type": "GET"
                },
                "columns": [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone1',
                        name: 'phone1'
                    },
                    {
                        data: 'email',
                        name: 'phone1'
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            var deleteButton = '';
                            if (userCanDelete) { // Check if user can delete
                                deleteButton =
                                    '<a class="btn btn-danger" href="#" onclick="showDelete(' + data
                                    .id + ')"><i class="ri-delete-bin-2-line me-1"></i></a>';
                            }
                            return '<div style="text-align:center;"><a class="btn btn-primary" href="/external-companies/view/' +
                                data.id + '" >View</a> ' + deleteButton + '</div>';
                        }
                    },
                ]
            });
        });

        window.addEventListener('refresh-table', event => {
            $('#myTable').DataTable().ajax.reload();
        })

        function showDelete(id) {
            Livewire.dispatch('show-delete-modal', {
                model: 'ExternalCompany',
                id: id
            });
        }

        window.addEventListener('display-delete-modal', event => {
            $('#deleteRecordModal').modal('show');
        })

        window.addEventListener('close-delete-modal', event => {
            $('#deleteRecordModal').modal('hide');
        })
    </script>
@endsection
