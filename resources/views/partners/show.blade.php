<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="text-center mb-8">
            <img src="{{ Storage::url($partner->logo_path) }}"
                 alt="{{ $partner->name }}"
                 class="h-[30rem] object-contain mx-auto mb-4">
            <h1 class="text-3xl font-bold text-gray-800">{{ $partner->name }}</h1>
        </div>

        <div class="prose max-w-none">
            {!! $partner->body !!}
        </div>
    </div>
</x-app-layout>
