@extends('admin.layoutAdmin')

	@section('content')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lista de links cadastrados</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Links da Intranet
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
                        {"sTitle": "Codigo","width": "10%", "sName": "id_link", "mData": "id_link"},
                        {"sTitle": "Nome Link", "width": "25%", "sName": "link_nome", "mData": "link_nome"},
                        {"sTitle": "Desc. Link", "sName": "link_descricao", "mData": "link_descricao"},
                        {"sTitle": "Link de acesso", "sName": "link_acesso", "mData": "link_acesso"},
                        {"sTitle": "Opções", "width": "155px", "searchable": false, "orderable":  false, "data": function( data){

                                var button  = '<a title="Alterar" href="" class="btn btn-success mgn-btn-dt"><i class="fa fa-pencil-square-o"></i></a>';
                                button  += ' <a title="Detalhes" href="" class="btn btn-info mgn-btn-dt"><i class="fa fa-file-text-o"></i></a>';
                                button  += ' <a title="Excluir" href="" class="btn btn-danger mgn-btn-dt"><i class="fa fa-trash"></i></a>';
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