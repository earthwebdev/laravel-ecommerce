@if($slides != null)
<div class="container-fluid p-0">

        <div id="carouselSlide" class="carousel slide" data-ride="carousel">
            {{-- <ol class="carousel-indicators">
                @foreach ($slides as $slide)
                <li data-target="#carouselSlide" data-slide-to="0" class="@if ($loop->first) active @endif"></li>
                @endforeach
            </ol> --}}
            <div class="carousel-inner">

                    @foreach ($slides as $slide)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img class="d-block w-100 vh-100" src="{{ asset('storage/images/slides/'.$slide->image) }}" alt="{{ $slide->title }}">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>{{ $slide->title }}</h5>
                          <p>{!! $slide->description !!}</p>
                        @if ($slide->btn_link != null)
                        <a href="{{ url($slide->btn_link) }}" title="{{ $slide->title }}">{{ $slide->link_title }}</a>
                        @endif

                        </div>
                      </div>
                    @endforeach



            </div>
            <a class="carousel-control-prev" href="#carouselSlide" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>

            </a>
            <a class="carousel-control-next" href="#carouselSlide" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>

            </a>
          </div>


</div>


@endif
