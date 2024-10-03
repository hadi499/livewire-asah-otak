<div class="w-full md:flex justify-center mt-6  gap-2 p-2">
    <div>
        <form wire:submit.prevent="createPage" enctype="multipart/form-data" class="w-full md:w-[600px] border p-4">
            @csrf

            <h1 class="text-xl font-semibold text-center">Add Page</h1>
            <h3 class="text-lg text-center mb-4">{{$title}}</h3>

            {{-- <div class="mb-4">
                <label for="book_id" class="block text-sm font-medium text-gray-700">Select Book</label>
                <select id="book_id" wire:model="book_id" class="mt-1 block w-full">
                    <option value="">Choose a book</option>
                    @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
                @error('book_id') <span class="text-red-600">{{ $message }}</span> @enderror
            </div> --}}

            <div class="mb-4" wire:ignore>
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                <input type="file" id="image" wire:model="image" class="mt-1 block w-full" />
                @error('image') <span class="text-red-600">{{ $message }}</span> @enderror
                @if ($image)
                <img src="{{ $image->temporaryUrl() }}" class="mt-2 w-32" alt="Preview Image" />
                @endif
            </div>

            <div class="mb-4">
                <label for="english" class="block text-sm font-medium text-gray-700">English</label>

                <textarea id="english" rows="4" cols="50" wire:model="english"
                    class="mt-1 block w-full border p-2"></textarea>
                @error('english') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="indonesian" class="block text-sm font-medium text-gray-700">Indonesian</label>


                <textarea id="indonesian" wire:model="indonesian" class="mt-1 block w-full border p-2" rows="4"
                    cols="50"></textarea>
                @error('indonesian') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-between">
                <a wire:navigate href="{{route('admin.books')}}"
                    class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-slate-600 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Back
                </a>
                <button type="submit"
                    class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </form>

        <div class="mt-5">
            @foreach ($pages as $page)
            <div class="relative flex  mb-3 bg-blue-50 rounded-sm gap-2  ">


                <div class="p-2 mr-3 ">
                    <a href="{{route('admin.pages.edit', $page->id)}}">
                        <span class="mr-4 ">{{$page->book->title}}</span>{{$page->getExcerpt()}}

                    </a>

                </div>
                <button wire:click="deletePage({{$page->id}})" wire:confirm="are you sure?"
                    class="absolute top-1 right-1 text-red-500 transform transition-transform duration-300 hover:rotate-90 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-x ">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @endforeach
        </div>


    </div>



</div>