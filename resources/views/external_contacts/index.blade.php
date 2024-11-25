@extends('layout')

@section('title')
    <title>External Contacts | Contracts</title>
@endsection

@section('content')
    @livewire('create-external-contact-modal')
    @livewire('edit-external-contact-modal')
    @livewire('delete-record-modal')
    <div class="card">
        <div class="card-body">

            <div class="d-sm-flex align-items-center justify-content-between mb-7">
                <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i style="font-size: 2rem"
                            class="ri-user-search-fill"></i> &nbsp; External Contacts</strong></h1>
            </div>

            <div class="row mb-8">
                <a href="#" data-bs-toggle="modal" data-bs-target="#createContactModal"
                    class="btn btn-primary waves-effect waves-light w-25 m-auto">
                    <span class="tf-icons ri-user-add-fill me-1_5"></span>Create Contact
                </a>
            </div>


            <table id="myTable" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th style="width: 20%">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
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
                    "url": "{{ route('getexternalcontacts') }}",
                    "type": "GET"
                },
                "columns": [{
                        data: null,
                        name: 'fname',
                        render: function(data, type, row) {
                            return row.fname + ' ' + row.lname;
                        }
                    },
                    {
                        data: 'phone1',
                        name: 'phone1'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'company_name',
                        name: 'external_companies.name'
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            var deleteButton = '';
                            if (userCanDelete) { // Check if user can delete
                                deleteButton =
                                    '<a class="btn btn-danger" href="#" onclick="showDelete(' +
                                    row.id + ')"><i class="ri-delete-bin-2-line me-1"></i></a>';
                            }
                            return '<div style="text-align:center"><a class="btn btn-primary" href="javascript:void(0);" onclick="showEdit(' +
                                data.id +
                                ')">View</a> ' + deleteButton +
                                '</div>';
                        }
                    },
                    {
                        data: 'fname',
                        name: 'fname',
                        visible: false,
                        searchable: true
                    }, // Hidden but searchable
                    {
                        data: 'lname',
                        name: 'lname',
                        visible: false,
                        searchable: true
                    }, // Hidden but searchable
                ]
            });
        });


        window.addEventListener('refresh-table', event => {
            $('#myTable').DataTable().ajax.reload();
        })

        window.addEventListener('close-create-modal', event => {
            $('#createContactModal').modal('hide');
        })

        function showEdit(id) {
            Livewire.dispatch('show-edit-modal', {
                id: id
            });
        }

        window.addEventListener('display-edit-modal', event => {
            $('#editContactModal').modal('show');
        })

        window.addEventListener('close-edit-modal', event => {
            $('#editContactModal').modal('hide');
        })

        function showDelete(id) {
            Livewire.dispatch('show-delete-modal', {
                model: 'ExternalContact',
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
