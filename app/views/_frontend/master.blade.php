<!DOCTYPE html>
<html lang="hu">
    <head prefix="og: http://ogp.me/ns#">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">


        <link href="/assets/favicon.ico" rel="icon" type="image/x-icon" />
        <title>{{Config::get('globals.title');}} - {{$title or ''}}</title>

        <!--[if lt IE 9]>
            {{ HTML::script('//html5shim.googlecode.com/svn/trunk/html5.js'); }}
        <![endif]-->

        {{ HTML::style('http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&subset=latin,latin-ext'); }}
        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/font-awesome.min.css'); }}
        {{ HTML::style('css/blueimp-gallery.css'); }}
        {{ HTML::style('css/bootstrap-image-gallery.min.css'); }}
        {{ HTML::style('css/animate.css'); }}
        {{ HTML::style('css/site/divide.css'); }}
        @if(isset($am)&&!empty($am))
            {{ HTML::style('css/site/divide.am.min.css') }}
        @endif

    </head>
    <body>
        <div id="fb-root"></div>

        @include('_frontend.lightbox')
        @include('_frontend.header')
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                    <div class="panel">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">

                                    <nav id="mainMenu">
                                        <button type="button" class="collapsed btn-menu hidden-md hidden-lg" data-toggle="collapse" data-target="#navCollapse">
                                            <i class="fa fa-bars"></i> Menü
                                        </button>

                                        <div class="collapse" id="navCollapse">
                                            <h4>Pályázatok</h4>
                                            <a href="http://banhorvati.hu/img/gallery/41/1600201704.4254-magyar-falu-program.jpg" target="_blank" style="margin-bottom: 10px">
                                                <img class="img-responsive" src="http://banhorvati.hu/img/gallery/41/1600201704.4254-magyar-falu-program.jpg" alt="Magyar Falu Program">
                                            </a>
                                            <a href="/oldal/95/befektetes-a-jovobe-efop-153-16-2017-00030">
                                                <img class="img-responsive" src="/img/gallery/13/1567069115.4665-befektetes-a-jovobe.jpg" alt="Infóblokk">
                                            </a>
                                            {{$competitionMenu->asUl(array('class'=>'list-unstyled nav-menu-competition'))}}
                                            <h4>Navigáció</h4>
                                            {{$mainMenu->asUl(array('class'=>'list-unstyled nav-menu'))}}
                                        </div>
                                    </nav>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                                    @yield('content')
                                </div>
                            </div>


                        </div>
                    </div>
                </div><!--/col-12-->
            </div>
        </div>
        @include('_frontend.footer')


        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId: '300832236763668',
                    xfbml: true,
                    version: 'v2.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/hu_HU/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        {{ HTML::script('js/jquery-2.1.1.min.js'); }}
        {{ HTML::script('js/bootstrap.min.js'); }}
        {{ HTML::script('js/plugins/metisMenu.js'); }}
        {{ HTML::script('js/plugins/jquery.blueimp-gallery.min.js'); }}
        {{ HTML::script('js/plugins/bootstrap-image-gallery.js'); }}
        {{ HTML::script('js/divide.js'); }}


    </body>
</html>
