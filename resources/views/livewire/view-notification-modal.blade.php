<!-- Modal -->
<div class="modal fade" id="viewNotificationModal" tabindex="-1" aria-labelledby="viewNotificationModalLabel"
    aria-hidden="true" style="color: black">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewNotificationModalLabel" style="color: black">{{ $this->itemname }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col">
                        <label>Item Name: {{ $this->itemname }}</label>
                    </div>
                    <div class="col">
                        <label>Display Date: {{ $this->display_date }}</label>
                    </div>
                </div>

                @if ($this->is_custom_notification)
                    <div class="row mt-8">
                        <div class="col">
                            <label>Custom Message: {{ $this->message }} </label>
                        </div>
                    </div>
                @endif

                <div class="accordion mt-8" id="accordionExample" style="margin-top: 15px">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Users to be Notified [{{ $this->notifieduserscount }}]
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse hide"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    @if ($this->notifiedusers !== null)
                                        @foreach ($this->notifiedusers as $user)
                                            <li>{{ $user->fname }} {{ $user->lname }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer" style="align-items: center">
                <div style="margin:auto">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
