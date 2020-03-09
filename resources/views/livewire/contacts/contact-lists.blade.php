<div>
    <div class="row">
        <div class="col form-inline">
            Per Page: &nbsp;
            <select wire:model="perPage" class="form-control">
                <option>10</option>
                <option>20</option>
                <option>30</option>
            </select>
        </div>
        <div class="col">
            <input class="form-control" type="text" wire:model.debounce.500ms="search" placeholder="search...">
        </div>
    </div>

    <div class="row">
        <table class="table my-3">
            <thead>
                <tr>
                    <th>
                        <a href="#" role="button" wire:click.prevent="sortBy('id')">
                            ID
                            @include('livewire.partials._sort', ['field' => 'id'])
                        </a>
                    </th>
                    <th>
                        <a href="#" role="button" wire:click.prevent="sortBy('name')">
                            NAME
                            @include('livewire.partials._sort', ['field' => 'name'])
                        </a>
                    </th>
                    <th>
                        <a href="#" role="button" wire:click.prevent="sortBy('phone')">
                            PHONE
                            @include('livewire.partials._sort', ['field' => 'phone'])
                        </a>
                    </th>
                    <th>
                        ACTION
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>
                            <button wire:click="$emit('edit', {{ $contact->id }})" class="btn btn-xs btn-warning">Edit</button>
                            <button wire:click="$emit('destroy', {{ $contact->id }})" class="btn btn-xs btn-danger">Del</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No data!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row no-gutters">
        <div class="col">
            {{ $contacts->links() }}
        </div>

        <div class="col text-right text-muted">
            Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} out of {{ $contacts->total() }} results
        </div>
    </div>
</div>
