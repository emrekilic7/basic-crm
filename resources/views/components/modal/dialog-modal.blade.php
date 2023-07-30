@props(['id' => null, 'maxWidth' => null])

<x-modal.modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="relative p-4 bg-white rounded-lg border border-gray-700 shadow dark:bg-gray-800 sm:p-5">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ $title ?? '' }}
            </h3>
        </div>
        {{ $content }}
    </div>
</x-modal.modal>