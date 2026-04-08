@extends('layouts.manager')

@section('content')
<div class="p-4 md:p-8 max-w-3xl mx-auto w-full">

    <div class="mb-8">
        <a href="{{ route('manager.employees.index') }}" class="text-[10px] font-bold uppercase tracking-widest text-gray-400 hover:text-[#b5106a] transition-colors flex items-center gap-2 mb-4">
            ← Back to Roster
        </a>
        <h1 class="font-headline text-4xl text-[#1a1c1c] font-bold tracking-wide">Edit Profile: {{ $employee->first_name }}</h1>
        <div class="w-16 h-1 bg-[#b5106a] mt-4 rounded-full"></div>
    </div>

    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8">
        
        <form action="{{ route('manager.employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                <div class="relative group">
                    <input type="text" name="first_name" value="{{ $employee->first_name }}" required 
                           class="w-full border-b-2 border-gray-200 focus:border-[#b5106a] outline-none py-3 bg-transparent text-sm transition-colors peer">
                    <label class="absolute left-0 -top-3.5 text-xs text-[#b5106a] font-bold uppercase tracking-widest transition-all">First Name</label>
                </div>

                <div class="relative group">
                    <input type="text" name="last_name" value="{{ $employee->last_name }}" required 
                           class="w-full border-b-2 border-gray-200 focus:border-[#b5106a] outline-none py-3 bg-transparent text-sm transition-colors peer">
                    <label class="absolute left-0 -top-3.5 text-xs text-[#b5106a] font-bold uppercase tracking-widest transition-all">Last Name</label>
                </div>
            </div>

            <div class="mb-10">
                <label class="block text-xs text-gray-400 uppercase tracking-widest font-bold mb-4">Assigned Capabilities</label>
                <div class="space-y-4 bg-gray-50/50 p-6 rounded-2xl border border-gray-100 grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($categories as $category)
                        <label class="flex items-center gap-4 cursor-pointer group m-0">
                            <div class="relative flex items-center">
                                <input type="checkbox" name="can_do[]" value="{{ $category }}" 
                                       {{ (is_array($employee->can_do) && in_array($category, $employee->can_do)) ? 'checked' : '' }}
                                       class="peer w-5 h-5 text-[#b5106a] bg-white border-2 border-gray-300 rounded cursor-pointer transition-all focus:ring-[#b5106a] focus:ring-offset-0">
                            </div>
                            <span class="text-sm font-bold text-gray-600 group-hover:text-[#b5106a] transition-colors">{{ $category }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="mb-12 flex items-center gap-4 p-4 border border-gray-100 rounded-2xl bg-gray-50">
                <input type="checkbox" name="is_active" value="1" id="is_active" {{ $employee->is_active ? 'checked' : '' }} class="w-5 h-5 text-green-500 rounded border-gray-300 focus:ring-green-500">
                <div>
                    <label for="is_active" class="text-sm font-bold text-gray-800 cursor-pointer block">Employee is Active</label>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest mt-1">Uncheck this if they are on leave or suspended. They won't appear in assignment dropdowns.</p>
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <button type="submit" class="bg-gradient-to-r from-[#b5106a] to-pink-500 text-white px-10 py-4 rounded-full text-xs font-bold uppercase tracking-widest hover:shadow-xl hover:shadow-pink-500/30 transition-all transform hover:-translate-y-0.5">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection