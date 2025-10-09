<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Student List</h1>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-black text-white text-center">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Kelas</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</t,d>
                        <td class="border px-4 py-2">{{ $student -> name }}</td>
                        <td class="border px-4 py-2">{{ $student -> classroom->name }}</td>
                        <td class="border px-4 py-2">{{ $student -> email }}</td>
                        <td class="border px-4 py-2">{{ $student -> address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
