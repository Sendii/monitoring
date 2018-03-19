<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\barang::insert([
        	[
        		'id' => '1',
        		'banyak_brg' => '2',
        		'nama_barang' => 'Proyektor',
        		'jumlah_brg' => '2',
        		'harga_brg' => '250000',
        		'total_brg' => '500000',
        		'hargatotal_brg' => '1000000'
        	],
        	[
        		'id' => '1',
        		'banyak_brg' => '2',
        		'nama_barang' => 'LCD',
        		'jumlah_brg' => '5',
        		'harga_brg' => '100000',
        		'total_brg' => '500000',
        		'hargatotal_brg' => '1000000'
        	],
        ]);
    }
}
