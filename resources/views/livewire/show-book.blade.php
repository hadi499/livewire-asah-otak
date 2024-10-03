<div class="flex w-full justify-center  mt-8">



    <div class="border  p-4 border-blue-400 bg-amber-50 mb-8 w-[1000px]">
        <h1 class="text-center text-2xl font-semibold mb-8">{{ $book->title }}</h1>



        @if($pages->count() > 0)
        @foreach($pages as $page)
        <div class="mb-3" x-data="{ showIndonesian: false }">
            @if ($page->image)
            <img src="{{ asset('storage/' . $page->image) }}" class="card-img-top">

            @endif

            <div class="text-xl leading-relaxed  "> {{ $page->english }}
                <span class="hover:cursor-pointer text-sm text-blue-600 mb-0 "
                    @click="showIndonesian = !showIndonesian">
                    terjemahkan</span>

            </div>


            <div x-show="showIndonesian" class="text-lg italic leading-tight">
                {{ $page->indonesian }}

            </div>


        </div>
        @endforeach

        @else
        <p>No pages available for this book.</p>
        @endif

    </div>





</div>