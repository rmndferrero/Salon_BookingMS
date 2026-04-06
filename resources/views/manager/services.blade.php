<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services | Sibs Command Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Manrope', sans-serif; background-color: #fcfcfc; }
        .bg-sibs-pink { background-color: #b5106a; }
        .text-sibs-pink { color: #b5106a; }
        .sibs-card { 
            background: white; 
            border: 1px solid #f3f3f3; 
            border-radius: 1.5rem; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); 
        }
        .sidebar-link-active { background: rgba(255,255,255,0.15); border-left: 4px solid white; }
        input, select, textarea { border-radius: 0.75rem !important; }
    </style>
</head>
<body class="flex min-h-screen text-[#1a1c1c]">

    <aside class="w-64 bg-sibs-pink text-white flex flex-col fixed h-full z-50 shadow-2xl">
        <div class="p-8">
            <h2 class="text-2xl font-800 tracking-tighter uppercase">Sibs <span class="font-light opacity-80 text-sm block tracking-widest uppercase">Admin</span></h2>
        </div>
        
        <nav class="flex-1 px-4 space-y-2">
            <a href="{{ route('manager.dashboard') }}" class="flex items-center gap-3 p-4 rounded-xl hover:bg-white/10 transition-all opacity-80 hover:opacity-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span class="font-bold text-sm">Dashboard</span>
            </a>
            <a href="{{ route('manager.services.index') }}" class="flex items-center gap-3 p-4 rounded-xl sidebar-link-active transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <span class="font-bold text-sm">Services</span>
            </a>
        </nav>

        <div class="p-6 border-t border-white/10">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center font-bold text-xs">
                    {{ substr(Auth::user()->first_name, 0, 1) }}
                </div>
                <span class="text-xs font-bold truncate">{{ Auth::user()->first_name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full bg-white/10 hover:bg-white hover:text-sibs-pink py-3 rounded-xl text-[10px] font-800 uppercase tracking-widest transition-all">Logout</button>
            </form>
        </div>
    </aside>

    <main class="flex-1 ml-64 p-10">
        
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
    </main>

</body>
</html>