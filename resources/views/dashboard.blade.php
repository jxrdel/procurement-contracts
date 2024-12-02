@extends('layout')

@section('title')
    <title>Dashboard | Contracts</title>
@endsection

@section('styles')
    <style>
        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.03);
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-7">
        <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-gauge-high"></i> &nbsp;
                Dashboard</strong></h1>
    </div>


    <div id="dashboard" x-data="{
        showTwelveMonths: false,
        showSixMonths: false,
        showThreeMonths: false,
    }" x-cloak>
        <div class="row">

            <div class="col">
                <a href="{{ route('purchase-contracts.index') }}">
                    <div class="card bg-primary text-white hover-scale">
                        <div class="card-body">
                            <h5 class="card-title text-white text-center">Total Purchase Contracts</h5>
                            <h4 class="card-text text-center mt-2 text-white">{{ $allpurchasecontractsCount }}</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="#"
                    @click.prevent="showTwelveMonths = !showTwelveMonths, showSixMonths = false, showThreeMonths = false">
                    <div class="card bg-success text-white hover-scale">
                        <div class="card-body">
                            <h5 class="card-title text-white text-center">Expiring in 12 Months</h5>
                            <h4 class="card-text text-center mt-2 text-white">{{ $nexttwelvemonths->count() }}</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="#"
                    @click.prevent="showSixMonths = !showSixMonths, showTwelveMonths = false, showThreeMonths = false">
                    <div class="card bg-dark text-white hover-scale">
                        <div class="card-body">
                            <h5 class="card-title text-white text-center">Expiring in 6 Months</h5>
                            <h4 class="card-text text-center mt-2 text-white">{{ $nextsixmonths->count() }}</h4>
                            </h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="#"
                    @click.prevent="showThreeMonths = !showThreeMonths, showTwelveMonths = false, showSixMonths = false">
                    <div class="card bg-danger text-white hover-scale">
                        <div class="card-body">
                            <h5 class="card-title text-white text-center">Expiring in 3 Months</h5>
                            <h4 class="card-text text-center mt-2 text-white">{{ $nextthreemonths->count() }}</h4>
                            </h4>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <div x-show="showTwelveMonths" x-transition x-cloak>
            <div class="row mt-5">
                <div class="col">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(14, 236, 14, 0.829);">
                        <div class="card-body">
                            <h5 class="card-title">Contracts expiring in the next 12 months</h5>
                            <hr>

                            <div>
                                <table id="twelveTable" class="table table-hover table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th style="width: 20%;text-align:center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($nexttwelvemonths as $contract)
                                            <tr>
                                                <td>{{ $contract->purchase->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('purchase-contracts.view', $contract->id) }}"
                                                        class="btn btn-primary btn-sm">View</a>
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

        <div x-show="showSixMonths" x-transition x-cloak>
            <div class="row mt-5">
                <div class="col">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(230, 196, 106, 0.993);">
                        <div class="card-body">
                            <h5 class="card-title">Contracts expiring in the next 6 months <i
                                    class="ri-error-warning-fill text-warning fs-3"></i></h5>
                            <hr>

                            <table id="sixTable" class="table table-hover table-bordered mt-5">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th style="width: 20%;text-align:center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($nextsixmonths as $contract)
                                        <tr>
                                            <td>{{ $contract->purchase->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('purchase-contracts.view', $contract->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>
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

        <div x-show="showThreeMonths" x-transition x-cloak>
            <div class="row mt-5">
                <div class="col">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(233, 39, 13, 0.829);">
                        <div class="card-body">
                            <h5 class="card-title">Contracts expiring in the next 3 months <i
                                    class="ri-error-warning-fill text-danger fs-3"></i></h5>
                            <hr>

                            <div>

                                <table id="threeTable" class="table table-hover table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th style="width: 20%;text-align:center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($nextthreemonths as $contract)
                                            <tr>
                                                <td>{{ $contract->purchase->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($contract->start_date)->format('d/m/Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($contract->end_date)->format('d/m/Y') }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('purchase-contracts.view', $contract->id) }}"
                                                        class="btn btn-primary btn-sm">View</a>
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

    </div>
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#twelveTable').DataTable();
        });

        $(document).ready(function() {
            $('#sixTable').DataTable();
        });

        $(document).ready(function() {
            $('#threeTable').DataTable();
        });

        window.addEventListener('refresh-table', event => {
            $('#myTable').DataTable().ajax.reload();
        })
    </script>
@endsection
