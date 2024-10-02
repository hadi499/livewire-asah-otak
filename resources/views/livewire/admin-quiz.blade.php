<div class="max-w-2xl mx-auto p-2 bg-white mt-6">



    <div class="mb-6 flex justify-between">

        <a class="border border-blue-700  py-1 shadow-lg rounded-sm flex items-center justify-center w-20  text-blue-700 text-sm font-semibold hover:bg-blue-700 hover:text-white"
            href="{{route('admin.create.quiz')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
            <span class="ml-1">Quiz</span>
        </a>
        <a wire:navigate href="{{route('admin')}}">
            <div
                class=" border-slate-500 border  text-center hover:bg-slate-800 hover:text-white w-20 py-1 shadow-lg rounded-sm  text-slate-700 text-sm font-semibold ">
                Back
            </div>
        </a>
    </div>

    @if (count($quizzes) > 0)
    <div class="flex justify-evenly flex-wrap">

        @foreach($quizzes as $quiz)
        <div class="border mb-5 p-4 w-[300px] flex flex-col  shadow-md">

            <h1 class="text-xl font-semibold">{{ $quiz->title }}</h1>
            <p class="text-lg"> Level: {{ $quiz->level }}</p>
            <p class="text-lg"> Time: {{ $quiz->time }}</p>



            <div class="w-full">
                <a href="{{ route('admin.question.create', $quiz->id) }}">
                    <div
                        class="mt-3 text-center text-blue-700 py-2 px-2 border border-blue-500 rounded hover:text-white hover:bg-blue-700  ">
                        Make Question
                    </div>
                </a>
                <a href="{{ route('admin.quiz.edit', $quiz->id) }}">
                    <div
                        class="mt-3 text-center text-green-800 py-2 px-2 border border-green-500 rounded hover:text-white hover:bg-green-500 ">
                        Edit Quiz
                    </div>
                </a>
                <button wire:click="deleteQuiz({{ $quiz->id }})"
                    class="mt-3 text-center text-red-600 py-2 px-2 border border-red-500 rounded hover:text-white hover:bg-red-500 w-full "
                    onclick="return confirm('Are you sure you want to delete this quiz?');">Delete</button>

            </div>



        </div>
        @endforeach

    </div>


    @else
    <p class="text-gray-500">Tidak ada quiz yang tersedia.</p>
    @endif

</div>