<!DOCTYPE html>
<html>
<head>
    <title>Edit Artikel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

    <h1 class="text-xl font-bold mb-4">Edit Artikel</h1>

    <form method="POST" action="/admin/articles/{{ $article->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $article->title }}"
               class="w-full border p-2 mb-3 rounded" required>

        <textarea name="content"
                  class="w-full border p-2 mb-3 rounded h-32"
                  required>{{ $article->content }}</textarea>

        <label class="block mb-2">Gambar</label>
        <input type="file" name="image" class="mb-3">

        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}"
                 class="w-32 rounded mb-3">
        @endif

        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 cursor-pointer">
            Update
        </button>
    </form>

</div>

</body>
</html>