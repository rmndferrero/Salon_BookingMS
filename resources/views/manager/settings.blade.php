@extends('layouts.manager')

@section('content')
<div class="max-w-6xl mx-auto w-full">

    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-800 tracking-tight">System Settings</h1>
            <p class="text-gray-400 text-sm mt-1 italic">Manage business operations and schedule blocks.</p>
        </div>
    </header>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-8 font-bold text-sm tracking-wide flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <div class="lg:col-span-5">
            <div class="sibs-card p-8 sticky top-8">
                <h2 class="text-xl font-800 mb-2">Close Operations</h2>
                <p class="text-xs text-gray-400 mb-6 font-bold uppercase tracking-widest">Block out dates from the calendar</p>
                
                <form id="blackout-form" action="{{ route('manager.blackout.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-[10px] text-gray-500 font-bold uppercase tracking-widest mb-1">Closed From</label>
                            <p class="text-[9px] text-gray-400 mb-2">First day of closure</p>
                            <input type="date" name="start_date" id="start_date" required min="{{ now()->addDay()->toDateString() }}" class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-[#b5106a] outline-none transition-colors">
                        </div>
                        <div>
                            <label class="block text-[10px] text-gray-500 font-bold uppercase tracking-widest mb-1">Re-opens On</label>
                            <p class="text-[9px] text-gray-400 mb-2">Day operations resume</p>
                            <input type="date" name="end_date" id="end_date" required min="{{ now()->addDay()->toDateString() }}" class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-[#b5106a] outline-none transition-colors">
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block text-[10px] text-gray-500 font-bold uppercase tracking-widest mb-2">Reason (Internal)</label>
                        <input type="text" name="reason" placeholder="e.g., Christmas Holiday, Renovations" class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:border-[#b5106a] outline-none transition-colors">
                    </div>

                    <button type="button" onclick="previewImpact()" class="w-full bg-[#1a1c1c] text-white px-8 py-4 rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-gray-800 transition-colors">
                        Check Impacts →
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-7">
            <h2 class="text-xl font-800 mb-6 px-2">Upcoming Closures</h2>
            
            <div class="space-y-4">
                @forelse($blackoutDates as $blackout)
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex justify-between items-center group hover:border-red-200 transition-colors">
                        <div>
                            <p class="font-bold text-[#b5106a] text-lg">
                                {{ \Carbon\Carbon::parse($blackout->start_date)->format('M d, Y') }} 
                                @if($blackout->start_date !== $blackout->end_date)
                                    <span class="text-gray-400 font-normal mx-1"><br>Until<br></span>{{ \Carbon\Carbon::parse($blackout->end_date)->format('M d, Y') }}
                                @endif
                            </p>
                            <p class="text-sm text-gray-500 font-medium mt-1">{{ $blackout->reason ?? 'No reason provided' }}</p>
                        </div>

                        <form action="{{ route('manager.blackout.destroy', $blackout->id) }}" method="POST" onsubmit="return confirm('Reopen these dates? Previously cancelled bookings will NOT be restored.');">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-50 text-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-widest transition-colors opacity-0 group-hover:opacity-100">
                                Reopen Date
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="sibs-card p-8 text-center border-dashed border-2">
                        <p class="text-gray-400 font-bold">No upcoming closures.</p>
                        <p class="text-xs text-gray-400 mt-1">The salon is operating on normal hours.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>

<div id="impact-modal" class="fixed inset-0 bg-[#1a1c1c]/90 z-[100] hidden flex items-center justify-center backdrop-blur-md p-4">
    <div class="bg-white w-full max-w-2xl rounded-[2rem] shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">
        
        <div class="bg-red-50 p-6 md:p-8 border-b border-red-100 text-center">
            <div class="w-16 h-16 bg-red-100 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <h2 class="font-headline text-2xl text-red-600 font-bold">Warning: Customers Affected</h2>
            <p class="text-red-400 text-sm mt-2">Closing these dates will automatically cancel the following appointments. Please contact them to reschedule before proceeding.</p>
        </div>

        <div class="flex-1 overflow-auto p-6 md:p-8 bg-gray-50" id="impact-list">
            </div>

        <div class="p-6 border-t border-gray-100 bg-white flex justify-end gap-3">
            <button onclick="document.getElementById('impact-modal').classList.add('hidden')" class="px-6 py-3 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition-colors text-sm uppercase tracking-widest">
                Go Back
            </button>
            <button onclick="document.getElementById('blackout-form').submit()" class="bg-red-500 hover:bg-red-600 text-white px-8 py-3 rounded-xl font-bold text-sm uppercase tracking-widest transition-all shadow-lg shadow-red-500/30">
                Confirm & Cancel Bookings
            </button>
        </div>
    </div>
</div>

<script>
    async function previewImpact() {
        const startDate = document.getElementById('start_date').value;
        const endDate = document.getElementById('end_date').value;
        
        if(!startDate || !endDate) {
            alert('Please select both a Start Date and End Date.');
            return;
        }

        if(new Date(endDate) <= new Date(startDate)) {
            alert('The Re-open Date must be strictly AFTER the Closed From date. (e.g., To close just for Tuesday, pick Closed From: Tuesday, Re-opens On: Wednesday).');
            return;
        }

        try {
            const response = await fetch('/manager/settings/blackout/preview', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ start_date: startDate, end_date: endDate })
            });

            const affectedBookings = await response.json();
            const impactList = document.getElementById('impact-list');
            
            if (affectedBookings.length === 0) {
                // No one is affected! Just submit the form safely.
                document.getElementById('blackout-form').submit();
                return;
            }

            // Populate the list of doomed bookings
            let html = `<div class="space-y-3">`;
            affectedBookings.forEach(booking => {
                const dateObj = new Date(booking.appointment_date + 'T' + booking.start_time);
                const displayDate = dateObj.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
                const displayTime = dateObj.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit' });

                html += `
                    <div class="bg-white p-4 rounded-xl border border-red-100 shadow-sm flex justify-between items-center">
                        <div>
                            <p class="font-bold text-gray-800">${booking.user.first_name} ${booking.user.last_name}</p>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">${displayDate} at ${displayTime}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold text-[#b5106a]">📞 ${booking.user.phone_number}</p>
                        </div>
                    </div>
                `;
            });
            html += `</div>`;
            
            impactList.innerHTML = html;
            document.getElementById('impact-modal').classList.remove('hidden');

        } catch (error) {
            console.error(error);
            alert('An error occurred while checking impacts. Please try again.');
        }
    }
</script>
@endsection