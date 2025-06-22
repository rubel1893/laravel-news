@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Contact Us</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-4 mb-8">
        @csrf
        <div>
            <label for="name" class="block font-semibold">Name:</label>
            <input type="text" id="name" name="name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="email" class="block font-semibold">Email:</label>
            <input type="email" id="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="message" class="block font-semibold">Message:</label>
            <textarea id="message" name="message" rows="5" class="w-full border rounded px-3 py-2" required></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send</button>
    </form>

    <!-- Google Map Embed -->
    <div class="w-full mt-10" style="margin-bottom: 200px;">
        <h2 class="text-xl font-semibold mb-4">Find Us on the Map</h2>
        <div class="w-full h-[350px]">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58359.0499339799!2d89.12476244999995!3d23.90944660000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe965536b7d61f%3A0x28fea367efdb38c9!2sKushtia!5e0!3m2!1sen!2sbd!4v1750524361393!5m2!1sen!2sbd" 
                width="100%" 
                height="550" 
                style="border:0; display: block;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>
@endsection
