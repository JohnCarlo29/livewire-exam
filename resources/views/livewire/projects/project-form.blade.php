<form wire:submit.prevent="save" class="space-y-5">
    @php
        $inputClasses = "w-full rounded-lg shadow-sm 
            border border-gray-300 bg-white text-gray-900 
            px-3 py-2
            focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 
            dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 
            dark:focus:border-blue-400 dark:focus:ring-blue-500 dark:focus:ring-opacity-40 
            transition-colors";
    @endphp

    <!-- Name -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
        <input wire:model.defer="name" type="text" id="name" class="{{ $inputClasses }}" placeholder="Enter project name">
        @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <!-- Description -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
        <textarea wire:model.defer="description" id="description" rows="4" class="{{ $inputClasses }}" placeholder="Enter project description"></textarea>
        @error('description') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <!-- Status -->
    <div>
        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
        <select wire:model.defer="status" id="status" class="{{ $inputClasses }}">
            <option value="">Select status</option>
            <option value="draft">Draft</option>
            <option value="active">Active</option>
            <option value="done">Done</option>
        </select>
        @error('status') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>


    <!-- Due Date -->
    <div>
        <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Due Date</label>
        <input wire:model.defer="dueDate" type="date" id="due_date" class="{{ $inputClasses }}">
        @error('due_date') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
    </div>

    <!-- Buttons -->
    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
        <button type="button" wire:click="$dispatch('closeModal')" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
            Cancel
        </button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            Save
        </button>
    </div>
</form>
