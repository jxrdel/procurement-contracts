<div x-data="{ isEditing: $wire.entangle('isEditing') }" x-cloak>
    @include('add-contact-modal')
    <form wire:submit.prevent="save">
        <div class="card">
            <div class="card-body">

                <div class="d-sm-flex align-items-center justify-content-between mb-5">
                    <a href="{{ route('external-companies.index') }}" class="btn btn-primary">
                        <i class="ri-arrow-left-circle-line me-1"></i> Back
                    </a>
                    <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
                        <strong style="margin-right: 90px"><i
                                class="ri-hotel-fill fs-3"></i>{{ $this->name }}</strong>
                    </h1>
                </div>

                <div x-show="!isEditing" x-transition>
                    <div class="row mt-8">

                        <div class="col mx-5">
                            <label><strong>Company Name: </strong>{{ $this->name }}</label>
                        </div>

                        <div class="col mx-5">
                            <label><strong>Email: </strong>{{ $this->email }}</label>
                        </div>
                    </div>

                    <div class="row mt-8">

                        <div class="col mx-5">
                            <label><strong>Address Line 1: </strong>{{ $this->address1 }}</label>
                        </div>

                        <div class="col mx-5">
                            <label><strong>Address Line 2: </strong>{{ $this->address2 }}</label>
                        </div>
                    </div>

                    <div class="row mt-8">

                        <div class="col mx-5">
                            <label><strong>Phone #1: </strong>{{ $this->phone1 }}</label>
                        </div>

                        <div class="col mx-5">
                            <label><strong>Phone #2: </strong>{{ $this->phone2 }}</label>
                        </div>
                    </div>

                    <div class="row mt-8">

                        <div class="col mx-5">
                            <label><strong>Note: </strong>{{ $this->note }}</label>
                        </div>

                        <div class="col mx-5">
                            <label><strong>Active: </strong><i
                                    class="{{ $this->is_active ? 'fa-solid fa-check' : 'fa-solid fa-xmark' }}"></i>
                            </label>
                        </div>
                    </div>


                    <div class="row text-center mt-8">
                        <div>
                            <button type="button" @click="isEditing = true"
                                class="btn btn-dark waves-effect waves-light" style="width: 100px">
                                <span class="tf-icons ri-edit-box-fill me-1_5"></span>Edit
                            </button>
                        </div>
                    </div>
                </div>

                <div id="editForm" x-show="isEditing" x-transition>
                    <div class="row mt-8">

                        <div class="col">
                            <div class="form-floating form-floating-outline">
                                <input autocomplete="off" wire:model="name" type="text"
                                    class="form-control @error('name')is-invalid @enderror" id="floatingInput"
                                    placeholder="John Doe" aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Company Name</label>
                            </div>
                            @error('name')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="form-floating form-floating-outline">
                                <input autocomplete="off" wire:model="email" type="email"
                                    class="form-control @error('email')is-invalid @enderror" id="floatingInput"
                                    placeholder="mail@mail.com" aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Email</label>
                            </div>
                            @error('email')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-5">

                        <div class="col">
                            <div class="form-floating form-floating-outline">
                                <input autocomplete="off" wire:model="address1" type="text"
                                    class="form-control @error('address1')is-invalid @enderror" id="floatingInput"
                                    placeholder="#1 Park Street, Port of Spain" aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Address Line 1</label>
                            </div>
                            @error('address1')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="form-floating form-floating-outline">
                                <input autocomplete="off" wire:model="address2" type="text" class="form-control"
                                    id="floatingInput" placeholder="#2 Park Street, Port of Spain"
                                    aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Address Line 2</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">

                        <div class="col">
                            <div class="form-floating form-floating-outline">
                                <input autocomplete="off" wire:model="phone1" type="text"
                                    class="form-control @error('phone1')is-invalid @enderror" id="floatingInput"
                                    placeholder="222-3333" aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Phone #1</label>
                            </div>
                            @error('phone1')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="form-floating form-floating-outline">
                                <input autocomplete="off" wire:model="phone2" type="text" class="form-control"
                                    id="floatingInput" placeholder="222-3333" aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Phone #2</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">

                        <div class="col">
                            <div class="form-floating form-floating-outline">
                                <input autocomplete="off" wire:model="note" type="text" class="form-control"
                                    id="floatingInput" placeholder="Note" aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Note</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                    wire:model="is_active" checked />
                                <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                            </div>
                        </div>
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
                </div>

                <div class="divider" style="margin-top: 40px">
                    <div class="divider-text">
                        <i class="ri-user-add-fill fs-5"></i>
                    </div>
                </div>

                <div class="row mt-8">
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addContactModal"
                        class="btn btn-primary waves-effect waves-light w-25 m-auto">
                        <span class="tf-icons ri-user-add-line me-1_5"></span>Add Contact
                    </a>
                </div>

                <div class="row mt-8">
                    <table class="table table-hover table-bordered w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($contacts as $index => $contact)
                                <tr>
                                    <td>{{ $contact->fname }} {{ $contact->lname }}</td>
                                    <td>{{ $contact->phone1 }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td class="text-center">

                                        <button wire:confirm="Are you sure you want to delete this contact?"
                                            wire:click="deleteContact({{ $contact->id }})" type="button"
                                            class="btn btn-danger">
                                            <i class="ri-delete-bin-2-line me-1"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No contacts added</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>

@script
    <script>
        window.addEventListener('close-contact-modal', event => {
            $('#addContactModal').modal('hide');
        })
    </script>
@endscript