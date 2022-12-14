@extends('home')

@section('page-title', 'Rencana - Pendidikan')
@section('breadcrumb-title', 'Pelaksanaan Pendidikan')
@if (explode("-", Auth::user()->periode)[1] == "1")
    @section('periode', '- Semester Ganjil '.str_replace('&', '/', explode("-", Auth::user()->periode)[0]))
@else
    @section('periode', '- Semester Genap '.str_replace('&', '/', explode("-", Auth::user()->periode)[0]))
@endif 

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

    function tambahKolom(bagian) {
        const hideId = document.getElementById(bagian).classList
    
        if (hideId.contains('hidden')) {
            hideId.remove('hidden')
        } 
    }
</script>

@include('components.edit_data', ['url' => '/rencana-kerja/'.Auth::user()->periode.'/pendidikan/show-edit-data', 'pelaksanaan' => 'pendidikan'])
@include('components.edit_data_PendA', ['url' => '/rencana-kerja/'.Auth::user()->periode.'/pendidikan/show-edit-data', 'pelaksanaan' => 'pendidikan'])
@include('components.delete_confirm', ['url' => "pendidikan/hapus-data/"])
@include('components.nav_rencana_kerja')

<div>
    @include('components.tambah_data', array('data' => array(
        'A. Melaksanakan perkuliahan (tutorial tatap muka, dan/atau daring) dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan bengkel/studio/kebun (tatap muka dan/atau daring) pada institusi pendidikan sesuai penugasan',
        'B. Membimbing Seminar',
        'C. Membimbing Kuliah Kerja Nyata, Praktek Kerja Nyata, Praktek Kerja Lapangan',
        'D. Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi yang sesuai dengan bidang tugasnya',
        'E. Bertugas sebagai penguji pada ujian akhir/profesi',
        'F. Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik, membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan',
        'G. Melakukan kegiatan pengembangan program kuliah tatap muka/daring (RPS, perangkat pembelajaran)',
        'H. Mengembangkan bahan kuliah',
        'I. Menyampaikan orasi ilmiah',
        'J. Menduduki jabatan pimpinan perguruan tinggi',
        'K. Membimbing dosen yang lebih rendah jabatannya',
        'L. Melaksanakan kegiatan Detasering dan Pencangkokan di luar institusi',
        'M. Melaksanakan kegiatan pendampingan mahasiswa di luar institusi sesuai kebijakan Kementerian',
        'N. Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi/memperoleh sertifikasi profesi'
    )), ['jns_table' => 'pendidikan'])
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">A. Melaksanakan perkuliahan (tutorial tatap muka, dan/atau daring) dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan bengkel/studio/kebun (tatap muka dan/atau daring) pada institusi pendidikan sesuai penugasan</p>
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
                        <th class="p-2 border-r-2">Rencana Pertemuan</th>
                        <th class="p-2 border-r-2 ">SKS MK Terhitung</th>
                        <th class="p-2 border-r-2">SKS BKD</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonA"></th>
                    </tr>
                </thead>
                <tbody>
                    <span hidden>{{ $byk = 0 }}</span>
                    <span hidden>{{ $totalSKSMKTerhitung = 0 }}</span>
                    <span hidden>{{ $totalSKSBKD = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "A")
                            <tr>
                                <span hidden>{{ $totalSKSMKTerhitung += $data->sks_mk_terhitung + 0 }}</span>
                                <span hidden>{{ $totalSKSBKD += $data->sks_bkd + 0 }}</span>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->rencana_pertemuan }} Pertemuan</td>
                                <td class="p-2">{{ $data->sks_mk_terhitung + 0 }} SKS</td>
                                <td class="p-2">{{ $data->sks_bkd + 0 }} SKS</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit-A" data-id="{{ $data->id }}" data-nama-tabel="A. Melaksanakan perkuliahan (tutorial tatap muka, dan/atau daring) dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan bengkel/studio/kebun (tatap muka dan/atau daring) pada institusi pendidikan sesuai penugasan"  onclick="editA(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <tr class="bg-blue-300 font-bold">
                            <td class="p-2 text-center" colspan="3">Total SKS</td>
                            <td class="p-2">{{ $totalSKSMKTerhitung }}</td>
                            <td class="p-2">{{ $totalSKSBKD }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <script>
                            tambahKolom("bagianButtonA");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between" id="header">
            <p class="font-semibold judul">B. Membimbing Seminar</p>
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
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonB"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "B")
                            <tr id="data-row">
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2" id="nama-kegiatan">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2 status">{{ $data->status }}</td>
                                <td class="p-2 jumlahKegiatan">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2 beban-tugas">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="B. Membimbing Seminar" onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonB");
                        </script>
                    @endif     
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">C. Membimbing Kuliah Kerja Nyata, Praktek Kerja Nyata, Praktek Kerja Lapangan</p>
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
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonC"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "C")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="C. Membimbing Kuliah Kerja Nyata, Praktek Kerja Nyata, Praktek Kerja Lapangan"  onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonC");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">D. Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi yang sesuai dengan bidang tugasnya</p>
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
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonD"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "D")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="D. Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi yang sesuai dengan bidang tugasnya"  onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonD");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">E. Bertugas sebagai penguji pada ujian akhir/profesi</p>
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
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonE"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "E")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="E. Bertugas sebagai penguji pada ujian akhir/profesi"  onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonE");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">F. Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik, membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan</p>
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
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonF"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "F")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="F. Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik, membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan"  onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonF");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">G. Melakukan kegiatan pengembangan program kuliah tatap muka/daring (RPS, perangkat pembelajaran)</p>
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
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonG"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "G")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0}}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="G. Melakukan kegiatan pengembangan program kuliah tatap muka/daring (RPS, perangkat pembelajaran)"  onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonG");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">H. Mengembangkan bahan kuliah</p>
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
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonH"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "H")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="H. Mengembangkan bahan kuliah"  onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonH");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">I. Menyampaikan orasi ilmiah</p>
            <button onclick='hide("bagianI")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianI">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonI"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "I")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="I. Menyampaikan orasi ilmiah" onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonI");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">J. Menduduki jabatan pimpinan perguruan tinggi</p>
            <button onclick='hide("bagianJ")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianJ">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonJ"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "J")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="J. Menduduki jabatan pimpinan perguruan tinggi" onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonJ");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">K. Membimbing dosen yang lebih rendah jabatannya</p>
            <button onclick='hide("bagianK")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianK">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonK"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "K")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="K. Membimbing dosen yang lebih rendah jabatannya" onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonK");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">L. Melaksanakan kegiatan Detasering dan Pencangkokan di luar institusi</p>
            <button onclick='hide("bagianL")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianL">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonL"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "L")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="L. Melaksanakan kegiatan Detasering dan Pencangkokan di luar institusi" onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonL");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">M. Melaksanakan kegiatan pendampingan mahasiswa di luar institusi sesuai kebijakan Kementerian</p>
            <button onclick='hide("bagianM")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianM">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonM"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "M")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="M. Melaksanakan kegiatan pendampingan mahasiswa di luar institusi sesuai kebijakan Kementerian" onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonM");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">N. Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi/memperoleh sertifikasi profesi</p>
            <button onclick='hide("bagianN")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianN">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonN"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "N")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2 flex gap-1">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="N. Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi/memperoleh sertifikasi profesi" onclick="edit(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="javascript:void(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 focus:bg-red-600 focus:text-white outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonN");
                        </script>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection