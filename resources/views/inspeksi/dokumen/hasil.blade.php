<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Dokumen IKA - UP2WVI</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" type="image/png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .bg-primary { background-color: #1f7389; }
        .text-primary { color: #196275; }
        .hover\:bg-primary-dark:hover { background-color: #134e5a; }
        #spacer { padding-top: 100px; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body id="main-body" class="bg-white text-gray-800">

    <!-- HEADER -->
    <header id="main-header" class="bg-primary text-white px-4 py-4 fixed top-0 left-0 right-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between md:hidden">
            <a href="javascript:history.back()">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" alt="Logo PLN" class="h-16 w-auto">
            </a>
            <div class="flex-1 text-center">
                <h1 class="text-lg font-bold">DOKUMEN IKA</h1>
                <h2 class="text-sm text-white font-semibold mt-1">PLN PUSHARLIS UP2WVI</h2>
            </div>
        </div>

        <div class="max-w-7xl mx-auto hidden md:flex relative items-center justify-between">
            <a href="javascript:history.back()">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" alt="Logo PLN" class="h-20 w-auto">
            </a>
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center pointer-events-none">
                <h1 class="text-2xl lg:text-3xl font-bold">DOKUMEN IKA</h1>
                <h2 class="text-base lg:text-lg text-white font-semibold mt-1">PLN PUSHARLIS UP2WVI</h2>
            </div>
        </div>
    </header>

    <div id="spacer"></div>

    <!-- Tombol Back -->
    <div class="fixed max-w-6xl mx-auto px-4 mt-6">
        <a href="{{ route('welcome') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition">
            ←
        </a>
    </div>

    <!-- Tabel Dokumen -->
    <div class="max-w-6xl mx-auto px-4 mt-6">
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 w-1/12">No</th>
                        <th class="px-4 py-3 w-3/12">Nama Dokumen</th>
                        <th class="px-4 py-3 w-3/12">File</th>
                        <th class="px-4 py-3 w-3/12 text-center">Aksi</th>                        
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($dokumen as $index => $item)
                        <tr>
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">{{ $item->nama_dokumen }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ asset('storage/dokumen_ika/'.$item->file_dokumen) }}" target="_blank" class="text-blue-600 hover:underline">
                                    {{ $item->file_dokumen }}
                                </a>
                            </td>
                            <td class="px-4 py-3 text-center space-x-1">
                                <form action="{{ route('inspeksi.dokumen.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirmDelete(this)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>   
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                Tidak ada dokumen yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <br><br>
    </div>

    <!-- Tambah Dokumen -->
    <a href="{{ route('inspeksi.dokumen.create') }}" class="fixed bottom-4 right-4 bg-gray-200 hover:bg-gray-300 text-primary rounded-full p-3 shadow-lg">
        + Tambah Dokumen
    </a>

    <script>
        function confirmDelete(form) {
            event.preventDefault();
            Swal.fire({
                title: 'Yakin hapus?',
                text: "Dokumen akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>

</body>
</html>
