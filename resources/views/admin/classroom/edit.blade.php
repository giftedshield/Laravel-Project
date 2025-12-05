<x-admin.layout>
    <x-slot:judul>Edit Classroom</x-slot:judul>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 relative">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Classroom</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Modify the details of the classroom.</p>
                </div>

                <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Classroom Name -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Classroom Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $classroom->name) }}" required
                               class="w-full border rounded p-2 focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>

                    <!-- Students (Optional) -->
                    <div>
                        <label for="students" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Students</label>
                        <select id="students" name="students[]" multiple
                                class="w-full border rounded p-2 focus:ring-primary-600 focus:border-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" 
                                    @if($classroom->students->contains($student->id)) selected @endif>
                                    {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Select students to add to this classroom.</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-2 mt-4">
                        <button type="button" onclick="window.location='{{ route('classrooms.index') }}'"
                                class="px-4 py-2 bg-gray-400 text-white rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded">Update Classroom</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-admin.layout>
