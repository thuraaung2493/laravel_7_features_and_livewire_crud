<div class="mt-3">
    @if (session('message'))
        <x-alert type="success">
            {{ session('message') }}
        </x-alert>
    @endif

    @if (count($errors) > 0)
        <x-alert type="danger">
            <strong>Failed </strong>invalid input. <br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif


    @if($updateMode)
        @include('livewire.contacts.update')
    @endif

    @if($createMode)
        @include('livewire.contacts.create')
    @endif

    @if(! $createMode && ! $updateMode)
        <button class="btn btn-primary" wire:click="create">Add New Contact</button>
    @endif
</div>
