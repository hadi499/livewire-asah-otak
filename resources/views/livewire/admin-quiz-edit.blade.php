<div class="container mx-auto w-[500px] mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Quiz</h2>

    @if (session()->has('success'))
    <div class="bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @elseif (session()->has('error'))
    <div class="bg-red-200 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif

    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" wire:model="title"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                placeholder="Enter quiz title">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="topic" class="block text-sm font-medium text-gray-700">Topic</label>
            <input type="text" id="topic" wire:model="topic"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                placeholder="Enter quiz topic">
            @error('topic') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="time" class="block text-sm font-medium text-gray-700">Time (in minutes)</label>
            <input type="number" id="time" wire:model="time"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                placeholder="Enter time in minutes">
            @error('time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="number_of_questions" class="block text-sm font-medium text-gray-700">Number of Questions</label>
            <input type="number" id="number_of_questions" wire:model="number_of_questions"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                placeholder="Enter number of questions">
            @error('number_of_questions') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
            <input type="text" id="level" wire:model="level"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                placeholder="Enter quiz level">
            @error('level') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-between mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update
                Quiz</button>
            <a href="{{ route('admin.quiz') }}"
                class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>