<!DOCTYPE html>
<html>
<head>
    <title>{{ $article->title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="text-lg font-bold text-gray-800">
                Website Artikel
            </h1>

            <a href="/"
               class="text-blue-500 hover:underline">
                ← Kembali
            </a>
        </div>
    </nav>

    <!-- Content -->
    <div class="max-w-4xl mx-auto mt-8 px-4">

        <div class="bg-white p-8 rounded-lg shadow">

            <!-- Judul -->
            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                {{ $article->title }}
            </h2>

            <!-- Garis -->
            <hr class="mb-6">

            <!-- Isi -->
            <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                {{ $article->content }}
            </div>

        </div>

    </div>

</body>
</html>