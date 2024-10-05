<div>
    <div class="flex justify-center mt-6">

        <form wire:submit.prevent="update" class="w-[500px] p-4 border shadow-sm">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" wire:model="title"
                    class="mt-1 block  p-2 border-gray-300 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 w-full"
                    required />
                @error('title') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Edit Book</button>
        </form>
    </div>


</div>