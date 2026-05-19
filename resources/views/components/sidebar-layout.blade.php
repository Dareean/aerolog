@props(['title' => null])
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? __('AeroLog Dashboard') }}</title>
    <!-- Fonts + Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-[#fcf9f8] text-on-surface antialiased font-body-md h-screen flex overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-[280px] bg-canvas border-r border-surface-strong h-full flex flex-col flex-shrink-0">
        <!-- Logo Area -->
        <div class="h-[72px] px-6 flex items-center border-b border-surface-strong">
            <span class="font-display-sm text-[20px] font-bold tracking-tighter text-primary">AeroLog</span>
        </div>
        
        <!-- User Profile Area -->
        <div class="px-6 py-6 border-b border-surface-strong mb-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-on-primary font-bold">
                    {{ substr(Auth::user()->full_name ?? 'U', 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <div class="font-title-sm text-primary truncate">{{ Auth::user()->full_name ?? 'User' }}</div>
                    <div class="font-label-caps text-label-caps text-on-surface-variant truncate uppercase">{{ '@' . (Auth::user()->username ?? 'username') }} &bull; {{ Auth::user()->role ?? 'Role' }}</div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-grow px-4 space-y-1 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-[#f0f4f8] text-[#0d74ce] font-semibold' : 'text-on-surface-variant hover:bg-surface-bright hover:text-primary transition-colors font-medium' }} text-[14px]">
                <span class="material-symbols-outlined text-[20px]">dashboard</span>
                {{ __('Overview') }}
            </a>
            
            <a id="nav-settings" href="{{ route('profile.edit') }}#personal-settings" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('profile.edit') ? 'bg-[#f0f4f8] text-[#0d74ce] font-semibold' : 'text-on-surface-variant hover:bg-surface-bright hover:text-primary transition-colors font-medium' }} text-[14px]">
                <span class="material-symbols-outlined text-[20px]">settings</span>
                {{ __('Settings') }}
            </a>
            @if(Auth::user() && Auth::user()->role === 'dispatcher')
                <a id="nav-pilots" href="{{ route('profile.edit') }}#pilot-management" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('profile.edit') ? 'bg-[#f0f4f8] text-[#0d74ce] font-semibold' : 'text-on-surface-variant hover:bg-surface-bright hover:text-primary transition-colors font-medium' }} text-[14px]">
                    <span class="material-symbols-outlined text-[20px]">people</span>
                    {{ __('Pilot Accounts') }}
                </a>
            @endif

            <script>
                // Client-side: distinguish Settings vs Pilot Management (hash)
                document.addEventListener('DOMContentLoaded', function () {
                    const settingsLink = document.getElementById('nav-settings');
                    const pilotsLink = document.getElementById('nav-pilots');
                    if (!settingsLink || !pilotsLink) return;

                    const activeClasses = ['bg-[#f0f4f8]', 'text-[#0d74ce]', 'font-semibold'];
                    const inactiveClasses = ['text-on-surface-variant', 'hover:bg-surface-bright', 'hover:text-primary', 'transition-colors', 'font-medium'];

                    function setActiveLink(linkToActivate) {
                        [settingsLink, pilotsLink].forEach(link => {
                            // remove active classes
                            activeClasses.forEach(c => link.classList.remove(c));
                            // remove inactive classes
                            inactiveClasses.forEach(c => link.classList.remove(c));
                            // reset to inactive base
                            link.classList.add('text-on-surface-variant', 'hover:bg-surface-bright', 'hover:text-primary', 'transition-colors', 'font-medium');
                        });

                        // apply active classes to chosen link
                        linkToActivate.classList.remove('text-on-surface-variant','hover:bg-surface-bright','hover:text-primary','transition-colors','font-medium');
                        activeClasses.forEach(c => linkToActivate.classList.add(c));
                    }

                    function updateByHash() {
                        if (window.location.hash === '#pilot-management') {
                            setActiveLink(pilotsLink);
                        } else if (window.location.pathname.endsWith('/profile') || window.location.pathname.endsWith('/profile/')) {
                            setActiveLink(settingsLink);
                        }
                    }

                    // initial
                    updateByHash();

                    // react to hash changes
                    window.addEventListener('hashchange', updateByHash);
                });
            </script>
        </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-surface-strong">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#ba1a1a] hover:bg-[#fff2f2] transition-colors font-medium text-[14px]">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                    {{ __('Sign Out') }}
                </a>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden bg-[#fcf9f8]">
        <!-- Topbar -->
        <header class="h-[72px] bg-canvas border-b border-surface-strong flex items-center justify-between px-8 flex-shrink-0">
            <h1 class="font-display-sm text-[20px] font-bold text-primary">{{ $title ?? 'Dashboard' }}</h1>
            <div class="flex items-center gap-4 text-on-surface-variant">
                <button class="hover:text-primary transition-colors"><span class="material-symbols-outlined">notifications</span></button>
            </div>
        </header>

        <!-- Scrollable Content Area -->
        <div class="flex-1 overflow-y-auto p-8">
            <div class="max-w-[1200px] mx-auto">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>
</html>
