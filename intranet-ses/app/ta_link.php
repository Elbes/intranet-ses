<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Database\Eloquent\SoftDeletes;

class ta_link extends Model
{
	use SoftDeletes;

    protected $table = 'ta_link';
    protected $primaryKey = 'id_link';
    protected $hidden   = [];
    protected $fillable = [];
    
    const CREATED_AT = 'dhs_cadastro';
    const UPDATED_AT = 'dhs_atualizacao';
    const DELETED_AT = 'dhs_exclusao_logica';
    
    protected $softDelete = true;
    
    //regras para validaÃ§Ã£o de dados
    public $rules = [
    		'link_nome' => 'required|string|max:100',
    		'link_descricao' => 'required',
    		'link_acesso' => 'required',
    
    ];
    
    public $messages = [
    		'link_nome.required' => 'O campo Nome do link é obrigatório.',
    		'link_nome.max'      => 'O campo Nome do link não pode ser superior a 60 caracteres..',
    		'link_descricao.required' => 'O campo Descrição é obrigatório.',
    		'link_acesso.required' => 'O campo Link de Acesso é obrigatório.',    	
    ];


    public function getDtLink(){
    	$objReturn = DB::table('ta_link')
    			->get();
    
    			return Datatables::of($objReturn)
    			->make(true);
    }
    public function getTodosLinks(){
    	return DB::table('ta_link')
    	->orderBy('prioridade', 'asc')->whereNull('ta_link.dhs_exclusao_logica')
    	->get();
    }


}