@if (Auth::guest())
    
@else
			<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ url('/admin') }}" ><i class="fa fa-dashboard fa-fw"></i> Início</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Ascon<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/inserirBanner') }}">Banners</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> CTINF<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/inserirLink') }}">Links do Site</a>
                                </li>
                                <li>
                                	<a href="{{ url('/listaUsuario') }}">Usuários</a>
                                </li>
                                <li>
                                    <a href="{{ url('/inserirVideo') }}" title="Vídeos da tela inicial da Intranet">Vídeos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                   
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Gabinete<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">GAB SEC</a>
                                </li>
                                <li>
                                    <a href="#">AGEP</a>
                                </li>
                                <li>
                                    <a href="#">ASCON</a>
                                </li>
                                <li>
                                    <a href="#">CTINF</a>
                                </li>
                                <li>
                                    <a href="#">CGI</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class=fa fa-files-o fa-fw"></i> Minha Página<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/conteudoPagina') }}">Adicionar Conteúdo</a>
                                </li>
                                <li>
                                    <a href="{{ url('/meus-conteudos') }}">Meus Conteúdos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
 @endif