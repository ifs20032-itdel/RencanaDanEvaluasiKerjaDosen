<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="bg-theme-4 flex opacity-100">
    <div class="sidenav w-2/12 text-white  border-r bg-gradient-to-b from-bluedesign to-skydesign h-screen sticky top-0">
        <div class="logo p-3 text-center">
            <p class="text-2xl font-bold">Institut Teknologi Del</p>
            @include('components.sidenav')
        </div>
    </div>
    <div class=" justify-end grow shadow w-8/12">
        <header class="justify-between flex flex-grow border-b bg-white p-3 ">
            <div class="text-black ">
                <p class="m-0 text-3xl font-bold">Rencana Kerja Dosen</p>
            </div>
            <div class="flex">
                <div class="items-center flex gap-3">
                    {{ Auth::user()->nama }}
                    @include('components.notifications')
                </div>
                <i class="bi bi-person-circle p-2 text-white"></i>
            </div>
        </header>
        <main class=" p-3">
            <div>
                <p class="text-black mb-1">Beranda / @yield('breadcrumb-title')</p>
                <div class="flex">
                    @include('components.iconHall')
                    <h4 class="text-black mt-auto mr-auto mb-auto">Rencana Beban Kerja Dosen - Semester Genap 2022/2023</h4>
                </div>
                <hr class="mt-0 text-white">
                <nav class="flex p-0 w-fit rounded-lg">
                    <a href="/biodata" class="bg-whitety p-3 hover:bg-bluedesign hover:text-white rounded-l-lg font-bold">Biodata</a>
                    <a href="/rencana-kerja/pendidikan" class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold">Pelaksanaan Pendidikan</a>
                    <a href="/rencana-kerja/penelitian" class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold">Pelaksanaan Penelitian</a>
                    <a href="/rencana-kerja/pengabdian" class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold">Pelaksanaan Pengabdian</a>
                    <a href="/rencana-kerja/penunjang" class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold">Pelaksanaan Penunjang</a>
                    <a href="/simpulan" class="bg-whitety p-3 hover:bg-bluedesign hover:text-white rounded-r-lg font-bold">Simpulan</a>
                </nav>
                <div class="konten mt-4">
                    @yield('konten')
                </div>
            </div>
        </main>
    </div>
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>
</html>