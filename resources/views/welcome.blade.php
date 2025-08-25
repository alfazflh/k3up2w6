@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peralatan Tanggap Darurat UP2WVI</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-primary { background-color: #196275; }
        .text-primary { color: #196275; }
        .hover\:bg-primary-dark:hover { background-color: #134e5a; }
    </style>
</head>
<body id="main-body" class="bg-gray-100 font-sans">

    <header id="main-header" class="fixed top-0 left-0 right-0 z-50 bg-primary border-b shadow px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="w-1/4 flex justify-start">
                <a href="{{ url()->current() }}">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" alt="Logo PLN" class="h-20">
                </a>
                
            </div>
    
            <div class="w-2/4 text-center">
                <h1 class="text-lg sm:text-2xl md:text-3xl font-bold text-white leading-tight">
                    DASHBOARD PERALATAN TANGGAP DARURAT</h1>
                <h2 class="text-base lg:text-lg text-white font-semibold mt-1">
                    PLN PUSHARLIS UP2WVI</h2>
            </div>

            <div class="w-1/4 flex justify-end">
                <img src="https://cdn-b.heylink.me/media/users/og_image/56edc2ef0edd4e75b3784913f6dac9e8.webp" alt="Logo HSSE" class="h-20">
            </div>
        </div>
    </header>
    
    

    <!-- Main Section -->
    <main class="p-6">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-10 text-center">
            @php
                $alat = [
                    ['label' => 'APAR', 'route' => 'apar.index', 'icon' => 'https://seduhteh.wordpress.com/wp-content/uploads/2015/08/apar.png'],
                    ['label' => 'APAT', 'route' => 'apat.index', 'icon' => 'https://ik.imagekit.io/pln/sekop.png'],
                    ['label' => 'Fire Alarm', 'route' => 'fire_alarm.index', 'icon' => 'https://phabcart.imgix.net/cdn/scdn/images/uploads/firealarm_square_web_600.png?auto=compress&lossless=1&w=500'],
                    ['label' => 'Box Hydrant', 'route' => 'boxhydrant.index', 'icon' => 'https://png.pngtree.com/png-vector/20250523/ourmid/pngtree-fire-hydrant-sign-red-vector-png-image_16363373.png'],
                    ['label' => 'Rumah Pompa', 'route' => 'rumah_pompa.index', 'icon' => 'https://png.pngtree.com/png-vector/20250523/ourmid/pngtree-fire-hydrant-sign-red-vector-png-image_16363373.png'],
                    ['label' => 'Kotak P3K', 'route' => 'p3k.index', 'icon' => 'https://ik.imagekit.io/pln/pngwing.com.png'],
                ];
            @endphp

            @foreach ($alat as $item)
                <a href="{{ route($item['route']) }}" class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center hover:bg-gray-100 transition">
                    <img src="{{ $item['icon'] }}" alt="{{ $item['label'] }}" class="w-20 h-20 object-contain mb-2">
                    <span class="text-md font-semibold text-gray-800">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 sm:p-6 text-center">
            <img src="{{ asset('images/denah.jpg') }}" alt="Denah Lokasi" id="denah-img"
                 class="mx-auto rounded cursor-zoom-in shadow-lg max-w-full h-auto">
        </div>

        <div id="popup-denah" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden">
            <div class="relative overflow-hidden max-w-full max-h-full">
                <button onclick="closePopup()" class="absolute top-2 right-2 text-white text-3xl font-bold z-10 hover:text-red-500">&times;</button>

                <div id="image-wrapper" class="cursor-grab active:cursor-grabbing select-none" style="width: 100vw; height: 90vh; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('images/denah.jpg') }}" alt="Popup Denah" id="popup-img"
                         class="rounded shadow-lg transform transition-transform duration-200 object-contain" />
                </div>
            </div>
        </div>
<br>
<div class="text-center mt-5 space-x-4">
    <a href="{{ route('login') }}" class="bg-primary text-white text-lg px-6 py-3 rounded hover:bg-primary-dark">Login</a>
    <a href="{{ route('register') }}" class="hidden bg-green-600 text-white text-lg px-6 py-3 rounded hover:bg-green-700">Register</a>
</div>

    </main>

    <footer class="text-center text-sm text-gray-500 py-6">
        &copy; {{ date('Y') }} K3 PLN Pusharlis UP2WVI. All rights reserved.
    </footer>

    <script>
    const denahImg = document.getElementById('denah-img');
    const popup = document.getElementById('popup-denah');
    const popupImg = document.getElementById('popup-img');
    const wrapper = document.getElementById('image-wrapper');
    let scale = 1, isDragging = false, startX, startY, translateX = 0, translateY = 0;

    denahImg.addEventListener('click', () => {
        popup.classList.remove('hidden');
        scale = 1;
        translateX = 0;
        translateY = 0;
        updateTransform();
    });

    function closePopup() {
        popup.classList.add('hidden');
    }

    wrapper.addEventListener('wheel', (e) => {
        e.preventDefault();
        const delta = e.deltaY > 0 ? -0.1 : 0.1;
        scale = Math.min(Math.max(0.5, scale + delta), 3);
        updateTransform();
    });

    wrapper.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.clientX - translateX;
        startY = e.clientY - translateY;
    });

    wrapper.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        translateX = e.clientX - startX;
        translateY = e.clientY - startY;
        updateTransform();
    });

    wrapper.addEventListener('mouseup', () => isDragging = false);
    wrapper.addEventListener('mouseleave', () => isDragging = false);

    function updateTransform() {
        popupImg.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
    }

    popup.addEventListener('click', (e) => {
        if (e.target === popup) closePopup();
    });

    function setBodyPadding() {
        const header = document.getElementById('main-header');
        const body = document.getElementById('main-body');
        const headerHeight = header.offsetHeight;
        body.style.paddingTop = `${headerHeight}px`;
    }

    window.addEventListener('load', setBodyPadding);
    window.addEventListener('resize', setBodyPadding);
    </script>
</body>
</html>

