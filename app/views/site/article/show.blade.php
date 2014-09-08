@extend('_frontend.master')
@section('breadcrumb')
{{ HTML::decode(Breadcrumbs::render('hirek.show',$article)) }}
@stop
@section('content')

<div class="article">
    <h1>{{HTML::link($article->getLink(),$article->title)}}</h1>
    <p class="small">Írta: {{$article->getAuthorName()}} | Létrehozva: {{$article->getCreateDate()}} </p>
    <div class="article-content">
        {{$article->content}}
    </div>

    @if(count($article->gallery)!=0 && count($article->gallery->pictures)!=0)
    <h4>Galéria</h4>
    <div class="article-gallery">
        <ul class="row list-unstyled">
            @foreach($article->gallery->pictures as $picture)
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                <a href="{{$picture->picture_path}}" title="{{$picture->name}}" data-gallery>
                    <img class="img-responsive" src="{{$picture->thumbnail_path}}" alt="{{$picture->name}}" title="{{$picture->name}}" />
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    <h4>Hozzászólások</h4>

    <div class="fb-comments" data-href="{{$url}}" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
</div>
@stop