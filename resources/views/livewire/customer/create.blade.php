<div>
    <x-button.primary type="button" wire:click="openModalToCreateCustomer" wire:loading.attr="disabled" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __("New Customer") }}</x-button.primary>

    <x-modal.dialog-modal wire:model="openModal">
        <x-slot name="title">
            {{ __("New Customer") }}
        </x-slot>
        <x-slot name="content">
            <form wire:submit.prevent="store" id="createCustomer">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <x-form.label for="name" value="{{ __('Name') }}" />
                        <x-form.input wire:model.debounce.500ms="name" id="name" type="text" placeholder="John" autocomplete="off" required/>
                        <x-form.input-error for='name' />
                    </div>

                    <div class="sm:col-span-1">
                        <x-form.label for="surname" value="{{ __('Surname') }}" />
                        <x-form.input wire:model="surname" id="surname" type="text" placeholder="Doe" autocomplete="off"/>
                        <x-form.input-error for='surname' />
                    </div>

                    <div class="sm:col-span-1">
                        <x-form.label for="email" value="{{ __('E-Mail Address') }}" />
                        <x-form.input wire:model="email" id="email" type="email" placeholder="john@example.com" autocomplete="off"/>
                        <x-form.input-error for='email' />
                    </div>

                    <div class="sm:col-span-1">
                        <x-form.label for="phone" value="{{ __('Phone') }}" />
                        <x-form.input wire:model="phone" id="phone" type="text" autocomplete="off"/>
                        <x-form.input-error for='phone' />
                    </div>

                    <div class="sm:col-span-2">
                        <x-form.label for="address" value="{{ __('Address') }}" />
                        <x-form.textarea wire:model="address" id="address" rows="4" />
                        <x-form.input-error for='address' />
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
                        <x-form.select wire:model="district" id="district">
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
                        <x-form.label for="avatar" value="{{ __('Avatar') }}" />
                        <x-form.file wire:model="avatar" id="avatar" accept=".jpg, .jpeg, .png, .webp" />
                    </div>
                </div>
                <x-button.primary wire:target="store" type="submit" form="createCustomer">
                    <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    {{ __("Save") }}
                </x-button.primary>

                <x-button.secondary wire:click.prevent="$toggle('openModal')">
                    <svg  class="mr-1 -ml-1 w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    {{ __('Cancel') }}
                </x-button.secondary>
            </form>
        </x-slot>
    </x-modal.dialog-modal>
</div>