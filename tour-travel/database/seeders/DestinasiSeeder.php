<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class DestinasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('destinasis')->insert([
        	'nama' => 'Sanur',
            'deskripsi' => 'Pantai Sanur adalah salah satu pantai wisata yang ada di pulau Bali. Pantai ini terletak persis di sebelah timur kota Denpasar, Bali. Sanur berada di Kotamadya Denpasar.
                            Karena memiliki ombak yang cukup tenang, maka pantai Sanur tidak bisa dipakai untuk selancar layaknya Pantai Kuta.[1] Tak jauh dari Pantai Sanur terdapat juga lokasi wisata selam dan snorkeling. Lokasi selam ini dapat digunakan oleh para penyelam dari semua tingkatan keahlian.
                            Pantai Sanur juga dikenal sebagai sunrise beach (pantai untuk melihat matahari terbit), berlawanan dengan Pantai Kuta yang lebih dikenal dengan pemandangan matahari tenggelam.',
            'gambar' => 'sanur.jpg',
            'meta_title' => 'sanur',
            'meta_description' => 'sanur',
            'meta_keywords' => 'sanur',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('destinasis')->insert([
        	'nama' => 'Pantai Kelingking',
            'deskripsi' => 'Kelingking Beach berlokasi di Dusun Karang Dawa, Desa Bunga Mekar, Kecamatan Nusa Penida, Bali.
                            Karena daratan Pulau Bali dan Pulau Nusa Penida dipisahkan oleh laut, maka untuk menuju ke sana kamu harus menyeberang dulu nih, RedTraveler. Ada beberapa transportasi yang bisa kamu gunakan yaitu kapal, speed boat, dan perahu tradisional.',
            'gambar' => 'kelingking.jpeg',
            'meta_title' => 'kelingking',
            'meta_description' => 'kelingking',
            'meta_keywords' => 'kelingking',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
