<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Create extends Component
{
    use WithFileUploads;

    public $name, $surname, $email, $avatar, $phone, $address, $district;
    public $provincesData, $selectedCity;
    public $openModal = false;

    public function mount()
    {
        $this->getProvincesData();
    }

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'nullable|email',
        'avatar' => 'nullable|image',
    ];

    public function getProvincesData()
    {
        $this->provincesData = json_decode(file_get_contents(public_path('il-ilce.json')), true)['data'];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function openModalToCreateCustomer()
    {
        $this->resetErrorBag();
        $this->openModal = true;
    }

    public function store()
    {
        $this->validate();

        if($this->avatar){
            $fileHashName = $this->avatar->hashName();
            Image::make($this->avatar)->encode('webp', 90)->save(public_path('storage/images/customers/'.$fileHashName. '.webp'));
        }

        Customer::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'avatar' => $this->avatar ? 'images/customers/'.$fileHashName. '.webp' : null,
            'phone' => $this->phone,
            'address' => $this->address,
            'province' => $this->selectedCity,
            'district' => $this->district,
        ]);

        $this->dispatchBrowserEvent('created', [
            'title'     => 'Customer successfully created.',
            'icon'      => 'success',
            'iconColor' => 'green',
        ]);

        $this->reset();
        $this->emit('saved');
        $this->getProvincesData();
    }

    public function render()
    {
        return view('livewire.customer.create');
    }
}
