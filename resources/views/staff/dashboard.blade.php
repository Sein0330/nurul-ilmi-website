@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm text-center space-y-4">
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#b08d6a]/15 text-[#9c7a59]">
            Staff Portal
        </span>
        <h2 class="text-2xl font-bold text-gray-900">Dashboard Staff Nurul Ilmi</h2>
        <p class="text-sm text-gray-500 max-w-md mx-auto">
            Halaman ini adalah area kerja staff untuk pendampingan siswa dan operasional kelas bimbingan belajar.
        </p>
        <div class="pt-4">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-2.5 rounded-full text-sm font-semibold text-white bg-[#b08d6a] hover:bg-[#9c7a59] transition-all">
                Kembali ke Beranda Siswa
            </a>
        </div>
    </div>
</div>
@endsection

