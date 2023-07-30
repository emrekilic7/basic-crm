<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;

class Edit extends Component
{
    public Customer $customer;
    public $provincesData, $selectedCity;

    public function mount()
    {
        $this->selectedCity = $this->customer['province'];
        $this->getProvincesData();
    }

    protected $rules = [
        'customer.name' => 'required|min:3',
        'customer.surname' => 'nullable',
        'customer.phone' => 'nullable',
        'customer.address' => 'nullable',
        'customer.province' => 'nullable',
        'customer.district' => 'nullable',
        'customer.email' => 'nullable|email',
    ];

    public function getProvincesData()
    {
        $this->provincesData = json_decode(file_get_contents(public_path('il-ilce.json')), true)['data'];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $this->customer->update([
            'name' => $this->customer->name,
            'surname' => $this->customer->surname,
            'email' => $this->customer->email,
            'phone' => $this->customer->phone,
            'address' => $this->customer->address,
            'province' => $this->selectedCity,
            'district' => $this->customer->district,
        ]);

        $this->dispatchBrowserEvent('updated', [
            'title'     => 'Customer successfully updated.',
            'icon'      => 'success',
            'iconColor' => 'green',
        ]);
    }

    public function render()
    {
        return view('livewire.customer.edit');
    }
}
