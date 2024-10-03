<div class="flex justify-center mt-6 ">
    <form wire:submit.prevent="createPage" enctype="multipart/form-data" class="w-[600px] border p-4">
        @csrf
        <div class="mb-4">
            <label for="book_id" class="block text-sm font-medium text-gray-700">Select Book</label>
            <select id="book_id" wire:model="book_id" class="mt-1 block w-full">
                <option value="">Choose a book</option>
                @foreach ($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
            @error('book_id') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
            <input type="file" id="image" wire:model="image" class="mt-1 block w-full" />
            @error('image') <span class="text-red-600">{{ $message }}</span> @enderror
            @if ($image)
            <img src="{{ $image->temporaryUrl() }}" class="mt-2 w-32" alt="Preview Image" />
            @endif
        </div>

        <div class="mb-4">
            <label for="english" class="block text-sm font-medium text-gray-700">English Content</label>
            <textarea id="english" rows="4" cols="50" wire:model="english"
                class="mt-1 block w-full border p-2"></textarea>
            @error('english') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="indonesian" class="block text-sm font-medium text-gray-700">Indonesian Content</label>
            <textarea id="indonesian" wire:model="indonesian" class="mt-1 block w-full border p-2" rows="4"
                cols="50"></textarea>
            @error('indonesian') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Create Page</button>
    </form>

    @if (session()->has('message'))
    <div class="mt-2 text-green-500">
        {{ session('message') }}
    </div>
    @endif
</div>