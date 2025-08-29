<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Peralatan Tanggap Darurat UP2WVI - APAT</title>
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
<body class="bg-white text-gray-800">

    <header id="main-header" class="bg-primary text-white px-4 py-4 fixed top-0 left-0 right-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between md:hidden">
            <div class="flex items-center space-x-3">
                <a href="{{ url()->current() }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" alt="Logo PLN" class="h-16 w-auto"></a>
            </div>
            <div class="flex-1 text-center">
                <h1 class="text-lg font-bold leading-tight">
                    MONITORING ALAT PEMADAM API TRADISIONAL
                </h1>
                <h2 class="text-sm text-white font-semibold mt-1">
                    PLN PUSHARLIS UP2WVI
                </h2>
            </div>
        </div>

        <div class="max-w-7xl mx-auto hidden md:flex relative items-center justify-between">
            <div class="flex items-center space-x-3">
                <a href="{{ url()->current() }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" alt="Logo PLN" class="h-20 w-auto"></a>
            </div>
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center pointer-events-none">
                <h1 class="text-2xl lg:text-3xl font-bold leading-tight">
                    MONITORING ALAT PEMADAM API TRADISIONAL
                </h1>
                <h2 class="text-base lg:text-lg text-white font-semibold mt-1">
                    PLN PUSHARLIS UP2WVI
                </h2>
            </div>
        </div>
    </header>

<div id="spacer" class="pt-32"></div>

<div class="fixed max-w-6xl mx-auto px-4 mt-6">
    <a href="{{ route('apat.hasil', ['id_apat' => $apat->id_apat]) }}"
       class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition duration-300">
        ←
    </a>
</div>

<div class="px-5 sm:px-6 md:px-8 lg:px-10">
    <form id="form-inspeksi" action="{{ route('pemeriksaan-apat.store') }}" method="POST" 
          class="max-w-3xl mx-auto py-6 mt-8 mb-10 bg-gray-100 rounded-xl shadow-lg space-y-6 px-6 sm:px-8">
        @csrf

        <input type="hidden" name="id_apat" value="{{ $apat->id_apat }}">
        <input type="hidden" name="lokasi" value="{{ $apat->lokasi }}">
        <input type="hidden" name="catatan" value="{{ $apat->catatan }}">

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
            <h2 class="text-lg font-bold text-primary mb-1">Kondisi APAT</h2>
            <p class="text-sm text-gray-700">Isi sesuai dengan kondisi alat di lapangan</p>
        </div>

        <div class="space-y-4">
            @php
                $items = [
                    'kondisi_fisik' => 'Kondisi Fisik',
                    'drum' => 'Drum',
                    'aduk_pasir' => 'Aduk Pasir',
                    'sekop' => 'Sekop',
                    'fire_blanket' => 'Fire Blanket',
                    'ember' => 'Ember',
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
</script>

<script>
    document.getElementById('submit-btn').addEventListener('click', function (e) {
        const form = document.getElementById('form-inspeksi');
        const idApat = document.querySelector('input[name="id_apat"]').value;

        Swal.fire({
            icon: 'success',
            title: 'Pemeriksaan berhasil dikirim!',
            showConfirmButton: false,
            timer: 1500
        });

        form.submit();

        setTimeout(() => {
            window.location.href = `/inspeksi/apat/${id_apat}/hasil`;
        }, 1600);
    });
</script>

</body>
</html>
