<div class="card border-primary">
    <div class="card-header bg-primary text-light">
        New Contact
        <button class="float-right btn btn-primary btn-sm font-weight-bold" wire:click="closeForm('createMode')">X</button>
    </div>

    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">Name</label>
            <div class="col-sm-10">
                <input wire:model="name" type="text" class="form-control" placeholder="John Doe">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="phone">Phone</label>
            <div class="col-sm-10">
                <input wire:model="phone" type="text" class="form-control" placeholder="09833838483">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button wire:click="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
