<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert([
            'name' => 'Esc. N° 703',
            'description' => 'Puerto Madryn',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('schools')->insert([
            'name' => 'Esc. N° 702',
            'description' => 'Rawson',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('schools')->insert([
            'name' => 'Esc. N° 724',
            'description' => 'Trelew',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('schools')->insert([
            'name' => 'Esc. N° 728',
            'description' => 'Puerto Madryn',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('schools')->insert([
            'name' => 'Esc. N° 733',
            'description' => 'Gaiman',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('schools')->insert([
            'name' => 'Esc. N° 748',
            'description' => 'Gaiman',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('schools')->insert([
            'name' => 'Esc. N° 762',
            'description' => 'Trelew',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('schools')->insert([
            'name' => 'Esc. N° 776',
            'description' => 'Rawson',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('schools')->insert([
            'name' => 'Esc. N° 781',
            'description' => 'Dolavon',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
