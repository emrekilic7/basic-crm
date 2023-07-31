<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Edit extends Component
{
    use WithFileUploads;

    public $customer;
    public $avatar;
    public $provincesData, $selectedCity;

    public function mount()
    {
        $this->customer = Customer::withTrashed()->where('uuid', $this->customer)->firstOrFail();
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

    public function removeAvatar()
    {
        unlink(public_path('storage/'.$this->customer->avatar));
        $this->customer->avatar = null;
        $this->customer->save();
    }

    public function update()
    {
        $this->validate();

        $customerData = [
            'name' => $this->customer->name,
            'surname' => $this->customer->surname,
            'email' => $this->customer->email,
            'phone' => $this->customer->phone,
            'address' => $this->customer->address,
            'province' => $this->selectedCity,
            'district' => $this->customer->district,
        ];

        if($this->avatar){
            if($this->customer->avatar){
                unlink(public_path('storage/'.$this->customer->avatar));
            }
            $fileHashName = $this->avatar->hashName();
            Image::make($this->avatar)->encode('webp', 90)->save(public_path('storage/images/customers/'.$fileHashName. '.webp'));
            $customerData['avatar'] = 'images/customers/'.$fileHashName. '.webp';
        }

        $this->customer->update($customerData);

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
