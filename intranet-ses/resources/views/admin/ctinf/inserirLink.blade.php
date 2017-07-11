@extends('admin.layoutAdmin')

	@section('content')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastro de Link</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            @include('notificacao')
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Forneça os links apara Intranet
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <form role="form" enctype="multipart/form-data" action="{{ url('/admin/ctinf/inserir-link') }}" method="post">
                                    {{ csrf_field() }} 
                                      <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id_usuario }}">
                                       <div class="form-group{{ $errors->has('link_nome') ? ' has-error' : '' }}">
                                            <label>Nome do Link</label>
                                            <input class="form-control" name="link_nome" placeholder="Entre com o que aparecerá na página" value="{{ old('link_nome') }}" required="required">
                                        	@if ($errors->has('link_nome'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('link_nome') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('link_descricao') ? ' has-error' : '' }}">
                                            <label>Descrição do Link</label>
                                            <input class="form-control" name="link_descricao" placeholder="Entre com a descrição do link" value="{{ old('link_descricao') }}" required="required">
                                        	@if ($errors->has('link_descricao'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('link_descricao') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('link_acesso') ? ' has-error' : '' }}">
                                            <label>Link de acesso</label>
                                            <input class="form-control" name="link_acesso" placeholder="Entre com o link de acesso" value="{{ old('link_acesso') }}" required="required">
                                        	@if ($errors->has('link_acesso'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('link_acesso') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('prioridade') ? ' has-error' : '' }}">
                                            <label>Prioridade</label>
                                            <label for="priodidade">
	                                            <select class="form-control" name="prioridade" id="prioridade" required="required">
												    <option value="1">1</option>
												    <option value="2">2</option>
												    <option value="3">3</option>
												    <option value="4">4</option>
												    <option value="5">5</option>
												    <option value="6">6</option>
												    <option value="7">7</option>
												    <option value="8">8</option>
												    <option value="9">9</option>
												    <option value="10">10</option>
												 </select>
                                            </label>
                                            @if ($errors->has('prioridade'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('prioridade') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default">Cadastrar</button>
                                        <button type="reset" class="btn btn-default">Limpar</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                 <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Links Cadastrados
                        </div>
                         <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dtLink">
                            </table>
                        </div>     
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
   @endsection
   
   @section( 'dependencyJs' )
		<!-- DataTables JavaScript -->
	   
	    
		<script type="text/javascript">
			  
				 
                var dtColumnsLink = function() {
                    var columns = [
                        {"sTitle": "NOME DO LINK", "width": "25%", "sName": "link_nome", "mData": "link_nome"},
                        {"sTitle": "DESCRIÇÃO", "sName": "link_descricao", "mData": "link_descricao"},
                        {"sTitle": "LINK DE ACESSO", "sName": "link_acesso", "mData": "link_acesso"},
                        {"sTitle": "PRIORIDADE", "width": "100px", "sName": "prioridade", "mData": "prioridade"},
                        {"sTitle": "OPÇÕES", "width": "155px", "searchable": false, "orderable":  false, "data": function( data){

                        	 var button  = '<a title="Alterar" href="{{ url("/admin/ctinf/alterar") }}/'+ data.id_link +'" class="btn btn-success mgn-btn-dt"><i class="fa fa-pencil-square-o"></i></a>';
                             if(data.dhs_exclusao_logica == null){
                             	button  += ' <a title="Inativar" href="{{ url("/admin/ctinf/inativar-link") }}/'+ data.id_link +'" class="btn btn-primary mgn-btn-dt"><i class="glyphicon glyphicon-off"></i></a>';
                             }else{
                             	button  += ' <a title="Ativar" href="{{ url("/admin/ctinf/ativar-link") }}/'+ data.id_link +'" class="btn btn-warning mgn-btn-dt"><i class="glyphicon glyphicon-off"></i></a>';
                             }
                             button  += ' <a title="Excluir" href="{{ url("/admin/ctinf/excluir-link") }}/'+ data.id_link +'" class="btn btn-danger mgn-btn-dt"><i class="fa fa-trash"></i></a>';
                             return button;
                            }
                        }
                    ]

                    return columns;
                } 
                
              $(document).ready(function() { 
                dtTable({ 
                    id_tabela : 'dtLink',
                    url_data : '/admin/ctinf/lista-link.json',
                    colunas: dtColumnsLink
           		 });  
	
                });

            </script>
	@endsection