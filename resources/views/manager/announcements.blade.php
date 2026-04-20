@extends('layouts.manager')

@section('content')
<div class="p-4 md:p-8 max-w-7xl mx-auto w-full">
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
        {{-- CREATE SIDEBAR --}}
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
                        <label class="text-[11px] font-bold uppercase tracking-wider text-gray-400 block mb-2">Content</label>
                        <div class="relative">
                            <textarea 
                                name="content" 
                                rows="6" 
                                required 
                                x-model="content"
                                maxlength="400"
                                class="w-full border-gray-100 rounded-xl p-4 pb-12 bg-gray-50 outline-none transition-all focus:border-sibs-pink focus:ring-1 focus:ring-sibs-pink text-sm resize-none shadow-sm"
                            ></textarea>
                            <div class="absolute bottom-4 right-4 pointer-events-none">
                                <span class="text-[10px] font-bold tracking-widest text-gray-400">
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

        {{-- LIVE FEED AREA --}}
        <div class="lg:col-span-2 space-y-4" x-data="{ count: {{ $announcements->where('is_featured', true)->count() }} }">
            <div class="flex justify-between items-center mb-6 px-2">
                <h2 class="text-xl font-800">Live Feed</h2>
                
                {{-- Only show Save button if there's competition (more than 3 items) --}}
                @if($announcements->count() > 3)
                    <button form="feature-form" type="submit" class="bg-gray-900 text-white px-5 py-2 rounded-lg text-[10px] font-800 uppercase tracking-widest hover:bg-sibs-pink transition-all">
                        Save Selection (<span x-text="count"></span>/3)
                    </button>
                @endif
            </div>

            <form id="feature-form" action="{{ route('manager.announcements.update-featured') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    @foreach($announcements as $announcement)
                        <div class="sibs-card p-4 flex gap-4 sm:gap-6 items-center transition-all {{ $announcement->is_featured ? 'ring-2 ring-sibs-pink' : 'opacity-80' }}">
                            
                            {{-- Checkbox logic: Only show if > 3 announcements exist --}}
                            @if($announcements->count() > 3)
                                <div class="flex items-center pl-2 flex-shrink-0">
                                    <input type="checkbox" 
                                           name="featured_ids[]" 
                                           value="{{ $announcement->id }}"
                                           class="w-5 h-5 rounded border-gray-300 text-sibs-pink focus:ring-sibs-pink cursor-pointer disabled:opacity-30 disabled:cursor-not-allowed"
                                           {{ $announcement->is_featured ? 'checked' : '' }}
                                           @change="$el.checked ? count++ : count--"
                                           :disabled="!$el.checked && count >= 3">
                                </div>
                            @endif

                            <img src="{{ asset('storage/' . $announcement->image_path) }}" class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl object-cover shadow-sm flex-shrink-0">
                            
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h3 class="font-bold text-[#1a1c1c] break-words">{{ $announcement->title }}</h3>
                                    @if($announcement->is_featured)
                                        <span class="bg-pink-100 text-sibs-pink text-[9px] font-900 px-2 py-0.5 rounded-full uppercase tracking-tighter whitespace-nowrap">Live</span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-500 mt-1 break-words">{{ Str::limit($announcement->content, 100) }}</p>
                            </div>
                            
                            <div class="flex items-center gap-3 sm:gap-4 pr-2 flex-shrink-0">
                                <a href="{{ route('manager.announcements.edit', $announcement->id) }}" class="text-gray-400 hover:text-blue-500 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </a>
                                
                                <button type="button" onclick="if(confirm('Delete?')) document.getElementById('del-{{ $announcement->id }}').submit()" class="text-gray-400 hover:text-red-500 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </div>
                        </div>
                    @endforeach     
                </div>
            </form>

            {{-- Hidden delete forms --}}
            @foreach($announcements as $announcement)
                <form id="del-{{ $announcement->id }}" action="{{ route('manager.announcements.destroy', $announcement->id) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
        </div>
    </div>
</div>
@endsection