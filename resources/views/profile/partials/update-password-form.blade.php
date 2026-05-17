<section>
    <header class="mb-6 border-b border-surface-strong pb-4">
        <h2 class="font-title-md text-[18px] font-bold text-primary">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 font-body-sm text-on-surface-variant">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">
                {{ __('CURRENT PASSWORD') }}
            </label>
            <input id="update_password_current_password" name="current_password" type="password" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm bg-white" autocomplete="current-password" />
            @error('current_password', 'updatePassword')
                <p class="text-[13px] text-[#ba1a1a] mt-2 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password" class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">
                {{ __('NEW PASSWORD') }}
            </label>
            <input id="update_password_password" name="password" type="password" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm bg-white" autocomplete="new-password" />
            @error('password', 'updatePassword')
                <p class="text-[13px] text-[#ba1a1a] mt-2 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">
                {{ __('CONFIRM PASSWORD') }}
            </label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm bg-white" autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword')
                <p class="text-[13px] text-[#ba1a1a] mt-2 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="bg-primary text-on-primary h-[40px] px-6 rounded-lg font-button-label text-[14px] font-medium hover:bg-[#171717] transition-colors shadow-sm">
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
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
