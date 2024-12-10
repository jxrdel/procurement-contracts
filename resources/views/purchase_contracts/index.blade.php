@extends('layout')

@section('title')
    <title>Purchases | Contracts</title>
@endsection

@section('content')
    @livewire('create-external-contact-modal')
    <div class="card">
        <div class="card-body">

            <div class="d-sm-flex align-items-center justify-content-between mb-7">
                <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-file-invoice-dollar"></i>
                        &nbsp; Purchase Contracts</strong></h1>
            </div>

            <div class="row mb-8">
                <a href="{{ route('purchase-contracts.create') }}"
                    class="btn btn-primary waves-effect waves-light w-25 m-auto">
                    <span class="ri-add-circle-line me-1_5"></span>Create Purchase Contract
                </a>
            </div>


            <table id="myTable" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Start Date</th>
                        <th>End Date</th>
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
                "ajax": {
                    "url": "{{ route('getpurchasecontracts') }}",
                    "type": "GET"
                },
                "columns": [{
                        data: 'purchase.name',
                        name: 'purchase.name'
                    },
                    {
                        data: 'company_name',
                        name: 'company_name'
                    },
                    {
                        data: 'formatted_start_date',
                        name: 'formatted_start_date'
                    },
                    {
                        data: 'formatted_end_date',
                        name: 'formatted_end_date'
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
                            return '<div style="text-align:center;"><a class="btn btn-primary" href="/purchase-contracts/view/' +
                                data.id + '" >View</a> ' + deleteButton + '</div>';
                        }
                    },
                ]
            });
        });

        window.addEventListener('refresh-table', event => {
            $('#myTable').DataTable().ajax.reload();
        })

        window.addEventListener('close-create-modal', event => {
            $('#createContactModal').modal('hide');
        })
    </script>
@endsection
