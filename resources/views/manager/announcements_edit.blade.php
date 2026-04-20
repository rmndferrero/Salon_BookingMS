@extends('layouts.manager')

@section('content')
<div class="p-4 md:p-8 max-w-7xl mx-auto w-full">
    
    <header class="mb-10 max-w-2xl mx-auto">
        <a href="{{ route('manager.announcements.index') }}" class="text-sibs-pink text-xs font-800 uppercase tracking-widest hover:underline mb-2 block">
            ← Back to Feed
        </a>
        <h1 class="text-3xl font-800 tracking-tight text-[#1a1c1c]">Edit Announcement</h1>
    </header>

    <div class="max-w-2xl mx-auto">
        <div class="sibs-card p-8">
            <form action="{{ route('manager.announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="text-[11px] font-700 uppercase tracking-wider text-gray-400 block mb-2">Headline</label>
                    <input type="text" name="title" value="{{ $announcement->title }}" required 
                           class="w-full border-gray-100 rounded-xl p-3 bg-gray-50 outline-none focus:border-sibs-pink focus:ring-1 focus:ring-sibs-pink">
                </div>

                <div>
                    <label class="text-[11px] font-700 uppercase tracking-wider text-gray-400 block mb-2">Content</label>
                    <textarea name="content" rows="6" required 
                              class="w-full border-gray-100 rounded-xl p-3 bg-gray-50 outline-none focus:border-sibs-pink focus:ring-1 focus:ring-sibs-pink">{{ $announcement->content }}</textarea>
                </div>

                <div>
                    <label class="text-[11px] font-700 uppercase tracking-wider text-gray-400 block mb-2">Current Cover</label>
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{ asset('storage/' . $announcement->image_path) }}" class="w-24 h-24 rounded-xl object-cover shadow-sm">
                        <p class="text-[10px] text-gray-400 italic">Leave the file input below empty to keep this image.</p>
                    </div>
                    
                    <label class="text-[11px] font-700 uppercase tracking-wider text-gray-400 block mb-2">Replace Image (Optional)</label>
                    <input type="file" name="image" class="text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-pink-50 file:text-sibs-pink font-bold">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-[#1a1c1c] text-white py-4 rounded-xl font-800 uppercase tracking-widest text-[10px] hover:bg-black transition-all">
                        Update Announcement
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection