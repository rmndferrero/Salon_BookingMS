@extends('layouts.manager')

@section('content')
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-800 tracking-tight text-[#1a1c1c]">Announcements</h1>
            <p class="text-gray-400 text-sm mt-1 italic">Update the homepage "What's New" feed</p>
        </div>
    </header>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-8 font-bold text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1">
            <div class="sibs-card p-8 sticky top-10">
                <h2 class="text-xl font-800 mb-6 text-sibs-pink">Create Post</h2>
                <form action="{{ route('manager.announcements.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label class="text-[11px] font-700 uppercase tracking-wider text-gray-400 block mb-2">Headline</label>
                        <input type="text" name="title" required class="w-full border-gray-100 rounded-xl p-3 bg-gray-50 outline-none focus:border-sibs-pink focus:ring-1 focus:ring-sibs-pink">
                    </div>

                    <div x-data="{ content: '', limit: 400 }" class="w-full">
                        <div class="flex justify-between items-center mb-2">
                            <label class="text-[11px] font-bold uppercase tracking-wider text-gray-400 block">
                                Content
                            </label>
                        </div>
                        
                        <div class="relative">
                            <textarea 
                                name="content" 
                                rows="6" 
                                required 
                                x-model="content"
                                maxlength="400"
                                placeholder="Type your announcement..."
                                class="w-full border-gray-100 rounded-xl p-4 pb-12 bg-gray-50 outline-none transition-all duration-300
                                    focus:border-primary focus:ring-1 focus:ring-primary text-sm text-on-surface resize-none shadow-sm"
                                :class="content.length >= limit ? 'border-error ring-1 ring-error' : ''"
                            ></textarea>

                            <div class="absolute bottom-4 right-4 pointer-events-none">
                                <span class="text-[10px] font-bold tracking-widest transition-colors duration-200"
                                    :class="content.length >= limit ? 'text-error' : 'text-gray-400'">
                                    <span x-text="content.length">0</span>/<span x-text="limit">400</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="text-[11px] font-700 uppercase tracking-wider text-gray-400 block mb-2">Cover Image</label>
                        <input type="file" name="image" required class="text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-pink-50 file:text-sibs-pink font-bold">
                    </div>

                    <button type="submit" class="w-full bg-sibs-pink text-white py-4 rounded-xl font-800 uppercase tracking-widest text-[10px] hover:bg-[#960d58] transition-all">
                        Publish Now
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-4">
            <h2 class="text-xl font-800 mb-6 px-2">Live Feed</h2>
            @foreach($announcements as $announcement)
                <div class="sibs-card p-4 flex gap-6 items-center">
                    <img src="{{ asset('storage/' . $announcement->image_path) }}" class="w-20 h-20 rounded-2xl object-cover shadow-sm">
                    <div class="flex-1">
                        <h3 class="font-bold text-[#1a1c1c]">{{ $announcement->title }}</h3>
                        <p class="text-xs text-gray-500 mt-1">{{ Str::limit($announcement->content, 100) }}</p>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <a href="{{ route('manager.announcements.edit', $announcement->id) }}" class="text-gray-400 hover:text-blue-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        
                        <form action="{{ route('manager.announcements.destroy', $announcement->id) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection