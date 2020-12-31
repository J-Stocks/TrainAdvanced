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
                <div class="flex">
                    <a href="{{ $train->path('edit') }}" class="w-1/2 mr-1 select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base text-center leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
