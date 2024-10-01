<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md mt-8 ">
    <h1 class="text-2xl font-bold mb-6">Create a New Quiz</h1>

    @if (session()->has('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
        {{ session('success') }}
    </div>
    @endif

    <form wire:submit.prevent="store" class="space-y-4 ">
        <!-- Title Input -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" wire:model="title"
                class="mt-1 block w-full p-2 border-gray-300 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('title') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Topic Input -->
        <div>
            <label for="topic" class="block text-sm font-medium text-gray-700">Topic</label>
            <input type="text" id="topic" wire:model="topic"
                class="mt-1 block p-2 border-gray-300 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('topic') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Time Input -->
        <div>
            <label for="time" class="block text-sm font-medium text-gray-700">Time (in minutes)</label>
            <input type="number" id="time" wire:model="time"
                class="mt-1 block  p-2 border-gray-300 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('time') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Number of Questions Input -->
        <div>
            <label for="number_of_questions" class="block text-sm font-medium text-gray-700">Number of Questions</label>
            <input type="number" id="number_of_questions" wire:model="number_of_questions"
                class="mt-1 block  p-2 border-gray-300 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('number_of_questions') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Level Input -->
        <div>
            <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
            <input type="text" id="level" wire:model="level"
                class="mt-1 block  p-2 border-gray-300 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('level') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save Quiz
            </button>
        </div>
    </form>
</div>