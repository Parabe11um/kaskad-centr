<x-app-layout meta-description="SkillToGrow">

    @section('hero')
        <div class="w-full text-center py-32 bg-gray-100">
            <h1 class="text-2xl md:text-3xl p-20 font-bold text-center lg:text-5xl text-gray-700">
                Блог о персональном развитии, карьерном росте, самопознании и совершенствовании
            </h1>
            <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block"
               href="{{ route('posts.index') }}">Подробнее</a>
        </div>
    @endsection

    <div class="mb-10 w-full">

        <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Недавние статьи</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach($latestPosts as $post)
                    <div class="md:col-span-1 col-span-3">
                        <x-posts.post-card :post="$post"/>
                    </div>
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold"
           href="{{ route('posts.index') }}">Больше</a>

        <hr>

        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Популярные статьи</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach($featuredPosts as $post)
                        <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3"/>
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold"
               href="{{ route('posts.index') }}">Больше</a>
        </div>
    </div>
</x-app-layout>
