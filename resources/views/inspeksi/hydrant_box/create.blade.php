<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peralatan Tanggap Darurat UP2WVI - BOX HYDRANT</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" type="image/png" />
    @vite('resources/css/app.css')
    <style>
        .bg-primary { background-color: #196275; }
        .text-primary { color: #196275; }
        .border-primary { border-color: #196275; }
        .hover\:bg-primary-dark:hover { background-color: #134e5a; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body id="main-body" class="bg-white text-gray-800">

<header id="main-header" class="bg-primary text-white px-4 py-4 fixed top-0 left-0 right-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between md:hidden">
        <a href="{{ url()->current() }}">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" alt="Logo PLN" class="h-16 w-auto">
        </a>
        <div class="flex-1 text-center">
            <h1 class="text-lg font-bold">MONITORING BOX HYDRANT</h1>
            <h2 class="text-sm font-semibold">PLN PUSHARLIS UP2WVI</h2>
        </div>
    </div>

    <div class="max-w-7xl mx-auto hidden md:flex relative items-center justify-between">
        <a href="{{ url()->current() }}">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" alt="Logo PLN" class="h-20 w-auto">
        </a>
        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
            <h1 class="text-3xl font-bold">MONITORING BOX HYDRANT</h1>
            <h2 class="text-lg font-semibold">PLN PUSHARLIS UP2WVI</h2>
        </div>
    </div>
</header>

<div id="spacer" class="pt-32"></div>

<div class="fixed max-w-6xl mx-auto px-4 mt-6">
    <a href="{{ route('boxhydrant.hasil', ['id_boxhydrant' => $boxhydrant->id_boxhydrant]) }}"
       class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition">
        ←
    </a>
</div>

<div class="px-5 sm:px-6 md:px-8 lg:px-10">
    <form id="form-inspeksi" action="{{ route('pemeriksaan-boxhydrant.store') }}" method="POST"
          class="max-w-3xl mx-auto py-6 mt-8 mb-10 bg-gray-100 rounded-xl shadow-lg space-y-6 px-6 sm:px-8">
        @csrf

        <input type="hidden" name="id_boxhydrant" value="{{ $boxhydrant->id_boxhydrant }}">
        <input type="hidden" name="lokasi" value="{{ $boxhydrant->lokasi }}">
        <input type="hidden" name="nama" value="{{ $boxhydrant->nama }}">
        <input type="hidden" name="catatan" value="{{ $boxhydrant->catatan }}">

        <div class="bg-white p-4 rounded-lg shadow-sm">
            <label class="block font-semibold mb-1">Tanggal Pemeriksaan</label>
            <input type="date" name="tanggal_pemeriksaan" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-sm">
            <label class="block font-semibold mb-1">Petugas</label>
            <input type="text" name="petugas" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-sm">
            <label class="block font-semibold mb-1">Pengawas</label>
            <input type="text" name="pengawas" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
        </div>

        <div class="bg-blue-100 p-4 rounded-lg border-l-4 border-primary">
            <h2 class="text-lg font-bold text-primary mb-1">Kondisi Box Hydrant</h2>
            <p class="text-sm text-gray-700">Isi sesuai dengan kondisi box hydrant di lapangan</p>
        </div>

        <div class="space-y-4">
            @php
                $items = [
                    'pilar_hydrant' => 'Pilar Hydrant',
                    'box_hydrant' => 'Box Hydrant',
                    'noozle' => 'Noozle',
                    'selang' => 'Selang',
                    'uji_fungsi' => 'Uji Fungsi',
                    'kesimpulan' => 'Kesimpulan',
                ];
            @endphp

            @foreach ($items as $key => $label)
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <label class="block font-semibold mb-2">{{ $label }} <span class="text-red-500">*</span></label>
                    <div class="flex flex-wrap gap-4">
                        @foreach (['baik', 'tidak_baik'] as $val)
                            <label class="inline-flex items-center space-x-1">
                                <input type="radio" name="{{ $key }}" value="{{ $val }}" required>
                                <span>{{ ucfirst(str_replace('_', ' ', $val)) }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            <button type="submit" id="submit-btn"
                    class="bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-6 rounded-lg shadow">
                Simpan Inspeksi
            </button>
        </div>
    </form>
</div>

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

    document.getElementById('submit-btn').addEventListener('click', function () {
        const form = document.getElementById('form-inspeksi');
        const idBox = document.querySelector('input[name="id_boxhydrant"]').value;

        Swal.fire({
            icon: 'success',
            title: 'Pemeriksaan berhasil dikirim!',
            showConfirmButton: false,
            timer: 1500
        });

        form.submit();

        setTimeout(() => {
            window.location.href = `/inspeksi/boxhydrant/${idBox}/hasil`;
        }, 1600);
    });
</script>

</body>
</html>
