<div>


    <div class="md:flex md:justify-center mt-8 md:gap-4 p-2">
        <div class="border p-2 w-full md:w-[500px] rounded-lg shadow-lg bg-slate-100 mb-3">


            <h1 class="text-center text-2xl font-semibold">Form question</h1>
            <h3 class="text-xl font-bold mb-6 text-center">{{ $quiz->title }}</h3>

            <form wire:submit.prevent="store" class="space-y-4">
                <div>
                    <label for="question_text" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                    <input type="text" id="question_text" wire:model="question_text"
                        class="mt-1 block w-2/3 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @error('question_text')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="option_a" class="block text-sm font-medium text-gray-700">Pilihan A</label>
                    <input type="text" id="option_a" wire:model="option_a"
                        class="mt-1 block w-[70px] px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        required autocomplete="off">
                    @error('option_a')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="option_b" class="block text-sm font-medium text-gray-700">Pilihan B</label>
                    <input type="text" id="option_b" wire:model="option_b"
                        class="mt-1 block w-[70px] px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        required autocomplete="off">
                    @error('option_b')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="option_c" class="block text-sm font-medium text-gray-700">Pilihan C</label>
                    <input type="text" id="option_c" wire:model="option_c"
                        class="mt-1 block w-[70px] px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        required autocomplete="off">
                    @error('option_c')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="correct_answer" class="block text-sm font-medium text-gray-700">Jawaban benar</label>
                    <input type="text" id="correct_answer" wire:model="correct_answer"
                        class="mt-1 block w-[70px] px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        required autocomplete="off">
                    @error('correct_answer')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end gap-6">

                    <a wire:navigate href="{{route('admin.quiz')}}"
                        class=" px-4 py-2 rounded-lg border border-slate-700 hover:bg-slate-700 hover:text-white focus:outline-none">
                        Back
                    </a>
                    <button type="submit"
                        class=" bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                        Save
                    </button>
                </div>

            </form>

        </div>

        <div>

            @foreach($questions as $question)
            <div class="text-center mb-2 py-2 px-4 w-1/2 md:w-full bg-slate-100 rounded-lg">{{ $question->question_text
                }} = {{
                $question->correct_answer }}
            </div>
            @endforeach

        </div>

    </div>





</div>