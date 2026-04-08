@extends('layouts.manager')

@section('content')     
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-4xl font-800 tracking-tight">Service Menu</h1>
                <p class="text-gray-400 text-sm mt-1">Add, update, or remove beauty services from the public menu.</p>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <div class="lg:col-span-4">
                <div class="sibs-card p-8 sticky top-10">
                    <h2 class="text-xl font-800 mb-6 flex items-center gap-2">
                        Create Service
                        <span class="w-2 h-2 bg-sibs-pink rounded-full"></span>
                    </h2>
                    
                    @if(session('success'))
                        <div class="bg-green-50 text-green-600 p-4 rounded-xl mb-6 text-xs font-bold flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('manager.services.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div>
                            <label class="block text-[10px] font-800 text-gray-400 uppercase tracking-widest mb-2">Service Name</label>
                            <input type="text" name="name" required class="w-full border-gray-100 bg-gray-50/50 p-3 text-sm focus:ring-2 focus:ring-sibs-pink/20 focus:border-sibs-pink outline-none transition-all">
                        </div>

                        <div>
                            <label class="block text-[10px] font-800 text-gray-400 uppercase tracking-widest mb-2">Category</label>
                            <select name="category" required class="w-full border-gray-100 bg-gray-50/50 p-3 text-sm focus:border-sibs-pink outline-none transition-all">
                                <option value="" disabled selected>Select Category</option>
                                <option value="Nail Care">Nail Care</option>
                                <option value="Eyelashing">Eyelashing</option>
                                <option value="Facial & Threading">Facial & Threading</option>
                                <option value="Hair Services">Hair Services</option>
                                <option value="Waxing">Waxing</option>
                                <option value="Relaxing Massage">Relaxing Massage</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-800 text-gray-400 uppercase tracking-widest mb-2">Price (AED)</label>
                                <input type="number" step="0.01" name="price" required class="w-full border-gray-100 bg-gray-50/50 p-3 text-sm focus:border-sibs-pink outline-none">
                            </div>
                            <div>
                                <label class="block text-[10px] font-800 text-gray-400 uppercase tracking-widest mb-2">Mins</label>
                                <input type="number" name="duration_minutes" value="60" required class="w-full border-gray-100 bg-gray-50/50 p-3 text-sm focus:border-sibs-pink outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-800 text-gray-400 uppercase tracking-widest mb-2">Description</label>
                            <textarea name="description" rows="3" class="w-full border-gray-100 bg-gray-50/50 p-3 text-sm focus:border-sibs-pink outline-none"></textarea>
                        </div>

                        <div class="py-2">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" name="is_package" value="1" class="w-5 h-5 rounded border-gray-300 text-sibs-pink focus:ring-sibs-pink">
                                <span class="text-xs font-bold text-gray-500 group-hover:text-sibs-pink transition-colors">Mark as Bundle/Package</span>
                            </label>
                        </div>

                        <button type="submit" class="w-full bg-sibs-pink text-white font-800 py-4 rounded-xl hover:bg-[#8d0051] shadow-lg shadow-sibs-pink/20 transition-all uppercase text-[10px] tracking-[0.2em]">Add to Menu</button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="sibs-card p-8">
                    <h2 class="text-xl font-800 mb-8">Active Services</h2>
                    
                    <div class="space-y-6">
                        @forelse($services as $service)
                        <div class="group flex justify-between items-center p-6 rounded-2xl hover:bg-gray-50 border border-transparent hover:border-gray-100 transition-all">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <h3 class="font-800 text-lg group-hover:text-sibs-pink transition-colors">{{ $service->name }}</h3>
                                    @if($service->is_package)
                                        <span class="bg-pink-50 text-sibs-pink text-[9px] font-800 px-2 py-0.5 rounded-md uppercase border border-pink-100">Package</span>
                                    @endif
                                </div>
                                <div class="flex items-center gap-4 text-[10px] font-800 uppercase tracking-widest text-gray-400">
                                    <span class="text-sibs-pink/60">{{ $service->category }}</span>
                                    <span>•</span>
                                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> {{ $service->duration_minutes }} Mins</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-3 max-w-lg leading-relaxed">{{ $service->description }}</p>
                            </div>

                            <div class="flex flex-col items-end gap-4 ml-6">
                                <div class="text-right">
                                    <p class="text-[10px] font-800 text-gray-300 uppercase italic">Rate</p>
                                    <p class="text-2xl font-800 text-sibs-pink">د.إ{{ number_format($service->price, 0) }}</p>
                                </div>
                                
                                <form action="{{ route('manager.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Delete this service permanently?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[10px] font-800 text-gray-400 hover:text-red-500 uppercase tracking-widest transition-colors flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <div class="py-20 text-center">
                            <p class="text-gray-400 text-sm italic">The service menu is currently empty.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
@endsection