<div x-data="{ open: @entangle('isModalOpen').defer }">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">Projects</h2>
                <button
                    wire:click="createProject"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
                >
                    Create Project
                </button>
            </div>

            <div class="mt-4">
                <input
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    placeholder="Search projects..."
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                />
            </div>

            <div class="mt-6">
                <!-- Projects list -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($projects as $project)
                        <div class="bg-white p-4 rounded-lg shadow">
                            <h3 class="text-lg font-medium">{{ $project->name }}</h3>
                            <p class="mt-1 text-gray-600">{{ $project->description }}</p>
                            <div class="mt-4 flex space-x-2">
                                <button
                                    wire:click="editProject({{ $project->id }})"
                                    class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600"
                                >
                                    Edit
                                </button>

                                <button
                                    wire:click="deleteProject({{ $project->id }})"
                                    class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600"
                                >
                                    Delete
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
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