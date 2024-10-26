<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Details Hotel') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($hotel->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]" loading="lazy">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{ $hotel->name }}
                            </h3>
                            <p class="text-slate-500 text-sm">
                                {{ $hotel->City->name }},{{ $hotel->Country->name }}
                            </p>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Price</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Rp {{ number_format($hotel->getLowestRoomPrice(), 0, ',', '.') }}/night
                        </h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Star</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            {{ $hotel->star_level }} star
                        </h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{route('admin.hotels.edit', $hotel)}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action="{{ route('admin.hotels.destroy', $hotel) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <hr class="my-5">
                <h3 class="text-indigo-950 text-xl font-bold">Gallery Photos</h3>

                <div class="flex flex-row gap-x-5">
                    @foreach($latesPhotos as $photo)
                    <img src="{{ Storage::url($photo->photo) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]" loading="lazy">
                    @endforeach
                </div>
                <iframe src="https://www.google.com/maps/embed?{{ $hotel->link_gmaps }}" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div>
                    <h3 class="text-indigo-950 text-xl font-bold">Address</h3>
                    <p>
                        {{ $hotel->address }}
                    </p>
                </div>

                <hr class="my-5">
                <div class="flex flex-row justify-between items-center">
                    <h3 class="text-indigo-950 text-xl font-bold">Rooms Available</h3>
                    <a href="{{ route('admin.hotel_rooms.create', $hotel->slug) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                        Add New Room
                    </a>
                </div>
                @forelse($hotel->rooms as $room)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($room->photo) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]" loading="lazy">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{ $room->name }}
                            </h3>
                            <p class="text-slate-500 text-sm">
                                {{ $room->total_people }} people
                            </p>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Price</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Rp {{ number_format($room->price, 0, ',', '.') }}/night
                        </h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.hotel_rooms.edit', [$hotel->slug, $room]) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action="{{ route('admin.hotel_rooms.destroy', [$hotel->slug, $room]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p>
                    tidak ada data kamar
                </p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
