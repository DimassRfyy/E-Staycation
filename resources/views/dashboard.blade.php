<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-center gap-3">
                    <a href="{{ route('profile.edit') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                        Edit Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
