<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            ['code' => 'BHS-IND', 'name' => 'Bahasa Indonesia'],
            ['code' => 'BHS-ING', 'name' => 'Bahasa Inggris'],
            ['code' => 'MAT', 'name' => 'Matematika'],
            ['code' => 'KIM', 'name' => 'Kimia'],
            ['code' => 'FIS', 'name' => 'Fisika'],
            ['code' => 'BIO', 'name' => 'Biologi'],
            ['code' => 'PKN', 'name' => 'Pendidikan Kewarganegaraan'],
            ['code' => 'PJOK', 'name' => 'Pendidikan Jasmani, Olahraga & Kesehatan'],
            ['code' => 'SBDP', 'name' => 'Seni Budaya dan Prakarya'],
            ['code' => 'KKPI', 'name' => 'Keterampilan Komputer dan Pengelolaan Informasi'],
            ['code' => 'TKJ', 'name' => 'Tehnik Komputer dan Jaringan'],
            ['code' => 'RPL', 'name' => 'Rekayasa Perangkat Lunak'],
            ['code' => 'MM', 'name' => 'Multimedia'],
            ['code' => 'OTKP', 'name' => 'Otomatisasi dan Tata Kelola Perkantoran'],
            ['code' => 'AKL', 'name' => 'Akuntansi dan Keuangan Lembaga'],
            ['code' => 'TBSM', 'name' => 'Teknik dan Bisnis Sepeda Motor'],
            ['code' => 'TATL', 'name' => 'Teknik Audio Video'],
            ['code' => 'TKR', 'name' => 'Teknik Kendaraan Ringan'],
            ['code' => 'TITL', 'name' => 'Teknik Instalasi Tenaga Listrik'],
            ['code' => 'TEI', 'name' => 'Teknik Energi dan Instalasi'],
            ['code' => 'TPTU', 'name' => 'Teknik Pemesinan'],
            ['code' => 'TBG', 'name' => 'Teknologi dan Rekayasa Pertanian'],
            ['code' => 'TITL', 'name' => 'Teknik Instalasi Tenaga Listrik '],
        ];

        foreach ($subjects as $sub) {
            Subject::updateOrCreate(['code' => $sub['code']], $sub);
        }
    }
}
