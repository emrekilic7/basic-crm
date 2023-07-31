<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'created_at';
    public $sortAsc = 0;
    public $isDeleted = 0;

    protected $listeners = ['saved' => '$refresh'];

    public function render()
    {
        return view('livewire.customer.index', [
            'customers' => Customer::search($this->search, $this->isDeleted)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
