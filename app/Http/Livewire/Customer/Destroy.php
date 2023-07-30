<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Destroy extends Component
{
    public $customer;

    public function destroy()
    {
        $this->customer->delete();

        $this->dispatchBrowserEvent('deleted', [
            'title'     => 'Customer successfully deactivated.',
            'icon'      => 'success',
            'iconColor' => 'green',
        ]);

        return redirect()->route('customer.index');
    }

    public function render()
    {
        return view('livewire.customer.destroy');
    }
}
