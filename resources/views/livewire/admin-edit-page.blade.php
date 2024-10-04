<div class="flex justify-center mt-6">

    <form wire:submit.prevent="updatePage" enctype="multipart/form-data" class="w-[600px] border p-4">
        @csrf
        <h1 class="text-center my-3">Edit Page</h1>
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

        <div class="mb-3">
            @if ($image)
            <label for="image" class="form-label">Current Image:</label>
            <div>
                <img src="{{ asset('storage/' . $image) }}" alt="Page Image" width="150">
            </div>
            @endif
        </div>

        <!-- Upload New Image -->
        <div class="mb-3">
            <label for="newImage" class="block">Upload New Image (Optional)</label>
            <input type="file" wire:model="newImage" id="newImage" class="form-control">
            @error('newImage') <span class="text-danger">{{ $message }}</span> @enderror

            <!-- Image Preview -->
            @if ($newImage)
            <div class="mt-2">
                <label>New Image Preview:</label>
                <img src="{{ $newImage->temporaryUrl() }}" alt="New Image Preview" width="150">
            </div>
            @endif
        </div>

        <div class="mb-4" wire:ignore>
            <label for="english" class="block text-sm font-medium text-gray-700">English</label>

            <textarea id="mycontent" rows="4" cols="50" class="mt-1 block w-full border p-2">{{$english}}</textarea>
            @error('english') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4" wire:ignore>
            <label for="indonesian" class="block text-sm font-medium text-gray-700">Indonesian</label>


            <textarea id="mycontent2" class="mt-1 block w-full border p-2" rows="4" cols="50">{{$indonesian}}</textarea>
            @error('indonesian') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-between">
            <a wire:navigate href="/admin/pages/create/{{$book_id}}"
                class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-slate-600 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back
            </a>
            <button type="submit" id="submitButton"
                class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>
</div>


@script
<script>
    ClassicEditor
              .create(document.querySelector('#mycontent'))
              .then(editor => {
                  editor.model.document.on('change:data', () => {
                  const editorData = editor.getData();
                //   console.log(editorData);
                  
                  // Update Livewire atau backend ketika ada perubahan data,
                  // tapi tidak melakukan reset di sini.
                  @this.set('english', editorData);
              });
  
              // Tambahkan event listener pada tombol submit
              document.querySelector('#submitButton').addEventListener('click', () => {
                  // Ambil data dari editor
                  const editorData = editor.getData();
  
                  // Kirim data ke Livewire atau backend
                  @this.set('english', editorData)
              });
                  
              })
              .catch(error => {
                  console.error(error);
              });
  
  
              ClassicEditor
              .create(document.querySelector('#mycontent2'))
              .then(editor => {
                  editor.model.document.on('change:data', () => {
                  const editorData = editor.getData();
                //   console.log(editorData);
           
                  @this.set('indonesian', editorData);
              });
  
              // Tambahkan event listener pada tombol submit
              document.querySelector('#submitButton').addEventListener('click', () => {
                  // Ambil data dari editor
                  const editorData = editor.getData();
  
                  // Kirim data ke Livewire atau backend
                  @this.set('indonesian', editorData)
               
              });
                  
              })
              .catch(error => {
                  console.error(error);
              });
             
  
  
  
</script>

@endscript