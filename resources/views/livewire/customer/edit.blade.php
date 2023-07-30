<div class="container mx-auto p-4 w-full">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto lg:py-16">
            <div class="flex justify-between">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit customer</h2>
                <livewire:customer.destroy :customer="$customer" />
            </div>
            <form wire:submit.prevent="update" id="updateCustomer">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-1">
                        <x-form.label for="customer.name" value="{{ __('Name') }}" />
                        <x-form.input wire:model="customer.name" id="customer.name" type="text" placeholder="John" autocomplete="off" required/>
                        <x-form.input-error for='customer.name' />
                    </div>

                    <div class="sm:col-span-1">
                        <x-form.label for="customer.surname" value="{{ __('Surname') }}" />
                        <x-form.input wire:model="customer.surname" id="customer.surname" type="text" placeholder="Doe" autocomplete="off"/>
                        <x-form.input-error for='customer.surname' />
                    </div>

                    <div class="sm:col-span-1">
                        <x-form.label for="customer.email" value="{{ __('E-Mail Address') }}" />
                        <x-form.input wire:model="customer.email" id="customer.email" type="customer.email" placeholder="john@example.com" autocomplete="off"/>
                        <x-form.input-error for='customer.email' />
                    </div>

                    <div class="sm:col-span-1">
                        <x-form.label for="customer.phone" value="{{ __('Phone') }}" />
                        <x-form.input wire:model="customer.phone" id="customer.phone" type="text" autocomplete="off"/>
                        <x-form.input-error for='customer.phone' />
                    </div>

                    <div class="sm:col-span-2">
                        <x-form.label for="customer.address" value="{{ __('Address') }}" />
                        <x-form.textarea wire:model="customer.address" id="customer.address" rows="4" />
                        <x-form.input-error for='customer.address' />
                    </div>

                    <div class="sm:col-span-1">
                        <x-form.label for="city" value="{{ __('City') }}" />

                        <x-form.select wire:model="selectedCity" id="city">
                            <option value="">Select a city</option>
                            @foreach ($provincesData as $city)
                                <option value="{{ $city['plaka_kodu'] }}">{{ $city['il_adi'] }}</option>
                            @endforeach
                        </x-form.select>
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="district">District:</x-form.label>
                        <x-form.select wire:model="customer.district" id="district">
                            <option value="">Select a district</option>
                            @foreach ($provincesData as $city)
                                @if ($city['plaka_kodu'] === $selectedCity)
                                    @foreach ($city['ilceler'] as $district)
                                        <?php
                                            $formattedDistrict = mb_strtolower($district['ilce_adi'], 'UTF-8');
                                            $formattedDistrict = ucfirst($formattedDistrict);
                                        ?>
                                        <option value="{{ $district['ilce_kodu'] }}">{{ $formattedDistrict }}</option>
                                    @endforeach
                                @endif
                            @endforeach
                        </x-form.select>
                    </div>

                    {{-- <div class="sm:col-span-2">
                        <x-form.label for="customer.avatar" value="{{ __('Avatar') }}" />
                        <x-form.file wire:model="customer.avatar" id="customer.avatar" accept=".jpg, .jpeg, .png, .webp" />
                    </div> --}}
                </div>
                <x-button.primary class="mt-4" wire:target="update" form="updateCustomer">Edit customer</x-button.primary>
            </form>
        </div>
      </section>
</div>