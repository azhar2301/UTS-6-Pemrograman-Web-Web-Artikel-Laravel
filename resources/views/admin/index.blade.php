<!DOCTYPE html>
<html>
<head>
    <title>Admin Artikel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-white shadow p-4">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            
            <h1 class="text-xl font-bold text-gray-800">
                Admin Panel
            </h1>

            <form method="POST" action="/logout">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded cursor-pointer transition">
                    Logout
                </button>
            </form>

        </div>
    </nav>

    <!-- CONTENT -->
    <div class="max-w-5xl mx-auto mt-8 px-4">

        <!-- BUTTON TAMBAH -->
        <div class="mb-6">
            <a href="/admin/articles/create"
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded cursor-pointer transition inline-block">
                + Tambah Artikel
            </a>
        </div>

        <!-- LIST -->
        <div class="space-y-4">

            @forelse($articles as $a)

                <div class="bg-white p-4 rounded-xl shadow flex items-center gap-4 
                            hover:shadow-xl hover:-translate-y-1 
                            transition duration-300">

                    <!-- THUMBNAIL -->
                    @if($a->image)
                        <img src="{{ asset('storage/' . $a->image) }}"
                             class="w-24 h-24 object-cover rounded-lg transition duration-300 hover:scale-105">
                    @else
                        <div class="w-24 h-24 bg-gray-200 flex items-center justify-center rounded-lg text-gray-400 text-xs">
                            No Image
                        </div>
                    @endif

                    <!-- CONTENT -->
                    <div class="flex-1">
                        <h2 class="font-bold text-lg text-gray-800">
                            {{ $a->title }}
                        </h2>

                        <p class="text-xs text-gray-400">
                            {{ $a->created_at->format('d M Y') }}
                        </p>

                        <p class="text-sm text-gray-600 mt-1">
                            {{ \Illuminate\Support\Str::limit($a->content, 80) }}
                        </p>
                    </div>

                    <!-- ACTION BUTTON -->
                    <div class="flex gap-2">

                        <a href="/admin/articles/{{ $a->id }}/edit"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm transition">
                            Edit
                        </a>

                        <form method="POST"
                              action="/admin/articles/{{ $a->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition cursor-pointer">
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