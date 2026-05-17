<section>
    <header class="mb-6 border-b border-surface-strong pb-4">
        <h2 class="font-title-md text-[18px] font-bold text-primary">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 font-body-sm text-on-surface-variant">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="username" class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">
                    {{ __('USERNAME') }}
                </label>
                <input id="username" name="username" type="text" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm bg-white" value="{{ old('username', $user->username) }}" required autofocus autocomplete="username" />
                @error('username')
                    <p class="text-[13px] text-[#ba1a1a] mt-2 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="full_name" class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">
                    {{ __('FULL NAME') }}
                </label>
                <input id="full_name" name="full_name" type="text" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm bg-white" value="{{ old('full_name', $user->full_name) }}" required autocomplete="name" />
                @error('full_name')
                    <p class="text-[13px] text-[#ba1a1a] mt-2 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="email" class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">
                {{ __('EMAIL') }}
            </label>
            <input id="email" name="email" type="email" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm bg-white" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
                <p class="text-[13px] text-[#ba1a1a] mt-2 font-medium">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-[13px] mt-2 text-on-surface-variant">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-primary hover:text-surface-dark rounded-md focus:outline-none">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-[13px] text-[#137333]">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="bg-primary text-on-primary h-[40px] px-6 rounded-lg font-button-label text-[14px] font-medium hover:bg-[#171717] transition-colors shadow-sm">
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-[13px] font-medium text-[#137333]"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
