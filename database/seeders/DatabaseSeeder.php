<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [ 'nama' => 'geprek sambal ijo','harga' => '20000', 'foto' => 'cek', 'created_at' => Carbon::now() ],
            [ 'nama' => 'geprek sambal matah','harga' => '20000', 'foto' => 'cek', 'created_at' => Carbon::now() ],
            [ 'nama' => 'geprek sambal kecap','harga' => '20000', 'foto' => 'cek', 'created_at' => Carbon::now() ],
            [ 'nama' => 'geprek sambal terasi','harga' => '20000', 'foto' => 'cek', 'created_at' => Carbon::now() ],
            [ 'nama' => 'geprek level 1','harga' => '15000', 'foto' => 'cek', 'created_at' => Carbon::now() ],
            [ 'nama' => 'geprek level 2','harga' => '18000', 'foto' => 'cek', 'created_at' => Carbon::now() ],
            [ 'nama' => 'geprek level 3','harga' => '20000', 'foto' => 'cek', 'created_at' => Carbon::now() ],
            [ 'nama' => 'geprek level 4','harga' => '22000', 'foto' => 'cek', 'created_at' => Carbon::now() ],
            [ 'nama' => 'geprek level 5','harga' => '24000', 'foto' => 'cek', 'created_at' => Carbon::now() ],
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
