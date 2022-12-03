@extends('home')

@section('page-title', 'Rencana - Penelitian')
@section('breadcrumb-title', 'Pelaksanaan Penelitian')

@section('konten')
<script>
    function hide(bagian) {
        const idTable = document.getElementById(bagian).classList
        
        if (idTable.contains('d-block')) {
            idTable.replace('d-block', 'd-none')
        } else {
            idTable.replace('d-none', 'd-block')
        }
    }
</script>
<div>
    @include('components.tambah_data', array('data' => array(
        'A. Menghasilkan karya ilmiah sesuai dengan bidangnya',
        'B. Hasil penelitian atau hasil pemikiran yang didesiminasikan',
        'C. Hasil penelitian atau pemikiran atau kerjasama industri termasuk penelitian penugasan dari Kementerian atau LPNK yang tidak dipublikasikan (tersimpan dalam perpustakaan) yang dilakukan secara melembaga',
        'D. Menerjemahkan/menyadur buku ilmiah yang diterbitkan dan diedarkan secara nasional (Ber-ISBN)',
        'E. Mengedit/menyunting karya ilmiah yang diterbitkan dan diedarkan secara nasional (Ber-ISBN)',
        'F. Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI',
        'G. Rumusan kebijakan yang monumental dalam bentuk arahan/kertas kebijakan (policy brief/policy paper), naskah akademik, model kebijakan strategis atau rekomendasi kebijakan yang berkontribusi terhadap pengembangan kebijakan dan pembangunan',
        'H. Membuat rancangan dan karya teknologi yang tidak dipatenkan rancangan dan karya seni monumental yang tidak terdaftar di HaKI, tetapi telah dipresentasikan pada forum yang teragenda',
    )))
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">A. Menghasilkan karya ilmiah sesuai dengan bidangnya</p>
            <button type="button" onclick='hide("bagianA")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianA">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2 ">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">B. Hasil penelitian atau hasil pemikiran yang didesiminasikan</p>
            <button type="button" onclick='hide("bagianB")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianB">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">C. Hasil penelitian atau pemikiran atau kerjasama industri termasuk penelitian penugasan dari Kementerian atau LPNK yang tidak dipublikasikan (tersimpan dalam perpustakaan) yang dilakukan secara melembaga</p>
            <button type="button" onclick='hide("bagianC")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianC">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">D. Menerjemahkan/menyadur buku ilmiah yang diterbitkan dan diedarkan secara nasional (Ber-ISBN)</p>
            <button onclick='hide("bagianD")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianD">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">E. Mengedit/menyunting karya ilmiah yang diterbitkan dan diedarkan secara nasional (Ber-ISBN)</p>
            <button onclick='hide("bagianE")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianE">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">F. Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI</p>
            <button onclick='hide("bagianF")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianF">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">G. Rumusan kebijakan yang monumental dalam bentuk arahan/kertas kebijakan (policy brief/policy paper), naskah akademik, model kebijakan strategis atau rekomendasi kebijakan yang berkontribusi terhadap pengembangan kebijakan dan pembangunan</p>
            <button onclick='hide("bagianG")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianG">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">H. Membuat rancangan dan karya teknologi yang tidak dipatenkan rancangan dan karya seni monumental yang tidak terdaftar di HaKI, tetapi telah dipresentasikan pada forum yang teragenda</p>
            <button onclick='hide("bagianH")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianH">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection