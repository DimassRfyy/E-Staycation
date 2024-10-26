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
            <div id="Menu-bar" class="fixed bottom-[24px] px-[18px] max-w-[640px] w-full z-30">
                <div class="bg-white p-[14px_12px] rounded-full flex items-center justify-center gap-8 shadow-[0_8px_30px_0_#0A093212]">
                    <a href="{{ route('front.index') }}">
                        <div class="flex flex-col gap-1 items-center">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{asset('assets/images/icons/home-nonactive.svg')}}" alt="icon">
                            </div>
                            <p class="text-xs leading-[18px] font-semibold text-[#757C98]">Home</p>
                        </div>
                    </a>
                    <a href="{{route('front.hotels')}}">
                        <div class="flex flex-col gap-1 items-center">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{asset('assets/images/icons/search-nonactive.svg')}}" alt="icon">
                            </div>
                            <p class="text-xs leading-[18px] font-medium text-[#757C98]">Search</p>
                        </div>
                    </a>
                    <a href="{{ route('dashboard.my-bookings') }}">
                        <div class="flex flex-col gap-1 items-center">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{asset('assets/images/icons/activity-nonactive.svg')}}" alt="icon">
                            </div>
                            <p class="text-xs leading-[18px] font-medium text-[#757C98]">Activity</p>
                        </div>
                    </a>
                    <a href="{{ route('dashboard') }}">
                        <div class="flex flex-col gap-1 items-center">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{asset('assets/images/icons/settings-active.svg')}}" alt="icon">
                            </div>
                            <p class="text-xs leading-[18px] font-medium text-[#4041DA]">Settings</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
