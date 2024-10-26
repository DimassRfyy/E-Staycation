@extends('../layouts/master')
@section('content')

<section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[184px] relative">
    <div class="w-full h-[249px] absolute top-0 bg-[linear-gradient(244.6deg,_#7545FB_14.17%,_#2A3FCC_92.43%)]">
    </div>
    <div class="relative z-10 flex flex-col gap-6 mt-[60px]">
        <div class="top-menu flex justify-between items-center px-[18px]">
            <a href="{{ route('dashboard.my-bookings') }}" class="">
                <div class="w-[42px] h-[42px] flex shrink-0">
                    <img src="{{asset('assets/images/icons/back.svg')}}" alt="icon">
                </div>
            </a>
            <p class="font-semibold text-lg leading-[28px] text-white text-center">Booking Details</span></p>
            <div class="dummy-spacer w-[42px] h-[42px] flex shrink-0">
            </div>
        </div>
        <div id="Details" class="group result-card-container flex flex-col gap-6">
            <div class="bg-white flex flex-col p-4 gap-6 rounded-xl mx-[18px]">
                <div id="Header" class="flex items-center justify-between gap-[2px]">
                    <p class="font-semibold">Hotel Details</p>
                    @if($hotelBooking->is_paid)
                    <p class="font-semibold text-xs leading-[18px] text-[#F8F8F8] rounded-full bg-[#54A917] p-[6px_12px] w-fit">Success</p>
                    @else
                    <p class="font-semibold text-xs leading-[18px] text-[#F8F8F8] rounded-full bg-[#F98D3F] p-[6px_12px] w-fit">Pending</p>

                    @endif
                </div>
                <div id="Order-details" class="flex flex-col rounded-lg border border-[#DCDFE6]">
                    <div id="Order-id" class="flex items-center justify-between p-4">
                        <p class="font-medium text-sm leading-[21px] text-[#757C98]">Order ID:</p>
                        <p class="font-semibold text-sm leading-[21px]">{{ $hotelBooking ->id }}</p>
                    </div>
                    <hr class="border-[#DCDFE6]">
                    <div id="Hotel-details" class="flex flex-col p-4 gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-[72px] h-[72px] flex shrink-0 rounded-lg overflow-hidden">
                                <img src="{{asset('assets/images/thumbnails/thumbnail-room-1.png')}}" class="object-cover w-full h-full" alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <p class="font-semibold text-sm leading-[21px] text-[#4041DA]"> {{ $hotelBooking ->checkin_at->format('M d,Y') }} - {{ $hotelBooking ->checkout_at->format('M d,Y') }} ({{ $hotelBooking ->total_days }} Night)</p>
                                <p class="font-semibold line-clamp-1">{{ $hotelBooking ->room->name }}</p>
                                <div class="flex items-center gap-1">
                                    <div class="flex shrink-0">
                                        <img src="{{asset('assets/images/icons/location-grey.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-medium text-sm leading-[21px] text-[#757C98]">{{ $hotelBooking ->room->hotel->city->name }}, {{ $hotelBooking ->room->hotel->country->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="facilities-info rounded-xl border border-[#DCDFE6] overflow-hidden">
                            <div class="flex flex-col gap-4 p-4 pb-0 mb-4">
                                <div class="flex items-center justify-between">
                                    <div class="title-container flex flex-col gap-[2px]">
                                        <p class="font-semibold">{{ $hotelBooking ->room->name }}</p>
                                        <p class="font-medium text-sm leading-[21px] text-[#757C98]">Max.{{ $hotelBooking ->room->total_people }} Adult /Room</p>
                                    </div>
                                    <a href="{{route('front.hotels.details',$hotelBooking->hotel->slug)}}" class="font-semibold text-sm leading-[21px] text-[#4041DA]">Details</a>
                                </div>
                                <hr>
                                <div class="flex items-center gap-1">
                                    <div class="flex shrink-0">
                                        <img src="{{asset('assets/images/icons/wifi-square-grey.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-medium text-sm leading-[21px] text-[#757C98]">Free Wi-Fi</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <div class="flex shrink-0">
                                        <img src="{{asset('assets/images/icons/coffee-grey.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-medium text-sm leading-[21px] text-[#757C98]">Coffee & Tea</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <div class="flex shrink-0">
                                        <img src="{{asset('assets/images/icons/wind-grey.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-medium text-sm leading-[21px] text-[#757C98]">Air Conditions</p>
                                </div>
                            </div>
                            <div class="w-full bg-[#F93F6C] p-[10px]">
                                <p class="text-center font-semibold text-xs leading-[18px] text-white">Refund & Reschedule not allowed</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="font-medium text-sm leading-[21px] text-[#757C98]">Guest Name:</p>
                            <p class="font-semibold">{{ $hotelBooking->customer->name }}</p>
                        </div>
                    </div>
                    <hr class="border-[#DCDFE6]">
                    <div id="Reservation-details" class="flex flex-col p-4 gap-3">
                        <p class="font-semibold">Reservation Details</p>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex flex-col gap-[6px]">
                                <p class="font-semibold text-sm leading-[21px] text-[#757C98]">Check-in</p>
                                <p class="font-semibold text-sm leading-[21px]">{{ $hotelBooking ->checkin_at->format('M d,Y') }}</p>
                                <p class="font-semibold text-sm leading-[21px] text-[#757C98]">14:00 AM</p>
                            </div>
                            <div class="flex flex-col gap-[6px] text-right">
                                <p class="font-semibold text-sm leading-[21px] text-[#757C98]">Check-out</p>
                                <p class="font-semibold text-sm leading-[21px]">{{ $hotelBooking ->checkout_at->format('M d,Y') }}</p>
                                <p class="font-semibold text-sm leading-[21px] text-[#757C98]">12:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Location-details" class="bg-white flex flex-col gap-3">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-lg leading-[27px]">Location Details</h2>
                        <a id="map-link" href="" target="_blank" class="font-semibold text-sm leading-[21px] text-[#4041DA]">See Map</a>
                    </div>
                    <div id="embed-map-display" class="w-full aspect-[357/180] overflow-hidden">
                        <iframe id="map-iframe" class="w-full h-full z-0" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=p{{ $hotelBooking->hotel->name }}&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                    </div>
                    <p class="font-medium text-xs leading-[18px] text-[#757C98]">{{ $hotelBooking->hotel->address }}</p>
                </div>
            </div>
            <div id="Bottom-nav" class="fixed bottom-0 w-full max-w-[640px] flex flex-col p-[24px_18px] border-t border-[#DCDFE6] gap-4 bg-white">
                <a href="" class="flex items-center justify-center font-semibold p-[12px_24px] rounded-lg w-full h-12 bg-[#4041DA] text-white">Contact Customer Service</a>
                <a href="home-login.html" class="flex items-center justify-center font-semibold p-[12px_24px] rounded-lg w-full h-12 bg-[#4041DA17] text-[#4041DA]">Back to Homepage</a>
            </div>
        </div>
    </div>
</section>


@endsection

@push ('after-styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />


@endpush
@push ('after-scripts')
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script src="{{asset('js/map.js')}}"></script>
@endpush
