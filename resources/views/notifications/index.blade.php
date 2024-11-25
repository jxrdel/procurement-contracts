@extends('layout')

@section('title')
    <title>Purchases | Contracts</title>
@endsection

@section('content')
    @livewire('create-external-contact-modal')
    @livewire('view-notification-modal')
    <div class="card">
        <div class="card-body">

            <div class="d-sm-flex align-items-center justify-content-between mb-7">
                <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-bell"></i>
                        &nbsp; Notifications</strong></h1>
            </div>

            <table id="myTable" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Display Date</th>
                        <th style="text-align: center">Custom Message</th>
                        <th style="width: 20%;text-align:center">Actions</th>
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
        $(document).ready(function() {
            $('#myTable').DataTable({
                "pageLength": 10,
                "order": [
                    [0, 'desc']
                ],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getnotifications') }}",
                    "type": "GET"
                },
                "columns": [{
                        data: 'purchase_name', // Column for the purchase name
                        name: 'purchase_name',
                    },
                    {
                        data: 'display_date', // Column for the display date
                        name: 'display_date',
                    },
                    {
                        data: 'is_custom_notification',
                        name: 'is_custom_notification',
                        render: function(data, type, row) {
                            if (data == 1) {
                                return '<div style="text-align:center"><i class="fa-solid fa-check"></i></div>';
                            } else {
                                return '<div style="text-align:center"><i class="fa-solid fa-xmark"></i></div>';
                            }
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<div style="text-align:center"><a class="btn btn-primary" href="javascript:void(0);" onclick="showView(' +
                                data.id +
                                ')">View</a></div>';
                        }
                    }
                ]
            });
        });


        window.addEventListener('refresh-table', event => {
            $('#myTable').DataTable().ajax.reload();
        })

        window.addEventListener('close-create-modal', event => {
            $('#createContactModal').modal('hide');
        })

        function showView(id) {
            Livewire.dispatch('show-view-modal', {
                id: id
            });
        }

        window.addEventListener('display-view-modal', event => {
            $('#viewNotificationModal').modal('show');
        })

        window.addEventListener('close-view-modal', event => {
            $('#viewNotificationModal').modal('hide');
        })
    </script>
@endsection
