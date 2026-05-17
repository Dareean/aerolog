<x-app-layout :noNav="true">
    <div class="min-h-screen flex items-center justify-center bg-[#fcf9f8] py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-[440px] bg-canvas border border-surface-strong rounded-xl shadow-[0_8px_30px_rgba(0,0,0,0.04)] p-8 sm:p-10">
            <!-- Logo -->
            <div class="text-center mb-6">
                <span class="font-display-sm text-[20px] font-bold tracking-tighter text-primary">AeroLog</span>
            </div>

            <!-- Headers -->
            <div class="text-center mb-8">
                <h1 class="font-display-md text-[28px] font-bold text-primary mb-2 tracking-tight">Sign in to AeroLog</h1>
                <p class="font-body-md text-[15px] text-on-surface-variant">Enter your credentials to access the flight deck.</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6 text-left">
                    <label for="email" class="block font-title-md text-[14px] font-semibold text-on-surface mb-2">Email address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="pilot@aerolog.com" class="w-full h-[44px] px-3 border border-[#e5e2e1] rounded-lg focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-body-md text-primary placeholder-[#999999] shadow-sm transition-colors" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-[#ba1a1a]" />
                </div>

                <!-- Password -->
                <div class="mb-6 text-left">
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block font-title-md text-[14px] font-semibold text-on-surface">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[13px] font-medium text-[#0d74ce] hover:underline">Forgot password?</a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" class="w-full h-[44px] px-3 border border-[#e5e2e1] rounded-lg focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-body-md tracking-widest text-primary placeholder-[#999999] shadow-sm transition-colors" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-[#ba1a1a]" />
                </div>

                <!-- Sign In Button -->
                <div class="mt-2">
                    <button type="submit" class="w-full bg-primary text-on-primary h-[48px] rounded-lg font-button-label text-[15px] font-medium hover:bg-[#171717] transition-colors flex items-center justify-center shadow-sm">
                        Sign In
                    </button>
                </div>
            </form>

            <div class="mt-8 border-t border-surface-strong pt-6 text-center">
                <p class="text-[14px] text-on-surface-variant">
                    Don't have an account? <a href="#" class="font-medium text-[#0d74ce] hover:underline">Contact your dispatcher</a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
