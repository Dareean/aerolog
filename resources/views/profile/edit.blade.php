<x-sidebar-layout title="Settings">
    @php($defaultTab = Auth::user()->role === 'dispatcher' ? 'pilot-management' : 'personal-settings')
    <section data-reveal>
        <header class="mb-xl">
            <h1 class="font-display-lg text-[28px] font-bold text-primary mb-1">Account Settings</h1>
            <p class="font-body-md text-on-surface-variant">Manage your profile, password, and security preferences.</p>
        </header>

        <div class="space-y-6">
            <div id="personal-settings" data-reveal>
                <!-- Profile Information -->
                <div class="bg-canvas border border-surface-strong rounded-xl shadow-sm p-8" data-reveal>
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password -->
                <div class="bg-canvas border border-surface-strong rounded-xl shadow-sm p-8" data-reveal>
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            @if(Auth::user()->role === 'dispatcher')
                <!-- Pilot Management (Settings Page) -->
                <div id="pilot-management" class="bg-canvas border border-surface-strong rounded-xl shadow-sm p-6" data-reveal>
                    <div class="p-2 mb-4 flex justify-between items-center">
                        <h2 class="font-title-md text-[16px] font-bold text-primary">Pilot Management</h2>
                        <button id="createPilotBtn" class="bg-primary text-on-primary h-[36px] px-4 rounded-md text-[13px]">Add Pilot</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[600px]">
                            <thead>
                                <tr class="bg-white border-b border-surface-strong font-label-caps text-[11px] font-semibold tracking-wider text-on-surface-variant">
                                    <th class="p-3">NAME</th>
                                    <th class="p-3">EMAIL</th>
                                    <th class="p-3">STATUS</th>
                                    <th class="p-3">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="font-body-sm text-[14px] divide-y divide-surface-strong bg-white">
                                @forelse($pilots ?? [] as $pilot)
                                    <tr class="hover:bg-[#fcf9f8] transition-colors">
                                        <td class="p-3 font-medium text-primary">{{ $pilot->full_name }}</td>
                                        <td class="p-3 text-on-surface-variant">{{ $pilot->email }}</td>
                                        <td class="p-3">
                                            @if($pilot->is_active)
                                                <span class="inline-flex px-2.5 py-1 rounded-full bg-[#e6f4ea] text-[#137333] font-label-caps text-[10px] font-bold">Active</span>
                                            @else
                                                <span class="inline-flex px-2.5 py-1 rounded-full bg-[#fff2f2] text-[#ba1a1a] font-label-caps text-[10px] font-bold">Suspended</span>
                                            @endif
                                        </td>
                                        <td class="p-3">
                                            <div class="flex items-center gap-2">
                                                <button class="editPilotBtn bg-white border border-surface-strong px-3 py-1 rounded-md text-[13px]" 
                                                    data-id="{{ $pilot->id }}"
                                                    data-name="{{ $pilot->full_name }}"
                                                    data-email="{{ $pilot->email }}"
                                                    data-active="{{ $pilot->is_active }}"
                                                >Edit</button>
                                                <form method="POST" action="/pilots/{{ $pilot->id }}/toggle" class="inline">
                                                    @csrf
                                                    <button type="submit" class="bg-[#f3f4f6] px-3 py-1 rounded-md text-[13px]">@if($pilot->is_active) Suspend @else Activate @endif</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-4 text-center text-on-surface-variant">No pilots found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Edit/Create Pilot Modal -->
                <div id="pilotModal" class="fixed inset-0 hidden items-center justify-center bg-black/40 z-50">
                    <div class="bg-white rounded-lg w-[720px] max-w-full p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 id="pilotModalTitle" class="font-title-md text-[16px] font-bold text-primary">Edit Pilot</h3>
                            <button id="closePilotModal" class="text-on-surface-variant">✕</button>
                        </div>
                        <form id="pilotForm" method="POST" action="#">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" />
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-label-caps text-[12px] text-on-surface-variant mb-1">Full name</label>
                                    <input name="full_name" id="pilotName" class="w-full h-[44px] border rounded-lg px-3" type="text" required />
                                </div>
                                <div>
                                    <label class="block font-label-caps text-[12px] text-on-surface-variant mb-1">Email</label>
                                    <input name="email" id="pilotEmail" class="w-full h-[44px] border rounded-lg px-3" type="email" required />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div>
                                    <label class="block font-label-caps text-[12px] text-on-surface-variant mb-1">Password (leave empty to keep)</label>
                                    <input name="password" id="pilotPassword" class="w-full h-[44px] border rounded-lg px-3" type="password" />
                                </div>
                                <div>
                                    <label class="block font-label-caps text-[12px] text-on-surface-variant mb-1">Status</label>
                                    <select name="is_active" id="pilotActive" class="w-full h-[44px] border rounded-lg px-2">
                                        <option value="1">Active</option>
                                        <option value="0">Suspended</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end gap-2">
                                <button type="button" id="cancelPilotBtn" class="px-4 py-2 bg-[#f3f4f6] rounded-md">Cancel</button>
                                <button type="submit" class="px-4 py-2 bg-primary text-on-primary rounded-md">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching: show personal-settings or pilot-management based on hash
            const personalEl = document.getElementById('personal-settings');
            const pilotEl = document.getElementById('pilot-management');
            const defaultTab = "{{ $defaultTab }}";

            function updateTabs() {
                const hash = window.location.hash || `#${defaultTab}`;
                if (hash === '#pilot-management') {
                    if (personalEl) personalEl.classList.add('hidden');
                    if (pilotEl) pilotEl.classList.remove('hidden');
                    // ensure focus/scroll
                    pilotEl?.scrollIntoView({ behavior: 'smooth' });
                } else {
                    if (personalEl) personalEl.classList.remove('hidden');
                    if (pilotEl) pilotEl.classList.add('hidden');
                    personalEl?.scrollIntoView({ behavior: 'smooth' });
                }
            }

            // initial tab state
            updateTabs();
            window.addEventListener('hashchange', updateTabs);

            const pilotModal = document.getElementById('pilotModal');
            const closePilotModal = document.getElementById('closePilotModal');
            const cancelPilotBtn = document.getElementById('cancelPilotBtn');
            const createPilotBtn = document.getElementById('createPilotBtn');
            const pilotForm = document.getElementById('pilotForm');
            const pilotModalTitle = document.getElementById('pilotModalTitle');

            if (!pilotModal) return;

            function openModal() { pilotModal.classList.remove('hidden'); pilotModal.classList.add('flex'); }
            function closeModal() { pilotModal.classList.add('hidden'); pilotModal.classList.remove('flex'); }

            // Edit buttons
            document.querySelectorAll('.editPilotBtn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const email = this.dataset.email;
                    const active = this.dataset.active === '1' || this.dataset.active === 'true';

                    pilotModalTitle.innerText = 'Edit Pilot';
                    document.getElementById('pilotName').value = name;
                    document.getElementById('pilotEmail').value = email;
                    document.getElementById('pilotActive').value = active ? '1' : '0';
                    document.getElementById('pilotPassword').value = '';

                    pilotForm.action = `/pilots/${id}`;
                    pilotForm.querySelector('input[name="_method"]').value = 'PUT';
                    openModal();
                });
            });

            // Create new pilot
            if (createPilotBtn) {
                createPilotBtn.addEventListener('click', function() {
                    pilotModalTitle.innerText = 'Create Pilot';
                    document.getElementById('pilotName').value = '';
                    document.getElementById('pilotEmail').value = '';
                    document.getElementById('pilotPassword').value = '';
                    document.getElementById('pilotActive').value = '1';

                    pilotForm.action = '/pilots';
                    pilotForm.querySelector('input[name="_method"]').value = 'POST';
                    openModal();
                });
            }

            [closePilotModal, cancelPilotBtn].forEach(el => {
                if (el) el.addEventListener('click', closeModal);
            });
        });
    </script>
</x-sidebar-layout>
