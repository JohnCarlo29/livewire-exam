<div x-data="{ open: @entangle('isModalOpen') }">
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <x-modal>
        <div class="px-4 pt-5 pb-4 sm:p-6">
            <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                    <h3 class="text-lg font-medium text-gray-900">
                        {{ $editMode ? 'Edit Project' : 'Create Project' }}
                    </h3>

                    <div class="mt-4">
                        {{-- form modal here --}}
                    </div>
                </div>
            </div>
        </div>
    </x-modal>
</div>