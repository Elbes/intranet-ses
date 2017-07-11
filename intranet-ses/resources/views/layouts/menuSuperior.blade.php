            <!-- Menu -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    @foreach ($menu_principal as $menu)
                    	<li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $menu->nome_menu}} <b class="caret"></b></a>
	                        <ul class="dropdown-menu">
	                        	@foreach ($menu->subMenu as $sub)
	                        		@foreach ($sub->pagina as $pagina)
			                            <li>
			                            		<a href="/paginas/{{$sub->nome_submenu}}" >{{$sub->nome_submenu}}</a>
			                            </li>
		                            @endforeach
	                            @endforeach
	                        </ul>
                    	</li>
                    @endforeach
                   <!--  @forelse ($menu->subMenu as $sub2)
                    	 @empty
                    	<li>
	                          <a href="{{ url('/pagina')}}/{{$menu->id_menu}}" >{{$menu->nome_menu}}</a>
	                   </li>
	                  @endforelse -->
                    <li>
                        <a href="http://srv-wbl10chavm1/superintendencias/_layouts/15/start.aspx#/" target="1">Superintendências</a>
                    </li>
                    <li>
                        <a href="{{ url('/login') }}">Login</a>
                    </li>
                </ul>
            </div>
           