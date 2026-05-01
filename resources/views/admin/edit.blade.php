<!DOCTYPE html>
<html>
<head>
    <title>Edit Artikel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-white shadow p-4">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            
            <h1 class="text-lg font-bold text-gray-800">
                Edit Artikel
            </h1>

            <a href="/admin/articles"
               class="text-blue-500 hover:underline">
                ← Kembali
            </a>

        </div>
    </nav>

    <!-- FORM -->
    <div class="max-w-xl mx-auto mt-8 px-4">

        <div class="bg-white p-6 rounded-xl shadow">

            <form method="POST" action="/admin/articles/{{ $article->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- JUDUL -->
                <label class="block mb-1 font-medium text-gray-700">Judul</label>
                <input type="text" name="title" value="{{ $article->title }}"
                       class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>

                <!-- ISI -->
                <label class="block mb-1 font-medium text-gray-700">Isi Artikel</label>
                <textarea name="content"
                          class="w-full border border-gray-300 p-2 rounded mb-4 h-40 focus:outline-none focus:ring-2 focus:ring-blue-400"
                          required>{{ $article->content }}</textarea>

                <!-- GAMBAR -->
                <label class="block mb-1 font-medium text-gray-700">Gambar (Opsional)</label>
                <input type="file" name="image"
                       class="w-full mb-3 text-sm text-gray-600">

                <!-- PREVIEW GAMBAR -->
                @if($article->image)
                    <div class="mb-4 flex justify-center bg-gray-100 p-3 rounded">
                        <img src="{{ asset('storage/' . $article->image) }}"
                             class="max-h-[200px] object-contain rounded">
                    </div>
                @endif

                <!-- BUTTON -->
                <button class="block w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition duration-200 cursor-pointer mt-2">
                    Update Artikel
                </button>

            </form>

        </div>

    </div>

</body>
</html>