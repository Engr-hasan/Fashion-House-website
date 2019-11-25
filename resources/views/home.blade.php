<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fashion-House</title>
    <meta name="description" content="Metro Admin Template.">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="bootstrap-style" href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link id="base-style" href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
    <div class="navbar">
        @include('layouts.header')
    </div>

    <div class="container-fluid-full">
        <div class="row-fluid">
            @include('layouts.sidebar')
            <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
            </noscript>

            <div id="content" class="span10">
                <div class="row-fluid">
                    @include('layouts.dashboard')
                    @yield('contents')
                </div>
            </div>
        </div>
    </div>

    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Settings</h3>
        </div>
        <div class="modal-body">
            <p>Here settings can be configured...</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
            <a href="#" class="btn btn-primary">Save changes</a>
        </div>
    </div>

    <div class="clearfix"></div>

    @include('layouts.footer')

    <script src="{{asset('admin/js/jquery-1.9.1.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery-migrate-1.0.0.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery-ui-1.10.0.custom.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.ui.touch-punch.js')}}"></script>

    <script src="{{asset('admin/js/modernizr.js')}}"></script>

    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.cookie.js')}}"></script>

    <script src='{{asset('admin/js/fullcalendar.min.js')}}'></script>

    <script src='{{asset('admin/js/jquery.dataTables.min.js')}}'></script>

    <script src="{{asset('admin/js/excanvas.js')}}"></script>

    <script src="{{asset('admin/js/jquery.flot.js')}}"></script>

    <script src="{{asset('admin/js/jquery.flot.pie.js')}}"></script>

    <script src="{{asset('admin/js/jquery.flot.stack.js')}}"></script>

    <script src="{{asset('admin/js/jquery.flot.resize.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.chosen.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.uniform.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.cleditor.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.noty.js')}}"></script>

    <script src="{{asset('admin/js/jquery.elfinder.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.raty.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.iphone.toggle.js')}}"></script>

    <script src="{{asset('admin/js/jquery.uploadify-3.1.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.gritter.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.imagesloaded.js')}}"></script>

    <script src="{{asset('admin/js/jquery.masonry.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.knob.modified.js')}}"></script>

    <script src="{{asset('admin/js/jquery.sparkline.min.js')}}"></script>

    <script src="{{asset('admin/js/counter.js')}}"></script>

    <script src="{{asset('admin/js/retina.js')}}"></script>

    <script src="{{asset('admin/js/custom.js')}}"></script>
</body>
</html>
