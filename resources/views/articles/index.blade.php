<!DOCTYPE html>
<html>
<head>
    <title>Artikel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-xl font-bold text-gray-800">
                Website Artikel
            </h1>
        </div>
    </nav>

    <!-- Container -->
    <div class="max-w-6xl mx-auto mt-8 px-4">

        <h2 class="text-2xl font-semibold mb-6">
            Daftar Artikel
        </h2>

        <!-- GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($articles as $a)

                <a href="/artikel/{{ $a->id }}"
                   class="block bg-white p-5 rounded-lg shadow 
                          hover:shadow-xl hover:-translate-y-1 
                          transition duration-300 cursor-pointer">

                    <!-- GAMBAR -->
                    @if($a->image)
                        <img src="{{ asset('storage/' . $a->image) }}"
                             class="w-full h-40 object-cover rounded mb-3">
                    @endif

                    <!-- JUDUL -->
                    <h3 class="text-lg font-bold text-gray-800">
                        {{ $a->title }}
                    </h3>

                    <!-- TANGGAL -->
                    <p class="text-xs text-gray-400 mt-1">
                        {{ $a->created_at->format('d M Y') }}
                    </p>

                    <!-- ISI SINGKAT -->
                    <p class="text-gray-600 mt-2 text-sm">
                        {{ \Illuminate\Support\Str::limit($a->content, 100) }}
                    </p>

                    <p class="text-blue-500 mt-4 text-sm">
                        Baca Selengkapnya →
                    </p>

                </a>

            @empty
                <p class="text-gray-500">Belum ada artikel.</p>
            @endforelse

        </div>

    </div>

</body>
</html>