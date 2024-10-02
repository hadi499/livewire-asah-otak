<div>


    <div class="md:flex md:justify-center mt-8 md:gap-4">
        <div class="border p-2  w-full md:w-[500px] md:p-6 rounded-lg shadow-lg bg-slate-50 mb-3">



            <h3 class="text-xl font-bold  text-center">{{ $quiz->title }}</h3>
            <p class="text-lg font-semibold mb-6 text-center">{{ $quiz->level }}</p>

            <form wire:submit.prevent="store">


                <div class="mb-3">
                    <label for="question_text" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                    <input type="text" id="question_text" wire:model="question_text"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @error('question_text')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="option_a" class="block text-sm font-medium text-gray-700">Pilihan A</label>
                    <input type="text" id="option_a" wire:model="option_a"
                        class="mt-1 block w-[70px] px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        required autocomplete="off">
                    @error('option_a')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="option_b" class="block text-sm font-medium text-gray-700">Pilihan B</label>
                    <input type="text" id="option_b" wire:model="option_b"
                        class="mt-1 block w-[70px] px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        required autocomplete="off">
                    @error('option_b')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="option_c" class="block text-sm font-medium text-gray-700">Pilihan C</label>
                    <input type="text" id="option_c" wire:model="option_c"
                        class="mt-1 block w-[70px] px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        required autocomplete="off">
                    @error('option_c')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="correct_answer" class="block text-sm font-medium text-gray-700">Jawaban
                        benar</label>
                    <input type="text" id="correct_answer" wire:model="correct_answer"
                        class="mt-1 block w-[70px] px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        required autocomplete="off">
                    @error('correct_answer')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <hr class="border border-slate-400 mt-5">




                <div class="flex justify-between mt-3">

                    <a wire:navigate href="{{route('admin.quiz')}}"
                        class=" px-3 py-1 text-sm font-semibold rounded-sm border border-slate-700 hover:bg-slate-700 hover:text-white focus:outline-none">
                        Cancel
                    </a>
                    <button type="submit"
                        class="border border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white px-3 py-1 text-sm font-semibold rounded-sm ">
                        Save
                    </button>
                </div>

            </form>

        </div>

        <div>

            @foreach($questions as $question)

            <div id="wrap" class="relative flex mb-3 bg-slate-100 rounded-sm gap-2 w-1/2 md:w-full">

                <div class="text-center p-2 mr-8 ">
                    <a href="{{route('quiz.question.edit', $question->id)}}" class="hover:text-blue-700">
                        {{
                        $question->question_text
                        }} = {{
                        $question->correct_answer }}
                    </a>



                </div>
                <livewire:admin-question-destroy :question="$question"
                    wire:key="question-destroy-{{ $question->id }}" />


            </div>


            @endforeach

        </div>

    </div>





</div>