<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('test:webhook')]
#[Description('Kirim payload test pendaftaran ke n8n webhook')]
class TestWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:webhook';

    /**
     * The console command aliases.
     *
     * @var array
     */
    protected $aliases = ['app:test-webhook'];

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kirim payload test pendaftaran ke n8n webhook';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = [
            'nama_lengkap' => 'Testing Webhook',
            'jenis_kelamin' => 'Laki-laki',
            'pendidikan_saat_ini' => 'SD',
            'alamat_lengkap' => 'Jl. Test No. 123',
            'no_telp' => '08123456789',
            'program_pembelajaran' => 'Bahasa Inggris',
            'pilihan_kelas' => 'Online Class',
            'pilihan_paket' => '4x Pertemuan',
            'pengalaman_sebelumnya' => 'Belum pernah',
            'kemampuan_saat_ini' => 'Pemula',
            'catatan_khusus' => 'Tolong guru yang sabar',
            'status' => 'pending',
            'submitted_at' => now()->toDateTimeString(),
        ];

        \Illuminate\Support\Facades\Http::post('http://localhost:5678/webhook/nurul-ilmi-registration', $data);
        $this->info('Webhook test terkirim ke n8n!');
    }
}
