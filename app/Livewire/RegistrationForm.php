<?php

namespace App\Livewire;

use App\Models\Registration;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class RegistrationForm extends Component
{
    public string $nama_lengkap = '';
    public string $jenis_kelamin = '';
    public string $pendidikan_saat_ini = '';
    public string $alamat_lengkap = '';
    public string $no_telp = '';
    public string $program_pembelajaran = '';
    public string $pilihan_kelas = '';
    public string $pilihan_paket = '';
    public ?string $pengalaman_sebelumnya = '';
    public ?string $kemampuan_saat_ini = '';
    public ?string $catatan_khusus = '';

    public function getProgramsProperty(): array
    {
        return [
            'Belajar Iqra’ & Al-Qur’an/Tahsin',
            'Tahfidz Al-Qur’an & Doa Harian',
            'Pendidikan Agama Islam (PAI)',
            'Ilmu Pengetahuan Umum (Calistung & Pendampingan Sekolah)',
            'Pembinaan Akhlak dan Adab Islami',
            'Bahasa Arab',
            'Bahasa Inggris',
        ];
    }

    public function getClassFormatsProperty(): array
    {
        return [
            'Online Class',
            'Hybrid Class',
            'Offline Class',
        ];
    }

    public function getPackagesProperty(): array
    {
        return [
            '4x Pertemuan - Rp240.000',
            '8x Pertemuan - Rp450.000',
            '12x Pertemuan - Rp650.000',
            'Paket Bulanan Penuh (16x Pertemuan) - Rp850.000',
        ];
    }

    protected function rules(): array
    {
        return [
            'nama_lengkap' => 'required|string|min:3|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pendidikan_saat_ini' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|min:5',
            'no_telp' => 'required|string|min:9|max:20',
            'program_pembelajaran' => 'required|string|max:255',
            'pilihan_kelas' => 'required|string|max:255',
            'pilihan_paket' => 'required|string|max:255',
            'pengalaman_sebelumnya' => 'nullable|string',
            'kemampuan_saat_ini' => 'nullable|string',
            'catatan_khusus' => 'nullable|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nama_lengkap.min' => 'Nama lengkap minimal 3 karakter.',
            'jenis_kelamin.required' => 'Silakan pilih jenis kelamin.',
            'jenis_kelamin.in' => 'Pilihan jenis kelamin tidak valid.',
            'pendidikan_saat_ini.required' => 'Pendidikan saat ini wajib dipilih atau diisi.',
            'alamat_lengkap.required' => 'Alamat lengkap wajib diisi.',
            'no_telp.required' => 'Nomor WhatsApp / Telepon aktif wajib diisi.',
            'program_pembelajaran.required' => 'Silakan pilih program pembelajaran.',
            'pilihan_kelas.required' => 'Silakan tentukan pilihan format kelas.',
            'pilihan_paket.required' => 'Silakan tentukan pilihan paket belajar.',
        ];
    }

    public function submit(): void
    {
        if (!auth()->check()) return;

        $validated = $this->validate();

        Registration::create([
            'nama_lengkap' => $validated['nama_lengkap'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'pendidikan_saat_ini' => $validated['pendidikan_saat_ini'],
            'alamat_lengkap' => $validated['alamat_lengkap'],
            'no_telp' => $validated['no_telp'],
            'program_pembelajaran' => $validated['program_pembelajaran'],
            'pilihan_kelas' => $validated['pilihan_kelas'],
            'pilihan_paket' => $validated['pilihan_paket'],
            'pengalaman_sebelumnya' => $validated['pengalaman_sebelumnya'] ?: null,
            'kemampuan_saat_ini' => $validated['kemampuan_saat_ini'] ?: null,
            'catatan_khusus' => $validated['catatan_khusus'] ?: null,
            'status' => 'pending',
        ]);

        try {
            Http::post('http://localhost:5678/webhook/nurul-ilmi-registration', [
                'nama_lengkap' => $this->nama_lengkap,
                'jenis_kelamin' => $this->jenis_kelamin,
                'pendidikan_saat_ini' => $this->pendidikan_saat_ini,
                'alamat_lengkap' => $this->alamat_lengkap,
                'no_telp' => $this->no_telp,
                'program_pembelajaran' => $this->program_pembelajaran,
                'pilihan_kelas' => $this->pilihan_kelas,
                'pilihan_paket' => $this->pilihan_paket,
                'pengalaman_sebelumnya' => $this->pengalaman_sebelumnya,
                'kemampuan_saat_ini' => $this->kemampuan_saat_ini,
                'catatan_khusus' => $this->catatan_khusus,
                'status' => 'pending',
                'submitted_at' => now()->toDateTimeString(),
            ]);
        } catch (\Exception $e) {
            \Log::error('Gagal mengirim webhook n8n: ' . $e->getMessage());
        }

        $this->reset();

        session()->flash('success', 'Registrasi berhasil! Mohon menunggu proses verifikasi dari tim Nurul Ilmi.');
    }

    public function render()
    {
        return view('livewire.registration-form', [
            'programs' => $this->programs,
            'classFormats' => $this->classFormats,
            'packages' => $this->packages,
        ]);
    }
}
