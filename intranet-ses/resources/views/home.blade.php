
@extends('layoutIntranet')
<style type="text/css">       
    figure { width: 90%; min-width: 320px; margin:0 auto; position: fixed;  text-align: right; right: 25px; top: 520px;}
    
    </style>
@section('content')
        <!-- Marketing Icons Section -->
        <!-- 
		<figure>
		    <video controls width="20%" autoplay="autoplay">
		        <source src="{{ url('/') }}/videos/papo_de_saude.mp4" type="video/mp4" />
		    </video>
		    <p><a href="http://papodesaude.saude.df.gov.br/index.php?r=site%2Fnovo-cadastro" class="btn btn-primary" target="1" title="Clique para realizar o cadastro">QUERO PARTICIPAR</a></p>
		</figure>
		-->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    Bem-vindos à nova Intranet da Secretaria de Estado de Saúde do Distrito Federal  !!
                </h2>
            </div>
            <div class="col-md-3">
                    <div class="panel-body">
                       <a href="{{ url('/sei-info') }}">
	                    	<img class="img-responsive img-portfolio img-hover" style="" src="{{ url('/layout/') }}/img/acesso-portal-sei.png" alt="" title="Sistema Eletrônico de Informações">
	                	</a>
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="panel-body">
                       <a href="#" target="1" onclick="window.open('http://materiais.saude.df.gov.br','Pagina',
                         'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=200, WIDTH=1200, HEIGHT=900');">
	                    	<img class="img-responsive img-portfolio img-hover" style="" src="{{ url('/layout/') }}/img/acesso-portal-alphalinc.png" alt="" title="Acesso ao sistema de materiais">
	                	</a>
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="panel-body">
                       <a href="#" target="1" onclick="window.open('http://sysleitos.saude.df.gov.br/','Pagina',
                         'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=200, WIDTH=1200, HEIGHT=900');">
	                    	<img class="img-responsive img-portfolio img-hover" style="" src="{{ url('/layout/') }}/img/acesso-portal-sysleitos.png" alt="" title="Acesso ao sistema Sysleitos">
	                	</a>
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="panel-body">
                       <a href="#" target="1" onclick="window.open('http://intra.saude.df.gov.br/','Pagina',
                         'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=200, WIDTH=1200, HEIGHT=900');">
	                    	<img class="img-responsive img-portfolio img-hover" style="" src="{{ url('/layout/') }}/img/acesso-portal-intraAntiga.png" alt="" title="Intranet - versão anterior">
	                	</a>
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="panel-body">
                       <a href="#" target="1" onclick="window.open('http://atendimentoti.saude.df.gov.br','Pagina',
                         'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=200, WIDTH=1200, HEIGHT=900');">
	                    	<img class="img-responsive img-portfolio img-hover" style="" src="{{ url('/layout/') }}/img/acesso-portal-atendimentoti.png" alt="" title="Atendimento TI">
	                	</a>
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="panel-body">
                       <a href="#" onclick="window.open('http://trakcare.saude.df.gov.br/trakcare/csp/logon.csp?LANGID=1',
                            'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');">
	                    	<img class="img-responsive img-portfolio img-hover" style="" src="{{ url('/layout/') }}/img/acesso-portal-trakcare.png" alt="" title="Acesso ao sistema TrakCare">
	                	</a>
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="panel-body">
                       <a href="#" target="1" onclick="window.open('http://esus.saude.df.gov.br:8080/esus','Pagina',
                         'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=200, WIDTH=1200, HEIGHT=900');">
	                    	<img class="img-responsive img-portfolio img-hover" style="" src="{{ url('/layout/') }}/img/acesso-portal-esus.png" alt="" title="Acesso ao portal da SES-DF">
	                	</a>
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="panel-body">
                       <a href="#" target="1" onclick="window.open('http://pontoweb/forponto/fptoweb.exe','Pagina',
                         'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=200, WIDTH=1200, HEIGHT=900');">
	                    	<img class="img-responsive img-portfolio img-hover" style="" src="{{ url('/layout/') }}/img/acesso-portal-forponto.png" alt="" title="Acesso ao sistema Forponto. Acessar pelo Internet Explorer">
	                	</a>
                    </div>
            </div>
        </div>
		<hr>
        <div class="row">

            <div class="col-lg-12">

                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#mais-sistemas" data-toggle="tab"><i class="fa fa-database"></i> Outros Links</a>
                    </li>
                    <li class=""><a href="#videos" data-toggle="tab"><i class="fa fa-film fa-1x"></i> Vídeos</a>
                    </li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="mais-sistemas">
		        	<br />
		        	@foreach($links as $link)
        				@if (!isset($link->dhs_exclusao_logica))
        				<div class="col-md-4" style="text-align: center;">
	                    	<p><a style="color: black; position: relative; text-transform: uppercase;" target="1"  href="{{$link->link_acesso}}" title="{{$link->link_descricao}}">{{$link->link_nome}}</a></p>
			            </div>
        				@endif
         			@endforeach
		                
                    </div>
                    <div class="tab-pane fade" id="videos">
                        <br />
	                    <div class="col-md-4" >
	                    	<p align="center"><b>Video Papo de Saúde - Secretário</b></p>
				           <p><video controls width="100%">
						        <source src="{{ url('/') }}/videos/papo_de_saude.mp4" type="video/mp4" />
						    </video></p>
						    <p align="center"><a href="http://papodesaude.saude.df.gov.br/index.php?r=site%2Fnovo-cadastro" class="btn btn-primary" target="1" title="Clique para realizar o cadastro">QUERO PARTICIPAR</a></p>
	           			</div>
	           			 @foreach($videos as $video)
		        				@if (!isset($video->dhs_exclusao_logica))
		        				 <div class="col-md-4" >
		        				 <p align="center"><b>{{ $video->video_descricao }}</b></p>
		        				 <p><video controls width="100%">
						        	<source src="{{ url('/') }}/videos/{{$video->video}}" type="video/mp4" />
						    	 </video></p>
					            </div>
		        				@endif
	         				@endforeach
                    </div>

                </div>
            </div>
		</div>
        <hr>
@endsection

