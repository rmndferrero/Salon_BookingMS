@extends('layouts.manager')

@section('content')
<div class="p-4 md:p-8 max-w-7xl mx-auto w-full">

    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="font-headline text-4xl text-[#1a1c1c] font-bold tracking-wide">Staff Management</h1>
            <div class="w-16 h-1 bg-[#b5106a] mt-4 rounded-full"></div>
            <p class="text-gray-500 mt-4 font-body italic text-sm">
                Recruit top talent and assign their service specialties.
            </p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl mb-8 font-bold text-sm tracking-wide shadow-sm flex items-center gap-3">
            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8">
        
        <div class="xl:col-span-4">
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8 sticky top-8">
                <h2 class="font-headline text-2xl text-[#1a1c1c] mb-8 font-bold">Hire New Staff</h2>
                
                <form action="{{ route('manager.employees.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6 relative group">
                        <input type="text" name="first_name" placeholder="First Name" required 
                               class="w-full border-b-2 border-gray-200 focus:border-[#b5106a] outline-none py-3 bg-transparent text-sm transition-colors peer placeholder-transparent">
                        <label class="absolute left-0 -top-3.5 text-xs text-gray-400 font-bold uppercase tracking-widest transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3 peer-focus:-top-3.5 peer-focus:text-xs peer-focus:text-[#b5106a]">First Name</label>
                    </div>

                    <div class="mb-10 relative group">
                        <input type="text" name="last_name" placeholder="Last Name" required 
                               class="w-full border-b-2 border-gray-200 focus:border-[#b5106a] outline-none py-3 bg-transparent text-sm transition-colors peer placeholder-transparent">
                        <label class="absolute left-0 -top-3.5 text-xs text-gray-400 font-bold uppercase tracking-widest transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3 peer-focus:-top-3.5 peer-focus:text-xs peer-focus:text-[#b5106a]">Last Name</label>
                    </div>

                    <div class="mb-10">
                        <label class="block text-xs text-gray-400 uppercase tracking-widest font-bold mb-4">Capabilities</label>
                        <div class="space-y-4 bg-gray-50/50 p-5 rounded-2xl border border-gray-100">
                            @forelse($categories as $category)
                                <label class="flex items-center gap-4 cursor-pointer group">
                                    <div class="relative flex items-center">
                                        <input type="checkbox" name="can_do[]" value="{{ $category }}" 
                                               class="peer w-5 h-5 text-[#b5106a] bg-white border-2 border-gray-300 rounded cursor-pointer transition-all focus:ring-[#b5106a] focus:ring-offset-0">
                                    </div>
                                    <span class="text-sm font-bold text-gray-600 group-hover:text-[#b5106a] transition-colors">{{ $category }}</span>
                                </label>
                            @empty
                                <p class="text-xs text-[#b5106a] italic font-bold">No service categories found. Add services first!</p>
                            @endforelse
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-[#b5106a] to-pink-500 text-white px-8 py-4 rounded-full text-xs font-bold uppercase tracking-widest hover:shadow-xl hover:shadow-pink-500/30 transition-all transform hover:-translate-y-0.5">
                        + Add to Team
                    </button>
                </form>
            </div>
        </div>

        <div class="xl:col-span-8">
            <h2 class="font-headline text-2xl text-[#1a1c1c] mb-8 font-bold">Current Roster</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($employees as $employee)
                    <div class="group p-6 bg-white border border-gray-100 rounded-[2rem] hover:border-pink-200 hover:shadow-xl hover:shadow-pink-500/5 transition-all duration-300 relative overflow-hidden flex flex-col justify-between">
                        
                        <div class="absolute top-4 right-4 flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full border border-gray-100">
                            <span class="w-2 h-2 rounded-full {{ $employee->is_active ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            <span class="text-[9px] font-bold uppercase tracking-widest text-gray-500">
                                {{ $employee->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                        <div>
                            <div class="flex items-center gap-5 mb-6">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-pink-50 to-pink-100 text-[#b5106a] flex items-center justify-center font-headline text-3xl shadow-inner border border-white">
                                    {{ substr($employee->first_name, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="font-headline text-2xl font-bold text-[#1a1c1c] group-hover:text-[#b5106a] transition-colors">
                                        {{ $employee->first_name }}
                                    </h4>
                                    <p class="text-gray-400 text-sm font-bold tracking-wide">{{ $employee->last_name }}</p>
                                </div>
                            </div>
                            
                            <div>
                                <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-3">Qualified Services</span>
                                <div class="flex flex-wrap gap-2">
                                    @if(is_array($employee->can_do))
                                        @foreach($employee->can_do as $skill)
                                            <span class="bg-gray-50 border border-gray-200 text-gray-600 text-[10px] font-bold px-3 py-1.5 rounded-lg tracking-wide group-hover:border-pink-200 group-hover:text-[#b5106a] transition-colors">
                                                {{ $skill }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="text-xs italic text-gray-400">No skills assigned</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-50 flex justify-between items-center opacity-0 group-hover:opacity-100 transition-opacity">
                            
                            <form action="{{ route('manager.employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete {{ $employee->first_name }}? Historical bookings will be kept safely.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[10px] text-red-400 hover:text-red-600 font-bold uppercase tracking-widest transition-colors flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Delete
                                </button>
                            </form>

                            <a href="{{ route('manager.employees.edit', $employee->id) }}" class="text-[10px] text-gray-400 hover:text-[#b5106a] font-bold uppercase tracking-widest transition-colors">
                                Edit Profile →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center text-center py-20 px-6 bg-gray-50 border-2 border-dashed border-gray-200 rounded-[2rem]">
                        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mb-4 shadow-sm text-gray-300">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="font-headline text-xl text-gray-700 font-bold mb-2">No Staff Members Yet</h3>
                        <p class="text-sm text-gray-500 max-w-sm">Use the form on the left to add your first employee. They will automatically appear in the booking assignment dropdowns.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection