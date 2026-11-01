@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header Page & Metrics -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Data Pendaftar Siswa Baru</h2>
            <p class="text-sm text-gray-500 mt-1">
                Kelola dan verifikasi permohonan bimbingan belajar siswa di Nurul Ilmi.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-white border border-gray-200 text-gray-700 shadow-xs">
                <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                Real-time Database
            </span>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-xs">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Pendaftar</div>
            <div class="mt-2 text-2xl font-extrabold text-gray-900">{{ $registrations->count() }}</div>
            <div class="mt-1 text-xs text-gray-500">Semua riwayat pengajuan</div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-xs">
            <div class="text-xs font-semibold text-amber-500 uppercase tracking-wider">Menunggu Verifikasi</div>
            <div class="mt-2 text-2xl font-extrabold text-amber-600">
                {{ $registrations->where('status', 'pending')->count() }}
            </div>
            <div class="mt-1 text-xs text-amber-600/80">Perlu tindak lanjut</div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-xs">
            <div class="text-xs font-semibold text-emerald-500 uppercase tracking-wider">Terverifikasi</div>
            <div class="mt-2 text-2xl font-extrabold text-emerald-600">
                {{ $registrations->where('status', 'verified')->count() }}
            </div>
            <div class="mt-1 text-xs text-emerald-600/80">Siswa resmi aktif</div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-xs">
            <div class="text-xs font-semibold text-rose-500 uppercase tracking-wider">Ditolak / Batal</div>
            <div class="mt-2 text-2xl font-extrabold text-rose-600">
                {{ $registrations->where('status', 'rejected')->count() }}
            </div>
            <div class="mt-1 text-xs text-rose-600/80">Tidak memenuhi syarat</div>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-xs overflow-hidden">
        <div class="p-5 sm:p-6 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h3 class="text-base font-bold text-gray-900">
                Daftar Permohonan Masuk
            </h3>
            <span class="text-xs text-gray-400">
                Menampilkan {{ $registrations->count() }} data pendaftar terbaru
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50/75 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <tr>
                        <th scope="col" class="py-4 px-6">Nama & Info Siswa</th>
                        <th scope="col" class="py-4 px-6">No. Telepon / WA</th>
                        <th scope="col" class="py-4 px-6">Program Belajar</th>
                        <th scope="col" class="py-4 px-6">Format Kelas</th>
                        <th scope="col" class="py-4 px-6">Pilihan Paket</th>
                        <th scope="col" class="py-4 px-6 text-center">Status</th>
                        <th scope="col" class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($registrations as $reg)
                        <tr class="hover:bg-gray-50/60 transition-colors duration-150">
                            <!-- Nama & Info -->
                            <td class="py-4 px-6">
                                <div class="font-bold text-gray-900">{{ $reg->nama_lengkap }}</div>
                                <div class="text-xs text-gray-500 mt-0.5">
                                    {{ $reg->jenis_kelamin }} &bull; {{ $reg->pendidikan_saat_ini }}
                                </div>
                                <div class="text-xs text-gray-400 mt-0.5 max-w-xs truncate" title="{{ $reg->alamat_lengkap }}">
                                    {{ $reg->alamat_lengkap }}
                                </div>
                            </td>

                            <!-- No Telp -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <a href="https://wa.me/62{{ ltrim($reg->no_telp, '0') }}"
                                   target="_blank"
                                   class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600 hover:text-emerald-700 bg-emerald-50 hover:bg-emerald-100/70 px-2.5 py-1.5 rounded-lg transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.346.491 1.2.534 1.288.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.353.101.173.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.072.376-.043.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/>
                                    </svg>
                                    <span>{{ $reg->no_telp }}</span>
                                </a>
                            </td>

                            <!-- Program -->
                            <td class="py-4 px-6">
                                <span class="font-medium text-gray-800">{{ $reg->program_pembelajaran }}</span>
                            </td>

                            <!-- Kelas -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700">
                                    {{ $reg->pilihan_kelas }}
                                </span>
                            </td>

                            <!-- Paket -->
                            <td class="py-4 px-6">
                                <span class="text-xs font-semibold text-[#9c7a59] bg-[#b08d6a]/10 px-2.5 py-1 rounded-full">
                                    {{ $reg->pilihan_paket }}
                                </span>
                            </td>

                            <!-- Status -->
                            <td class="py-4 px-6 text-center whitespace-nowrap">
                                @if($reg->status === 'verified')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                                        Terverifikasi
                                    </span>
                                @elseif($reg->status === 'rejected')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-800">
                                        Ditolak
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">
                                        Pending
                                    </span>
                                @endif
                            </td>

                            <!-- Aksi -->
                            <td class="py-4 px-6 text-center whitespace-nowrap">
                                <div class="inline-flex items-center gap-2">
                                    <button type="button"
                                            title="Verifikasi pendaftaran"
                                            class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg shadow-2xs transition-all duration-150">
                                        Verifikasi
                                    </button>
                                    <button type="button"
                                            title="Tolak pendaftaran"
                                            class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-white bg-rose-600 hover:bg-rose-700 rounded-lg shadow-2xs transition-all duration-150">
                                        Tolak
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 px-6 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-sm font-semibold text-gray-600">Belum ada data pendaftar</p>
                                    <p class="text-xs text-gray-400 mt-1">Siswa yang mendaftar melalui form di portal akan muncul otomatis di sini.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

