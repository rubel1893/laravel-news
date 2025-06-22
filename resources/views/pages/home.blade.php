@extends('layouts.app')

@section('content')
<div x-data="{
        activeSlide: 0,
        slides: [
            {
                title: 'Welcome to Laravel News',
                subtitle: 'Your source for the latest Laravel updates.',
                image: '/images/slider/borbad.jpg'
            },
            {
                title: 'Build with Breeze & Filament',
                subtitle: 'Modern tools to supercharge your workflow.',
                image: '/images/slider/moana.jpg'
            },
            {
                title: 'Publish Your Blog',
                subtitle: 'Easily manage posts and categories.',
                image: 'https://source.unsplash.com/1200x400/?blog'
            }
        ],
        next() {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        },
        prev() {
            this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
        }
    }" class="relative overflow-hidden">
    
    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index" class="relative h-[500px] md:h-[600px]">
            <img :src="slide.image" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-white text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-2" x-text="slide.title"></h2>
                <p class="text-lg" x-text="slide.subtitle"></p>
            </div>
        </div>
    </template>

    <!-- Controls -->
    <div class="absolute inset-0 flex items-center justify-between px-4">
        <button @click="prev" class="text-white bg-black/30 hover:bg-black/50 px-3 py-2 rounded-full">
            ‹
        </button>
        <button @click="next" class="text-white bg-black/30 hover:bg-black/50 px-3 py-2 rounded-full">
            ›
        </button>
    </div>
</div>
<h1 class="text-[green] text-4xl font-bold">rubel-1</h1>


@endsection
