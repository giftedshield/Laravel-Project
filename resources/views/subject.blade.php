<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Subject List</h1>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-black text-white text-center">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $subject->name }}</td>
                        <td class="border px-4 py-2">{{ $subject->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>