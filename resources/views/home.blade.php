<x-app-layout meta-description="Центр Каскад">

    @section('hero')
        <div class="hero w-full text-center py-32">
            <h1 class="text-2xl md:text-3xl p-20 text-center lg:text-5xl text-gray-700">
                Сайт автономной некоммерческой организации
                Центр поддержки социальных и патриотических проектов ветеранов военной службы "Каскад"
            </h1>
            <a class="call-btn px-3 py-2 text-lg rounded mt-5 inline-block"
               href="{{ route('posts.index') }}">Подробнее</a>
        </div>
    @endsection

    <div class="mb-10 w-full">

        <h2 class="mt-16 mb-5 text-3xl text-center text-blue-500 font-bold">Недавние новости</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach($latestPosts as $post)
                    <div class="md:col-span-1 col-span-3">
                        <x-posts.post-card :post="$post"/>
                    </div>
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-blue-500 font-semibold"
           href="{{ route('posts.index') }}">Больше</a>




        @if(count($featuredPosts) > 0)
            <hr>
            <div class="mb-16">
                <h2 class="mt-16 mb-5 text-3xl text-center text-blue-500 font-bold">Популярные новости</h2>
                <div class="w-full">
                    <div class="grid grid-cols-3 gap-10 w-full">
                        @foreach($featuredPosts as $post)
                            <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3"/>
                        @endforeach
                    </div>
                </div>
                <a class="mt-10 block text-center text-lg text-blue-500 font-semibold"
                   href="{{ route('posts.index') }}">Больше</a>
            </div>
        @endif

    </div>
</x-app-layout>
