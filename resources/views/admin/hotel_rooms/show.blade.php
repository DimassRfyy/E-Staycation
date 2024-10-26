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
                        <img src=" " alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">
                                asdsad
                            </h3>
                        <p class="text-slate-500 text-sm">
                            asdasdsa, asadsda
                        </p>
                        </div>
                    </div>
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Price</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Rp 1/night
                        </h3>
                    </div>
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Star</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            2 star
                        </h3>
                    </div>  
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href=" " class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action=" " method="POST">
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <hr class="my-5">
                <h3 class="text-indigo-950 text-xl font-bold">Gallery Photos</h3>

                <div class="flex flex-row gap-x-5">
                        <img src=" " alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">

                </div>

                <div>
                    <h3 class="text-indigo-950 text-xl font-bold">Address</h3>
                <p>
                    sadsasa asdasd 12
                </p>
                </div>

                <hr class="my-5">
                <div class="flex flex-row justify-between items-center">
                    <h3 class="text-indigo-950 text-xl font-bold">Rooms Available</h3>
                    <a href=" " class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                        Add New Room
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
