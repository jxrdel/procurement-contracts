<div>
    <div class="card">
        <div class="card-body">
                
            <div class="d-sm-flex align-items-center justify-content-between mb-5">
                <a href="{{route('purchases.index')}}" class="btn btn-primary">
                    <i class="ri-arrow-left-circle-line me-1"></i> Back
                </a>
                <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
                    <strong style="margin-right: 90px"><i class="fa-solid fa-file-invoice-dollar"></i> &nbsp; Create Purchase</strong>
                </h1>
            </div>

            <div class="row mt-8">

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                        autocomplete="off"
                        wire:model="name"
                        type="text"
                        class="form-control @error('name')is-invalid @enderror"
                        id="floatingInput"
                        placeholder="Name of item to be purchased"
                        aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Name</label>
                    </div>
                    @error('name')<div class="text-danger"> {{ $message }} </div>@enderror
                </div>

                <div class="col">
                    <div class="form-floating form-floating-outline mb-6">
                      <select wire:model="company" class="form-select @error('company')is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option value="" selected>Select a Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name}}</option>
                        @endforeach
                      </select>
                      <label for="exampleFormControlSelect1">Company</label>
                    </div>
                    @error('company')<div class="text-danger"> {{ $message }} </div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="form-floating form-floating-outline">
                    <input
                    autocomplete="off"
                    wire:model="note"
                    type="text"
                    class="form-control @error('note')is-invalid @enderror"
                    id="floatingInput"
                    placeholder="Notes..."
                    aria-describedby="floatingInputHelp" />
                    <label for="floatingInput">Notes</label>
                </div>
                @error('note')<div class="text-danger"> {{ $message }} </div>@enderror
            </div>
            

            <div class="row mt-8">

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                        autocomplete="off"
                        wire:model="filename"
                        type="text"
                        class="form-control @error('filename')is-invalid @enderror"
                        id="floatingInput"
                        placeholder="ex. ICT Purchases"
                        aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">File Name</label>
                    </div>
                    @error('filename')<div class="text-danger"> {{ $message }} </div>@enderror
                </div>

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                        autocomplete="off"
                        wire:model="filenumber"
                        type="text"
                        class="form-control @error('filenumber')is-invalid @enderror"
                        id="floatingInput"
                        placeholder="ex. 46/11/11"
                        aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">File Number</label>
                    </div>
                    @error('filenumber')<div class="text-danger"> {{ $message }} </div>@enderror
                </div>
            </div>
            
            <div class="row mt-7">

                <div wire:ignore class="col" style="display: flex">
                    <label style="margin-top: 5px" for="title">Assigned To: &nbsp;</label>
                    <select id="assignedTo" multiple style="margin-left:50px;width:85%">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->fname}} {{ $employee->lname}}</option>
                        @endforeach
        
                    </select>
                </div>

                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input wire:model.live="contracttype" value="continuous" type="radio" class="btn-check" name="btnradio" id="btnradioContinuous" checked />
                      <label class="btn btn-outline-primary" for="btnradioContinuous">Continuous </label>
                      <input wire:model.live="contracttype" value="expires" type="radio" class="btn-check" name="btnradio" id="btnradioExpires" />
                      <label class="btn btn-outline-primary" for="btnradioExpires">Expires</label>
                    </div>
                </div>
            </div>

            <div class="row mt-8">

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                        autocomplete="off"
                        wire:model="startdate"
                        type="date"
                        class="form-control @error('startdate')is-invalid @enderror"
                        id="floatingInput"
                        aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Start Date</label>
                    </div>
                    @error('startdate')<div class="text-danger"> {{ $message }} </div>@enderror
                </div>

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                        autocomplete="off"
                        wire:model="enddate"
                        type="date"
                        class="form-control @error('enddate')is-invalid @enderror"
                        id="floatingInput"
                        aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">End Date</label>
                    </div>
                    @error('enddate')<div class="text-danger"> {{ $message }} </div>@enderror
                </div>
            </div>

            <div class="row mt-7">
                <div class="col">
                    <div class="form-floating form-floating-outline mb-6">
                      <input wire:model="cost" class="form-control" type="number" placeholder="0.00" id="html5-number-input" />
                      <label for="html5-number-input">Cost</label>
                    </div>
                    @error('cost')<div class="text-danger"> {{ $message }} </div>@enderror

                </div>

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                        autocomplete="off"
                        wire:model="contratnote"
                        type="text"
                        class="form-control @error('contratnote')is-invalid @enderror"
                        id="floatingInput"
                        placeholder="Notes..."
                        aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Notes</label>
                    </div>
                    @error('contratnote')<div class="text-danger"> {{ $message }} </div>@enderror
                </div>
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
        
        // $('#notifiedUsers').select2();
        
        // $('#notifiedUsers').on('change', function() {
        //     var selectedValues = $(this).val(); // Get selected values as an array
        //     $wire.set('empnotifications', selectedValues); // Pass selected values to Livewire
        // });
    });
    
    
    $wire.on('scrollToError', () => {
            // Wait for Livewire to finish rendering the error fields
            setTimeout(() => {
                const firstErrorElement = document.querySelector('.is-invalid');
                if (firstErrorElement) {
                    firstErrorElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstErrorElement.focus(); // Optional: Focus the field
                }
            }, 100); // Adding a small delay (100ms) before scrolling
        });
</script>
@endscript