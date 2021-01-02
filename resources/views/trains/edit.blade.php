<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit the details of {{ $train->make_model }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <form
                    method="post"
                    action="{{ url($train->path) }}" class="inline-grid grid-cols-3 gap-2"
                    enctype="multipart/form-data"
                >
                    @method('PATCH')
                    @csrf
                    <div class="flex flex-col justify-center">
                        <label for="make">Make</label>
                    </div>
                    <input
                        class="border border-gray-700 rounded px-2 py-1  @error ('make') border border-red-500 @enderror"
                        type="text"
                        name="make"
                        id="make"
                        value="{{ $train->make }}"
                    />
                    <div>
                        @error ('make')
                            <p>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-center">
                        <label for="model">Model</label>
                    </div>
                    <input
                        class="border border-gray-700 rounded px-2 py-1  @error ('model') border border-red-500 @enderror"
                        type="text"
                        name="model"
                        id="model"
                        value="{{ $train->model }}"
                    />
                    <div>
                        @error ('model')
                            <p>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-center">
                        <label for="production_start">Production Started</label>
                    </div>
                    <input
                        class="border border-gray-700 rounded px-2 py-1  @error ('production_start') border border-red-500 @enderror"
                        type="date"
                        name="production_start"
                        id="production_start"
                        value="{{ $train->production_start }}"
                    />
                    <div>
                        @error ('production_start')
                            <p>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-center">
                        <label for="production_end">Production Ended</label>
                    </div>
                    <input
                        class="border border-gray-700 rounded px-2 py-1  @error ('production_end') border border-red-500 @enderror"
                        type="date"
                        name="production_end"
                        id="production_end"
                        value="{{ $train->production_end }}"
                    />
                    <div>
                        @error ('production_end')
                            <p>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-center">
                        <label for="description">Description</label>
                    </div>
                    <input
                        class="border border-gray-700 rounded px-2 py-1  @error ('description') border border-red-500 @enderror"
                        type="text"
                        name="description"
                        id="description"
                        value="{{ $train->description }}"
                    />
                    <div>
                        @error ('description')
                            <p>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-center">
                        <label for="image">Image</label>
                    </div>
                    <input
                        class="border border-gray-700 rounded px-1 py-1 @error ('image') border border-red-500 @enderror"
                        type="file"
                        name="image"
                        id="image"
                    />
                    <div>
                        @error ('image')
                            <p>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <button type="submit" class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base text-center leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
