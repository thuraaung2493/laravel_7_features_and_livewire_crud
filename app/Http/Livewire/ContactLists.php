<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactLists extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 10;
    public $sortAsc = true;
    public $sortField = 'id';

    protected $listeners = ['submitted'];

    protected $updatesQueryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function submitted()
    {
        $refresh = true;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        return view('livewire.contacts.contact-lists', [
            'contacts' => Contact::search($this->search)
                                 ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                                 ->paginate($this->perPage)
        ]);
    }
}
