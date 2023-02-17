<?php

namespace App\Http\Livewire\Clients;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClientsList extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '']
    ];

    public $search = '';
    public $perPage = '10';
    public $sort = 'code';
    public $direction = 'asc';

    public function render()
    {
        $clients = Client::businessName($this->search)
            ->orWhere->email($this->search)
            ->orWhere->code($this->search)
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->perPage);

        session([
            'search-1' => $this->search,
            'sort-1' => $this->sort,
            'direction-1' => $this->direction
        ]);

        return view('livewire.clients.clients-list', compact('clients'));
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            $this->direction = $this->direction == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
