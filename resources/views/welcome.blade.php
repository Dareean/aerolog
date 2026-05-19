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
                    <div class="max-w-3xl mx-auto mb-xl">
                        <h1 class="font-display-mega text-[32px] md:text-display-mega text-primary mb-lg leading-tight md:leading-none">{{ __('Next-Generation Flight Logging. Powered by AI.') }}</h1>
                            <p class="font-display-sm text-display-sm text-on-surface-variant font-normal">{{ __('Abandon paper logbooks. AeroLog delivers predictive analytics, fatigue monitoring, and instant telemetry directly from the flight deck.') }}</p>
                    </div>

                    <div class="w-full max-w-4xl mx-auto h-[240px] md:h-[360px] bg-canvas-soft border-t border-x border-surface-strong rounded-t-xl shadow-[0_-10px_40px_rgba(0,0,0,0.05)] relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center opacity-80" style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuD0IvJ6uB6aYa3BrvYG3bYJpod6bzB7jgesFRD8mhc1XUkfT1DEX3k2V7fxIVVLlxx6PKiRy3aBgQ8hA9IheJyfaehdWG13XQ1Le5oH8C4HiJ6Qysv_IthJi-p5BQb9MLzX6_r4GJ5r0FOJERygWrnR7mVnKpUP2jLMGC4bqxPQe4cEdajA1X-uBnK1ucuO8RHkccoIEvxOkfWXhA4cjIkZSg5cO9qecWIamy_YWC3sPO0AgGpxD2goxxh8Ekam4UWez7K-ZmqDZQI')"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-canvas to-transparent"></div>
                    </div>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-lg mt-section">
                    <div class="bg-canvas border border-surface-strong rounded-xl p-lg shadow-sm">
                        <span class="material-symbols-outlined text-[32px] text-[#0d74ce] mb-md">route</span>
                        <h3 class="font-title-md text-title-md text-primary mb-sm">{{ __('Eco-Route AI') }}</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('Machine learning models calculate the most fuel-efficient trajectories in real-time, reducing operational costs.') }}</p>
                    </div>
                    <div class="bg-canvas border border-surface-strong rounded-xl p-lg shadow-sm">
                        <span class="material-symbols-outlined text-[32px] text-[#0d74ce] mb-md">medical_services</span>
                        <h3 class="font-title-md text-title-md text-primary mb-sm">{{ __('Crew Fatigue') }}</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('Continuous monitoring of flight hours and layover periods ensures compliance with regulatory rest requirements.') }}</p>
                    </div>
                    <div class="bg-canvas border border-surface-strong rounded-xl p-lg shadow-sm">
                        <span class="material-symbols-outlined text-[32px] text-[#0d74ce] mb-md">speed</span>
                        <h3 class="font-title-md text-title-md text-primary mb-sm">{{ __('Instant Telemetry') }}</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('Sync direct block times, fuel burns, and landing rates to dispatch instantly upon engine shutdown.') }}</p>
                    </div>
                </div>
            </section>

            <!-- ABOUT SECTION PLACEHOLDER -->
            <section id="about" class="pb-section pt-xl">
                <div class="text-center mb-xl">
                    <h2 class="font-display-xl text-display-xl text-primary mb-md">{{ __('Background & Goals') }}</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mx-auto">
                        {{ __('Placeholder text for AeroLog background. AeroLog was created to modernize flight operations, combining predictive AI with intuitive interfaces for pilots and dispatchers.') }}
                    </p>
                </div>
                <div class="bg-surface-bright border border-surface-strong rounded-xl p-xl shadow-sm text-center">
                    <p class="font-body-lg text-on-surface-variant italic">
                        "Our goal is to eliminate paper trails and empower crews with real-time operational insights, fundamentally changing the safety and efficiency equation in modern aviation."
                    </p>
                </div>
            </section>

            <!-- TESTIMONIALS PLACEHOLDER -->
            <section id="testimonials" class="pb-section">
                <div class="text-center mb-xl">
                    <h2 class="font-display-xl text-display-xl text-primary mb-md">{{ __('Trusted by Professionals') }}</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mx-auto">
                        {{ __('Placeholder text for testimonials. See what leading pilots and dispatchers say about AeroLog.') }}
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
                    <div class="bg-canvas border border-surface-strong rounded-xl p-lg shadow-sm">
                        <p class="font-body-md text-on-surface-variant mb-md">"AeroLog has completely transformed our dispatch workflow. The AI route recommendations are incredibly accurate."</p>
                        <div class="flex items-center gap-sm">
                            <div class="w-10 h-10 rounded-full bg-surface-dim flex items-center justify-center text-primary font-bold">SM</div>
                            <div>
                                <h4 class="font-title-sm text-primary">Sarah Miller</h4>
                                <p class="font-body-sm text-on-surface-variant">Senior Dispatcher</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-canvas border border-surface-strong rounded-xl p-lg shadow-sm">
                        <p class="font-body-md text-on-surface-variant mb-md">"The predictive fatigue monitoring gives me peace of mind. Best electronic flight bag extension I've used."</p>
                        <div class="flex items-center gap-sm">
                            <div class="w-10 h-10 rounded-full bg-surface-dim flex items-center justify-center text-primary font-bold">JD</div>
                            <div>
                                <h4 class="font-title-sm text-primary">Capt. John Doe</h4>
                                <p class="font-body-sm text-on-surface-variant">A320 Captain</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA -->
            <div class="mb-section bg-surface-bright border border-surface-strong rounded-xl p-xxl text-center">
                <h2 class="font-display-xl text-display-xl text-primary mb-md">{{ __('Ready for Takeoff?') }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-lg max-w-2xl mx-auto">{{ __('Join leading carriers updating their fleet management with AeroLog\'s predictive infrastructure.') }}</p>
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-primary text-on-primary h-[40px] px-xl rounded-lg font-button-label text-button-label hover:bg-surface-dark transition-colors inline-flex items-center justify-center">{{ __('Go to Dashboard') }}</a>
                @else
                    <a href="{{ route('register') }}" class="bg-primary text-on-primary h-[40px] px-xl rounded-lg font-button-label text-button-label hover:bg-surface-dark transition-colors inline-flex items-center justify-center">{{ __('Create Account') }}</a>
                @endauth
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
                © 2024 AeroLog Aviation. Technical excellence in flight telemetry.
            </div>
            <div class="flex flex-wrap justify-center gap-md font-body-sm text-body-sm">
                <a class="text-ink-muted dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all opacity-90 hover:opacity-100" href="#">Terms of Service</a>
                <a class="text-ink-muted dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all opacity-90 hover:opacity-100" href="#">Privacy Policy</a>
                <a class="text-ink-muted dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all opacity-90 hover:opacity-100" href="#">Technical Support</a>
                <a class="text-ink-muted dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed hover:underline transition-all opacity-90 hover:opacity-100" href="#">API Documentation</a>
            </div>
        </div>
    </footer>
</x-app-layout>
