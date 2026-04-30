<!DOCTYPE html>
<html>
<head>
    <title>Admin Artikel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>

        <form method="POST" action="/logout">
            @csrf
            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                Logout
            </button>
        </form>
    </nav>

    <div class="p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Daftar Artikel</h2>

            <a href="/admin/articles/create"
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                + Tambah Artikel
            </a>
        </div>

        <!-- List Artikel -->
        <div class="grid gap-4">
            @forelse($articles as $a)
                <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-gray-800">
                        {{ $a->title }}
                    </h3>

                    <p class="text-gray-600 mt-2 line-clamp-2">
                        {{ \Illuminate\Support\Str::limit($a->content, 100) }}
                    </p>

                    <div class="mt-4 flex items-center gap-4">
                        <a href="/admin/articles/{{ $a->id }}/edit"
                           class="text-blue-500 hover:underline">
                            Edit
                        </a>

                        <form method="POST" action="/admin/articles/{{ $a->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada artikel.</p>
            @endforelse
        </div>

    </div>

</body>
</html>