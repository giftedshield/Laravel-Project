<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Alpine.js scope -->
            <div x-data="{ 
                openAddModal: false, 
                openEditModal: false, 
                openDeleteModal: false, 
                deleteUrl: '', 
                editingClassroom: null 
            }">

                <!-- Add Classroom Button -->
                <x-admin.menu-table button-label="Add Classroom" on-click="openAddModal = true" />

                <!-- Add Classroom Modal -->
                <div x-show="openAddModal" x-transition.opacity x-cloak
                     class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-2xl p-6 relative">
                        <button @click="openAddModal = false" class="absolute top-2 right-3 text-gray-400 hover:text-gray-600">✕</button>
                        @include('admin.classroom.create') <!-- Include your form for creating a classroom -->
                    </div>
                </div>

                <!-- Classrooms Table -->
                <div class="overflow-x-auto mt-4">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Room Name</th>
                            <th class="px-4 py-3">Students List</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($classrooms as $classroom)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $classroom->name }}</td>
                                <td class="px-4 py-3">
                                    @foreach ($classroom->students as $student)
                                        {{ $student->name }} <br>
                                    @endforeach
                                </td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <div x-data="{ open: false }" class="relative">
                                        <button @click="open = !open" class="inline-flex items-center p-0.5 text-sm font-medium text-gray-500 hover:text-gray-800 rounded-lg dark:text-gray-400 dark:hover:text-gray-100">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            </svg>
                                        </button>

                                        <div x-show="open" @click.outside="open = false" x-transition.opacity.scale
                                             class="absolute right-0 mt-2 w-44 bg-white dark:bg-gray-700 rounded-lg shadow divide-y divide-gray-100 dark:divide-gray-600 z-50">
                                            <!-- Edit -->
                                            <button @click="
                                                editingClassroom = @js([ 
                                                    'id' => $classroom->id, 
                                                    'name' => $classroom->name 
                                                ]);
                                                openEditModal = true;
                                                open = false;
                                            "
                                                    class="w-full text-left block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                                                Edit
                                            </button>

                                            <!-- Delete -->
                                            <button @click="
                                                deleteUrl = '{{ route('classrooms.destroy', $classroom->id) }}';
                                                openDeleteModal = true;
                                                open = false;
                                            "
                                                    class="w-full text-left block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-4">
                    {{ $classrooms->links() }} <!-- Pagination links -->
                </div>

                <!-- Edit Classroom Modal -->
                <div x-if="editingClassroom" x-cloak>
                    <div x-show="openEditModal" x-transition.opacity
                         class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
                        <div @click.outside="openEditModal = false"
                             class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-2xl p-6 relative">
                            <button @click="openEditModal = false" class="absolute top-2 right-3 text-gray-400 hover:text-gray-600">✕</button>

                            <!-- Edit Form -->
                            <form :action="`{{ route('classrooms.update', 'ID') }}`.replace('ID', editingClassroom.id)" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')

                                <div>
                                    <label for="edit_name">Room Name</label>
                                    <input type="text" id="edit_name" name="name" x-model="editingClassroom.name" required class="w-full border rounded p-2">
                                </div>

                                <div class="flex justify-end space-x-2 mt-4">
                                    <button type="button" @click="openEditModal = false" class="px-4 py-2 bg-gray-400 text-white rounded">Cancel</button>
                                    <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Confirmation Modal -->
                <div x-show="openDeleteModal" x-transition.opacity x-cloak
                     class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40">
                    <div @click.outside="openDeleteModal = false"
                         class="bg-white dark:bg-gray-800 w-full max-w-sm sm:max-w-md mx-4 sm:mx-0 p-4 sm:p-6 rounded-lg shadow-lg text-center relative max-h-[90vh] overflow-auto">
                        <button @click="openDeleteModal = false"
                                class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">✕</button>

                        <p class="mb-4 text-gray-600 dark:text-gray-300">Are you sure you want to delete this classroom?</p>

                        <div class="flex justify-center space-x-4">
                            <button @click="openDeleteModal = false"
                                    class="py-2 px-4 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                                No, cancel
                            </button>

                            <form :action="deleteUrl" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="py-2 px-4 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600">
                                    Yes, I'm sure
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- End Alpine.js scope -->

        </div>
    </section>
</x-admin.layout>
