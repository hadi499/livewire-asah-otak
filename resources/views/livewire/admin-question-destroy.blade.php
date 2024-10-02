<div x-data="{ open: false }">

    <button @click="open = true"
        class="absolute top-1 right-1 text-red-500 transform transition-transform duration-300 hover:rotate-90 ">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-x ">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M18 6l-12 12" />
            <path d="M6 6l12 12" />
        </svg>
    </button>

    <!-- Modal Background -->
    @teleport('body')
    <div x-show="open" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
        <!-- Modal -->
        <div @click.away="open = false"
            class="bg-white p-6 flex flex-col items-center rounded shadow-lg max-w-sm w-full">

            <p class="mb-4 text-md font-thin">Are sure delete question : <span
                    class="text-lg ml-2 font-semibold">{{$question->question_text}}</span> ?</p>
            <div class="flex gap-3">

                <button @click="open = false" class="px-3 py-1 bg-blue-500 text-white rounded">
                    Cancel
                </button>
                <button wire:click="destroy" class="px-3 py-1 bg-red-500 text-white rounded">
                    Delete
                </button>

            </div>
        </div>
    </div>
    @endteleport
</div>