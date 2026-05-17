<x-app-layout :noNav="true">
    <!-- Custom Top Navigation (design provided) -->
    <nav class="fixed top-0 w-full z-50 bg-canvas dark:bg-surface-dark border-b border-surface-container-high dark:border-outline-variant flat no shadows">
        <div class="max-w-[1200px] mx-auto flex justify-between items-center h-16 px-lg">
            <div class="font-display-sm text-display-sm font-bold tracking-tighter text-primary dark:text-primary-fixed">AeroLog</div>
            <div class="hidden md:flex gap-lg">
                <a class="text-primary dark:text-primary-fixed font-bold border-b-2 border-primary dark:border-primary-fixed pb-1 cursor-pointer active:scale-95 transition-transform" href="#landing">Landing</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed transition cursor-pointer active:scale-95" href="#pilot">Pilot</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed transition cursor-pointer active:scale-95" href="#dispatcher">Dispatcher</a>
            </div>
            <div class="flex items-center gap-md">
                <div class="flex gap-sm text-on-surface-variant">
                    <span class="material-symbols-outlined cursor-pointer hover:text-primary transition-colors">settings</span>
                    <span class="material-symbols-outlined cursor-pointer hover:text-primary transition-colors">notifications</span>
                </div>
                <a href="{{ route('login') }}" class="bg-primary text-on-primary h-[40px] px-lg rounded-lg font-button-label text-button-label hover:bg-surface-dark transition-colors">Sign In</a>
            </div>
        </div>
    </nav>

    <div class="pt-20">
        <main class="flex-grow w-full max-w-[1200px] mx-auto px-lg">
            <!-- VIEW 1: LANDING PAGE -->
            <section id="view-landing" class="block pb-section">
                <!-- Hero -->
                <div class="relative w-full rounded-xl mt-xl overflow-hidden bg-gradient-to-b from-sky-gradient-start to-canvas pt-xxl px-lg md:px-xxl text-center">
                    <div class="max-w-3xl mx-auto mb-xl">
                        <h1 class="font-display-mega text-display-mega text-primary mb-lg">Next-Generation Flight Logging. Powered by AI.</h1>
                        <p class="font-display-sm text-display-sm text-on-surface-variant font-normal">Abandon paper logbooks. AeroLog delivers predictive analytics, fatigue monitoring, and instant telemetry directly from the flight deck.</p>
                    </div>

                    <div class="w-full max-w-4xl mx-auto h-[360px] bg-canvas-soft border-t border-x border-surface-strong rounded-t-xl shadow-[0_-10px_40px_rgba(0,0,0,0.05)] relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center opacity-80" style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuD0IvJ6uB6aYa3BrvYG3bYJpod6bzB7jgesFRD8mhc1XUkfT1DEX3k2V7fxIVVLlxx6PKiRy3aBgQ8hA9IheJyfaehdWG13XQ1Le5oH8C4HiJ6Qysv_IthJi-p5BQb9MLzX6_r4GJ5r0FOJERygWrnR7mVnKpUP2jLMGC4bqxPQe4cEdajA1X-uBnK1ucuO8RHkccoIEvxOkfWXhA4cjIkZSg5cO9qecWIamy_YWC3sPO0AgGpxD2goxxh8Ekam4UWez7K-ZmqDZQI')"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-canvas to-transparent"></div>
                    </div>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-lg mt-section">
                    <div class="glass-card p-xl">
                        <span class="material-symbols-outlined text-[32px] text-secondary mb-md">route</span>
                        <h3 class="font-title-md text-title-md text-primary mb-sm">Eco-Route AI</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Machine learning models calculate the most fuel-efficient trajectories in real-time, reducing operational costs.</p>
                    </div>
                    <div class="glass-card p-xl">
                        <span class="material-symbols-outlined text-[32px] text-secondary mb-md">health_metrics</span>
                        <h3 class="font-title-md text-title-md text-primary mb-sm">Crew Fatigue</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Continuous monitoring of flight hours and layover periods ensures compliance with regulatory rest requirements.</p>
                    </div>
                    <div class="glass-card p-xl">
                        <span class="material-symbols-outlined text-[32px] text-secondary mb-md">speed</span>
                        <h3 class="font-title-md text-title-md text-primary mb-sm">Instant Telemetry</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Sync direct block times, fuel burns, and landing rates to dispatch instantly upon engine shutdown.</p>
                    </div>
                </div>

                <!-- CTA -->
                <div class="mt-section bg-surface-bright border border-surface-strong rounded-xl p-xxl text-center">
                    <h2 class="font-display-xl text-display-xl text-primary mb-md">Ready for Takeoff?</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-lg max-w-2xl mx-auto">Join leading carriers updating their fleet management with AeroLog's predictive infrastructure.</p>
                    <button class="bg-primary text-on-primary h-[40px] px-xl rounded-lg font-button-label text-button-label hover:bg-surface-dark transition-colors">Request Dispatcher Access</button>
                </div>
            </section>

            <!-- VIEW 2: PILOT DASHBOARD (static example) -->
            <section id="view-pilot" class="hidden pb-section mt-xl">
                <header class="mb-xl flex justify-between items-end">
                    <div>
                        <h1 class="font-display-lg text-display-lg text-primary">Welcome back, Capt. Dareean</h1>
                        <p class="font-body-md text-body-md text-on-surface-variant mt-xxs">Your next scheduled duty: <span class="font-metrics-mono text-metrics-mono">WAAA</span> - <span class="font-metrics-mono text-metrics-mono">WRSJ</span></p>
                    </div>
                    <button class="bg-primary text-on-primary h-[40px] px-lg rounded-lg font-button-label text-button-label">Start Preflight</button>
                </header>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-xl">
                    <div class="mono-tile">
                        <div class="font-label-caps text-label-caps text-on-surface-variant mb-xs">TOTAL FLIGHT HOURS</div>
                        <div class="text-[24px] font-bold text-primary">142.5 hrs</div>
                    </div>
                    <div class="mono-tile">
                        <div class="font-label-caps text-label-caps text-on-surface-variant mb-xs">AVG LANDING RATE</div>
                        <div class="text-[24px] font-bold text-primary">-180 fpm</div>
                    </div>
                    <div class="mono-tile flex flex-col justify-between">
                        <div class="font-label-caps text-label-caps text-on-surface-variant mb-xs">FATIGUE STATUS</div>
                        <div>
                            <span class="inline-flex items-center px-sm py-[4px] rounded-full bg-semantic-success/10 text-semantic-success font-label-caps text-label-caps">
                                <span class="material-symbols-outlined text-[14px] mr-xxs">check_circle</span> CLEARED TO FLY
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-lg">
                    <div class="lg:col-span-2 glass-card p-xl">
                        <h2 class="font-title-md text-title-md text-primary mb-lg border-b border-surface-strong pb-sm">Log New Sector</h2>
                        <form class="space-y-lg">
                            <div class="grid grid-cols-2 gap-md">
                                <div>
                                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-xs">FLIGHT NO</label>
                                    <input class="w-full h-[44px] border border-surface-dim rounded px-sm focus:border-primary focus:ring-0 font-metrics-mono text-metrics-mono" type="text" value="AL-8492"/>
                                </div>
                                <div>
                                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-xs">ROUTE</label>
                                    <div class="flex items-center gap-xs">
                                        <input class="w-full h-[44px] border border-surface-dim rounded px-sm focus:border-primary focus:ring-0 font-metrics-mono text-metrics-mono" type="text" value="WAAA"/>
                                        <span class="material-symbols-outlined text-on-surface-variant">arrow_forward</span>
                                        <input class="w-full h-[44px] border border-surface-dim rounded px-sm focus:border-primary focus:ring-0 font-metrics-mono text-metrics-mono" type="text" value="WRSJ"/>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-md">
                                <div>
                                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-xs">CRUISE ALTITUDE</label>
                                    <input class="w-full h-[44px] border border-surface-dim rounded px-sm focus:border-primary focus:ring-0 font-metrics-mono text-metrics-mono" type="text" value="35,000 ft"/>
                                </div>
                                <div>
                                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-xs">BLOCK FUEL</label>
                                    <input class="w-full h-[44px] border border-surface-dim rounded px-sm focus:border-primary focus:ring-0 font-metrics-mono text-metrics-mono" type="text" value="12,400 kg"/>
                                </div>
                                <div>
                                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-xs">LANDING RATE</label>
                                    <input class="w-full h-[44px] border border-surface-dim rounded px-sm focus:border-primary focus:ring-0 font-metrics-mono text-metrics-mono" type="text" value="-150 fpm"/>
                                </div>
                            </div>
                            <div class="pt-sm">
                                <button class="bg-primary text-on-primary h-[40px] px-xl rounded-lg font-button-label text-button-label w-full hover:bg-surface-dark transition-colors" type="button">Submit Log</button>
                            </div>
                        </form>
                    </div>

                    <div class="glass-card p-xl border-l-4 border-l-secondary-container bg-gradient-to-br from-surface-container-lowest to-surface-bright">
                        <div class="flex items-center gap-sm mb-md">
                            <span class="material-symbols-outlined text-secondary">memory</span>
                            <h3 class="font-title-md text-title-md text-primary">AI Route Briefing</h3>
                        </div>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-md leading-relaxed">
                            Expected crosswinds at <span class="font-metrics-mono text-metrics-mono bg-canvas-soft px-1 rounded">WRSJ</span>. Recommend FL330 initially to avoid headwind core, stepping up to <span class="font-metrics-mono text-metrics-mono bg-canvas-soft px-1 rounded">35,000 ft</span> over MAKAS. This profile improves fuel efficiency by est. 2.4%.
                        </p>
                        <div class="bg-canvas-soft p-sm rounded border border-surface-strong">
                            <div class="flex justify-between items-center">
                                <span class="font-label-caps text-label-caps text-on-surface-variant">PREDICTED SAVINGS</span>
                                <span class="font-metrics-mono text-metrics-mono text-semantic-success">+240 kg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- VIEW 3: DISPATCHER (static example) -->
            <section class="hidden pb-section mt-xl" id="view-dispatcher">
                <header class="mb-xl">
                    <h1 class="font-display-lg text-display-lg text-primary">Fleet Operations Overview</h1>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-xxs">Live telemetry and post-flight analysis across all active sectors.</p>
                </header>
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-lg">
                    <div class="lg:col-span-3 glass-card overflow-hidden">
                        <div class="p-lg border-b border-surface-strong bg-surface-bright flex justify-between items-center">
                            <h2 class="font-title-md text-title-md text-primary">Recent Logs</h2>
                            <div class="flex gap-sm">
                                <button class="bg-canvas border border-surface-dim h-[32px] px-sm rounded text-body-sm hover:bg-canvas-soft"><span class="material-symbols-outlined text-[16px] align-middle mr-1">filter_list</span>Filter</button>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-canvas-soft border-b border-surface-strong font-label-caps text-label-caps text-on-surface-variant">
                                        <th class="p-md font-medium">DATE</th>
                                        <th class="p-md font-medium">PILOT</th>
                                        <th class="p-md font-medium">ROUTE</th>
                                        <th class="p-md font-medium">LANDING SCORE</th>
                                        <th class="p-md font-medium">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody class="font-body-sm text-body-sm divide-y divide-surface-strong">
                                    <tr class="hover:bg-surface-bright transition-colors">
                                        <td class="p-md">Oct 24, 08:30Z</td>
                                        <td class="p-md font-medium">Capt. M. Rossi</td>
                                        <td class="p-md font-metrics-mono text-metrics-mono text-on-surface-variant">LIRF - EGLL</td>
                                        <td class="p-md font-metrics-mono text-metrics-mono">-120 fpm</td>
                                        <td class="p-md">
                                            <span class="inline-flex px-sm py-[2px] rounded-full bg-semantic-success/10 text-semantic-success font-label-caps text-label-caps">NOMINAL</span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-surface-bright transition-colors bg-error-container/20">
                                        <td class="p-md">Oct 24, 07:15Z</td>
                                        <td class="p-md font-medium">F/O S. Chen</td>
                                        <td class="p-md font-metrics-mono text-metrics-mono text-on-surface-variant">VHHH - RJTT</td>
                                        <td class="p-md font-metrics-mono text-metrics-mono text-semantic-error font-bold">-600 fpm</td>
                                        <td class="p-md">
                                            <span class="inline-flex px-sm py-[2px] rounded-full bg-semantic-error/10 text-semantic-error font-label-caps text-label-caps">HARD LANDING</span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-surface-bright transition-colors">
                                        <td class="p-md">Oct 24, 06:40Z</td>
                                        <td class="p-md font-medium">Capt. Dareean</td>
                                        <td class="p-md font-metrics-mono text-metrics-mono text-on-surface-variant">WAAA - WRSJ</td>
                                        <td class="p-md font-metrics-mono text-metrics-mono">-180 fpm</td>
                                        <td class="p-md">
                                            <span class="inline-flex px-sm py-[2px] rounded-full bg-semantic-success/10 text-semantic-success font-label-caps text-label-caps">NOMINAL</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="glass-card p-lg bg-surface-bright">
                        <h2 class="font-title-md text-title-md text-primary mb-md flex items-center gap-xs">
                            <span class="material-symbols-outlined text-accent-warning">military_tech</span> Efficiency Leaders
                        </h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-lg pb-sm border-b border-surface-strong">Based on AI optimal route adherence (30 days).</p>
                        <ul class="space-y-md">
                            <li class="flex justify-between items-center">
                                <div class="flex items-center gap-sm">
                                    <div class="w-8 h-8 rounded-full bg-canvas border border-surface-strong flex items-center justify-center font-label-caps text-primary">1</div>
                                    <span class="font-body-sm font-medium">Capt. Dareean</span>
                                </div>
                                <span class="font-metrics-mono text-metrics-mono text-semantic-success text-[12px]">+4.2%</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <div class="flex items-center gap-sm">
                                    <div class="w-8 h-8 rounded-full bg-canvas border border-surface-strong flex items-center justify-center font-label-caps text-primary">2</div>
                                    <span class="font-body-sm font-medium">Capt. M. Rossi</span>
                                </div>
                                <span class="font-metrics-mono text-metrics-mono text-semantic-success text-[12px]">+3.8%</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <div class="flex items-center gap-sm">
                                    <div class="w-8 h-8 rounded-full bg-canvas border border-surface-strong flex items-center justify-center font-label-caps text-primary">3</div>
                                    <span class="font-body-sm font-medium">F/O T. Baker</span>
                                </div>
                                <span class="font-metrics-mono text-metrics-mono text-semantic-success text-[12px]">+2.9%</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const links = document.querySelectorAll('nav a');
            const views = {
                'landing': document.getElementById('view-landing'),
                'pilot': document.getElementById('view-pilot'),
                'dispatcher': document.getElementById('view-dispatcher')
            };

            function switchView(viewId) {
                Object.values(views).forEach(el => { if(el){ el.classList.add('hidden'); el.classList.remove('block'); } });
                if(views[viewId]){ views[viewId].classList.remove('hidden'); views[viewId].classList.add('block'); }
                links.forEach(link => {
                    const targetId = link.getAttribute('href').substring(1);
                    if (targetId === viewId) {
                        link.className = "text-primary font-bold border-b-2 border-primary pb-1";
                    } else {
                        link.className = "text-on-surface-variant hover:text-primary transition-colors";
                    }
                });
            }

            links.forEach(link => {
                link.addEventListener('click', (e) => { e.preventDefault(); const targetId = link.getAttribute('href').substring(1); switchView(targetId); });
            });
        });
    </script>

<!-- Footer moved into this view to match example HTML -->
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
