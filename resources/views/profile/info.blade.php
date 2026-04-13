@extends('layouts.app')

@section('content')
<main class="pt-32 pb-20 px-6 md:px-8 max-w-screen-2xl mx-auto min-h-screen">
    
    <div class="flex flex-col lg:flex-row gap-10">
        <aside class="w-full lg:w-72 flex-shrink-0">
            <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100">
                
                <div class="mb-8 text-center pt-4">
                    <div class="w-24 h-24 bg-pink-50 rounded-full text-[#b5106a] flex items-center justify-center text-3xl font-headline font-bold mx-auto mb-4 border-4 border-white shadow-md">
                        {{ substr(Auth::user()->first_name, 0, 1) }}{{ substr(Auth::user()->last_name, 0, 1) }}
                    </div>
                    <h2 class="font-bold text-xl text-gray-900">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                    <p class="text-xs text-gray-500 mt-1 uppercase tracking-widest font-bold">VIP Member</p>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('customer.bookings') }}" class="flex items-center gap-3 px-5 py-4 text-gray-600 hover:bg-pink-50 hover:text-[#b5106a] rounded-2xl font-bold text-sm transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        My Bookings
                    </a>
                    <a href="{{ route('customer.info') }}" class="flex items-center gap-3 px-5 py-4 bg-[#b5106a] text-white rounded-2xl font-bold text-sm transition-colors shadow-lg shadow-pink-500/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Personal Info
                    </a>
                </nav>
            </div>
        </aside>

        <div class="flex-1">
            <h1 class="font-headline text-4xl mb-2 text-[#1a1c1c]">Personal Info</h1>
            <p class="text-gray-500 mb-10">Update your contact details and secure your account.</p>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl mb-8 font-bold text-sm flex items-center gap-3 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl mb-8 font-bold text-sm shadow-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('customer.info.update') }}" method="POST" class="bg-white rounded-[2rem] p-8 lg:p-10 border border-gray-100 shadow-sm">
                @csrf
                @method('PUT')

                <h3 class="text-lg font-800 text-[#1a1c1c] mb-6">Contact Details</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-[10px] text-gray-500 font-bold uppercase tracking-widest mb-2">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name', Auth::user()->first_name) }}" required class="w-full border border-gray-200 rounded-xl p-4 text-sm focus:border-[#b5106a] focus:ring-1 focus:ring-[#b5106a] outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] text-gray-500 font-bold uppercase tracking-widest mb-2">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}" required class="w-full border border-gray-200 rounded-xl p-4 text-sm focus:border-[#b5106a] focus:ring-1 focus:ring-[#b5106a] outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] text-gray-500 font-bold uppercase tracking-widest mb-2">Phone Number</label>
                        <input type="text" name="phone_number" value="{{ old('phone_number', Auth::user()->phone_number) }}" required class="w-full border border-gray-200 rounded-xl p-4 text-sm focus:border-[#b5106a] focus:ring-1 focus:ring-[#b5106a] outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] text-gray-500 font-bold uppercase tracking-widest mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="w-full border border-gray-200 rounded-xl p-4 text-sm focus:border-[#b5106a] focus:ring-1 focus:ring-[#b5106a] outline-none transition-all">
                    </div>
                </div>

                <hr class="border-gray-100 mb-8">

                <h3 class="text-lg font-800 text-[#1a1c1c] mb-2">Security</h3>
                <p class="text-xs text-gray-400 font-medium mb-6">Leave these fields blank if you do not wish to change your password.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                    <div>
                        <label class="block text-[10px] text-gray-500 font-bold uppercase tracking-widest mb-2">New Password</label>
                        <input type="password" name="password" placeholder="••••••••" class="w-full border border-gray-200 rounded-xl p-4 text-sm focus:border-[#b5106a] focus:ring-1 focus:ring-[#b5106a] outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] text-gray-500 font-bold uppercase tracking-widest mb-2">Confirm New Password</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full border border-gray-200 rounded-xl p-4 text-sm focus:border-[#b5106a] focus:ring-1 focus:ring-[#b5106a] outline-none transition-all">
                    </div>
                </div>

                <div class="flex justify-end border-t border-gray-100 pt-8">
                    <button type="submit" class="bg-[#1a1c1c] text-white px-10 py-4 rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-gray-800 transition-colors shadow-lg hover:-translate-y-0.5">
                        Save Changes
                    </button>
                </div>
            </form>

        </div>
    </div>
</main>
@endsection