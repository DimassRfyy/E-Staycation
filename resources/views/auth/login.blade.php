@extends('../layouts/master')
@section('content')
<section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-white overflow-x-hidden relative">
        <div class="w-full h-[303px] flex shrink-0 overflow-hidden">
            <img src="assets/images/backgrounds/signin-bg.png" class="w-full h-full object-cover" alt="background">
        </div>
        <form method="POST" action="{{ route('login') }}" class="flex flex-col justify-between flex-1 px-[18px] pt-8 pb-6">
            @csrf

            <div class="flex flex-col gap-8">
                <div class="flex flex-col gap-1">
                    <h1 class="font-semibold text-2xl leading-[36px]">Create Your Account 🙌🏻 </h1>
                    <p class="font-medium text-sm leading-[21px] text-[#757C98]">Excited to have you on board!</p>
                </div>
                <div class="flex flex-col gap-6">
                    <div class="input-container flex flex-col gap-2">
                        <p class="font-medium text-sm leading-[21px]">Email Address</p>
                        <div class="group flex items-center gap-2 p-[12px_16px] border border-[#DCDFE6] rounded-lg overflow-hidden">
                            <div class="w-6 h-6 flex shrink-0 text-[#757C98] group-has-[:valid]:text-[#070625] group-focus-within:text-[#070625] transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 20.5H7C4 20.5 2 19 2 15.5V8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17 9L13.87 11.5C12.84 12.32 11.15 12.32 10.12 11.5L7 9" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input type="email" name="email" id="" class="appearance-none outline-none w-full bg-white placeholder:text-[#757C98] placeholder:font-medium text-sm font-semibold" placeholder="example@gmail.com" required>
                        </div>
                    </div>
                    <div class="input-container flex flex-col gap-2">
                        <p class="font-medium text-sm leading-[21px]">Password</p>
                        <div class="group flex items-center gap-2 p-[12px_16px] border border-[#DCDFE6] rounded-lg overflow-hidden">
                            <div class="w-6 h-6 flex shrink-0 text-[#757C98] group-has-[:valid]:text-[#070625] group-focus-within:text-[#070625] transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.7897 14.9303C17.7297 16.9803 14.7797 17.6103 12.1897 16.8003L7.47966 21.5003C7.13966 21.8503 6.46966 22.0603 5.98966 21.9903L3.80966 21.6903C3.08966 21.5903 2.41966 20.9103 2.30966 20.1903L2.00966 18.0103C1.93966 17.5303 2.16966 16.8603 2.49966 16.5203L7.19966 11.8203C6.39966 9.22031 7.01966 6.27031 9.07966 4.22031C12.0297 1.27031 16.8197 1.27031 19.7797 4.22031C22.7397 7.17031 22.7397 11.9803 19.7897 14.9303Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.88965 17.4902L9.18965 19.7902" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M14.5 11C15.3284 11 16 10.3284 16 9.5C16 8.67157 15.3284 8 14.5 8C13.6716 8 13 8.67157 13 9.5C13 10.3284 13.6716 11 14.5 11Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input type="password" name="password" id="" class="appearance-none outline-none w-full bg-white placeholder:text-[#757C98] placeholder:font-medium text-sm font-semibold" placeholder="Enter your password" required>
                            <button type="button" class="w-6 h-6 flex shrink-0 text-[#757C98] group-has-[:valid]:text-[#070625] group-focus-within:text-[#070625] transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.5299 9.46992L9.46992 14.5299C8.81992 13.8799 8.41992 12.9899 8.41992 11.9999C8.41992 10.0199 10.0199 8.41992 11.9999 8.41992C12.9899 8.41992 13.8799 8.81992 14.5299 9.46992Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.8198 5.77047C16.0698 4.45047 14.0698 3.73047 11.9998 3.73047C8.46984 3.73047 5.17984 5.81047 2.88984 9.41047C1.98984 10.8205 1.98984 13.1905 2.88984 14.6005C3.67984 15.8405 4.59984 16.9105 5.59984 17.7705" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.41992 19.5297C9.55992 20.0097 10.7699 20.2697 11.9999 20.2697C15.5299 20.2697 18.8199 18.1897 21.1099 14.5897C22.0099 13.1797 22.0099 10.8097 21.1099 9.39969C20.7799 8.87969 20.4199 8.38969 20.0499 7.92969" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15.5104 12.7002C15.2504 14.1102 14.1004 15.2602 12.6904 15.5202" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.47 14.5303L2 22.0003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M22.0003 2L14.5303 9.47" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex items-center justify-between mt-1">
                            <label class="font-medium text-sm leading-[21px] text-[#757C98] flex items-center gap-[6px]">
                                <input type="checkbox" name="" id="" class="peer w-5 h-5 appearance-none checked:border-2 checked:border-solid checked:border-white rounded-md checked:bg-[#4041DA] ring-1 ring-[#757C98] transition-all duration-300">
                                <span class="peer-checked:text-[#070625] transition-all duration-300">Remember me</span>
                            </label>
                            <a href="" class="font-medium text-sm leading-[21px] text-[#757C98]">Forgot Password?</a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="!bg-[#4041DA] p-[12px_24px] h-12 flex items-center gap-3 rounded-lg justify-center">
                    <p class="font-semibold text-sm leading-[21px] text-white">Sign In</p>
                </button>
            </div>
            <p class="font-medium text-sm leading-[21px] text-[#757C98] text-center mt-3">Dont have an account? <a href="{{ route('register') }}" class="font-semibold text-[#4041DA]">Create Account</a></p>
        </form>
    </section>
@endsection
