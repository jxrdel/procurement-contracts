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
        <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                <td><i class="ri-suitcase-2-line ri-22px text-danger me-4"></i><span>Tours Project</span></td>
                <td>Albert Cook</td>
                <td>
                </td>
                <td><span class="badge rounded-pill bg-label-primary me-1">Active</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="ri-more-2-line"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="ri-pencil-line me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="ri-delete-bin-6-line me-1"></i> Delete</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><i class="ri-basketball-fill ri-22px text-info me-4"></i><span>Sports Project</span></td>
                <td>Barry Hunter</td>
                <td>
                  <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Lilian Fuller">
                      <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                    </li>
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Sophia Wilkerson">
                      <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                    </li>
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Christina Parker">
                      <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                    </li>
                  </ul>
                </td>
                <td><span class="badge rounded-pill bg-label-success me-1">Completed</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="ri-more-2-line"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="ri-pencil-line me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="ri-delete-bin-6-line me-1"></i> Delete</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><i class="ri-leaf-fill ri-22px text-success me-4"></i><span>Greenhouse Project</span></td>
                <td>Trevor Baker</td>
                <td>
                  <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Lilian Fuller">
                      <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                    </li>
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Sophia Wilkerson">
                      <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                    </li>
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Christina Parker">
                      <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                    </li>
                  </ul>
                </td>
                <td><span class="badge rounded-pill bg-label-info me-1">Scheduled</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="ri-more-2-line"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="ri-pencil-line me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="ri-delete-bin-6-line me-1"></i> Delete</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><i class="ri-bank-fill ri-22px text-primary me-4"></i><span>Bank Project</span></td>
                <td>Jerry Milton</td>
                <td>
                  <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Lilian Fuller">
                      <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                    </li>
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Sophia Wilkerson">
                      <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                    </li>
                    <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Christina Parker">
                      <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                    </li>
                  </ul>
                </td>
                <td><span class="badge rounded-pill bg-label-warning me-1">Pending</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="ri-more-2-line"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="ri-pencil-line me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="ri-delete-bin-6-line me-1"></i> Delete</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        
      </div>
    </div>
@endsection