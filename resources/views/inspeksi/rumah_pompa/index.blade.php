<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Peralatan Tanggap Darurat UP2WVI - RUMAH POMPA</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <style>
        .bg-primary { background-color: #196275; }
        .text-primary { color: #196275; }
        .hover\:bg-primary-dark:hover { background-color: #134e5a; }
    </style>
</head>
<body class="bg-white text-gray-800" id="main-body">

    <header id="main-header" class="bg-primary text-white px-4 py-4 fixed top-0 left-0 right-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between md:hidden">
            <a href="{{ url()->current() }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" alt="Logo PLN" class="h-16 w-auto">
            </a>
            <div class="flex-1 text-center">
                <h1 class="text-lg font-bold leading-tight">MONITORING RUMAH POMPA HYDRANT</h1>
                <h2 class="text-sm font-semibold mt-1">PLN PUSHARLIS UP2WVI</h2>
            </div>
        </div>

        <div class="max-w-7xl mx-auto hidden md:flex relative items-center justify-between">
            <a href="{{ url()->current() }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" alt="Logo PLN" class="h-20 w-auto">
            </a>
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center pointer-events-none">
                <h1 class="text-2xl lg:text-3xl font-bold leading-tight">MONITORING RUMAH POMPA HYDRANT</h1>
                <h2 class="text-base lg:text-lg font-semibold mt-1">PLN PUSHARLIS UP2WVI</h2>
            </div>
        </div>
    </header>

    <div id="spacer" class="pt-32"></div>

    <div class="fixed max-w-6xl mx-auto px-4 mt-6">
        <a href="{{ route('welcome') }}"
           class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition duration-300">
            ←
        </a>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @php
            $sorted = $rumahpompas->unique('id_rumah')->sortBy('id_rumah', SORT_NATURAL);
            @endphp

            @foreach($sorted as $rumahpompa)
                <a href="{{ route('rumah_pompa.hasil', $rumahpompa->id_rumah) }}"
                   class="block bg-primary hover:bg-primary-dark text-white text-center font-semibold py-6 rounded-xl shadow transition duration-300">
                    RUMAH POMPA {{ $rumahpompa->id_rumah }}
                </a>
            @endforeach
        </div>
    </div>

    <button onclick="openModal()"
        class="fixed bottom-4 right-4 bg-gray-200 hover:bg-gray-300 text-primary rounded-full 
               p-2 text-sm shadow-lg z-50 
               sm:p-3 sm:text-lg">
        + RUMAH POMPA Baru
    </button>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
            <h2 class="text-xl font-bold mb-4">Tambah RUMAH POMPA Baru</h2>
            <form action="{{ route('rumah_pompa.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block font-semibold">ID Rumah Pompa</label>
                    <input type="text" name="id_rumah" required class="w-full px-3 py-2 border rounded">
                </div>
                @php
                $defaultCatatan = $rumahpompas->first()->catatan ?? '';
            @endphp
            
            <input type="hidden" name="catatan" value="{{ $defaultCatatan }}">
            

                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark">Simpan</button>
                </div>
            </form>
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">&times;</button>
        </div>
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

        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>

</body>
</html>
