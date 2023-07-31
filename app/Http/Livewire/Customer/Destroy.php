<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Destroy extends Component
{
    public $customer;
    public $openModal = false;

    public function openModalToDestroyCustomer()
    {
        $this->openModal = true;
    }

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

    public function restore()
    {
        $this->customer->restore();

        $this->dispatchBrowserEvent('restored', [
            'title'     => 'Customer successfully restored.',
            'icon'      => 'success',
            'iconColor' => 'green',
        ]);
    }

    public function render()
    {
        return view('livewire.customer.destroy');
    }
}
