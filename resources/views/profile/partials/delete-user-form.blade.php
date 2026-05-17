<section class="space-y-6">
    <header class="mb-6 border-b border-[#ba1a1a]/20 pb-4">
        <h2 class="font-title-md text-[18px] font-bold text-[#ba1a1a]">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 font-body-sm text-[#ba1a1a]/80">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-[#ba1a1a] text-white h-[40px] px-6 rounded-lg font-button-label text-[14px] font-medium hover:bg-[#93000a] transition-colors shadow-sm"
    >
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-canvas">
            @csrf
            @method('delete')

            <h2 class="font-title-md text-[18px] font-bold text-primary mb-2">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="font-body-sm text-on-surface-variant mb-6">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mb-6">
                <label for="password" class="sr-only">{{ __('Password') }}</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm bg-white"
                    placeholder="{{ __('Password') }}"
                />
                @error('password', 'userDeletion')
                    <p class="text-[13px] text-[#ba1a1a] mt-2 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-surface-strong">
                <button x-on:click="$dispatch('close')" type="button" class="bg-surface-bright text-primary h-[40px] px-6 rounded-lg font-button-label text-[14px] font-medium border border-[#e5e2e1] hover:bg-[#f0f4f8] transition-colors">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="bg-[#ba1a1a] text-white h-[40px] px-6 rounded-lg font-button-label text-[14px] font-medium hover:bg-[#93000a] transition-colors shadow-sm">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
