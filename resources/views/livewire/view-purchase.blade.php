<div class="card" x-data="{ isEditing: $wire.entangle('isEditing') }" x-cloak>
    <div class="card-body">

        <div class="d-sm-flex align-items-center justify-content-between mb-5">
            <a href="{{ route('purchases.index') }}" class="btn btn-primary">
                <i class="ri-arrow-left-circle-line me-1"></i> Back
            </a>
            <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
                <strong style="margin-right: 90px"><i class="fa-solid fa-file-invoice-dollar"></i> &nbsp;
                    {{ $this->name }}</strong>
            </h1>
        </div>

        <div x-show="!isEditing" x-transition>
            <div class="row mt-8">

                <div class="col mx-5">
                    <label><strong>Name: </strong>{{ $this->name }}</label>
                </div>

                <div class="col mx-5">
                    <label><strong>Company: </strong>{{ $this->getCompanyName() }}</label>
                </div>
            </div>

            <div class="row mt-8">

                <div class="col mx-5">
                    <label><strong>Note: </strong>{{ $this->note }}</label>
                </div>
            </div>


            <div class="row text-center mt-8">
                <div>
                    <button type="button" @click="isEditing = true" class="btn btn-dark waves-effect waves-light"
                        style="width: 100px">
                        <span class="tf-icons ri-edit-box-fill me-1_5"></span>Edit
                    </button>
                </div>
            </div>
        </div>

        <div id="editForm" x-show="isEditing" x-transition>
            <form wire:submit.prevent="save">
                <div class="row mt-8">

                    <div class="col">
                        <div class="form-floating form-floating-outline">
                            <input autocomplete="off" wire:model="name" type="text"
                                class="form-control @error('name')is-invalid @enderror" id="floatingInput"
                                placeholder="Name of item to be purchased" aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">Name</label>
                        </div>
                        @error('name')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="col">
                        <div class="form-floating form-floating-outline mb-6">
                            <select wire:model="company" class="form-select @error('company')is-invalid @enderror"
                                id="exampleFormControlSelect1" aria-label="Default select example">
                                <option value="" selected>Select a Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            <label for="exampleFormControlSelect1">Company</label>
                            @error('company')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-floating form-floating-outline">
                        <input autocomplete="off" wire:model="note" type="text"
                            class="form-control @error('note')is-invalid @enderror" id="floatingInput"
                            placeholder="Notes..." aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Notes</label>
                    </div>
                    @error('note')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="row text-center mt-8">

                    <div x-show="isEditing">
                        <button class="btn btn-primary waves-effect waves-light" style="width: 100px">
                            <span class="tf-icons ri-save-3-line me-1_5"></span>Save
                        </button>
                        &nbsp;
                        <button type="button" @click="isEditing = ! isEditing"
                            class="btn btn-dark waves-effect waves-light" style="width: 100px">
                            <span class="tf-icons ri-close-circle-line me-1_5"></span>Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>



        <div class="divider" style="margin-top: 40px">
            <div class="divider-text">
                <i class="fa-solid fa-file-invoice-dollar fs-4"></i>
            </div>
        </div>

        <div class="row">
            <h4 class="text-center fw-bold">Purchase Contracts</h4>
        </div>

        <div class="row mt-8">
            <table class="table table-hover table-bordered w-100">
                <thead>
                    <tr>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th class="text-center" style="width: 10%">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($contracts as $index => $contract)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($contract->start_date)->format('F jS, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($contract->end_date)->format('F jS, Y') }}</td>
                            <td class="text-center">

                                <a href="{{ route('purchase-contracts.view', $contract->id) }}" target="_blank"
                                    class="btn btn-primary">
                                    View
                                </a>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No contracts added</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
