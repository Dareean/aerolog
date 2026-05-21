<x-sidebar-layout title="{{ __('Overview') }}">
    @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-[#e6f4ea] text-[#137333] rounded-lg font-medium text-[14px] flex items-center gap-2 border border-[#137333]/20">
            <span class="material-symbols-outlined text-[18px]">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
            <div class="mb-4 px-4 py-3 bg-[#fff2f2] text-[#ba1a1a] rounded-lg font-medium text-[14px] flex items-center gap-2 border border-[#ba1a1a]/20">
            <span class="material-symbols-outlined text-[18px]">error</span>
            {{ __('Please check the form below for errors.') }}
        </div>
    @endif

    @if(Auth::user()->role === 'pilot')
        <!-- PILOT DASHBOARD -->
        <section>
            <header class="mb-xl flex justify-between items-end">
                <div>
                    <h1 class="font-display-lg text-[28px] font-bold text-primary mb-1">{{ __('Welcome back, :name', ['name' => Auth::user()->full_name]) }}</h1>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-xl">
                <div class="bg-canvas border border-surface-strong rounded-xl p-6 shadow-sm">
                    <div class="font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('TOTAL FLIGHT HOURS') }}</div>
                    <div class="text-[28px] font-bold text-primary tracking-tight">{{ number_format($totalFlightHours ?? 0, 1) }} <span class="text-[16px] font-medium text-on-surface-variant tracking-normal">{{ __('hrs') }}</span></div>
                </div>
                <div class="bg-canvas border border-surface-strong rounded-xl p-6 shadow-sm">
                    <div class="font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('AVG LANDING RATE') }}</div>
                    <div class="text-[28px] font-bold text-primary tracking-tight">{{ number_format($avgLandingRate ?? 0, 0) }} <span class="text-[16px] font-medium text-on-surface-variant tracking-normal">{{ __('fpm') }}</span></div>
                </div>
                <div class="bg-canvas border border-surface-strong rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div class="font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('FATIGUE STATUS') }}</div>
                    <div>
                        @if(($fatigueStatus ?? 'CLEARED TO FLY') === 'CLEARED TO FLY')
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full bg-[#e6f4ea] text-[#137333] font-label-caps text-[12px] font-bold tracking-wider">
                                <span class="material-symbols-outlined text-[16px] mr-1">check_circle</span> {{ __('CLEARED TO FLY') }}
                            </span>
                        @else
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full bg-[#fff2f2] text-[#ba1a1a] font-label-caps text-[12px] font-bold tracking-wider">
                                <span class="material-symbols-outlined text-[16px] mr-1">warning</span> {{ __('WARNING') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Log Form -->
                <div class="lg:col-span-2 bg-canvas border border-surface-strong rounded-xl shadow-sm p-8">
                    <h2 class="font-title-md text-[18px] font-bold text-primary mb-6 pb-4 border-b border-surface-strong">{{ __('Log New Sector') }}</h2>
                    <form class="space-y-6" method="POST" action="{{ route('flight-logs.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('FLIGHT NO') }}</label>
                                <input name="aircraft_code" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm" type="text" placeholder="e.g. AL-8492" required/>
                            </div>
                            <div>
                                <label class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('ROUTE') }}</label>
                                <div class="flex items-center gap-2">
                                    <select name="origin_airport" id="origin_airport" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-2 text-[14px] focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm bg-white" required>
                                        <option value="" disabled selected>{{ __('Origin') }}</option>
                                        @foreach($airports ?? [] as $airport)
                                            <option value="{{ $airport }}">{{ $airport }}</option>
                                        @endforeach
                                    </select>
                                    <span class="material-symbols-outlined text-on-surface-variant text-[18px]">arrow_forward</span>
                                    <select name="destination_airport" id="destination_airport" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-2 text-[14px] focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm bg-white" required>
                                        <option value="" disabled selected>{{ __('Dest.') }}</option>
                                        @foreach($airports ?? [] as $airport)
                                            <option value="{{ $airport }}">{{ $airport }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('DEPARTURE TIME (LOCAL)') }}</label>
                                <input name="departure_time" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm bg-white" type="datetime-local" required/>
                            </div>
                            <div>
                                <label class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('ARRIVAL TIME (LOCAL)') }}</label>
                                <input name="arrival_time" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm bg-white" type="datetime-local" required/>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('CRUISE ALTITUDE') }}</label>
                                <input name="cruise_altitude" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm" type="text" placeholder="35,000 ft" required/>
                            </div>
                            <div>
                                <label class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('BLOCK FUEL (kg)') }}</label>
                                <input name="fuel_consumption" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm" type="number" step="0.01" placeholder="12400" required/>
                            </div>
                            <div>
                                <label class="block font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('LANDING RATE (fpm)') }}</label>
                                <input name="landing_rate" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none font-metrics-mono text-primary shadow-sm" type="number" placeholder="-150" required/>
                            </div>
                        </div>
                        <div class="pt-2">
                            <button class="bg-primary text-on-primary h-[48px] px-6 rounded-lg font-button-label text-[15px] font-medium w-full hover:bg-[#171717] transition-colors shadow-sm" type="submit">{{ __('Submit Log') }}</button>
                        </div>
                    </form>
                </div>

                <!-- AI Briefing -->
                <div class="bg-gradient-to-br from-[#fcf9f8] to-white border border-[#0d74ce]/20 border-l-4 border-l-[#0d74ce] rounded-xl shadow-sm p-6 flex flex-col">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-[#0d74ce]">memory</span>
                        <h3 class="font-title-md text-[16px] font-bold text-primary">{{ __('AI Route Briefing') }}</h3>
                    </div>
                    <p id="ai_briefing_text" class="font-body-md text-[14px] text-on-surface-variant mb-6 leading-relaxed flex-grow">
                        {{ __('Please select an Origin and Destination to generate a live AI Briefing.') }}
                    </p>
                    <div class="bg-white p-4 rounded-lg border border-[#e5e2e1] shadow-sm">
                        <div class="flex justify-between items-center">
                            <span class="font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant">{{ __('PREDICTED SAVINGS') }}</span>
                            <span id="ai_briefing_savings" class="font-metrics-mono text-[16px] font-bold text-[#137333]">+0 kg</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pilot Flight History Table -->
            <div class="mt-8 bg-canvas border border-surface-strong rounded-xl shadow-sm overflow-hidden flex flex-col">
                <div class="p-6 border-b border-surface-strong bg-[#fcf9f8] flex justify-between items-center">
                        <h2 class="font-title-md text-[16px] font-bold text-primary">{{ __('Your Recent Flights') }}</h2>
                </div>
                <div class="overflow-x-auto flex-grow">
                    @php
                        $pilotFlightLogs = collect($flightLogs ?? [])->sortByDesc('flight_date')->take(10);
                    @endphp
                    <table class="w-full text-left border-collapse min-w-[700px]">
                        <thead>
                                <tr class="bg-white border-b border-surface-strong font-label-caps text-[11px] font-semibold tracking-wider text-on-surface-variant">
                                <th class="p-4">{{ __('TIMING') }}</th>
                                <th class="p-4">{{ __('FLIGHT NO') }}</th>
                                <th class="p-4">{{ __('ROUTE') }}</th>
                                <th class="p-4">{{ __('LANDING SCORE') }}</th>
                                </tr>
                        </thead>
                        <tbody class="font-body-sm text-[14px] divide-y divide-surface-strong bg-white">
                            @forelse($pilotFlightLogs as $log)
                                @php
                                    $isHardLanding = $log->landing_rate && $log->landing_rate < -400;
                                @endphp
                                <tr class="hover:bg-[#fcf9f8] transition-colors {{ $isHardLanding ? 'bg-[#fff2f2]/40' : '' }}">
                                    <td class="p-4 text-on-surface-variant">
                                        <div class="font-medium text-primary">{{ \Carbon\Carbon::parse($log->departure_time)->format('M d, Y') }}</div>
                                        <div class="text-[12px]">{{ \Carbon\Carbon::parse($log->departure_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($log->arrival_time)->format('H:i') }}</div>
                                    </td>
                                    <td class="p-4 font-medium text-primary">{{ $log->aircraft_code ?? __('Unknown') }}</td>
                                    <td class="p-4 font-metrics-mono text-on-surface-variant">
                                        {{ $log->route->origin_airport ?? __('N/A') }} - {{ $log->route->destination_airport ?? __('N/A') }}
                                    </td>
                                    <td class="p-4 font-metrics-mono {{ $isHardLanding ? 'text-[#ba1a1a] font-bold' : 'text-primary font-medium' }}">
                                        {{ $log->landing_rate ?? __('N/A') }} {{ __('fpm') }}
                                    </td>
                                    <td class="p-4">
                                        @if($isHardLanding)
                                            <span class="inline-flex px-2.5 py-1 rounded-full bg-[#fff2f2] text-[#ba1a1a] font-label-caps text-[10px] font-bold tracking-wider">{{ __('HARD LANDING') }}</span>
                                        @else
                                            <span class="inline-flex px-2.5 py-1 rounded-full bg-[#e6f4ea] text-[#137333] font-label-caps text-[10px] font-bold tracking-wider">{{ __('NOMINAL') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-8 text-center text-on-surface-variant">{{ __("You haven't logged any flights yet.") }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    @elseif(Auth::user()->role === 'dispatcher')
        <!-- DISPATCHER DASHBOARD -->
        <section>
            <header class="mb-xl flex justify-between items-end">
                <div>
                    <h1 class="font-display-lg text-[28px] font-bold text-primary mb-1">{{ __('Fleet Operations Overview') }}</h1>
                    <p class="font-body-md text-on-surface-variant">{{ __('Live telemetry and post-flight analysis across all active sectors.') }}</p>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-xl">
                <div class="bg-canvas border border-surface-strong rounded-xl p-6 shadow-sm">
                    <div class="font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('ACTIVE PILOTS') }}</div>
                    <div class="text-[28px] font-bold text-primary tracking-tight">{{ count($pilots ?? []) }} <span class="text-[16px] font-medium text-on-surface-variant tracking-normal">{{ __('personnel') }}</span></div>
                </div>
                <div class="bg-canvas border border-surface-strong rounded-xl p-6 shadow-sm">
                    <div class="font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('TOTAL FLIGHT LOGS') }}</div>
                    <div class="text-[28px] font-bold text-primary tracking-tight">{{ \App\Models\FlightLog::count() }} <span class="text-[16px] font-medium text-on-surface-variant tracking-normal">{{ __('sectors') }}</span></div>
                </div>
                <div class="bg-canvas border border-surface-strong rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div class="font-label-caps text-[12px] font-semibold tracking-wider text-on-surface-variant mb-2">{{ __('AVG FLEET LANDING RATE') }}</div>
                    <div class="text-[28px] font-bold text-primary tracking-tight">{{ number_format(\App\Models\FlightLog::avg('landing_rate') ?? 0, 0) }} <span class="text-[16px] font-medium text-on-surface-variant tracking-normal">{{ __('fpm') }}</span></div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <div class="lg:col-span-3 bg-canvas border border-surface-strong rounded-xl shadow-sm overflow-hidden flex flex-col">
                    <div class="p-6 border-b border-surface-strong bg-[#fcf9f8] flex justify-between items-center">
                        <h2 class="font-title-md text-[16px] font-bold text-primary">{{ __('Recent Logs') }}</h2>
                    </div>
                    <div class="overflow-x-auto flex-grow">
                        <table class="w-full text-left border-collapse min-w-[700px]">
                            <thead>
                                <tr class="bg-white border-b border-surface-strong font-label-caps text-[11px] font-semibold tracking-wider text-on-surface-variant">
                                    <th class="p-4">{{ __('TIMING') }}</th>
                                    <th class="p-4">{{ __('PILOT') }}</th>
                                    <th class="p-4">{{ __('ROUTE') }}</th>
                                    <th class="p-4">{{ __('LANDING SCORE') }}</th>
                                    <th class="p-4">{{ __('STATUS') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-body-sm text-[14px] divide-y divide-surface-strong bg-white">
                                @forelse($recentLogs ?? [] as $log)
                                    @php
                                        $landingRate = data_get($log, 'landing_rate');
                                        $isHardLanding = $landingRate && $landingRate < -400;
                                    @endphp
                                    <tr class="hover:bg-[#fcf9f8] transition-colors {{ $isHardLanding ? 'bg-[#fff2f2]/40' : '' }}">
                                        <td class="p-4 text-on-surface-variant">
                                            <div class="font-medium text-primary">{{ \Carbon\Carbon::parse(data_get($log, 'departure_time'))->format('M d, Y') }}</div>
                                            <div class="text-[12px]">{{ \Carbon\Carbon::parse(data_get($log, 'departure_time'))->format('H:i') }} - {{ \Carbon\Carbon::parse(data_get($log, 'arrival_time'))->format('H:i') }}</div>
                                        </td>
                                        <td class="p-4 font-medium text-primary">{{ data_get($log, 'user.full_name', __('Unknown Pilot')) }}</td>
                                        <td class="p-4 font-metrics-mono text-on-surface-variant">
                                            {{ data_get($log, 'route.origin_airport', __('N/A')) }} - {{ data_get($log, 'route.destination_airport', __('N/A')) }}
                                        </td>
                                        <td class="p-4 font-metrics-mono {{ $isHardLanding ? 'text-[#ba1a1a] font-bold' : 'text-primary font-medium' }}">
                                            {{ data_get($log, 'landing_rate', __('N/A')) }} {{ __('fpm') }}
                                        </td>
                                        <td class="p-4">
                                            @if($isHardLanding)
                                                    <span class="inline-flex px-2.5 py-1 rounded-full bg-[#fff2f2] text-[#ba1a1a] font-label-caps text-[10px] font-bold tracking-wider">{{ __('HARD LANDING') }}</span>
                                            @else
                                                <span class="inline-flex px-2.5 py-1 rounded-full bg-[#e6f4ea] text-[#137333] font-label-caps text-[10px] font-bold tracking-wider">{{ __('NOMINAL') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-8 text-center text-on-surface-variant">{{ __('No flight logs found in the system.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pilot Roster Management -->
                <div class="bg-canvas border border-surface-strong rounded-xl shadow-sm overflow-hidden flex flex-col" id="pilot-management">
                    <div class="p-6 border-b border-surface-strong bg-[#fcf9f8] flex justify-between items-center">
                        <h2 class="font-title-md text-[16px] font-bold text-primary">{{ __('Pilot Roster') }}</h2>
                        <button onclick="document.getElementById('addPilotModal').classList.remove('hidden')" class="bg-primary text-on-primary px-4 py-2 rounded-lg font-button-label text-[13px] font-medium hover:bg-[#171717] transition-colors shadow-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">add</span> Add Pilot
                        </button>
                    </div>
                    <div class="p-4 flex-grow flex flex-col gap-3 overflow-y-auto max-h-[600px]">
                        @forelse($pilots ?? [] as $pilot)
                            <div class="p-4 border border-surface-strong rounded-lg bg-white flex flex-col gap-2 shadow-sm {{ !$pilot->is_active ? 'opacity-60' : '' }}">
                                <div class="flex justify-between items-start">
                                    <div class="overflow-hidden">
                                        <h3 class="font-bold text-primary text-[14px] truncate">{{ $pilot->full_name }}</h3>
                                        <p class="font-metrics-mono text-[11px] text-on-surface-variant truncate">{{ $pilot->email }}</p>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <button onclick="openEditPilotModal({{ $pilot->id }}, '{{ addslashes($pilot->full_name) }}', '{{ addslashes($pilot->email) }}', {{ $pilot->is_active ? 'true' : 'false' }})" class="p-1.5 text-on-surface-variant hover:text-primary hover:bg-[#fcf9f8] rounded transition-colors" title="Edit Pilot">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                        <form method="POST" action="{{ route('pilots.toggle', $pilot->id) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="p-1.5 {{ $pilot->is_active ? 'text-[#ba1a1a] hover:bg-[#fff2f2]' : 'text-[#137333] hover:bg-[#e6f4ea]' }} rounded transition-colors" title="{{ $pilot->is_active ? 'Deactivate' : 'Reactivate' }}">
                                                <span class="material-symbols-outlined text-[16px]">{{ $pilot->is_active ? 'block' : 'check_circle' }}</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="mt-2 flex items-center justify-between">
                                    @if($pilot->is_active)
                                        <span class="inline-flex px-2.5 py-1 rounded-full bg-[#e6f4ea] text-[#137333] font-label-caps text-[10px] font-bold tracking-wider">{{ __('ACTIVE') }}</span>
                                    @else
                                        <span class="inline-flex px-2.5 py-1 rounded-full bg-[#fff2f2] text-[#ba1a1a] font-label-caps text-[10px] font-bold tracking-wider">{{ __('INACTIVE') }}</span>
                                    @endif
                                    <div class="text-[11px] font-medium text-on-surface-variant">
                                        {{ $pilot->flightLogs()->count() }} {{ __('logs') }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-6 text-on-surface-variant font-body-sm">
                                {{ __('No pilots currently registered.') }}
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            
            <!-- Modals -->
            <!-- Add Pilot Modal -->
            <div id="addPilotModal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4">
                <div class="bg-white rounded-xl shadow-xl w-full max-w-md overflow-hidden">
                    <div class="p-6 border-b border-surface-strong flex justify-between items-center">
                        <h2 class="font-title-md text-[18px] font-bold text-primary">Add New Pilot</h2>
                        <button onclick="document.getElementById('addPilotModal').classList.add('hidden')" class="text-on-surface-variant hover:text-primary">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('pilots.store') }}" class="p-6 space-y-4">
                        @csrf
                        <div>
                            <label class="block font-label-caps text-[12px] font-semibold text-on-surface-variant mb-2">FULL NAME</label>
                            <input type="text" name="full_name" required class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:outline-none font-body-sm text-primary shadow-sm" placeholder="e.g. John Doe">
                        </div>
                        <div>
                            <label class="block font-label-caps text-[12px] font-semibold text-on-surface-variant mb-2">EMAIL</label>
                            <input type="email" name="email" required class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:outline-none font-body-sm text-primary shadow-sm" placeholder="pilot@aerolog.com">
                        </div>
                        <div>
                            <label class="block font-label-caps text-[12px] font-semibold text-on-surface-variant mb-2">DEFAULT PASSWORD</label>
                            <input type="text" name="password" required class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:outline-none font-body-sm text-primary shadow-sm" value="Aerolog2026">
                            <p class="text-[11px] text-on-surface-variant mt-1">Pilot can change this later.</p>
                        </div>
                        <div class="pt-2 flex justify-end gap-3">
                            <button type="button" onclick="document.getElementById('addPilotModal').classList.add('hidden')" class="px-5 py-2.5 text-[14px] font-medium text-on-surface-variant hover:text-primary">Cancel</button>
                            <button type="submit" class="bg-primary text-on-primary px-5 py-2.5 rounded-lg text-[14px] font-medium hover:bg-[#171717] shadow-sm">Save Pilot</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Edit Pilot Modal -->
            <div id="editPilotModal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4">
                <div class="bg-white rounded-xl shadow-xl w-full max-w-md overflow-hidden">
                    <div class="p-6 border-b border-surface-strong flex justify-between items-center">
                        <h2 class="font-title-md text-[18px] font-bold text-primary">Edit Pilot</h2>
                        <button onclick="document.getElementById('editPilotModal').classList.add('hidden')" class="text-on-surface-variant hover:text-primary">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>
                    <form method="POST" id="editPilotForm" class="p-6 space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block font-label-caps text-[12px] font-semibold text-on-surface-variant mb-2">FULL NAME</label>
                            <input type="text" id="edit_full_name" name="full_name" required class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:outline-none font-body-sm text-primary shadow-sm">
                        </div>
                        <div>
                            <label class="block font-label-caps text-[12px] font-semibold text-on-surface-variant mb-2">EMAIL</label>
                            <input type="email" id="edit_email" name="email" required class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:outline-none font-body-sm text-primary shadow-sm">
                        </div>
                        <div>
                            <label class="block font-label-caps text-[12px] font-semibold text-on-surface-variant mb-2">NEW PASSWORD (OPTIONAL)</label>
                            <input type="text" name="password" class="w-full h-[44px] border border-[#e5e2e1] rounded-lg px-4 focus:border-primary focus:outline-none font-body-sm text-primary shadow-sm" placeholder="Leave blank to keep current">
                        </div>
                        <div class="pt-2 flex justify-end gap-3">
                            <button type="button" onclick="document.getElementById('editPilotModal').classList.add('hidden')" class="px-5 py-2.5 text-[14px] font-medium text-on-surface-variant hover:text-primary">Cancel</button>
                            <button type="submit" class="bg-primary text-on-primary px-5 py-2.5 rounded-lg text-[14px] font-medium hover:bg-[#171717] shadow-sm">Update Pilot</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                function openEditPilotModal(id, fullName, email, isActive) {
                    const form = document.getElementById('editPilotForm');
                    form.action = `/pilots/${id}`;
                    document.getElementById('edit_full_name').value = fullName;
                    document.getElementById('edit_email').value = email;
                    document.getElementById('editPilotModal').classList.remove('hidden');
                }
            </script>
        </section>
    @else
        <!-- NO ROLE SET / ERROR -->
            <section class="text-center py-20">
            <span class="material-symbols-outlined text-[64px] text-on-surface-variant mb-4 opacity-50">error</span>
            <h1 class="font-display-lg text-[28px] font-bold text-primary mb-2">{{ __('Unassigned Role') }}</h1>
            <p class="font-body-md text-on-surface-variant max-w-md mx-auto">{{ __('Your account does not have a recognized role. Please contact your system administrator.') }}</p>
        </section>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const originSelect = document.getElementById('origin_airport');
            const destSelect = document.getElementById('destination_airport');
            const briefingText = document.getElementById('ai_briefing_text');
            const savingsText = document.getElementById('ai_briefing_savings');
            const aiBriefingUrl = <?php echo json_encode(route('ai-briefing.generate')); ?>;

            if (originSelect && destSelect) {
                const fetchBriefing = async () => {
                    const origin = originSelect.value;
                    const destination = destSelect.value;

                    if (origin && destination) {
                        // Show loading state
                        briefingText.innerHTML = '<span class="flex items-center gap-2 text-[#0d74ce]"><span class="material-symbols-outlined animate-spin text-[18px]">sync</span> ' + @json(__('Analyzing route dynamics...')) + '</span>';
                        savingsText.innerText = '...';

                        try {
                            const response = await fetch(aiBriefingUrl, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ origin, destination })
                            });

                            const data = await response.json();
                            if (response.ok) {
                                // Add styling to make it look technical
                                let formattedBriefing = data.briefing.split(origin).join(`<span class="font-metrics-mono text-primary bg-surface-dim/30 px-1.5 py-0.5 rounded text-[13px] border border-surface-strong">${origin}</span>`);
                                formattedBriefing = formattedBriefing.split(destination).join(`<span class="font-metrics-mono text-primary bg-surface-dim/30 px-1.5 py-0.5 rounded text-[13px] border border-surface-strong">${destination}</span>`);
                                
                                briefingText.innerHTML = formattedBriefing;
                                savingsText.innerText = `+${data.savings} kg`;
                            } else {
                                briefingText.innerText = data.briefing || @json(__('Failed to generate briefing.'));
                                savingsText.innerText = '+0 kg';
                            }
                        } catch (error) {
                            briefingText.innerText = @json(__('Connection to AI dispatch failed.'));
                            savingsText.innerText = '+0 kg';
                        }
                    }
                };

                originSelect.addEventListener('change', fetchBriefing);
                destSelect.addEventListener('change', fetchBriefing);
            }
        });
    </script>
</x-sidebar-layout>
