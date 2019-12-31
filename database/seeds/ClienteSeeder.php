<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome'=>str_random(10),
            'email'=>str_random(10)."gmail.com",
            'cpf'=>'103.123.123-23',
            'endereco'=>'rua teste lote a nro 13',
            'rg'=>'19187872',
            'telefone'=>rand(900000000,999999999), 
        ]);
        DB::table('clientes')->insert([
            'nome'=>str_random(10),
            'email'=>str_random(10)."gmail.com",
            'cpf'=>'123.423.253-49',
            'endereco'=>'rua central lote 4 nro 213',
            'rg'=>'19245872',
            'telefone'=>rand(900000000,999999999), 
        ]);
        DB::table('clientes')->insert([
            'nome'=>str_random(10),
            'email'=>str_random(10)."gmail.com",
            'cpf'=>'223.113.657-88',
            'endereco'=>'rua b lote 23 nro 001',
            'rg'=>'11345475',
            'telefone'=>rand(900000000,999999999), 
        ]);
        DB::table('clientes')->insert([
            'nome'=>str_random(10),
            'email'=>str_random(10)."gmail.com",
            'cpf'=>'223.121.557-78',
            'endereco'=>'rua d lote 21 nro 101',
            'rg'=>'11345475',
            'telefone'=>rand(900000000,999999999), 
        ]);
        DB::table('clientes')->insert([
            'nome'=>str_random(10),
            'email'=>str_random(10)."gmail.com",
            'cpf'=>'223.222.644-45',
            'endereco'=>'rua d lote 3 nro 001',
            'rg'=>'11345475',
            'telefone'=>rand(900000000,999999999), 
        ]);
        DB::table('clientes')->insert([
            'nome'=>str_random(10),
            'email'=>str_random(10)."gmail.com",
            'cpf'=>'223.113.657-88',
            'endereco'=>'rua b lote 23 nro 001',
            'rg'=>'11345475',
            'telefone'=>rand(900000000,999999999), 
        ]);
        DB::table('clientes')->insert([
            'nome'=>str_random(10),
            'email'=>str_random(10)."gmail.com",
            'cpf'=>'223.113.657-88',
            'endereco'=>'rua b lote 23 nro 001',
            'rg'=>'11345475',
            'telefone'=>rand(900000000,999999999), 
        ]);
        DB::table('clientes')->insert([
            'nome'=>str_random(10),
            'email'=>str_random(10)."gmail.com",
            'cpf'=>'223.113.657-88',
            'endereco'=>'rua b lote 23 nro 001',
            'rg'=>'11345475',
            'telefone'=>rand(900000000,999999999), 
        ]);
        DB::table('clientes')->insert([
            'nome'=>str_random(10),
            'email'=>str_random(10)."gmail.com",
            'cpf'=>'223.113.657-88',
            'endereco'=>'rua b lote 23 nro 001',
            'rg'=>'11345475',
            'telefone'=>rand(900000000,999999999), 
        ]);
    }
}
