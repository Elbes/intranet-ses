<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            @foreach($banners as $banner)
            	@if (!isset($banner->dhs_exclusao_logica))
            		<li data-target="#myCarousel" data-slide-to="1"></li>
            	@endif
            @endforeach
        </ol>
        <div class="carousel-inner">
           <div class="item active">
                <div class="fill" style="background-image:url('{{ url('/layout/') }}/img/Banner2.jpg');"></div>
                <div class="carousel-caption">
                   <!-- <h2>Caption 3</h2> -->
                </div>
            </div>
        @foreach($banners as $banner)
        	@if (!isset($banner->dhs_exclusao_logica))
            <div class="item">
                <div class="fill" style="background-image:url('/img/banners/{{$banner->imagen_banner}}');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            @endif
         @endforeach

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
</header>