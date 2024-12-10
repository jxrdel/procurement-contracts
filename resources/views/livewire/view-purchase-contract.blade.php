@assets
    <!-- default styles -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all"
        rel="stylesheet" type="text/css" />

    <!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme CSS files as mentioned below (and change the theme property of the plugin) -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all"
        rel="stylesheet" type="text/css" />

    <!-- important mandatory libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js"
        type="text/javascript"></script>

    <!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme JS files as mentioned below (and change the theme property of the plugin) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script>

    <!-- optionally if you need translation for your language then include locale file as mentioned below (replace LANG.js with your own locale file) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/LANG.js"></script>
@endassets

<div x-data="{
    rating: $wire.entangle('rating'),
    contract_type: $wire.entangle('contract_type'),
    is_custom_notification: $wire.entangle('is_custom_notification'),

}" x-cloak>
    @include('livewire.add-notification-modal')
    <form wire:submit.prevent="save">
        <div class="card">
            <div class="card-body">

                <div class="d-sm-flex align-items-center justify-content-between mb-5">
                    <a href="{{ route('purchase-contracts.index') }}" class="btn btn-primary">
                        <i class="ri-arrow-left-circle-line me-1"></i> Back
                    </a>
                    <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
                        <strong style="margin-right: 90px"><i class="fa-solid fa-file-invoice-dollar"></i>
                            &nbsp;{{ $this->contract->purchase->name }}</strong>
                    </h1>
                </div>

                <div class="row mt-8">

                    <div class="col">
                        <div class="form-floating form-floating-outline mb-6">
                            <select wire:model="purchase_id"
                                class="form-select @error('purchase_id')is-invalid @enderror"
                                id="exampleFormControlSelect1" aria-label="Default select example">
                                <option value="" selected>Select a Purchase</option>
                                @foreach ($purchases as $purchase)
                                    <option value="{{ $purchase->id }}">{{ $purchase->name }}</option>
                                @endforeach
                            </select>
                            <label for="exampleFormControlSelect1">Purchase</label>
                            @error('purchase_id')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col" wire:ignore>
                        <input wire:model="rating" id="input-4" name="input-4" class="rating rating-loading"
                            data-show-clear="false" data-show-caption="true" onchange="setRating(this.value)">
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="form-floating form-floating-outline">
                            <input autocomplete="off" wire:model="file_name" type="text"
                                class="form-control @error('file_name')is-invalid @enderror" id="floatingInput"
                                placeholder="ex. ICT Purchases" aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">File Name</label>
                        </div>
                        @error('file_name')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="col">
                        <div class="form-floating form-floating-outline">
                            <input autocomplete="off" wire:model="file_number" type="text"
                                class="form-control @error('file_number')is-invalid @enderror" id="floatingInput"
                                placeholder="ex. 46/11/11" aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">File Number</label>
                        </div>
                        @error('file_number')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-7">
                    <div class="col-md-6">
                        <div wire:ignore>
                            <label style="width:100%" for="unitSelect">Assigned To:</label>

                            <select id="assigned_to" multiple style="margin-left:50px;width:100%">
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->fname }} {{ $employee->lname }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        @error('assigned_to')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>


                    <div class="col">
                        <div class="btn-group mt-4" role="group" aria-label="Basic radio toggle button group">
                            <input disabled wire:model.live="contract_type" value="continuous" type="radio"
                                class="btn-check" name="btnradio" id="btnradioContinuous" checked />
                            <label class="btn btn-outline-primary" for="btnradioContinuous">Continuous </label>
                            <input disabled wire:model.live="contract_type" value="expires" type="radio"
                                class="btn-check" name="btnradio" id="btnradioExpires" />
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
                        <div x-show="contract_type === 'expires'" x-transition x-cloak>
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
                            <input wire:model="cost" class="form-control @error('cost')is-invalid @enderror"
                                type="number" placeholder="0.00" id="html5-number-input" />
                            <label for="html5-number-input">Cost</label>
                            @error('cost')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                    </div>

                    <div class="col">
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
                </div>


                <div class="divider" style="margin-top: 40px">
                    <div class="divider-text">
                        <i class="fa-solid fa-bell fs-4"></i>
                    </div>
                </div>

                <div class="row">
                    <h4 class="text-center fw-bold">Notifications</h4>
                </div>

                @if ($errors->has('notifiedusers') || $errors->has('notifications'))
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->get('notifiedusers') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            @foreach ($errors->get('notifications') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div wire:ignore class="col mx-5" style="display: flex">
                        <label style="margin-top: 5px" for="title">Users to Notify: &nbsp;</label>
                        <select id="notifiedUsers" multiple style="margin-left:50px;width:85%">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->fname }} {{ $employee->lname }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

                {{-- <div class="row" style="margin-top: 30px">
                    <div class="col" style="text-align: center;padding-bottom:10px">

                        <label for="title">Add Notification &nbsp;</label>
                        <input wire:model="notification_date" type="date" class="form-control"
                            style="display: inline;width: 400px">
                        <button wire:click.prevent="addNotification()" class="btn btn-primary"
                            style="width: 12rem"><i class="fas fa-plus me-2"></i> Add Notification</button>
                    </div>
                </div> --}}
                <div class="row mt-4">
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addNotificationModal"
                        class="btn btn-primary waves-effect waves-light w-25 m-auto">
                        <span class="tf-icons ri-file-add-line me-1_5"></span>Add Notification
                    </a>
                </div>

                <div class="row mt-4">
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
                                    <td>{{ \Carbon\Carbon::parse($notification['display_date'])->format('F jS, Y') }}
                                    </td>
                                    <td style="text-align: center"><button
                                            wire:confirm="Are you sure you want to delete this notification?"
                                            wire:click="removeNotification({{ $index }})" type="button"
                                            class="btn btn-outline-danger"><i class="ri-delete-bin-fill"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" style="text-align: center">No Notifications Added</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


                <div class="divider" style="margin-top: 40px">
                    <div class="divider-text">
                        <i class="fa-solid fa-file-arrow-up fs-4"></i>
                    </div>
                </div>

                <div class="row">
                    <h4 class="text-center fw-bold">File Uploads</h4>
                </div>


                <div class="row">
                    <div class="col" style="text-align: center;padding-bottom:10px">
                        @error('upload')
                            <div class="text-danger fw-bold"> {{ $message }} </div>
                        @enderror

                        <input wire:model="upload" type="file" class="form-control"
                            style="display: inline;width: 400px;height:45px">
                        <button wire:click.prevent="uploadFile()" class="btn btn-primary"
                            wire:loading.attr="disabled" wire:target="upload" style="width: 8rem"><i
                                class="fas fa-plus me-2"></i> Upload</button>
                        <span wire:loading wire:target="upload">Uploading...</span>
                    </div>
                </div>

                <div class="row ">

                    <div class="demo-inline-spacing d-flex justify-content-center align-items-center">
                        <div class="list-group list-group-flush" style="width: 500px">

                            @forelse ($uploads as $upload)
                                <div class="list-group list-group-flush list-group-item-action"
                                    style="width: 100%;cursor: default;">
                                    <div class="list-group-item d-flex justify-content-between align-items-center"
                                        style="border: none;">
                                        <a class="text-dark text-decoration-underline"
                                            href="{{ Storage::url($upload->file_path) }}"
                                            target="_blank">{{ $upload->file_name }}</a>
                                        {{-- <button type="button" class="btn btn-danger">
                                                <i class="ri-delete-bin-2-line me-1"></i> Delete
                                            </button> --}}
                                        <a href="javascript:void(0)"
                                            wire:confirm="Are you sure you want to delete this file?"
                                            wire:click="deleteFile({{ $upload->id }})">
                                            <i class="ri-close-large-line text-danger fw-bold"></i>
                                        </a>

                                    </div>
                                </div>
                            @empty
                                <div class="list-group list-group-flush list-group-item-action"
                                    style="width: 100%;cursor: default;">
                                    <div class="list-group-item" style="border: none;">
                                        <p class="text-center">No files uploaded</p>

                                    </div>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>

                <div class="row mt-8">
                    <button wire:loading.attr="disabled" class="btn btn-primary waves-effect waves-light m-auto"
                        style="width: 100px">
                        <span class="tf-icons ri-save-3-line me-1_5"></span>Save
                    </button>
                </div>


            </div>
        </div>
    </form>
</div>

@section('scripts')
    <script>
        function setRating(value) {
            Livewire.dispatch('set-rating', {
                rating: value
            });
        }
    </script>
@endsection

@script
    <script>
        $(document).ready(function() {
            // Initialize select2

            $('#assigned_to').select2();
            $('#assigned_to').val(@json($this->assigned_to)).trigger('change');
            $wire.set('editedAssignedTo', []); // Initiates value to an empty array
            $wire.set('isEditedAssignedTo', false); // Set the flag to false


            $('#assigned_to').on('change', function() {
                var selectedValues = $(this).val(); // Get selected values as an array
                $wire.set('editedAssignedTo', selectedValues); // Pass selected values to Livewire
                $wire.set('isEditedAssignedTo', true); // Set the flag to false
            });

            $('#notifiedUsers').select2();
            $('#notifiedUsers').val(@json($this->notifiedusers)).trigger('change');
            $wire.set('editedNotifiedUsers', []); // Initiates value to an empty array
            $wire.set('isEditedNotifiedUsers', false); // Set the flag to false

            $('#notifiedUsers').on('change', function() {
                var selectedValues = $(this).val(); // Get selected values as an array
                $wire.set('editedNotifiedUsers', selectedValues); // Pass selected values to Livewire
                $wire.set('isEditedNotifiedUsers', true); // Set the flag to false
            });

            window.addEventListener('close-notification-modal', event => {
                $('#addNotificationModal').modal('hide');
            })

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
