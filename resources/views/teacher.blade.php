<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Teacher List</h1>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-black text-white text-center">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Subject Name</th>
                    <th class="border px-4 py-2">Phone</th>
                    <th class="border px-4 py-2">Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $teacher->name }}</td>
                        <td class="border px-4 py-2">{{ $teacher->subject->name ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $teacher->phone }}</td>
                        <td class="border px-4 py-2">{{ $teacher->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>