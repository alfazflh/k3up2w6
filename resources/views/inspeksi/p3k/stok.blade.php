<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok P3K - {{ $id_p3k }}</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" type="image/png" />
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <style>
        .bg-primary { background-color: #1f7389; }
        .text-primary { color: #196275; }
        .hover\:bg-primary-dark:hover { background-color: #134e5a; }
    </style>

</head>
<body id="main-body" class="bg-white text-gray-800">

    <header id="main-header" class="fixed top-0 left-0 right-0 z-50 bg-primary border-b shadow px-4 py-3">
        <div class="relative flex items-center justify-between">

        <div class="flex items-center gap-4">
            <a href="{{ route('welcome') }}" class="relative z-10">
            <img src="https://www.danantaraindonesia.com/images/v3/danantara-logo-black-v3.png" 
                alt="Logo Danantara" 
                class="h-14 w-32 md:h-14 md:w-38 object-contain" />
            </a>

            <div class="flex md:hidden gap-3">
            <a href="{{ route('welcome') }}" class="relative z-10">
                    <img src="https://cdn-b.heylink.me/media/users/og_image/56edc2ef0edd4e75b3784913f6dac9e8.webp" 
                        alt="Logo HSSE" 
                        class="h-12 w-12 object-contain" />
                </a>
            <a href="{{ route('welcome') }}" class="relative z-10">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" 
                    alt="Logo PLN" 
                    class="h-12 w-12 object-contain" />
            </a>
            </div>
        </div>

        <div class="flex flex-col text-center md:hidden">
            <h1 class="font-bold text-white leading-tight text-sm sm:text-lg">
            MONITORING P3K
            </h1>
            <h2 class="text-xs sm:text-sm text-white font-semibold">
            PLN PUSHARLIS UP2W VI
            </h2>
        </div>

        <div class="absolute inset-x-0 text-center hidden md:block">
            <h1 class="font-bold text-white leading-tight"
                style="font-size: clamp(1rem, 2vw + 0.5rem, 2rem);">
                MONITORING P3K
            </h1>
            <h2 class="text-sm sm:text-base md:text-xl text-white font-semibold mt-1">
            PLN PUSHARLIS UP2W VI
            </h2>
        </div>

        <div class="hidden md:flex items-center gap-5">
            <a href="{{ route('welcome') }}" class="relative z-10">
                <img src="https://cdn-b.heylink.me/media/users/og_image/56edc2ef0edd4e75b3784913f6dac9e8.webp" 
                    alt="Logo HSSE" 
                    class="h-16 w-16 md:h-18 md:w-18 object-contain" />
                </a>
            <a href="{{ route('welcome') }}" class="relative z-10">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" 
                alt="Logo PLN" 
                class="h-16 w-16 md:h-18 md:w-18 object-contain" />
            </a>
        </div>
        </div>
    </header>
    
    <div id="spacer" class="pt-32"></div>
    
    <div class="fixed max-w-6xl mx-auto px-4 mt-6">
        <a href="{{ route('p3k.show', ['id_p3k' => $id_p3k]) }}"
           class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition">
            ←
        </a>
    </div>

        <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-4">
            <h2 class="text-lg font-bold text-[#196275] mb-4">Monitoring Stok P3K</h2>

            <div class="flex flex-wrap gap-4 mb-4 text-xs">
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-green-100 border border-green-400"></div>
                <span>Stok Aman (&gt; 70%)</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-yellow-100 border border-yellow-400"></div>
                <span>Stok Rendah (30–70%)</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-red-100 border border-red-400"></div>
                <span>Stok Kritis (&lt; 30%)</span>
            </div>
            </div>

            <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-[11px] text-center">
                <thead class="bg-[#1f7389] text-white font-semibold sticky top-0">
                <tr>
                    <th rowspan="2" class="px-2 py-2 border border-gray-300 w-[40px]">No</th>
                    <th rowspan="2" class="px-3 py-2 border border-gray-300 min-w-[180px] text-left">Nama Barang</th>
                    <th rowspan="2" class="px-2 py-2 border border-gray-300 w-[80px]">Standar<br>Jumlah</th>
                    <th rowspan="2" class="px-2 py-2 border border-gray-300 w-[60px]">Satuan</th>
                    <th colspan="12" class="bg-green-700 border border-gray-300">Pemakaian Per Bulan</th>
                    <th rowspan="2" class="px-2 py-2 border border-gray-300 bg-blue-500 w-[80px]">Stok<br>Akhir</th>
                    <th rowspan="2" class="px-2 py-2 border border-gray-300 bg-yellow-400 w-[80px]">Minimal<br>Stok</th>
                    <th rowspan="2" class="px-2 py-2 border border-gray-300 bg-yellow-500 w-[100px]">Yang Harus<br>Diadakan</th>
                </tr>
                <tr>
                    @foreach(['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'] as $bulan)
                    <th class="px-2 py-1 bg-green-700 border border-gray-300 w-[50px]">{{ $bulan }}</th>
                    @endforeach
                </tr>
                </thead>

                <tbody>
                @foreach($stokData as $index => $item)
                    @php
                    $persenStok = ($item['stok_akhir'] / $item['standar']) * 100;
                    $yangHarusDiadakan = max(0, $item['standar'] - $item['stok_akhir']);
                    
                    if ($item['stok_akhir'] <= 0) {
                        $stokClass = 'bg-red-100';
                    } elseif ($persenStok < 30) {
                        $stokClass = 'bg-red-100';
                    } elseif ($persenStok < 70) {
                        $stokClass = 'bg-yellow-100';
                    } else {
                        $stokClass = 'bg-green-100';
                    }
                    @endphp
                    <tr class="border border-gray-300 hover:bg-gray-50">
                    <td class="px-2 py-1">{{ $index + 1 }}</td>
                    <td class="px-2 py-1 text-left font-medium">{{ $item['nama'] }}</td>
                    <td class="px-2 py-1">{{ $item['standar'] }}</td>
                    <td class="px-2 py-1">{{ $item['satuan'] }}</td>

                    @for($bulan = 1; $bulan <= 12; $bulan++)
                        <td class="px-2 py-1">
                        {{ $item['pemakaian_per_bulan'][$bulan] > 0 ? $item['pemakaian_per_bulan'][$bulan] : '' }}
                        </td>
                    @endfor

                    <td class="px-2 py-1 font-semibold {{ $stokClass }}">
                        {{ $item['stok_akhir'] }}
                    </td>
                    <td class="px-2 py-1">{{ $item['minimal_stok'] }}</td>
                    <td class="px-2 py-1 font-semibold {{ $yangHarusDiadakan > 0 ? 'bg-red-100' : '' }}">
                        {{ $yangHarusDiadakan > 0 ? $yangHarusDiadakan : '' }}
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>


</body>
</html>