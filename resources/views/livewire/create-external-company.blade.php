<div>
    <div class="card">
        <div class="card-body">
            
            <div class="d-sm-flex align-items-center justify-content-between mb-5">
                <a href="{{route('external-companies.index')}}" class="btn btn-primary">
                    <i class="ri-arrow-left-circle-line me-1"></i> Back
                </a>
                <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
                    <strong style="margin-right: 90px"><i class="ri-hotel-fill fs-3"></i> Create External Company</strong>
                </h1>
            </div>
            <div class="row mt-8">

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                          type="text"
                          class="form-control"
                          id="floatingInput"
                          placeholder="John Doe"
                          aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Company Name</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                          type="email"
                          class="form-control"
                          id="floatingInput"
                          placeholder="mail@mail.com"
                          aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Email</label>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5">

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                          type="text"
                          class="form-control"
                          id="floatingInput"
                          placeholder="#1 Park Street, Port of Spain"
                          aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Address Line 1</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                          type="text"
                          class="form-control"
                          id="floatingInput"
                          placeholder="#2 Park Street, Port of Spain"
                          aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Address Line 2</label>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5">

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                          type="text"
                          class="form-control"
                          id="floatingInput"
                          placeholder="222-3333"
                          aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Phone #1</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                          type="text"
                          class="form-control"
                          id="floatingInput"
                          placeholder="222-3333"
                          aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Phone #2</label>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5">

                <div class="col">
                    <div class="form-floating form-floating-outline">
                        <input
                          type="text"
                          class="form-control"
                          id="floatingInput"
                          placeholder="Note"
                          aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Note</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-check form-switch mb-2">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                      <label class="form-check-label" for="flexSwitchCheckChecked"
                        >Active</label
                      >
                    </div>
                </div>
            </div>
            
            <div class="divider" style="margin-top: 40px">
                <div class="divider-text">
                    <i class="ri-user-add-fill fs-5"></i>
                </div>
              </div>
            
            <div class="row mt-8">
                <a href="{{route('external-companies.create')}}" class="btn btn-primary waves-effect waves-light w-25 m-auto">
                    <span class="tf-icons ri-user-add-line me-1_5"></span>Add Contact
                </a>
            </div>
        </div>
    </div>
</div>
