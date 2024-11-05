<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addNotificationModal" tabindex="-1"
    aria-labelledby="addNotificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addNotificationModalLabel" style="color: black; text-align:center">Add
                    Log</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: black">

                <div class="row" style="margin-top:10px">
                    <div class="col-8">
                        <div class="form-floating form-floating-outline">
                            <input required wire:model="notification_date" type="date" class="form-control"
                                autocomplete="off" id="detailsInput" aria-describedby="detailsInputHelp" />
                            <label for="detailsInput">Date</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                wire:model="is_custom_notification" checked />
                            <label class="form-check-label" for="flexSwitchCheckChecked">Custom Notification</label>
                        </div>
                    </div>

                </div>

                <div class="row mt-5" x-show="is_custom_notification" x-transition>
                    <div class="form-floating form-floating-outline">
                        <input required wire:model="notification_message" type="text" class="form-control"
                            autocomplete="off" id="detailsInput" aria-describedby="detailsInputHelp" />
                        <label for="detailsInput">Custom Message</label>
                    </div>

                </div>

            </div>
            <div class="modal-footer" style="align-items: center">
                <div style="margin:auto">
                    <button wire:click="addNotification" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
