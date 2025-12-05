<!-- Edit Student Modal -->
<div x-data="{ openEditModal: false, editingStudent: null }">
    <!-- Trigger button to open modal -->
    <div class="flex justify-center m-5">
        <button @click="editingStudent = { id: 1, name: 'John', classroom_id: 2, email: 'john@example.com', address: '123 Main St' }; openEditModal = true"
                class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Edit Student
        </button>
    </div>

    <!-- Modal -->
    <div x-show="openEditModal" x-transition.opacity x-cloak
         class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
        <div @click.outside="openEditModal = false" class="bg-white p-6 rounded-lg w-full max-w-2xl relative">
            <!-- Modal header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold" x-text="editingStudent ? 'Edit ' + editingStudent.name : 'Edit Student'"></h3>
                <button @click="openEditModal = false" class="text-gray-400 hover:text-gray-600">✕</button>
            </div>

            <!-- Modal body / Form -->
            <form :action="`{{ route('students.update', 'ID') }}`.replace('ID', editingStudent.id)" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="edit_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" id="edit_name" name="name" x-model="editingStudent.name" required
                           class="w-full border rounded p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <div>
                    <label for="edit_classroom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Classroom</label>
                    <select id="edit_classroom" name="classroom_id" x-model="editingStudent.classroom_id" required
                            class="w-full border rounded p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="">-- Select Classroom --</option>
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="edit_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" id="edit_email" name="email" x-model="editingStudent.email" required
                           class="w-full border rounded p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <div>
                    <label for="edit_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <input type="text" id="edit_address" name="address" x-model="editingStudent.address"
                           class="w-full border rounded p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                <div class="flex justify-end space-x-2 mt-4">
                    <!-- Cancel button -->
                    <button type="button" @click="openEditModal = false"
                            class="px-4 py-2 bg-gray-400 text-white rounded">
                        Cancel
                    </button>

                    <!-- Submit button -->
                    <button type="submit" class="px-4 py-2 bg-primary-700 text-white rounded">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
