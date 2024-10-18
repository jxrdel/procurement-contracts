
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createContactModal" tabindex="-1" aria-labelledby="createContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="createContactModalLabel" style="color: black; text-align:center">Create External Contact</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="createContact" action="">
            <div class="modal-body" style="color: black">

                <div class="row mt-2">
                    <div class="form-floating form-floating-outline mb-6">
                      <select required wire:model="company" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option value="" selected>Select a Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name}}</option>
                        @endforeach
                      </select>
                      <label for="exampleFormControlSelect1">Company</label>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col">
                        <div class="form-floating form-floating-outline">
                            <input
                            required
                            wire:model="firstname"
                            type="text"
                            class="form-control"
                            autocomplete="off"
                            id="floatingInput"
                            placeholder="John"
                            aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">First Name</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating form-floating-outline">
                            <input
                            required
                            wire:model="lastname"
                            type="text"
                            class="form-control"
                            autocomplete="off"
                            id="floatingInput"
                            placeholder="Doe"
                            aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">Last Name</label>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col">
                        <div class="form-floating form-floating-outline">
                            <input
                            required
                            wire:model="phone1"
                            type="text"
                            class="form-control"
                            autocomplete="off"
                            id="floatingInput"
                            placeholder="222-3333"
                            aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">Phone #1</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating form-floating-outline">
                            <input
                            wire:model="phone2"
                            type="text"
                            class="form-control"
                            autocomplete="off"
                            id="floatingInput"
                            placeholder="222-3333"
                            aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">Phone #2</label>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col">
                        <div class="form-floating form-floating-outline">
                            <input
                            wire:model="email"
                            type="email"
                            class="form-control"
                            autocomplete="off"
                            id="floatingInput"
                            placeholder="mail@mail.com"
                            aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">Email</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating form-floating-outline">
                            <input
                            wire:model="note"
                            type="text"
                            class="form-control"
                            autocomplete="off"
                            id="floatingInput"
                            placeholder="Note"
                            aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">Note</label>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col">
                        <div class="form-check form-switch mb-2">
                            <label class="form-check-label" for="contactSwitch"
                              >Active</label>
                          <input class="form-check-input" type="checkbox" id="contactSwitch" wire:model="isactive" checked />
                        </div>
                    </div>

                    <div class="col">
                    </div>

                </div>

            </div>
            <div class="modal-footer" style="align-items: center">
                <div style="margin:auto">
                    <button class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>