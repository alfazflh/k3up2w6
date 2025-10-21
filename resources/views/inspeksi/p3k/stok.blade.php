<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok P3K - {{ $id_p3k }}</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" type="image/png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-primary { background-color: #1f7389; }
        .text-primary { color: #196275; }
        
        .stok-table {
            font-size: 11px;
            border-collapse: collapse;
        }
        
        .stok-table th,
        .stok-table td {
            border: 1px solid #d1d5db;
            padding: 6px 8px;
            text-align: center;
        }
        
        .stok-table th {
            background-color: #1f7389;
            color: white;
            font-weight: 600;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .stok-table .item-name {
            text-align: left;
            font-weight: 500;
        }
        
        .stok-rendah {
            background-color: #fef3c7 !important;
        }
        
        .stok-habis {
            background-color: #fee2e2 !important;
        }
        
        .stok-aman {
            background-color: #d1fae5 !important;
        }
        
        .rotate-text {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            white-space: nowrap;
        }

        .container-wrapper {
            max-width: 1800px;
            margin: 0 auto;
        }
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

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 mt-6">
    <div class="container-wrapper mb-12">
        <div class="bg-white rounded-lg shadow-lg p-4 overflow-x-auto">
            <h2 class="text-lg font-bold text-primary mb-4">Monitoring Stok P3K</h2>
            
            <!-- Legend -->
            <div class="flex gap-4 mb-4 text-xs">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 stok-aman border"></div>
                    <span>Stok Aman (> 70%)</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 stok-rendah border"></div>
                    <span>Stok Rendah (30-70%)</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 stok-habis border"></div>
                    <span>Stok Kritis (< 30%)</span>
                </div>
            </div>

            <table class="stok-table w-full">
                <thead>
                    <tr>
                        <th rowspan="2" style="width: 40px;">No</th>
                        <th rowspan="2" style="min-width: 200px;">Nama Barang</th>
                        <th rowspan="2" style="width: 80px;">Standar<br>Jumlah</th>
                        <th rowspan="2" style="width: 60px;">Satuan</th>
                        <th colspan="12" style="background-color: #059669;">Pemakaian Per Bulan</th>
                        <th rowspan="2" style="width: 80px; background-color: #3b82f6;">Stok<br>Akhir</th>
                        <th rowspan="2" style="width: 80px; background-color: #fbbf24;">Minimal<br>Stok</th>
                        <th rowspan="2" style="width: 100px; background-color: #eab308;">Yang Harus<br>Diadakan</th>
                    </tr>
                    <tr>
                        <th style="width: 50px; background-color: #059669;">Jan</th>
                        <th style="width: 50px; background-color: #059669;">Feb</th>
                        <th style="width: 50px; background-color: #059669;">Mar</th>
                        <th style="width: 50px; background-color: #059669;">Apr</th>
                        <th style="width: 50px; background-color: #059669;">Mei</th>
                        <th style="width: 50px; background-color: #059669;">Jun</th>
                        <th style="width: 50px; background-color: #059669;">Jul</th>
                        <th style="width: 50px; background-color: #059669;">Agu</th>
                        <th style="width: 50px; background-color: #059669;">Sep</th>
                        <th style="width: 50px; background-color: #059669;">Okt</th>
                        <th style="width: 50px; background-color: #059669;">Nov</th>
                        <th style="width: 50px; background-color: #059669;">Des</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stokData as $index => $item)
                    @php
                        $persenStok = ($item['stok_akhir'] / $item['standar']) * 100;
                        $yangHarusDiadakan = max(0, $item['standar'] - $item['stok_akhir']);
                        
                        // Tentukan class berdasarkan persentase stok
                        if ($item['stok_akhir'] <= 0) {
                            $stokClass = 'stok-habis';
                        } elseif ($persenStok < 30) {
                            $stokClass = 'stok-habis';
                        } elseif ($persenStok < 70) {
                            $stokClass = 'stok-rendah';
                        } else {
                            $stokClass = 'stok-aman';
                        }
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="item-name">{{ $item['nama'] }}</td>
                        <td>{{ $item['standar'] }}</td>
                        <td>{{ $item['satuan'] }}</td>
                        
                        <!-- Pemakaian per bulan -->
                        @for($bulan = 1; $bulan <= 12; $bulan++)
                            <td>{{ $item['pemakaian_per_bulan'][$bulan] > 0 ? $item['pemakaian_per_bulan'][$bulan] : '' }}</td>
                        @endfor
                        
                        <!-- Stok Akhir -->
                        <td class="{{ $stokClass }}" style="font-weight: 600;">
                            {{ $item['stok_akhir'] }}
                        </td>
                        
                        <!-- Minimal Stok -->
                        <td>{{ $item['minimal_stok'] }}</td>
                        
                        <!-- Yang Harus Diadakan -->
                        <td class="{{ $yangHarusDiadakan > 0 ? 'stok-habis' : '' }}" style="font-weight: 600;">
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