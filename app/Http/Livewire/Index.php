<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;

class Index extends Component
{
    public function render()
    {
        return view('livewire.index', [
            'totalCustomers' => Customer::count()
        ]);
    }
}
