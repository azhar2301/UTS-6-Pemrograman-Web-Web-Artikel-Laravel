<!DOCTYPE html>
<html>
<head>
    <title>Tambah Artikel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>

        <a href="/admin/articles"
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Kembali
        </a>
    </nav>

    <div class="flex justify-center items-center mt-10">

        <form method="POST" action="/admin/articles"
              class="bg-white p-6 rounded-lg shadow w-full max-w-xl">

            @csrf

            <h2 class="text-2xl font-semibold mb-6">
                Tambah Artikel
            </h2>

            <!-- Error -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Title -->
            <label class="block mb-2 font-medium">Judul</label>
            <input type="text" name="title"
                   class="w-full border p-2 rounded mb-4"
                   placeholder="Masukkan judul artikel">

            <!-- Content -->
            <label class="block mb-2 font-medium">Isi Artikel</label>
            <textarea name="content" rows="6"
                      class="w-full border p-2 rounded mb-4"
                      placeholder="Tulis isi artikel..."></textarea>

            <!-- Button -->
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded w-full">
                Simpan Artikel
            </button>

        </form>

    </div>

</body>
</html>