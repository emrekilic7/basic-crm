<div class="container mx-auto p-4 w-full">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto lg:py-16"
        x-data="{ isUploading: false}"
        x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">
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

                    <div class="sm:col-span-2">
                        <x-form.label for="customer.avatar" value="{{ __('Avatar') }}" />
                        <div class="space-y-8 md:space-y-0 md:space-x-8 md:flex md:items-center mb-4">
                            <div class="flex items-center justify-center w-full h-48 bg-gray-300 rounded sm:w-96 dark:bg-gray-700">
                                @if(!$customer->avatar)
                                <svg class="w-10 h-10 text-gray-200 dark:text-gray-600 animate-pulse" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                                </svg>
                                @else
                                    <img src="{{ $customer->src }}" alt="avatar" class="w-full h-full rounded">
                                @endif
                            </div>
                            @if($customer->avatar)
                                <x-button.danger type="button" wire:click="removeAvatar" wire:loading.attr="disabled" wire:target="removeAvatar" class="w-full sm:w-auto">Remove avatar</x-button.danger>
                            @endif
                        </div>
                        <x-form.file wire:model="avatar" id="avatar" accept=".jpg, .jpeg, .png, .webp" />
                    </div>
                </div>
                <x-button.primary x-bind:disabled="isUploading" x-text="isUploading ? 'Processing...' : 'Edit customer'" wire:loading.attr="disabled" class="mt-4" wire:target="update" form="updateCustomer"></x-button.primary>
            </form>
        </div>
    </section>
</div>