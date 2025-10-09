<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Classroom List</h1>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-black text-white text-center">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classrooms as $classroom)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $classroom ->name }}</td>
                        <td class="border px-4 py-2">{{ $classroom ->grade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
