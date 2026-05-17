<x-app-layout :noNav="true">
    <div class="min-h-screen flex items-center justify-center bg-[#fcf9f8] py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-[480px] bg-canvas border border-surface-strong rounded-xl shadow-[0_8px_30px_rgba(0,0,0,0.04)] p-8 sm:p-10">
            <!-- Logo -->
            <div class="text-center mb-6">
                <span class="font-display-sm text-[20px] font-bold tracking-tighter text-primary">AeroLog</span>
            </div>

            <!-- Headers -->
            <div class="text-center mb-8">
                <h1 class="font-display-md text-[28px] font-bold text-primary mb-2 tracking-tight">Create an account</h1>
                <p class="font-body-md text-[15px] text-on-surface-variant">Join the next generation of flight logging.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Username & Full Name -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5 text-left">
                    <div>
                        <label for="username" class="block font-title-md text-[14px] font-semibold text-on-surface mb-2">Username</label>
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username" placeholder="pilot123" class="w-full h-[44px] px-3 border border-[#e5e2e1] rounded-lg focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-body-md text-primary placeholder-[#999999] shadow-sm transition-colors" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2 text-sm text-[#ba1a1a]" />
                    </div>
                    <div>
                        <label for="full_name" class="block font-title-md text-[14px] font-semibold text-on-surface mb-2">Full Name</label>
                        <input id="full_name" type="text" name="full_name" value="{{ old('full_name') }}" required autocomplete="name" placeholder="Capt. John Doe" class="w-full h-[44px] px-3 border border-[#e5e2e1] rounded-lg focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-body-md text-primary placeholder-[#999999] shadow-sm transition-colors" />
                        <x-input-error :messages="$errors->get('full_name')" class="mt-2 text-sm text-[#ba1a1a]" />
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mb-5 text-left">
                    <label for="email" class="block font-title-md text-[14px] font-semibold text-on-surface mb-2">Email address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="pilot@aerolog.com" class="w-full h-[44px] px-3 border border-[#e5e2e1] rounded-lg focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-body-md text-primary placeholder-[#999999] shadow-sm transition-colors" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-[#ba1a1a]" />
                </div>

                <!-- Role -->
                <div class="mb-5 text-left">
                    <label for="role" class="block font-title-md text-[14px] font-semibold text-on-surface mb-2">Role</label>
                    <select id="role" name="role" required class="w-full h-[44px] px-3 border border-[#e5e2e1] rounded-lg focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-body-md text-primary bg-white shadow-sm transition-colors">
                        <option value="">-- Select Role --</option>
                        <option value="pilot" {{ old('role') == 'pilot' ? 'selected' : '' }}>Pilot</option>
                        <option value="dispatcher" {{ old('role') == 'dispatcher' ? 'selected' : '' }}>Dispatcher</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2 text-sm text-[#ba1a1a]" />
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6 text-left">
                    <!-- Password -->
                    <div>
                        <label for="password" class="block font-title-md text-[14px] font-semibold text-on-surface mb-2">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" class="w-full h-[44px] px-3 border border-[#e5e2e1] rounded-lg focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-body-md tracking-widest text-primary placeholder-[#999999] shadow-sm transition-colors" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-[#ba1a1a]" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block font-title-md text-[14px] font-semibold text-on-surface mb-2">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" class="w-full h-[44px] px-3 border border-[#e5e2e1] rounded-lg focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-body-md tracking-widest text-primary placeholder-[#999999] shadow-sm transition-colors" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-[#ba1a1a]" />
                    </div>
                </div>

                <!-- Sign Up Button -->
                <div class="mt-2">
                    <button type="submit" class="w-full bg-primary text-on-primary h-[48px] rounded-lg font-button-label text-[15px] font-medium hover:bg-[#171717] transition-colors flex items-center justify-center shadow-sm">
                        Create Account
                    </button>
                </div>
            </form>

            <div class="mt-8 border-t border-surface-strong pt-6 text-center">
                <p class="text-[14px] text-on-surface-variant">
                    Already registered? <a href="{{ route('login') }}" class="font-medium text-[#0d74ce] hover:underline">Sign in to AeroLog</a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
