<?php
/*
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

 
    public function run()
    {       
            DB::table('ta_usuarios')->insert([
                'email' => 'elbes2009@gmail.com',
            	'matricula' => '1836889',
                'senha' => Hash::make('admin'),
                'nome'  => 'Administrador',
                'tipo'  => 'ctinf',
            	'status' => 'Ativo',
     ]);
    }
}
*/


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {


	public function run()
	{
		DB::table('ta_setor')->insert([
		
				'nome_setor'  => 'Coordenação Especial de Tecnoligia da Informação',
				'sigla_setor' => 'CTINF'
		]);
		
		DB::table('ta_setor')->insert([
		
				'nome_setor'  => 'Assessoria de Comunicação',
				'sigla_setor' => 'ASCON'
		]);
		
		DB::table('ta_usuarios')->insert([

				'nome'  => 'Administrador',
				'email' => 'elbes2009@gmail.com',
				'matricula' => '1836889',
				'senha' => Hash::make('admin'),
				'id_setor' => '1'
		]);
		
		DB::table('ta_menu')->insert([
		
				'nome_menu'  => 'Gabinete',
				'descricao_menu' => 'Menu com os setores ligados ao Gabinete'
		]);
		
		DB::table('ta_menu')->insert([
		
				'nome_menu'  => 'Subsecretarias',
				'descricao_menu' => 'Menu com os setores ligados às Subsecretarias'
		]);
		
		DB::table('ta_menu')->insert([
				'nome_menu'  => 'Superintendências',
				'descricao_menu' => 'Menu com os setores ligados às Superintendências'
		]);
		
		DB::table('ta_menu')->insert([
				'nome_menu'  => 'Unidades de Referência',
				'descricao_menu' => 'Menu com os setores ligados às Unidades de Referência'
		]);
		
		DB::table('ta_submenu')->insert([
		
				'nome_submenu'  => 'CTINF',
				'descricao_submenu' => 'menu da página da coordenação d etecnologia',
				'id_menu' => '1'
		]);
		
		DB::table('ta_submenu')->insert([
		
				'nome_submenu'  => 'ASCON',
				'descricao_submenu' => 'menu da página da assessoria de comunicação',
				'id_menu' => '1'
		]);
		
		DB::table('ta_submenu')->insert([
		
				'nome_submenu'  => 'GAB SEC',
				'descricao_submenu' => 'menu da página do gabinete do secretario',
				'id_menu' => '1'
		]);
		
		DB::table('ta_paginas')->insert([
		
				'pagina_nome'  => 'Coordenação Especial de TI',
				'id_setor' => '1',
				'id_submenu' => '1'
		]);
	}
}