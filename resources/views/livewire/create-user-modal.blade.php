<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createUserModalLabel" style="color: black; text-align:center">Create User
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="createUser" action="">
                <div class="modal-body" style="color: black">

                    <div class="row">

                        <div class="form-floating form-floating-outline">
                            <input required wire:model.live="fname" type="text" class="form-control"
                                autocomplete="off" id="fnameInput" placeholder="John"
                                aria-describedby="fnameInputHelp" />
                            <label for="fnameInput">First Name</label>
                        </div>

                    </div>

                    <div class="row mt-4">

                        <div class="form-floating form-floating-outline">
                            <input required wire:model.live="lname" type="text" class="form-control"
                                autocomplete="off" id="lnameInput" placeholder="Doe"
                                aria-describedby="lnameInputHelp" />
                            <label for="lnameInput">Last Name</label>
                        </div>

                    </div>

                    <div class="row mt-4">
                        <div class="form-floating form-floating-outline">
                            <input required wire:model="username" type="text"
                                class="form-control @error('username')is-invalid @enderror" autocomplete="off"
                                id="usernameInput" placeholder="firstname.lastname"
                                aria-describedby="usernameInputHelp" />
                            <label for="usernameInput">Username</label>
                        </div>
                        @error('username')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="row mt-4">
                        <div class="form-floating form-floating-outline">
                            <input required wire:model="email" type="email"
                                class="form-control @error('email')is-invalid @enderror" autocomplete="off"
                                id="emailInput" placeholder="mail@mail.com" aria-describedby="emailInputHelp" />
                            <label for="emailInput">Email</label>
                        </div>
                        @error('email')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="row mt-4">
                        <div class="">
                            <select required wire:model="role_id"
                                class="form-select @error('role_id')is-invalid @enderror" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <option value="">Select a Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role_id')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>




                </div>
                <div class="modal-footer" style="align-items: center">
                    <div style="margin:auto">
                        <button class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
