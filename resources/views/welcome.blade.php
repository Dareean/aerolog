<x-app-layout :noNav="true">
    <!-- Custom Top Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-canvas border-b border-surface-container-high flat no shadows">
        <div class="max-w-[1200px] mx-auto flex justify-between items-center h-16 px-lg">
            <div class="font-display-sm text-display-sm font-bold tracking-tighter text-primary">AeroLog</div>
                <div class="hidden md:flex gap-lg">
                <a class="text-primary font-bold border-b-2 border-primary pb-1 cursor-pointer" href="/">{{ __('Home') }}</a>
                <a class="text-on-surface-variant hover:text-primary transition cursor-pointer" href="#about">{{ __('About') }}</a>
                <a class="text-on-surface-variant hover:text-primary transition cursor-pointer" href="#testimonials">{{ __('Testimonials') }}</a>
            </div>
            <div class="flex items-center gap-md">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-primary text-on-primary h-[40px] px-lg rounded-lg font-button-label text-button-label hover:bg-surface-dark transition-colors inline-flex items-center justify-center">{{ __('Dashboard') }}</a>
                @else
                    <a href="{{ route('login') }}" class="text-on-surface-variant hover:text-primary transition-colors font-button-label">{{ __('Log in') }}</a>
                    <a href="{{ route('register') }}" class="bg-primary text-on-primary h-[40px] px-lg rounded-lg font-button-label text-button-label hover:bg-surface-dark transition-colors inline-flex items-center justify-center">{{ __('Sign Up') }}</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="pt-20">
        <main class="flex-grow w-full max-w-[1200px] mx-auto px-lg">
            <!-- Hero -->
            <section class="block pb-section">
                <div class="relative w-full rounded-xl mt-xl overflow-hidden bg-gradient-to-b from-sky-gradient-start to-canvas pt-xxl px-lg md:px-xxl text-center">
                    <div class="max-w-3xl mx-auto mb-lg" data-reveal>
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-canvas border border-surface-strong text-[12px] font-semibold tracking-wide text-primary mb-lg shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-[#0d74ce]"></span>
                            {{ __('AeroLog for pilots, dispatchers, and operations teams') }}
                        </div>
                        <div class="mb-4 text-[13px] font-semibold tracking-[0.18em] uppercase text-[#0d74ce]">
                            <span class="type-cursor" data-typewriter='@json([__("Catat sektor."), __("Tinjau performa."), __("Kirim ke dispatch.")])'>{{ __('Catat sektor.') }}</span>
                        </div>
                        <h1 class="font-display-mega text-[32px] md:text-display-mega text-primary mb-lg leading-tight md:leading-none">{{ __('AeroLog membuat pencatatan penerbangan terasa cepat, cerdas, dan siap dipakai tim operasional.') }}</h1>
                        <p class="font-display-sm text-display-sm text-on-surface-variant font-normal max-w-2xl mx-auto">{{ __('Catat sektor, lihat performa pendaratan, dan baca telemetri penting dalam satu alur kerja yang bersih untuk cockpit dan dispatch.') }}</p>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-md mb-xl" data-reveal>
                        @auth
                            <a href="{{ route('dashboard') }}" class="bg-primary text-on-primary h-[40px] px-xl rounded-lg font-button-label text-button-label hover:bg-surface-dark transition-colors inline-flex items-center justify-center">{{ __('Go to Dashboard') }}</a>
                        @else
                            <a href="{{ route('register') }}" class="bg-primary text-on-primary h-[40px] px-xl rounded-lg font-button-label text-button-label hover:bg-surface-dark transition-colors inline-flex items-center justify-center">{{ __('Buat Akun AeroLog') }}</a>
                            <a href="{{ route('login') }}" class="h-[40px] px-xl rounded-lg font-button-label text-button-label border border-surface-strong text-primary hover:border-primary hover:text-primary transition-colors inline-flex items-center justify-center">{{ __('Masuk') }}</a>
                        @endauth
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-md max-w-4xl mx-auto mb-lg text-left" data-reveal>
                        <div class="bg-canvas border border-surface-strong rounded-lg p-lg shadow-sm">
                            <div class="font-title-sm text-primary mb-1">{{ __('Catat sektor lebih cepat') }}</div>
                            <div class="font-body-sm text-on-surface-variant">{{ __('Alur input yang ringkas untuk flight log harian.') }}</div>
                        </div>
                        <div class="bg-canvas border border-surface-strong rounded-lg p-lg shadow-sm">
                            <div class="font-title-sm text-primary mb-1">{{ __('Telemetri yang mudah dibaca') }}</div>
                            <div class="font-body-sm text-on-surface-variant">{{ __('Landing rate, block time, dan fuel insight dalam satu tampilan.') }}</div>
                        </div>
                        <div class="bg-canvas border border-surface-strong rounded-lg p-lg shadow-sm">
                            <div class="font-title-sm text-primary mb-1">{{ __('Ruang kerja untuk tim operasional') }}</div>
                            <div class="font-body-sm text-on-surface-variant">{{ __('Pilot dan dispatcher melihat data yang sama, tanpa bolak-balik tools.') }}</div>
                        </div>
                    </div>

                    <div class="w-full max-w-4xl mx-auto h-[240px] md:h-[360px] bg-canvas-soft border-t border-x border-surface-strong rounded-t-xl shadow-[0_-10px_40px_rgba(0,0,0,0.05)] relative overflow-hidden" data-reveal>
                        <div class="absolute inset-0 bg-cover bg-center opacity-80" data-parallax data-parallax-speed="18" style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuD0IvJ6uB6aYa3BrvYG3bYJpod6bzB7jgesFRD8mhc1XUkfT1DEX3k2V7fxIVVLlxx6PKiRy3aBgQ8hA9IheJyfaehdWG13XQ1Le5oH8C4HiJ6Qysv_IthJi-p5BQb9MLzX6_r4GJ5r0FOJERygWrnR7mVnKpUP2jLMGC4bqxPQe4cEdajA1X-uBnK1ucuO8RHkccoIEvxOkfWXhA4cjIkZSg5cO9qecWIamy_YWC3sPO0AgGpxD2goxxh8Ekam4UWez7K-ZmqDZQI')"></div>
                        <svg class="absolute left-1/2 top-1/2 w-[280px] md:w-[380px] -translate-x-1/2 -translate-y-[58%] drop-shadow-[0_18px_25px_rgba(0,0,0,0.14)]" viewBox="0 0 760 360" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-parallax data-parallax-speed="10" data-parallax-direction="down">
                            <path d="M86 248C180 230 270 204 366 160C462 116 565 92 678 88" stroke="#0d74ce" stroke-width="3" stroke-linecap="round" stroke-dasharray="10 12" opacity="0.35"/>
                            <path d="M106 250C196 233 280 207 370 165C460 123 558 99 666 96" stroke="#171717" stroke-width="2" stroke-linecap="round" stroke-dasharray="2 16" opacity="0.18"/>
                            <g filter="url(#planeShadow)">
                                <path d="M327 184L578 92C593 87 607 90 615 101C623 113 620 128 607 136L478 214L362 251L327 184Z" fill="#000000"/>
                                <path d="M361 201L531 118L555 126L473 171L419 200L361 201Z" fill="#0d74ce" opacity="0.85"/>
                                <path d="M326 184L260 165C252 162 247 154 249 146C251 137 260 132 269 134L347 153L326 184Z" fill="#171717"/>
                                <path d="M379 245L424 212L442 219L404 258C394 268 377 256 379 245Z" fill="#171717"/>
                                <path d="M476 213L552 258C559 262 568 261 574 256C581 249 581 239 575 233L538 199L476 213Z" fill="#171717"/>
                                <circle cx="512" cy="135" r="8" fill="#ffffff" opacity="0.95"/>
                                <circle cx="512" cy="135" r="4" fill="#0d74ce"/>
                            </g>
                            <defs>
                                <filter id="planeShadow" x="220" y="80" width="430" height="220" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feDropShadow dx="0" dy="12" stdDeviation="12" flood-color="#000000" flood-opacity="0.14"/>
                                </filter>
                            </defs>
                        </svg>
                        <div class="absolute top-6 left-6 hidden md:flex items-center gap-2 rounded-full bg-canvas/90 backdrop-blur px-3 py-2 border border-surface-strong shadow-sm" data-parallax data-parallax-speed="8" data-parallax-direction="down">
                            <span class="w-2 h-2 rounded-full bg-[#16a34a]"></span>
                            <span class="text-[12px] font-semibold text-primary">{{ __('Live telemetry ready') }}</span>
                        </div>
                        <div class="absolute bottom-6 right-6 hidden md:flex items-center gap-2 rounded-full bg-canvas/90 backdrop-blur px-3 py-2 border border-surface-strong shadow-sm" data-parallax data-parallax-speed="12">
                            <span class="material-symbols-outlined text-[16px] text-[#0d74ce]">trending_up</span>
                            <span class="text-[12px] font-semibold text-primary">{{ __('Parallax flight deck') }}</span>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-canvas to-transparent"></div>
                    </div>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-lg mt-section">
                    <div class="bg-canvas border border-surface-strong rounded-xl p-lg shadow-sm" data-reveal>
                        <span class="material-symbols-outlined text-[32px] text-[#0d74ce] mb-md">route</span>
                        <h3 class="font-title-md text-title-md text-primary mb-sm">{{ __('Briefing rute yang cepat dipahami') }}</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('AeroLog merangkum sektor, asal-tujuan, dan catatan penerbangan agar briefing lebih singkat dan tepat sasaran.') }}</p>
                    </div>
                    <div class="bg-canvas border border-surface-strong rounded-xl p-lg shadow-sm" data-reveal>
                        <span class="material-symbols-outlined text-[32px] text-[#0d74ce] mb-md">medical_services</span>
                        <h3 class="font-title-md text-title-md text-primary mb-sm">{{ __('Status kru yang lebih aman') }}</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('Pantau jam terbang dan jeda istirahat agar tim tetap berada pada kondisi operasional yang layak.') }}</p>
                    </div>
                    <div class="bg-canvas border border-surface-strong rounded-xl p-lg shadow-sm" data-reveal>
                        <span class="material-symbols-outlined text-[32px] text-[#0d74ce] mb-md">speed</span>
                        <h3 class="font-title-md text-title-md text-primary mb-sm">{{ __('Telemetri langsung ke dispatch') }}</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('Data penting seperti block time, fuel burn, dan landing rate mengalir tanpa input ulang manual.') }}</p>
                    </div>
                </div>
            </section>

            <!-- ABOUT SECTION PLACEHOLDER -->
            <section id="about" class="pb-section pt-xl" data-reveal>
                <div class="text-center mb-xl">
                    <h2 class="font-display-xl text-display-xl text-primary mb-md">{{ __('Mengapa AeroLog relevan untuk operasi modern?') }}</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mx-auto">
                        {{ __('AeroLog dirancang untuk menyatukan pencatatan penerbangan, analisis performa, dan komunikasi dispatch dalam satu pengalaman yang rapi.') }}
                    </p>
                </div>
                <div class="bg-surface-bright border border-surface-strong rounded-xl p-xl shadow-sm text-center">
                    <p class="font-body-lg text-on-surface-variant italic">
                        {{ __('Tujuan kami sederhana: mengurangi pekerjaan manual, mempercepat review penerbangan, dan memberi kru visibilitas yang lebih baik atas data yang mereka hasilkan setiap hari.') }}
                    </p>
                </div>
            </section>

            <!-- TESTIMONIALS PLACEHOLDER -->
            <section id="testimonials" class="pb-section" data-reveal>
                <div class="text-center mb-xl">
                    <h2 class="font-display-xl text-display-xl text-primary mb-md">{{ __('Dipilih untuk alur kerja yang lebih tenang') }}</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mx-auto">
                        {{ __('Bukan sekadar catatan penerbangan, AeroLog memberi konteks agar keputusan operasional terasa lebih cepat dan lebih yakin.') }}
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
                    <div class="bg-canvas border border-surface-strong rounded-xl p-lg shadow-sm" data-reveal>
                        <p class="font-body-md text-on-surface-variant mb-md">{{ __('"AeroLog membuat briefing kami jauh lebih cepat. Data yang tadinya tersebar sekarang terkumpul rapi dalam satu tempat."') }}</p>
                        <div class="flex items-center gap-sm">
                            <div class="w-10 h-10 rounded-full bg-surface-dim flex items-center justify-center text-primary font-bold">SM</div>
                            <div>
                                <h4 class="font-title-sm text-primary">{{ __('Sarah Miller') }}</h4>
                                <p class="font-body-sm text-on-surface-variant">{{ __('Senior Dispatcher') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-canvas border border-surface-strong rounded-xl p-lg shadow-sm" data-reveal>
                        <p class="font-body-md text-on-surface-variant mb-md">{{ __('"Pemantauan kelelahan dan landing rate memberi saya gambaran yang lebih jelas sebelum menutup sektor."') }}</p>
                        <div class="flex items-center gap-sm">
                            <div class="w-10 h-10 rounded-full bg-surface-dim flex items-center justify-center text-primary font-bold">JD</div>
                            <div>
                                <h4 class="font-title-sm text-primary">{{ __('Capt. John Doe') }}</h4>
                                <p class="font-body-sm text-on-surface-variant">{{ __('A320 Captain') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA -->
            <div class="mb-section bg-surface-bright border border-surface-strong rounded-xl p-xxl text-center" data-reveal>
                <h2 class="font-display-xl text-display-xl text-primary mb-md">{{ __('Siap melihat AeroLog bekerja di alur operasimu?') }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-lg max-w-2xl mx-auto">{{ __('Masuk untuk mencatat penerbangan, atau daftar untuk mulai membangun jejak operasional yang lebih rapi sejak hari pertama.') }}</p>
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-primary text-on-primary h-[40px] px-xl rounded-lg font-button-label text-button-label hover:bg-surface-dark transition-colors inline-flex items-center justify-center">{{ __('Go to Dashboard') }}</a>
                @else
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-md">
                        <a href="{{ route('register') }}" class="bg-primary text-on-primary h-[40px] px-xl rounded-lg font-button-label text-button-label hover:bg-surface-dark transition-colors inline-flex items-center justify-center">{{ __('Buat Akun AeroLog') }}</a>
                        <a href="{{ route('login') }}" class="h-[40px] px-xl rounded-lg font-button-label text-button-label border border-surface-strong text-primary hover:border-primary hover:text-primary transition-colors inline-flex items-center justify-center">{{ __('Masuk') }}</a>
                    </div>
                @endauth
                <p class="font-body-sm text-on-surface-variant mt-md">{{ __('Tanpa kartu kredit, tanpa proses yang berbelit, fokus langsung ke data penerbangan.') }}</p>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="w-full py-xl border-t border-surface-container dark:border-outline-variant bg-surface-container-lowest dark:bg-surface-dark mt-auto">
        <div class="max-w-[1200px] mx-auto px-lg flex flex-col md:flex-row justify-between items-center gap-base">
            <div class="font-title-md text-title-md font-bold text-primary dark:text-primary-fixed">
                AeroLog
            </div>
            <div class="text-on-surface dark:text-on-surface-variant font-body-sm text-body-sm text-center md:text-left">
                {{ __('© 2024 AeroLog Aviation. Ketelitian teknis untuk telemetri penerbangan.') }}
            </div>
            <div class="flex flex-wrap justify-center gap-md font-body-sm text-body-sm">
                <a class="text-ink-muted dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all opacity-90 hover:opacity-100" href="#">{{ __('Terms of Service') }}</a>
                <a class="text-ink-muted dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all opacity-90 hover:opacity-100" href="#">{{ __('Privacy Policy') }}</a>
                <a class="text-ink-muted dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all opacity-90 hover:opacity-100" href="#">{{ __('Technical Support') }}</a>
                <a class="text-ink-muted dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all opacity-90 hover:opacity-100" href="#">{{ __('API Documentation') }}</a>
            </div>
        </div>
    </footer>
</x-app-layout>
