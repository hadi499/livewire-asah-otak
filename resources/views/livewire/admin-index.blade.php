<div>
    <div class="flex  justify-center mt-8">
        <div class="w-[300px]">


            <a wire:navigate href="{{route('admin.quiz')}}">
                <div
                    class="border border-blue-700 hover:bg-blue-700 hover:text-white  px-2 py-2 shadow-lg rounded-sm text-blue-700 text-sm text-center  font-semibold mb-4">

                    Quiz
                </div>
            </a>
            <a wire:navigate href="{{route('admin.score')}}">
                <div
                    class="border border-blue-700 hover:bg-blue-700 hover:text-white  px-2 py-2 shadow-lg rounded-sm text-blue-700 text-sm text-center  font-semibold mb-4">
                    Score
                </div>
            </a>
            <a wire:navigate href="{{route('admin.users')}}">
                <div
                    class="border border-blue-700 hover:bg-blue-700 hover:text-white  px-2 py-2 shadow-lg rounded-sm text-blue-700 text-sm text-center  font-semibold mb-4">
                    Users
                </div>
            </a>


        </div>


    </div>
</div>