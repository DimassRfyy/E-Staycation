@extends('../layouts/master')
@section('content')
<section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-6 relative">
    <div class="w-full h-[165px] absolute top-0 bg-[linear-gradient(244.6deg,_#7545FB_14.17%,_#2A3FCC_92.43%)]">
    </div>
    <div class="relative z-10 px-[18px] flex flex-col gap-6 mt-[60px]">
        <div class="top-menu flex justify-between items-center">
            <a href="{{route('front.hotels')}}" class="">
                <div class="w-[42px] h-[42px] flex shrink-0">
                    <img src="{{asset('assets/images/icons/back.svg')}}" alt="icon">
                </div>
            </a>
            <p class="font-semibold text-lg leading-[28px] text-white text-center">{{ $keyword }}</p>
            <div class="dummy-spacer w-[42px] h-[42px] flex shrink-0">
            </div>
        </div>
        <div id="result" class="result-card-container flex flex-col gap-[18px]">
            <!-- Result Card -->
            @forelse ($hotels as $hotel)
            <a href="{{ route('front.hotels.details',$hotel) }}">
                <div class="card-result bg-white rounded-xl overflow-hidden flex flex-col">
                    <div class="thumbnail-container w-full aspect-[357/160] overflow-hidden flex shrink-0">
                        <img src="{{ Storage::url($hotel->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail">
                    </div>
                    <div class="content-container flex flex-col p-4 gap-6">
                        <div class="details-container flex flex-col gap-[6px]">
                            <div class="ratings-container flex items-center gap-[2px]">
                                <div class="star-container flex items-center">
                                    <div class="flex shrink-0 w-[18px] h-[18px] p-[2px]">
                                        <img src="{{asset('assets/images/icons/Star.svg')}}" alt="star">
                                    </div>
                                    <div class="flex shrink-0 w-[18px] h-[18px] p-[2px]">
                                        <img src="{{asset('assets/images/icons/Star.svg')}}" alt="star">
                                    </div>
                                    <div class="flex shrink-0 w-[18px] h-[18px] p-[2px]">
                                        <img src="{{asset('assets/images/icons/Star.svg')}}" alt="star">
                                    </div>
                                    <div class="flex shrink-0 w-[18px] h-[18px] p-[2px]">
                                        <img src="{{asset('assets/images/icons/Star.svg')}}" alt="star">
                                    </div>
                                    <div class="flex shrink-0 w-[18px] h-[18px] p-[2px]">
                                        <img src="{{asset('assets/images/icons/Star-half.svg')}}" alt="star">
                                    </div>
                                </div>
                                <p class="rating font-semibold text-sm leading-[21px]">4.5/5.0</p>
                                <p class="reviewers font-medium text-sm leading-[21px] text-[#757C98]">(2209 Reviews)</p>
                            </div>
                            <p class="hotel-name font-semibold">{{ $hotel->name }}</p>
                            <div class="badge flex items-center gap-3">
                                <div class="flex items-center gap-1">
                                    <div class="flex shrink-0">
                                        <img src="{{asset('assets/images/icons/location-grey.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-medium text-sm leading-[21px] text-[#757C98]">{{ $hotel->city->name }}</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <div class="flex shrink-0">
                                        <img src="{{asset('assets/images/icons/star-outline-grey.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-medium text-sm leading-[21px] text-[#757C98]">{{ $hotel->star_level }}</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <div class="flex shrink-0">
                                        <img src="{{asset('assets/images/icons/wifi-grey.svg')}}" alt="icon">
                                    </div>
                                    <p class="font-medium text-sm leading-[21px] text-[#757C98]">Free Wifi</p>
                                </div>
                            </div>
                        </div>
                        <div class="total-price flex gap-[2px] items-center">
                            <p class="text-[#54A917] font-semibold text-lg leading-[27px]">Rp {{ number_format($hotel->getLowestRoomPrice(),0,',','.') }}</p>
                            <p class="text-[#757C98] font-semibold text-xs leading-[18px]">/night</p>
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <div id="result" class="result-card-container flex flex-col gap-[18px]">
                <div class="empty-result h-[321px] bg-white rounded-xl overflow-hidden flex flex-col justify-center items-center gap-3">
                    <div class="flex shrink-0 w-9 h-9">
                        <img src="{{asset('assets/images/icons/emoticon.png')}}" alt="icon">
                    </div>
                    <p class="font-medium text-[#757C98] text-center">Sadly, it looks like no hotels are<br>available around here.</p>
                </div>
            </div>
            @endforelse

            <!-- Result Card -->
        </div>
    </div>
</section>
@endsection
