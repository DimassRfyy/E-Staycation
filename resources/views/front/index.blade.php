@extends('../layouts/master')
@section('content')
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[122px] relative">
    <header class="flex justify-center h-[376px] px-[18px] relative overflow-hidden -mb-[106px]">
      <img src="assets/images/backgrounds/BG.png" class="absolute object-cover w-full h-full" alt="backgrounds">
      <div class="fixed top-0 w-full max-w-[640px] px-[18px] z-30">
        <nav class="bg-white p-[10px_16px] h-fit w-full flex items-center justify-between rounded-full shadow-[0_8px_30px_0_#0A093212] z-10 mt-[60px]">
          <a href="{{ route('login') }}">
            <div class="w-[54px] h-[54px] flex shrink-0 overflow-hidden rounded-full items-center justify-center">

            @guest
              <img src="assets/images/icons/user.svg" class="w-full h-full object-cover" alt="icon">
            @endguest

            @auth
              <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover" alt="icon">
            @endauth
            </div>
          </a>
          <div class="flex flex-col gap-[2px] text-center">
            <p class="font-medium text-sm text-[#757C98] leading-[21px]">Current location</p>
            <div class="flex items-center justify-between gap-1">
              <div class="flex shrink-0">
                <img src="assets/images/icons/location.svg" alt="icon">
                <p class="font-semibold text-sm leading-[21px]">Wakanda, West Java</p>
              </div>
            </div>
          </div>
          <a href="">
            <div class="w-[54px] h-[54px] flex shrink-0 overflow-hidden rounded-full items-center justify-center">
              <img src="assets/images/icons/Notifcations.svg" alt="icon">
            </div>
          </a>
        </nav>
      </div>
    </header>
    <div id="Feature" class="px-[18px] relative z-10">
      <div class="bg-white p-[18px_16px] rounded-xl overflow-hidden grid grid-cols-4 gap-[27px]">
        <a href="{{route('front.hotels')}}">
          <div class="flex flex-col items-center gap-2">
            <div class="w-[60px] h-[60px] flex shrink-0">
              <img src="assets/images/icons/Hotel.png" class="object-cover" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#757C98] leading-[21px]">Hotel</p>
          </div>
        </a>
        <a href="">
          <div class="flex flex-col items-center gap-2">
            <div class="w-[60px] h-[60px] flex shrink-0">
              <img src="assets/images/icons/Flight.png" class="object-cover" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#757C98] leading-[21px]">Flight</p>
          </div>
        </a>
        <a href="">
          <div class="flex flex-col items-center gap-2">
            <div class="w-[60px] h-[60px] flex shrink-0">
              <img src="assets/images/icons/Train.png" class="object-cover" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#757C98] leading-[21px]">Train</p>
          </div>
        </a>
        <a href="">
          <div class="flex flex-col items-center gap-2">
            <div class="w-[60px] h-[60px] flex shrink-0">
              <img src="assets/images/icons/Bus.png" class="object-cover" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#757C98] leading-[21px]">Bus</p>
          </div>
        </a>
        <a href="">
          <div class="flex flex-col items-center gap-2">
            <div class="w-[60px] h-[60px] flex shrink-0">
              <img src="assets/images/icons/Ferry.png" class="object-cover" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#757C98] leading-[21px]">Ferry</p>
          </div>
        </a>
        <a href="">
          <div class="flex flex-col items-center gap-2">
            <div class="w-[60px] h-[60px] flex shrink-0">
              <img src="assets/images/icons/Finance.png" class="object-cover" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#757C98] leading-[21px]">Finance</p>
          </div>
        </a>
        <a href="">
          <div class="flex flex-col items-center gap-2">
            <div class="w-[60px] h-[60px] flex shrink-0">
              <img src="assets/images/icons/Travel.png" class="object-cover" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#757C98] leading-[21px]">Travel</p>
          </div>
        </a>
        <a href="">
          <div class="flex flex-col items-center gap-2">
            <div class="w-[60px] h-[60px] flex shrink-0">
              <img src="assets/images/icons/View All.png" class="object-cover" alt="icon">
            </div>
            <p class="font-medium text-sm text-[#757C98] leading-[21px]">View All</p>
          </div>
        </a>
      </div>
    </div>
    <div id="Promo" class="mt-6 w-full bg-white overflow-hidden py-6 flex flex-col gap-3">
      <div class="flex justify-between items-center px-[18px]">
        <h1 class="font-semibold text-lg leading-[27px]">Promo Special For You✨</h1>
        <a href="" class="font-semibold text-sm leading-[21px] text-[#4041DA]">See All</a>
      </div>
      <div class="main-carousel">
        <a href="" class="pl-[18px] last:pr-[18px]">
          <div class="w-fit flex flex-col gap-4">
            <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
              <img src="assets/images/thumbnails/thumbnail1.png" class="object-cover w-full h-full" alt="thumbnail">
            </div>
            <div class="flex flex-col gap-1">
              <p class="font-semibold">Wonderful Indonesia</p>
              <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 9 Promos</p>
            </div>
          </div>
        </a>
        <a href="" class="pl-[18px] last:pr-[18px]">
          <div class="w-fit flex flex-col gap-4">
            <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
              <img src="assets/images/thumbnails/thumbnail2.png" class="object-cover w-full h-full" alt="thumbnail">
            </div>
            <div class="flex flex-col gap-1">
              <p class="font-semibold">Majestic Thailand</p>
              <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 25 Promos</p>
            </div>
          </div>
        </a>
        <a href="" class="pl-[18px] last:pr-[18px]">
          <div class="w-fit flex flex-col gap-4">
            <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
              <img src="assets/images/thumbnails/thumbnail3.png" class="object-cover w-full h-full" alt="thumbnail">
            </div>
            <div class="flex flex-col gap-1">
              <p class="font-semibold">Amazing Singapore</p>
              <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 22 Promos</p>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div id="Menu-bar" class="fixed bottom-[24px] px-[18px] max-w-[640px] w-full z-30">
      <div class="bg-white p-[14px_12px] rounded-full flex items-center justify-center gap-8 shadow-[0_8px_30px_0_#0A093212]">
        <a href="index.html">
          <div class="flex flex-col gap-1 items-center">
            <div class="w-6 h-6 flex shrink-0">
              <img src="assets/images/icons/home-active.svg" alt="icon">
            </div>
            <p class="text-xs leading-[18px] font-semibold text-[#4041DA]">Home</p>
          </div>
        </a>
        <a href="">
          <div class="flex flex-col gap-1 items-center">
            <div class="w-6 h-6 flex shrink-0">
              <img src="assets/images/icons/search-nonactive.svg" alt="icon">
            </div>
            <p class="text-xs leading-[18px] font-medium text-[#757C98]">Search</p>
          </div>
        </a>
        <a href="{{ route('dashboard.my-bookings') }}">
          <div class="flex flex-col gap-1 items-center">
            <div class="w-6 h-6 flex shrink-0">
              <img src="assets/images/icons/activity-nonactive.svg" alt="icon">
            </div>
            <p class="text-xs leading-[18px] font-medium text-[#757C98]">Activity</p>
          </div>
        </a>
        <a href="{{ route('dashboard') }}">
          <div class="flex flex-col gap-1 items-center">
            <div class="w-6 h-6 flex shrink-0">
              <img src="assets/images/icons/settings-nonactive.svg" alt="icon">
            </div>
            <p class="text-xs leading-[18px] font-medium text-[#757C98]">Settings</p>
          </div>
        </a>
      </div>
    </div>
  </section>
@endsection

@push('after-styles')
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endpush

@push('after-scripts')

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

  <script src="{{ asset  ('js/carousel.js') }}"></script>
@endpush
