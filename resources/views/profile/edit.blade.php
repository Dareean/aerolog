<x-sidebar-layout title="Settings">
    <section>
        <header class="mb-xl">
            <h1 class="font-display-lg text-[28px] font-bold text-primary mb-1">Account Settings</h1>
            <p class="font-body-md text-on-surface-variant">Manage your profile, password, and security preferences.</p>
        </header>

        <div class="space-y-6">
            <!-- Profile Information -->
            <div class="bg-canvas border border-surface-strong rounded-xl shadow-sm p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-canvas border border-surface-strong rounded-xl shadow-sm p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

        </div>
    </section>
</x-sidebar-layout>
