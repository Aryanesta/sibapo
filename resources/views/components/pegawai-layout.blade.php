<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    {{-- <link rel="stylesheet" href="../src/output.css"> --}}
    @vite('/resources/css/app.css')

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- SweetAlert2 --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- ApexChart --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


</head>
<body class="bg-green-100 h-screen">
      <!-- Loading overlay -->
      <div id="loading" class="fixed w-full h-full bg-black bg-opacity-50 z-50" style="display: none;">
        <div class="w-full h-full flex items-center justify-center flex-col">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-yellow-400 border-solid mx-auto"></div>
            <p class="mt-4 text-gray-700 text-center">Loading, please wait...</p>
        </div>
    </div>

    
    <div class="h-full w-full">
        <!-- Sidebar -->
        <x-pegawai-sidebar class="col-span-2 w-64 bg-green-900 text-white p-4 h-screen z-10 fixed"></x-pegawai-sidebar>

        <div class="w-full pl-64 mb-10">
            <!-- Header -->
            @php
                $judul = match(true) {
                    request()->is('pegawai/disperindag*') => 'Dinas Perindustrian dan Perdagangan',
                    request()->is('pegawai/dkpp*') => 'Dinas Ketahanan Pangan dan Peternakan',
                    request()->is('pegawai/dtphp*') => 'Dinas Tanaman Pangan Hortikultura dan Perkebunan',
                    request()->is('pegawai/perikanan*') => 'Dinas Perikanan',
                    default => 'Dinas Tidak Dikenal'
                };
            @endphp

            <x-pegawai-header>{{ $judul }}</x-pegawai-header>


            <!-- Content -->
            <main class="w-full">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
    function showLoading() {
        document.getElementById("loading").style.display = "flex";
    }

    function hideLoading() {
        document.getElementById("loading").style.display = "none";
    }

    $(document)
        .ajaxStart(function () {
            $("#loading").show();
        })
        .ajaxStop(function () {
            $("#loading").hide();
        });
    </script>
    
</body>
</html>
