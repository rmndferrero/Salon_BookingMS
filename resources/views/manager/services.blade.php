<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services - Sibs Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <style> body { font-family: 'Manrope', sans-serif; background-color: #f4f3f2; } </style>
</head>
<body class="text-[#1a1c1c]">

    <nav class="bg-[#b5106a] p-4 flex justify-between items-center text-white shadow-md">
        <div class="flex items-center gap-6">
            <div class="text-xl font-bold tracking-tight">Sib Style Admin</div>
            <a href="{{ route('manager.dashboard') }}" class="text-white/80 hover:text-white text-sm">Dashboard</a>
            <a href="{{ route('manager.services.index') }}" class="text-white font-bold text-sm border-b-2 border-white pb-1">Services</a>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-sm">Logged in as: {{ Auth::user()->first_name }}</span>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold mb-6">Add New Service</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">{{ session('success') }}</div>
                @endif

                <form action="{{ route('manager.services.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Service Name</label>
                        <input type="text" name="name" required class="w-full border-gray-300 rounded p-2 border focus:outline-none focus:border-[#b5106a]">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Price (AED)</label>
                        <input type="number" step="0.01" name="price" required class="w-full border-gray-300 rounded p-2 border focus:outline-none focus:border-[#b5106a]">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                        <textarea name="description" rows="3" class="w-full border-gray-300 rounded p-2 border focus:outline-none focus:border-[#b5106a]"></textarea>
                    </div>

                    <div class="mb-6 flex items-center">
                        <input type="hidden" name="is_package" value="0">
                        <input type="checkbox" name="is_package" value="1" id="is_package" class="mr-2">
                        <label for="is_package" class="text-sm text-gray-700">This is a Package (Bundle)</label>
                    </div>

                    <button type="submit" class="w-full bg-[#b5106a] text-white font-bold py-2 rounded hover:bg-[#8d0051] transition">Add Service</button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold mb-6">Active Services</h2>
                
                <div class="space-y-4">
                    @foreach($services as $service)
                        <div class="flex justify-between items-start border-b border-gray-100 pb-4">
                            <div>
                                <div class="flex items-center gap-2">
                                    <h3 class="font-bold text-lg">{{ $service->name }}</h3>
                                    @if($service->is_package)
                                        <span class="bg-pink-100 text-[#b5106a] text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider">Package</span>
                                    @endif
                                </div>
                                <p class="text-sm text-gray-500 mt-1 max-w-md">{{ $service->description }}</p>
                            </div>
                            
                            <div class="flex flex-col items-end gap-2">
                                <span class="font-bold text-[#b5106a]">${{ number_format($service->price, 2) }}</span>
                                
                                <form action="{{ route('manager.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-bold uppercase tracking-wider">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    @if($services->isEmpty())
                        <p class="text-gray-500 text-sm">No services have been added yet.</p>
                    @endif
                </div>
            </div>
        </div>

    </main>

</body>
</html>