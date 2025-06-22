@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10 px-4">
    <h1 class="text-5xl font-bold mb-8">Latest Posts</h1>
    <div class="grid md:grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <div class="bg-white border rounded-xl shadow-sm p-6">
                <h2 class="text-2xl font-semibold mb-2">
                    <a href="{{ route('posts.show', $post->slug) }}" class="text-indigo-600 hover:underline">
                        {{ $post->title }}
                    </a>
                </h2>

                <p class="text-gray-700 mb-4">
                    {{ \Illuminate\Support\Str::limit($post->excerpt, 150) }}
                </p>

                <div class="flex justify-between items-center text-sm text-gray-500">
                    <a href="{{ route('posts.show', $post->slug) }}" class="text-indigo-500 hover:underline">
                        Read More →
                    </a>
                    <span>Posted on {{ $post->created_at->format('M d, Y') }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</div>
@endsection
