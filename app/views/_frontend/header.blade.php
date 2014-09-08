<header class="bg-parallax">  
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="logo animated bounceInDown">
                {{HTML::decode(HTML::linkRoute('fooldal','<h1>Tardona.hu</h1>',array(),array('class'=>'logo-link')))}}
            </div>
        </div>
    </div>

    <div class="container header-bottom">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2 class="welcome animated bounceInRight">Köszöntjük Tardona község weboldalán!</h2>
            </div>
        </div> 

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="top-bar">
                            <!--form>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Keresés..." />
                                    <span class="input-group-btn">
                                        <button class="btn btn-tardona-yellow" type="button"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form-->                      
                            @yield('breadcrumb')
                </div>
            </div>
        </div> 
    </div>

</header>