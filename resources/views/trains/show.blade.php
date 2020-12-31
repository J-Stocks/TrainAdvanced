<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Train Details
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <div class="mb-2">
                    @include('_train')
                </div>
                <p class="mb-2">
                    In Production from {{ $train->production_start }} to {{ $train->production_end }}.
                </p>
                <p class="mb-2">
                    {{ $train->description }}
                </p>
                <p>
                    Last edited by {{ $train->editor->name ?? 'defunct user' }} at {{ $train->updated_at }}.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
