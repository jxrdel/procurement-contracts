@extends('layout')

@section('title')
    <title>Purchases | Contracts</title>
@endsection

@section('content')
    @livewire('create-external-contact-modal')
    <div class="card">
      <div class="card-body">
        
        <div class="d-sm-flex align-items-center justify-content-between mb-7">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-file-invoice-dollar"></i> &nbsp; Purchases</strong></h1>
        </div>

        <div class="row mb-8">
            <a href="{{route('purchases.create')}}" class="btn btn-primary waves-effect waves-light w-25 m-auto">
                <span class="ri-add-circle-line me-1_5"></span>Create Purchase
            </a>
        </div>

        
        <table id="myTable" class="table table-hover table-bordered">
          <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
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

      $(document).ready(function() {
          $('#myTable').DataTable({
              "pageLength": 10,
              order: [[0, 'desc']],
              "processing": true,
              "serverSide": true,
              "ajax": {
                  "url": "{{ route('getexternalcontacts') }}",
                  "type": "GET"
              },
              "columns": [
                      { data: 'fname', name: 'fname' },
                      { data: 'lname', name: 'lname' },
                      { data: 'phone1', name: 'phone1' },
                      { data: 'email', name: 'email' },
                      {
                          data: null,
                          orderable: false,
                          searchable: false,
                          render: function (data, type, row) {
                              return ' <div style="text-align:center"><a class="btn btn-primary" href="/Patient/View/' + data.id + '" ><i class="ri-eye-line me-1"></i></a> <a class="btn btn-danger" href="#" onclick="showDelete(' + data.id + ')"><i class="ri-delete-bin-2-line me-1"></i></a></div>';
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