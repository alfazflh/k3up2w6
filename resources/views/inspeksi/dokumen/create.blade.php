<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokumen IKA - PLN PUSHARLIS UP2WVI</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" type="image/png" />
    @vite('resources/css/app.css')
    <style>
        .bg-primary { background-color: #1f7389; }
        .text-primary { color: #196275; }
        .hover\:bg-primary-dark:hover { background-color: #134e5a; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-white text-gray-800">

    <!-- HEADER -->
    <header id="main-header" class="bg-primary text-white px-4 py-4 fixed top-0 left-0 right-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between md:hidden">
            <div class="flex items-center space-x-3">
                <a href="{{ url()->current() }}">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" alt="Logo PLN" class="h-16 w-auto">
                </a>
            </div>
            <div class="flex-1 text-center">
                <h1 class="text-lg font-bold leading-tight">
                    DOKUMEN IKA
                </h1>
                <h2 class="text-sm text-white font-semibold mt-1">
                    PLN PUSHARLIS UP2WVI
                </h2>
            </div>
        </div>

        <div class="max-w-7xl mx-auto hidden md:flex relative items-center justify-between">
            <div class="flex items-center space-x-3">
                <a href="{{ url()->current() }}">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" alt="Logo PLN" class="h-20 w-auto">
                </a>
            </div>
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center pointer-events-none">
                <h1 class="text-2xl lg:text-3xl font-bold leading-tight">
                    DOKUMEN IKA
                </h1>
                <h2 class="text-base lg:text-lg text-white font-semibold mt-1">
                    PLN PUSHARLIS UP2WVI
                </h2>
            </div>
        </div>
    </header>

    <div id="spacer" class="pt-32"></div>

    <!-- TOMBOL BACK -->
    <div class="fixed max-w-6xl mx-auto px-4 mt-6">
        <a href="{{ route('dokumen.hasil') }}"
           class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition duration-300">
            ←
        </a>
    </div>

    <!-- FORM UPLOAD DOKUMEN -->
    <div class="px-5 sm:px-6 md:px-8 lg:px-10">
        <form id="form-dokumen" action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data"
              class="max-w-3xl mx-auto py-6 mt-8 mb-10 bg-gray-100 rounded-xl shadow-lg space-y-6 px-6 sm:px-8">
            @csrf

            <div class="bg-white p-4 rounded-lg shadow-sm">
                <label class="block font-semibold mb-1">Nama Dokumen <span class="text-red-500">*</span></label>
                <input type="text" name="nama_dokumen" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-sm">
                <label class="block font-semibold mb-1">Upload File <span class="text-red-500">*</span></label>
                <input type="file" name="file_dokumen" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                <p class="text-sm text-gray-500 mt-1">Format: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, JPG, PNG (Max: 5MB)</p>
            </div>

            <div class="text-center">
                <button type="submit" id="submit-btn"
                        class="bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-6 rounded-lg shadow">
                    Simpan Dokumen
                </button>
            </div>
        </form>
    </div>

    <!-- JS FIX HEADER -->
    <script>
        function setBodyPadding() {
            const header = document.getElementById('main-header');
            const spacer = document.getElementById('spacer');
            if (header && spacer) {
                const headerHeight = header.offsetHeight;
                spacer.style.paddingTop = `${headerHeight + 3}px`;
            }
        }
        window.addEventListener('load', setBodyPadding);
        window.addEventListener('resize', setBodyPadding);
    </script>

    <!-- SweetAlert sukses -->
    <script>
        document.getElementById('form-dokumen').addEventListener('submit', function (e) {
            e.preventDefault();
            const form = this;

            Swal.fire({
                icon: 'success',
                title: 'Dokumen berhasil disimpan!',
                showConfirmButton: false,
                timer: 1500
            });

            setTimeout(() => {
                form.submit();
            }, 1600);
        });
    </script>

</body>
</html>
