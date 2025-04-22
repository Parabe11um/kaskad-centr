<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('imageModal', {
            imageUrl: null,
            show(url) {
                this.imageUrl = url;
            },
            close() {
                this.imageUrl = null;
            }
        });

        window.addEventListener('showImageModal', e => {
            Alpine.store('imageModal').show(e.detail.url);
        });
    });
</script>

<div
    x-data
    x-show="$store.imageModal.imageUrl"
    x-cloak
    x-transition
    class="fixed inset-0 bg-black/80 flex items-center justify-center z-50"
    style="display: none"
    @keydown.escape.window="$store.imageModal.close()"
    @click.self="$store.imageModal.close()"
>
    <div class="relative mx-auto">
        <button @click="$store.imageModal.close()" class="w-[40px] h-[40px] bg-black font-black absolute top-[-3rem] right-0 text-white text-3xl">&times;</button>
        <img :src="$store.imageModal.imageUrl" alt="Изображение" class="max-h-[90vh] max-w-full rounded shadow-lg">
    </div>
</div>
