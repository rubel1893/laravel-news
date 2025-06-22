<!-- resources/views/categories/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Posts in "{{ $category->name }}"</h1>

        @foreach ($category->posts as $post)
            <article class="mb-6">
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('posts.show', $post->slug) }}" class="text-indigo-600 hover:underline">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="text-gray-600">{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </div>
@endsection
