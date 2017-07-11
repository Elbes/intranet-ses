@extends('admin.layoutAdmin')

	@section('content')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastro de Banner</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            @include('notificacao')
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Forneça as informações do Banner para Slides da Intranet
                        </div>
                       <!--  @include('notificacao') -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <form role="form" enctype="multipart/form-data" action="{{ url('/admin/ascon/inserir-banner') }}" method="post">
                                    {{ csrf_field() }} 
                                        <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id_usuario }}"> 
                                        <div class="form-group{{ $errors->has('banner_nome') ? ' has-error' : '' }}">
                                            <label>Nome do Banner</label>
                                            <input class="form-control" name="banner_nome" placeholder="Entre com o nome do Banner" value="{{ old('banner_nome') }}" required="required">
                                        	@if ($errors->has('banner_nome'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('banner_nome') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('banner_validade') ? ' has-error' : '' }}">
                                            <label>Validade do Banner</label>
                                            <input class="form-control" name="banner_validade" placeholder="Entre com o número de dias de validade" value="{{ old('banner_validade') }}" required="required">
                                        	@if ($errors->has('banner_validade'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('banner_validade') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('baner_obs') ? ' has-error' : '' }}">
                                            <label>Observação</label>
                                            <textarea class="form-control" name="banner_obs" rows="3" placeholder="Alguma observação importante">{{ old('banner_obs') }}</textarea>
                                            @if ($errors->has('banner_obs'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('banner_obs') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('prioridade') ? ' has-error' : '' }}">
                                            <label>Prioridade</label>
                                            <label for="priodidade">
	                                            <select class="form-control" name="prioridade" id="prioridade">
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
                                        <div class="form-group">
                                            <label>Imagem do Banner</label>
                                            <input type="file" name="imagen_banner" required="required">
                                            <input type="hidden" id="nome_imagen" name="nome_imagen">
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
                <!-- /.col-lg-12 -->
            <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Banners Cadastrados
                        </div>
                         <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dtBanner">
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
                        {"sTitle": "NOME DO BANNER", "width": "25%", "sName": "banner_nome", "mData": "banner_nome"},
                        {"sTitle": "CADASTRO", "width": "100px", "sName": "dhs_cadastro", "mData": "dhs_cadastro" },
                        {"sTitle": "VALIDADE", "width": "100px", "sName": "validade", "mData": "validade"},
                        {"sTitle": "ATUALIZADO EM", "width": "130px", "sName": "dhs_atualizacao", "mData": "dhs_atualizacao"},
                        {"sTitle": "PRIORIDADE", "width": "60px", "sName": "prioridade", "mData": "prioridade"},
                        {"sTitle": "IMAGEM","width": "100px", "sName": "id_banner", "mData": function(data) {                                
                            var img = "";
                            if(data.imagen_banner.length > 0){
                                img = '<div><img style="width:200px; height:80px;" src="{{ url("/img/banners") }}/'+ data.imagen_banner +'" alt=""></div>';
                            }

                            return img;
                        }
                    },
                        {"sTitle": "OPÇÕES", "width": "155px","searchable": false, "orderable":  false, "mData": function(data){

                                var button  = '<a title="Alterar" href="{{ url("/admin/ascon/alterar") }}/'+ data.id_banner +'" class="btn btn-success mgn-btn-dt"><i class="fa fa-pencil-square-o"></i></a>';
                                if(data.dhs_exclusao_logica == null){
                                	button  += ' <a title="Inativar" href="{{ url("/admin/ascon/inativar-banner") }}/'+ data.id_banner +'" class="btn btn-primary mgn-btn-dt"><i class="glyphicon glyphicon-off"></i></a>';
                                }else{
                                	button  += ' <a title="Ativar" href="{{ url("/admin/ascon/ativar-banner") }}/'+ data.id_banner +'" class="btn btn-warning mgn-btn-dt"><i class="glyphicon glyphicon-off"></i></a>';
                                }
                                button  += ' <a title="Excluir" href="{{ url("/admin/ascon/excluir-banner") }}/'+ data.id_banner +'" class="btn btn-danger mgn-btn-dt"><i class="fa fa-trash"></i></a>';
                                return button;
                        	}
                    
  
                        }
                    ]

                    return columns;
                } 
                
              $(document).ready(function() { 
                dtTable({ 
                    id_tabela : 'dtBanner',
                    url_data : '/admin/ascon/lista-banner.json',
                    colunas: dtColumnsLink
           		 });  
	
                });

            </script>

@endsection
   