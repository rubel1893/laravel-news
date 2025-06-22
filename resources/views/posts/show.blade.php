@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Main Content -->
        <div class="md:col-span-2">
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full mb-6 rounded">
            <h1 class="text-3xl font-bold mb-2">{{ $post->title }}</h1>
            <p class="text-gray-600 mb-4">{{ $post->created_at->format('F j, Y') }} | {{ $post->category->name ?? 'Uncategorized' }}</p>
            <div class="prose max-w-none">
                {!! $post->body !!}
            </div>
        </div>

        <!-- Sidebar -->
        <aside class="bg-gray-50 p-4 rounded shadow-md">
            <h2 class="text-xl font-semibold mb-4">Recent Posts</h2>
            <ul class="space-y-2">
                @foreach($recentPosts as $recent)
                    <li>
                        <a href="{{ route('post.show', $recent->slug) }}" class="text-blue-600 hover:underline">
                            {{ $recent->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>

    </div>
</div>
@endsection
