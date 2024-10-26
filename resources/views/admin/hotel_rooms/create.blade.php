<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Hotel Room') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($hotel->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">

                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{ $hotel->name }}
                            </h3>
                            <p class="text-slate-500 text-sm">
                                {{ $hotel->City->name }}, {{ $hotel->Country->name }}
                            </p>
                        </div>
                    </div>
                </div>

                <hr class="my-5">

                <form method="POST" action="{{ route('admin.hotel_rooms.store',$hotel->slug) }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="photo" :value="__('photo')" />
                        <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" required autofocus autocomplete="photo" />
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="price" :value="__('price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="total_people" :value="__('total_people')" />
                        <x-text-input id="total_people" class="block mt-1 w-full" type="number" name="total_people" :value="old('total_people')" required autofocus autocomplete="total_people" />
                        <x-input-error :messages="$errors->get('total_people')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Hotel Room
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
