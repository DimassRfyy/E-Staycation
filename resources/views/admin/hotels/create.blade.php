<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Hotel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{route('admin.hotels.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('thumbnail')" />
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="city" :value="__('city')" />

                        <select name="city_id" id="city_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose city</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="country" :value="__('country')" />

                        <select name="country_id" id="country_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose country</option>
                            @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="link_gmaps" :value="__('link_gmaps')" />
                        <x-text-input id="link_gmaps" class="block mt-1 w-full" type="text" name="link_gmaps" :value="old('link_gmaps')" required autofocus autocomplete="link_gmaps" />
                        <x-input-error :messages="$errors->get('link_gmaps')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="address" :value="__('address')" />
                        <textarea name="address" id="address" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full"></textarea>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="star_level" :value="__('star_level')" />
                        <x-text-input id="star_level" class="block mt-1 w-full" type="number" name="star_level" :value="old('star_level')" required autofocus autocomplete="star_level" />
                        <x-input-error :messages="$errors->get('star_level')" class="mt-2" />
                    </div>

                    <hr class="my-5">
                    @for($i=0; $i < 3 ; $i++)
                        <div class="mt-4">
                        <x-input-label for="photo" :value="__('photo')" />
                        <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photos[]" required autofocus autocomplete="photo" />
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>
                         @endfor

                    <div class="flex items-center justify-end mt-4">

                <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                    Add New Hotel
                </button>
            </div>
            </form>

        </div>
    </div>
    </div>
</x-app-layout>
