<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'registrations';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'pendidikan_saat_ini',
        'alamat_lengkap',
        'no_telp',
        'program_pembelajaran',
        'pilihan_kelas',
        'pilihan_paket',
        'pengalaman_sebelumnya',
        'kemampuan_saat_ini',
        'catatan_khusus',
        'status',
    ];
}

