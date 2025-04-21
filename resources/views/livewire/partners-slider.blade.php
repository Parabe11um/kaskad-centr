<div wire:ignore class="py-10">
    <div class="relative max-w-5xl mx-auto partners-slider">
        <div class="swiper partners-swiper">
            <div class="swiper-wrapper">
                @foreach($partners as $partner)
                    <div class="swiper-slide w-[200px] flex justify-center items-center">
                        <a href="{{ route('partners.show', $partner->slug) }}">
                            <img src="{{ Storage::url($partner->logo_path) }}"
                                 alt="{{ $partner->name }}"
                                 class="h-20 object-contain mx-auto hover:scale-105 transition">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="swiper-button-prev z-10"></div>
            <div class="swiper-button-next z-10"></div>
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>

    <script>
        Livewire.hook('message.processed', () => {
            setTimeout(() => {
                if (typeof window.initPartnersSwiper === 'function') {
                    window.initPartnersSwiper();
                }
            }, 50); // задержка помогает с Livewire
        });
    </script>
</div>
