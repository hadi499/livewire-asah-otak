<div class="flex flex-col mt-10 justify-center items-center">

    <form wire:submit.prevent="update" class="w-[500px] border p-4">
        <p class="text-center text-2xl font-semibold mb-3">Edit Question</p>
        <div class="mb-3 space-y-2">
            <label>Pertanyaan</label>
            <input type="text" wire:model="question_text"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
                @error('question_text') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 space-y-2">
            <label>Opsi A</label>
            <input type="text" wire:model="option_a"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
                @error('option_a') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 space-y-2">
            <label>Opsi B</label>
            <input type="text" wire:model="option_b"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
                @error('option_b') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 space-y-2">
            <label>Opsi C</label>
            <input type="text" wire:model="option_c"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
                @error('option_c') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 space-y-2">
            <label>Jawaban Benar</label>
            <input type="text" wire:model="correct_answer"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
                @error('correct_answer') <span class="error">{{ $message }}</span> @enderror

        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.question.create', ['quiz' => $question->quiz_id]) }}"
                class="mr-3 text-sm font-semibold px-3 py-1 border border-slate-600 hover:bg-blue-100 text-slate-700 hover:border-blue-600 rounded-sm mt-8">
                Cancel
            </a>
            <button type="submit"
                class="mr-3 text-sm font-semibold px-3 py-1 border border-slate-600 hover:bg-blue-100 text-slate-700 hover:border-blue-600 rounded-sm mt-8">
                Update
            </button>
        </div>
</div>