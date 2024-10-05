<div class="flex justify-center mt-6 p-2">
    <div class="w-[800px]">

        <div class="mb-6 flex justify-between">

            <a class="border border-blue-700  py-1 shadow-lg rounded-sm flex items-center justify-center w-20  text-blue-700 text-sm font-semibold hover:bg-blue-700 hover:text-white"
                href="{{route('admin.books.create')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                </svg>
                <span class="ml-1">Book</span>
            </a>
            {{-- <a
                class="border border-blue-700  py-1 shadow-lg rounded-sm flex items-center justify-center w-20  text-blue-700 text-sm font-semibold hover:bg-blue-700 hover:text-white"
                href="{{route('admin.pages.create')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                </svg>
                <span class="ml-1">pages</span>
            </a> --}}
            <a wire:navigate href="{{route('admin')}}">
                <div
                    class=" border-slate-500 border  text-center hover:bg-slate-800 hover:text-white w-20 py-1 shadow-lg rounded-sm  text-slate-700 text-sm font-semibold ">
                    Back
                </div>
            </a>
        </div>



        <div class="flex flex-row flex-wrap gap-3">

            @foreach ($books as $book)


            <div class="flex flex-col p-2 border border-blue-700 shadow-md w-[250px] mb-2">
                <h1 class="text-center mb-2 text-sm font-semibold"> {{$book->title}}</h1>
                <a href="{{route('admin.pages.create', $book->id)}}" class="border border-blue-700 px-2 py-2 
                        rounded-sm text-blue-800 hover:bg-blue-50 text-sm text-center font-semibold mb-1">
                    Pages
                </a>
                <a href="{{route('admin.books.edit', $book->id)}}" class="border border-green-700 hover:bg-green-50 px-2 py-2 
                        rounded-sm text-green-800 text-sm text-center font-semibold mb-1">Edit</a>
                <button wire:click="deleteBook({{$book->id}})" wire:confirm="Are you sure?" class="border border-red-700 hover:bg-red-50 px-2 py-2 
                        rounded-sm text-red-700 text-sm text-center font-semibold mb-1">
                    Delete
                </button>
            </div>


            @endforeach



        </div>




    </div>
</div>