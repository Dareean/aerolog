<x-auth-layout title="Sign in to AeroLog">
    <div class="text-center">
        <p class="text-sm text-body mb-2">Dispatcher & Pilot Portal</p>
        <h1 class="text-2xl font-semibold text-ink mb-6">Sign in to AeroLog</h1>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input id="email" name="email" type="email" required autofocus
                class="w-full bg-white border border-gray-200 px-4 py-3 rounded-md h-11 text-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-black" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <input id="password" name="password" type="password" required
                class="w-full bg-white border border-gray-200 px-4 py-3 rounded-md h-11 text-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-black" />
        </div>

        <div>
            <button type="submit" class="w-full bg-black text-white rounded-md text-sm font-medium" style="padding:10px 18px;">Authenticate</button>
        </div>
    </form>

    <div class="mt-4 text-center text-sm text-body">
        New crew member? <a href="{{ route('request-access') }}" class="text-[#0d74ce]">Request access</a>
    </div>
</x-auth-layout>
