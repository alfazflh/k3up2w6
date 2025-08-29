<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Peralatan Tanggap Darurat UP2WVI - FIRE ALARM</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <style>
        .bg-primary { background-color: #1f7389; }
        .text-primary { color: #196275; }
        .hover\:bg-primary-dark:hover { background-color: #134e5a; }
    </style>
</head>
<body id="main-body" class="bg-white text-gray-800">

    <header id="main-header" class="bg-primary text-white px-4 py-4 fixed top-0 left-0 right-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between md:hidden">
            <div class="flex items-center space-x-3">
                <a href="{{ url()->current() }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" alt="Logo PLN" class="h-16 w-auto"></a>
            </div>
            <div class="flex-1 text-center">
                <h1 class="text-lg font-bold leading-tight">
                    MONITORING FIRE ALARM
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
                    MONITORING FIRE ALARM
                </h1>
                <h2 class="text-base lg:text-lg text-white font-semibold mt-1">
                    PLN PUSHARLIS UP2WVI
                </h2>
            </div>
        </div>
    </header>

    <div id="spacer" class="pt-32"></div>

    <div class="fixed max-w-6xl mx-auto px-4 mt-6">
        <a href="{{ route('fire_alarm.index') }}"
           class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition duration-300">
            ←
        </a>
    </div>

    <div class="max-w-6xl mx-auto px-4 mt-12 grid grid-cols-1 sm:grid-cols-2 gap-8 text-center">
        <a href="{{ route('fire_alarm.inspeksi', ['id_firealarm' => $firealarm->id_firealarm]) }}"
           class="flex flex-col items-center justify-center bg-gray-100 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 p-6">
            <img src="https://ik.imagekit.io/pln/fireins.png"
                 alt="Inspeksi Fire Alarm" class="h-28 md:h-36 object-contain">
            <span class="mt-4 text-primary font-semibold text-base md:text-lg text-center">
                INSPEKSI FIRE ALARM
            </span>
        </a>

        <a href="{{ route('fire_alarm.hasil', ['id_firealarm' => $firealarm->id_firealarm]) }}"
           class="flex flex-col items-center justify-center bg-gray-100 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 p-6">
            <img src="https://ik.imagekit.io/pln/firehsl.png"
                 alt="Hasil Inspeksi" class="h-28 md:h-36 object-contain">
            <span class="mt-4 text-primary font-semibold text-base md:text-lg text-center">
                HASIL INSPEKSI FIRE ALARM
            </span>
        </a>
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

</body>
</html>
