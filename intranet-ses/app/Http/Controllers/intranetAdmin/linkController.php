<?php

namespace App\Http\Controllers\intranetAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Adldap\Laravel\Validation\Rules\Rule;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class linkController extends Controller
{
    public function getInserir()
    {   
    	$setor = new \App\ta_setor();
    	$setores = $setor->getTodosSetores();
    	
        return view('admin.ctinf.inserirLink', compact('setores'));
    }

    public function inserirlink(Request $request)
    {   
    
        $link = new \App\ta_link();

        $link->link_nome      =  $request->input('link_nome');          
        $link->link_descricao =  $request->input('link_descricao');
        $link->link_acesso    =  $request->input('link_acesso');
        $link->prioridade    =  $request->input('prioridade');
        $link->id_usuario_cadastro    =  $request->input('id_usuario');

        if($link->save()){
        	Session::flash('success', 'Link inserido com sucesso!!!');
        }else{
            Session::flash('error', 'Erro ao tentar cadastrar o Link!!!\nTente Novamente.');
        }
        return view('/admin/ctinf/inserirLink');
    }
    
    public function getAlterarLink($id_link )
    {
    	$setor = new \App\ta_setor();
    	$setores = $setor->getTodosSetores();
    	
    	$link = \App\ta_banner::withTrashed()->find( $id_link );
    
      if ($link == null) {
    		// Está inativo no banco de dados =P
    		Session::flash('warning', 'Link não encontrado!!');
    		return Redirect::to('/inserirLink');
    	}else{
    		return view('admin.ctinf.alterarLink', compact('link', 'setores'));
    	}
    	 
    }
    
    public function alterarLink(Request $request){
    	
    	$link = \App\ta_link::find($request->input('id_link'));
    	 
    	$link->link_nome      =  $request->input('link_nome');          
        $link->link_descricao =  $request->input('link_descricao');
        $link->link_acesso    =  $request->input('link_acesso');
        $link->prioridade    =  $request->input('prioridade');
    	 
    	if($link->save()){
    		Session::flash('success', 'Link alterado com sucesso!!!');
    	}else{
    		Session::flash('error', 'Erro ao tentar alterar o Link!!!\nTente Novamente.');
    	}
    	return Redirect::to('/inserirLink');
    }
    
    public function getListaLink()
    {
    	$setor = new \App\ta_setor();
    	$setores = $setor->getTodosSetores();
    	
    	return view('admin.ctinf.listaLink', compact('setores'));
    	 
    }
    
    public function getListaLinkJson()
    {
    	$link = new \App\ta_link();
    	return $link->getDtLink();
    	    
    }

	public function excluirLink($id_link )
    {   
      	$link = \App\ta_link::where('id_link', $id_link );

        if($link->forceDelete()){
        	Session::flash('success', 'Link excluído com sucesso!!!');
        }else{
            Session::flash('error', ' Erro ao tentar excluir o Link !!!');
        }
        return Redirect::to('/inserirLink');
    }
    
    public function inativarLink($id_link )
    {
    	$link = \App\ta_link::find( $id_link );
    
    	if($link->delete()){
    		Session::flash('success', 'Desativado com sucesso!!!');
    	}else{
    		Session::flash('error', 'Erro ao tentar desativar Link!!!');
    	}
    	return Redirect::to('/inserirLink');
    
    }
    
    public function ativarLink($id_link )
    {
    	$link = \App\ta_link::where('id_link', $id_link );
    	
    	if($link->restore()){
    		Session::flash('success', 'Ativado com sucesso!!!');
    	}else{
    		Session::flash('error', 'Erro ao tentar ativar Link!!!');
    	}
    	return Redirect::to('/inserirLink');
    }
    
    public function mostraLink(){
    	$link = new \App\ta_link;
    	$links = $link->getTodosLinks();
    	return view('/home', compact('links'));
    	 
    }
    
}