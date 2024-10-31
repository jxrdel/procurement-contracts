@extends('layout')

@section('title')
    <title>External Companies | Contracts</title>
@endsection

@section('content')
    <div class="card">
      <div class="card-body">
        
        <div class="d-sm-flex align-items-center justify-content-between mb-7">
            <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-building-circle-check"></i> &nbsp; External Companies</strong></h1>
        </div>

        <div class="row mb-8">
            <a href="{{route('external-companies.create')}}" class="btn btn-primary waves-effect waves-light w-25 m-auto">
                <span class="tf-icons ri-add-circle-line me-1_5"></span>Create External Company
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
                <td>{{$company->name}}</td>
                <td>{{$company->phone1}}</td>
                <td>{{$company->email}}</td>
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

      $(document).ready(function() {
          $('#myTable').DataTable();
      });
              
      </script>
@endsection