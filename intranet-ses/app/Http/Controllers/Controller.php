<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function msgReturn(string $st,string $msg){
    	$objReturn = array();
    
    	if(isNonEmptyString($st) && isNonEmptyString($msg)){
    		$objReturn = array("status" => $st, "mensage" => $msg);
    	}else{
    		$objReturn = array("status" => "error", "mensage" => 'Não foi possível definir a mensagem de retorno!');
    	}
    
    	return $objReturn;
    }
}

