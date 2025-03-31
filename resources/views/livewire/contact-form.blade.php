<div>
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-6">
        <div>
            <label class="block font-semibold mb-1">Имя *</label>
            <input type="text" wire:model.defer="name" required class="w-full border border-gray-300 p-2 rounded">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Телефон</label>
            <input type="text" wire:model.defer="phone" class="w-full border border-gray-300 p-2 rounded">
            @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Email *</label>
            <input type="email" wire:model.defer="email" required class="w-full border border-gray-300 p-2 rounded">
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Сообщение *</label>
            <textarea wire:model.defer="message" rows="5" required class="w-full border border-gray-300 p-2 rounded"></textarea>
            @error('message') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">
            Отправить
        </button>
    </form>
</div>
