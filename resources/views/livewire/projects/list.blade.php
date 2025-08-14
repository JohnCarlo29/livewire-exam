<div x-data="{ open: @entangle('isModalOpen').defer }">
    <div class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                <h2 class="text-3xl font-extrabold text-gray-900">Projects</h2>
                <button
                    wire:click="createProject"
                    class="mt-4 sm:mt-0 inline-flex items-center px-5 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 transition duration-200"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create Project
                </button>
            </div>

            <!-- Search -->
            <div class="mb-6 relative">
                <input
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    placeholder="Search projects..."
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1112 4.5a7.5 7.5 0 014.65 12.15z"/>
                    </svg>
                </div>
            </div>

            <!-- Projects grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($projects as $project)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 p-5 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">{{ $project->name }}</h3>
                            <p class="mt-2 text-gray-600 text-sm">{{ $project->description }}</p>
                        </div>
                        <div class="mt-4 flex space-x-3">
                            <button
                                wire:click="editProject({{ $project->id }})"
                                class="flex-1 px-4 py-2 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 transition duration-200"
                            >
                                Edit
                            </button>
                            <button
                                wire:click="deleteProject({{ $project->id }})"
                                class="flex-1 px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition duration-200"
                            >
                                Delete
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div
        x-data="{ open: @entangle('isModalOpen') }"
        x-show="open"
        x-trap.noscroll="open"
        x-on:keydown.escape.window="open = false; $wire.isModalOpen = false"
        class="fixed inset-0 z-50 flex items-center justify-center"
        style="display: none;"
    >
        <!-- backdrop -->
        <div x-show="open"
            x-transition.opacity
            x-on:click="open = false; $wire.isModalOpen = false"
            class="fixed inset-0 bg-black/50">
        </div>

        <!-- modal panel -->
         <div x-show="open"
            x-transition
            @click.outside="open = false; $wire.isModalOpen = false"
            class="bg-white rounded-lg shadow-xl w-full max-w-lg mx-4 p-6 z-10">
            <header class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold" x-text="$wire.editMode ? 'Edit Project' : 'Create Project'"></h2>
                <button @click="open = false; $wire.isModalOpen = false" aria-label="Close">✕</button>
            </header>

            <livewire:projects.project-form 
            :project="$selectedProject" 
            :key="$selectedProject ? $selectedProject->id : 'create'" />
        </div>
    </div>
    </div>
</div>