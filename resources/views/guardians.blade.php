<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Guardian List</h1>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-black text-white text-center">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Pekerjaan</th>
                    <th class="border px-4 py-2">Telepon</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guardians as $guardian)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $guardian['name'] }}</td>
                        <td class="border px-4 py-2">{{ $guardian['job'] }}</td>
                        <td class="border px-4 py-2">{{ str_replace(['+','-','.',' '],'',$guardian['phone']) }}</td>
                        <td class="border px-4 py-2">{{ $guardian['email'] }}</td>
                        <td class="border px-4 py-2">{{ $guardian['address'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
