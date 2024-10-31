<div x-data="{ contracttype: $wire.entangle('contracttype') }" x-cloak>
    <div class="card">
        <div class="card-body">

            <div class="d-sm-flex align-items-center justify-content-between mb-5">
                <a href="{{ route('purchases.index') }}" class="btn btn-primary">
                    <i class="ri-arrow-left-circle-line me-1"></i> Back
                </a>
                <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
                    <strong style="margin-right: 90px"><i class="fa-solid fa-file-invoice-dollar"></i> &nbsp; Create
                        Purchase</strong>
                </h1>
            </div>

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
                    </div>
                    @error('company')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
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


            <div class="row mt-8">

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input autocomplete="off" wire:model="filename" type="text"
                            class="form-control @error('filename')is-invalid @enderror" id="floatingInput"
                            placeholder="ex. ICT Purchases" aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">File Name</label>
                    </div>
                    @error('filename')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input autocomplete="off" wire:model="filenumber" type="text"
                            class="form-control @error('filenumber')is-invalid @enderror" id="floatingInput"
                            placeholder="ex. 46/11/11" aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">File Number</label>
                    </div>
                    @error('filenumber')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="row mt-7">

                <div wire:ignore class="col" style="display: flex">
                    <label style="margin-top: 5px" for="title">Assigned To: &nbsp;</label>
                    <select id="assignedTo" multiple style="margin-left:50px;width:85%">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->fname }} {{ $employee->lname }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input wire:model.live="contracttype" value="continuous" type="radio" class="btn-check"
                            name="btnradio" id="btnradioContinuous" checked />
                        <label class="btn btn-outline-primary" for="btnradioContinuous">Continuous </label>
                        <input wire:model.live="contracttype" value="expires" type="radio" class="btn-check"
                            name="btnradio" id="btnradioExpires" />
                        <label class="btn btn-outline-primary" for="btnradioExpires">Expires</label>
                    </div>
                </div>
            </div>

            <div class="row mt-8">

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input autocomplete="off" wire:model="start_date" type="date"
                            class="form-control @error('start_date')is-invalid @enderror" id="floatingInput"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Start Date</label>
                    </div>
                    @error('start_date')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="col">
                    <div x-show="contracttype === 'expires'" x-transition x-cloak>
                        <div class="form-floating form-floating-outline">
                            <input autocomplete="off" wire:model="end_date" type="date"
                                class="form-control @error('end_date')is-invalid @enderror" id="floatingInput"
                                aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">End Date</label>
                        </div>
                        @error('end_date')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-7">
                <div class="col">
                    <div class="form-floating form-floating-outline mb-6">
                        <input wire:model="cost" class="form-control" type="number" placeholder="0.00"
                            id="html5-number-input" />
                        <label for="html5-number-input">Cost</label>
                    </div>
                    @error('cost')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror

                </div>

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input autocomplete="off" wire:model="contratnote" type="text"
                            class="form-control @error('contratnote')is-invalid @enderror" id="floatingInput"
                            placeholder="Notes..." aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Notes</label>
                    </div>
                    @error('contratnote')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
            </div>


            <div class="divider" style="margin-top: 40px">
                <div class="divider-text">
                    <i class="fa-solid fa-bell fs-4"></i>
                </div>
            </div>

            <div class="row">
                <h4 class="text-center fw-bold">Notifications</h4>
            </div>

            <div wire:ignore class="col" style="display: flex">
                <label style="margin-top: 5px" for="title">Users to Notify: &nbsp;</label>
                <select id="notifiedUsers" multiple style="margin-left:50px;width:85%">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->fname }} {{ $employee->lname }}</option>
                    @endforeach

                </select>
            </div>

            <div class="row" style="margin-top: 30px">
                <div class="col" style="text-align: center;padding-bottom:10px">

                    <label for="title">Add Notification &nbsp;</label>
                    <input wire:model="notification_date" type="date" class="form-control"
                        style="display: inline;width: 400px">
                    <button wire:click.prevent="addNotification()" class="btn btn-primary" style="width: 12rem"><i
                            class="fas fa-plus me-2"></i> Add Notification</button>
                </div>
            </div>

            <div class="row mt-2">
                <table id="notiTable" class="table table-hover table-bordered" style="width: 90%; margin:auto">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th style="width: 100px; text-align:center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->notifications as $index => $notification)
                            <tr>
                                <td>{{ $notification }}</td>
                                <td style="text-align: center"><button
                                        wire:click="removeNotification({{ $index }})" type="button"
                                        class="btn btn-outline-danger"><i class="bi bi-trash"></i></button></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="text-align: center">No Notifications Added</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $(document).ready(function() {
            // Initialize select2

            $('#assignedTo').select2();

            $('#assignedTo').on('change', function() {
                var selectedValues = $(this).val(); // Get selected values as an array
                $wire.set('assignedto', selectedValues); // Pass selected values to Livewire
            });

            $('#notifiedUsers').select2();

            $('#notifiedUsers').on('change', function() {
                var selectedValues = $(this).val(); // Get selected values as an array
                $wire.set('notifiedusers', selectedValues); // Pass selected values to Livewire
            });

            $wire.on('scrollToError', () => {
                // Wait for Livewire to finish rendering the error fields
                setTimeout(() => {
                    const firstErrorElement = document.querySelector('.is-invalid');
                    if (firstErrorElement) {
                        firstErrorElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        firstErrorElement.focus(); // Optional: Focus the field
                    }
                }, 100); // Adding a small delay (100ms) before scrolling
            });
            $wire.on('preserveScroll', () => {
                // You can store the current scroll position before the update
                const scrollY = window.scrollY;

                // Reapply the scroll position after the update
                setTimeout(() => {
                    window.scrollTo(0, scrollY);
                }, 100);
            });

        });
    </script>
@endscript
