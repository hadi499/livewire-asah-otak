<div class="flex justify-center">
    <div class="w-32">
        @foreach ($books as $book)
        <div>
            <a href="{{ route('books.show', ['book' => $book->id]) }}" class="text-blue-500 hover:underline">
                {{ $book->title }}
            </a>
        </div>
        @endforeach
    </div>
</div>