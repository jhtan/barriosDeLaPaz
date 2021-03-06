<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="jhtan">
  <link rel="icon" href="{{asset('images/favicon.png')}}">

  <title>Desde Mi Calle</title>

  <!-- Bootstrap core CSS -->
  <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/icons.css')}}" rel="stylesheet">
  <link href="{{asset('css/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Leaflet CSS, Fuck you OL
    ------>
    <link href="{{asset('leaflet/leaflet.css')}}" rel="stylesheet">

  <!-- Font Awesome core CSS -->
  <link type="text/css" rel="stylesheet" href="{{asset('vendor/font-awesome-4.2.0/css/font-awesome.min.css')}}">

  <!-- Site styles -->
<!--  <link type="text/css" rel="stylesheet" href="{{asset('css/styles.css')}}">-->
<!--  <link type="text/css" rel="stylesheet" href="{{asset('css/home.css')}}">-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body id="bg-image">

<div class="pre-loader">
    <div class="load-con">
        <span class="icon-location icon-big"></span>
        <p>Un Momento por favor</p>
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>
<nav id="main-menu" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="/" class="view-mobile logo-style"><img src="{{asset('images/icon.png')}}"/> Desde mi Calle</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse navbar-left">
            <ul class="nav navbar-nav">
                <li class="active view-devices"><a href="/"><span class="icon-location icon-medium"></span></a></li>
                <li><a href="/claims">Ver Reclamos</a></li>
                <li><a href="/about_us">Acerca de nosotros</a></li>
                {{--<li><a href="/publicWorks">Ver Obras Públicas</a></li>--}}
                {{--<li><a href="/informationRequests">Pedir Información</a></li>--}}
                <li><a href="/presentation" target="_blank">Presentación</a></li>
                <li>
                    <form action="" method="get" id="search" class="search-form">
<!--                        <input type="text" class="" name="k" data-default="100" placeholder="Buscar..."/><span class="icon-search icon-medium"></span>-->
                    </form>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                @if(!Auth::check())
                    <li><a class="btn btn-sm btn-info" href="/users/login"><span class="icon-key2 icon-medium"></span> Ingresa</a></li>
                    <li><a class="btn btn-sm btn-success" href="/register"><span class="icon-clipboard icon-medium"></span> ¡Regístrate!</a></li>
                @else
                    @if(User::find(Auth::id())->can('edit_users'))
                        <li><a class="btn btn-sm btn-info" href="/users/admin"><i class="fa fa-sign-out"></i> Administrar Usuarios</a></li>
                    @endif

                    @if(User::find(Auth::id())->can('edit_claims'))
                        <li><a class="btn btn-sm btn-info" href="/claims/admin"><i class="fa fa-sign-out"></i> Administrar Reclamos</a></li>
                    @endif

                    <li><a class="btn btn-sm btn-info" href="/users/show/{{Auth::user()->username}}"><i class="fa fa-user"></i> Hola! {{Auth::user()->username}}</a></li>
                    <li><a class="btn btn-sm btn-success" href="/logout"><i class="fa fa-sign-out"></i> Salir</a></li>
                @endif
            </ul>
        </div>
    </div><!--/.container-->
</nav>
<nav class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container-fluid">
        <span>Desarrollado por <br> ACM - SIM 2015</span>
        <div class="navbar-right nav-social">
            <ul class="nav navbar-nav">
                <li><a href="https://www.facebook.com/pages/Desde-Mi-Calle/987236891288482" target="_blank"><span class="icon-facebook2 icon-medium"></span></a></li>
                <li><a href="https://twitter.com/desdemicalle" target="_blank"><span class="icon-twitter2 icon-medium"></span></a></li>
                <li><a href="https://plus.google.com/103308417766830369471" target="_blank"><span class="icon-google-plus2 icon-medium"></span></a></li>
                <li><a href="https://github.com/BoliviaTechHub/DesdeMiCalle" target="_blank"><span class="icon-github4 icon-medium"></span></a></li>
            </ul>
        </div>
    </div><!--/.container-->
</nav>

@yield('content')

<!-- jQuery
================================================== -->
<!--<script type="text/javascript" src="{{asset('vendor/jQuery/jquery-2.1.3.min.js')}}"></script>-->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Bootstrap core JavaScript -->
<!--<script type="text/javascript" src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>-->
<!--<script type="text/javascript" src="{{asset('vendor/bootstrap/assets/docs.min.js')}}"></script>-->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/bootstrap/assets/docs.min.js')}}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script type="text/javascript" src="{{asset('vendor/bootstrap/assets/ie10-viewport-bug-workaround.js')}}"></script>

<!-- My JS files
================================================== -->
<script type="text/javascript" src="{{asset('js/Users.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Claims.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Components/ModalConfirmation.js')}}"></script>
<script type="text/javascript" src="{{asset('js/retina-1.1.0.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.bootstrap.wizard.js')}}"></script>

<!-- Open Layers library for Open Street Maps
================================================== -->
{{--<script type="text/javascript" src="{{asset('js/openLayers/ol.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('OpenLayers/OpenLayers.js')}}"></script>--}}

<!-- Fuck You Open Layers
================================================== -->
<script type="text/javascript" src="{{asset('js/OSMIntegration.js')}}"></script>
<script type="text/javascript" src="{{asset('leaflet/leaflet.js')}}"></script>


<!-- custom scrollbar plugin -->
<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<script>
    $(document).ready(function() {
        appMaster.preLoader();
    });
    $('.carousel').carousel({
        interval: 10000 //changes the speed
    });
</script>
<script>
    $(document).ready(function() {
        appMaster.preLoader();
    });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    (function($){
        $(window).load(function(){

            /* all available option parameters with their default values */
            $("#sidebar-wrapper-content").mCustomScrollbar({
                axis:"y",
                scrollbarPosition:"inside",
                theme:"light"
            });

        });
    })(jQuery);
</script>


<!-- Datetime Picker -->
<script src="{{asset('js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>


<!-- Popup Window for share to Twitter -->
<script>
    $('.popup').click(function(event) {
        var width  = 575,
                height = 400,
                left   = ($(window).width()  - width)  / 2,
                top    = ($(window).height() - height) / 2,
                url    = this.href,
                opts   = 'status=1' +
                        ',width='  + width  +
                        ',height=' + height +
                        ',top='    + top    +
                        ',left='   + left;

        window.open(url, 'twitter', opts);

        return false;
    });
</script>

</body>
</html>