<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Browse Trains
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                @if (count($trains) !== 0)
                    <div class="grid gap-2 xl:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                        @foreach ($trains as $train)
                            <div class="border border-indigo-400 rounded p-1 hover:bg-gray-200">
                                <a href="{{ url($train->path) }}">
                                    @include('_train')
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        {{ $trains->links() }}
                    </div>
                @else
                    <p>
                        We don't have any trains!
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
