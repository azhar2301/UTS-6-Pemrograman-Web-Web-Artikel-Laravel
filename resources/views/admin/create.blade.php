<!DOCTYPE html>
<html>
<head>
    <title>Tambah Artikel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

    <h1 class="text-xl font-bold mb-4">Tambah Artikel</h1>

    <form method="POST" action="/admin/articles" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" placeholder="Judul"
               class="w-full border p-2 mb-3 rounded" required>

        <textarea name="content" placeholder="Isi artikel"
                  class="w-full border p-2 mb-3 rounded h-32" required></textarea>

        <label class="block mb-2">Gambar</label>
        <input type="file" name="image" class="mb-4">

        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 cursor-pointer">
            Simpan
        </button>
    </form>

</div>

</body>
</html>