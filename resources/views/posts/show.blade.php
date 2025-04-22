<x-app-layout :meta-title="$post->meta_title ?: $post->title"
              :meta-description="$post->meta_description ?: $post->title">
    <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
        <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}">
        <h1 class="text-4xl font-bold text-left text-gray-800">
            {{ $post->title }}
        </h1>

        <div class="article-content post-body py-3 text-gray-800 text-lg text-justify">
            {!! $post->body !!}
        </div>
    </article>

    @include('livewire.image-modal')

    @push('scripts')
        <script>
            function setupImageClicks() {
                document.querySelectorAll('.post-body img').forEach(img => {
                    if (!img.classList.contains('clickable')) {
                        img.classList.add('cursor-pointer', 'clickable');

                        const wrapperLink = img.closest('a');
                        if (wrapperLink) {
                            wrapperLink.addEventListener('click', (e) => {
                                e.preventDefault();
                            });
                        }

                        img.addEventListener('click', (e) => {
                            e.preventDefault();
                            window.dispatchEvent(new CustomEvent('showImageModal', {
                                detail: { url: img.src }
                            }));
                        });
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', () => {
                setupImageClicks();
                Livewire.hook('message.processed', setupImageClicks);
            });
        </script>
    @endpush

</x-app-layout>
