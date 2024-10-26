@extends('../layouts/master')
@section('content')
<section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
    <div class="w-full h-[184px] absolute top-0 bg-[linear-gradient(244.6deg,_#7545FB_14.17%,_#2A3FCC_92.43%)]">
    </div>
    <div class="relative z-10 flex flex-col gap-6 mt-[60px]">
        <div class="top-menu flex justify-between items-center px-[18px]">
            <a href="hotel-rooms-type.html" class="">
                <div class="w-[42px] h-[42px] flex shrink-0">
                    <img src="{{asset('assets/images/icons/back.svg')}}" alt="icon">
                </div>
            </a>
            <p class="font-semibold text-lg leading-[28px] text-white text-center">Complete your booking</span></p>
            <div class="dummy-spacer w-[42px] h-[42px] flex shrink-0">
            </div>
        </div>
        <form method="POST" action="{{ route('front.hotel.book.payment.store', $hotel_booking->id) }}" enctype="multipart/form-data" id="Details" class="group result-card-container flex flex-col gap-6">
            @csrf
            @method('PUT')
            <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">
                <div class="flex p-4 items-center gap-4">
                    <button type="button" class="contact-name accordion-button flex items-center gap-2 w-full" data-accordion="accordion-1">
                        <div class="flex items-center">
                            <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" class="object-cover w-full h-full" alt="photo">
                            </div>
                        </div>
                        <div class="flex flex-col flex-1 gap-[2px] text-left">
                            <p class="font-semibold">{{ Auth::user()->name }}</p>
                            <p class="font-medium text-xs leading-[18px] text-[#757C98]">Contact Details</p>
                        </div>
                        <div class="arrow flex shrink-0">
                            <img src="{{asset('assets/images/icons/arrow-up.svg')}}" class="rotate-180 transition-all duration-300" alt="arrow up">
                        </div>
                    </button>
                </div>
                <div id="accordion-1" class="accordion-content open">
                    <div class="email-container flex flex-col gap-2 px-4">
                        <p class="font-medium text-sm leading-[21px]">Email Address</p>
                        <div class="group flex items-center gap-2 p-[12px_16px] border border-[#DCDFE6] rounded-lg overflow-hidden">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{asset('assets/images/icons/sms.svg')}}" alt="icon">
                            </div>
                            <input type="email" name="" id="" class="appearance-none outline-none w-full bg-white text-sm font-semibold" value="{{ Auth::user()->email }}" readonly>
                        </div>
                    </div>
                    <div class="relative overflow-hidden">
                        <img src="{{asset('assets/images/backgrounds/note-blue-background.svg')}}" class="absolute object-cover w-full h-full object-top" alt="backgrounds">
                        <p class="relative z-10 font-medium text-sm leading-[21px] text-white mt-4 p-4 bg-[#4041DA]"><span class="font-bold">NOTE!</span> You will receive important information and also Booking proof in this email.</p>
                    </div>
                </div>
            </div>
            <div id="Transfer-details" class="bg-white rounded-xl flex flex-col mx-[18px] p-4 gap-4">
                <p class="font-semibold">Transfer Details</p>
                <div class="flex flex-col p-4 gap-4 rounded-lg border border-[#DCDFE6]">
                    <div class="flex items-center justify-between">
                        <p class="font-medium text-sm leading-[21px] text-[#757C98]">Order ID:</p>
                        <p class="font-semibold text-sm leading-[21px]">{{ $hotel_booking ->id }}</p>
                    </div>
                    <hr class="border-[#DCDFE6]">
                    <div class="flex items-center gap-3">
                        <div class="w-[72px] h-[72px] flex shrink-0 rounded-lg overflow-hidden">
                            <img src="{{ Storage::url($hotel_booking ->room->photo) }}" class="object-cover w-full h-full" alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-[2px]">
                            <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">
                                {{ $hotel_booking ->checkin_at->format('M d,Y') }} - {{ $hotel_booking ->checkout_at->format('M d,Y') }} ({{ $hotel_booking ->total_days }} Night)
                            </p>
                            <p class="font-semibold">{{ $hotel_booking ->room->name }}</p>
                            <p class="font-medium text-sm leading-[21px] text-[#757C98]">Max.{{ $hotel_booking ->room->total_people }} Adult /Room</p>
                        </div>
                    </div>
                </div>
                <div class="input-container flex flex-col gap-2">
                    <div class="flex flex-col gap-[2px]">
                        <p class="font-medium text-sm leading-[21px] text-[#757C98]">Transfer to</p>
                        <p class="font-semibold">PT. Bobo Super App</p>
                    </div>
                    <div class="flex items-center gap-[10px] p-[12px_16px] rounded-lg bg-[#F8F8F8]">
                        <div class="h-4 flex shrink-0">
                            <img src="{{asset('assets/images/logos/bca.svg')}}" class="object-contain h-full" alt="icon">
                        </div>
                        <p class="copy font-semibold flex flex-1">505 1234 4650 280</p>
                        <button type="button" class="copy-btn font-semibold text-sm leading-[21px] text-[#4041DA]">Copy</button>
                    </div>
                </div>
                <div class="input-container flex flex-col gap-2">
                    <div class="flex flex-col gap-[2px]">
                        <p class="font-medium text-sm leading-[21px] text-[#757C98]">Amount to Pay</p>
                    </div>
                    <div class="flex items-center gap-[10px] p-[12px_16px] rounded-lg bg-[#F8F8F8]">
                        <p class="copy font-semibold flex flex-1">Rp {{ number_format($hotel_booking ->total_amounts,0,',','.') }}</p>
                        <button type="button" class="copy-btn font-semibold text-sm leading-[21px] text-[#4041DA]">Copy</button>
                    </div>
                </div>
            </div>
            <div id="Pay-proof" class="bg-white rounded-xl flex flex-col mx-[18px] p-4 gap-4">
                <p class="font-semibold">Payment Proof</p>
                <div class="group flex items-center gap-6 p-[12px_16px] bg-[#F8F8F8] rounded-lg overflow-hidden">
                    <div class="flex flex-1 items-center gap-2">
                        <div class="flex shrink-0 group-has-[:invalid]:text-[#757C98]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 10C10.1046 10 11 9.10457 11 8C11 6.89543 10.1046 6 9 6C7.89543 6 7 6.89543 7 8C7 9.10457 7.89543 10 9 10Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M18 8V2L20 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M18 2L16 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2.66992 18.9501L7.59992 15.6401C8.38992 15.1101 9.52992 15.1701 10.2399 15.7801L10.5699 16.0701C11.3499 16.7401 12.6099 16.7401 13.3899 16.0701L17.5499 12.5001C18.3299 11.8301 19.5899 11.8301 20.3699 12.5001L21.9999 13.9001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <p id="Filename" class="font-semibold text-sm leading-[21px] group-has-[:invalid]:text-[#757C98] group-has-[:invalid]:font-medium line-clamp-1">Upload Image</p>
                    </div>
                    <input type="file" name="proof" id="fileInput" class="hidden" required>
                    <button type="button" class="font-semibold text-xs leading-[18px] text-[#4041DA]" onclick="document.getElementById('fileInput').click()">Choose File</button>
                </div>
                <p class="font-medium text-sm leading-[21px] text-[#757C98]">Share your payment proof to continue 😉 </p>
            </div>
            <div id="Bottom-nav" class="fixed bottom-0 max-w-[640px] w-full z-30 flex flex-col p-[24px_18px] border-t border-[#DCDFE6] gap-4 bg-white">
                <button type="submit" id="submitButton" class="flex items-center justify-center font-semibold p-[12px_24px] rounded-lg w-full h-12 bg-[#4041DA] text-white disabled:bg-[#E7E7E7]" disabled>Continue</button>
            </div>
        </form>
    </div>
</section>
@endsection
@push('after-scripts')
<script src="{{asset('js/transfer-details.js')}}"></script>
<script src="{{asset('js/file-upload.js')}}"></script>
<script src="{{asset('js/accordion.js')}}"></script>
@endpush
