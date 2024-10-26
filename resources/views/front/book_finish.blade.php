@extends('../layouts/master')
@section('content')
<section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[linear-gradient(232.49deg,_#7545FB_0%,_#2A3FCC_97.67%)] overflow-x-hidden">
    <!-- semua kontent berada dalam section ini -->
    <div class="flex flex-col items-center justify-between h-screen w-full">
        <div class="flex flex-col mt-[120px] gap-8">
            <div class="flex items-center justify-center w-[250px] h-[250px] shrink-0">
                <img src="{{asset('assets/images/thumbnails/illustration.png')}}" alt="Dan Illustration" class="w-full h-full" />
            </div>
            <div class="flex flex-col items-center justify-center gap-2 w-[262px]">
                <h1 class="text-2xl leading-9 font-semibold text-white">Booking successful.</h1>
                <p class="text-sm leading-[21px] text-center text-[#C5C1E7]">Hold on for a few moments as we review your booking.</p>
            </div>
        </div>
        <div class="mb-[60px]">
            <p class="text-sm leading-[21px] font-semibold text-white">The page will automatically move in <span id="countdown">3</span>...</p>
        </div>
    </div>
</section>
@endsection

@push('after-scripts')
<script>
    // Countdown function
    function startCountdown() {
        let seconds = 3; // Set the initial countdown value
        const countdownElement = document.getElementById("countdown");

        function updateCountdown() {
            countdownElement.textContent = seconds;
            seconds--;

            if (seconds < 0) {
                // Redirect after countdown
                window.location.href = "{{ route('dashboard.my-bookings') }}";
            } else {
                setTimeout(updateCountdown, 1000); // Update every second
            }
        }

        updateCountdown();
    }

    // Start the countdown when the page loads
    window.addEventListener("load", startCountdown);
</script>
@endpush
