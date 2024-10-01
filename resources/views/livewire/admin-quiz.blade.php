<div class="max-w-4xl mx-auto p-6 bg-white mt-10">

    <div class="mb-6">

        <a class="bg-blue-700 px-2 py-2 shadow-lg rounded-sm text-white text-sm font-semibold hover:bg-blue-600"
            href="{{route('admin.create.quiz')}}">Create
            Quiz</a>
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