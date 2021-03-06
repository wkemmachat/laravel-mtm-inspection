<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Kem -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Jquery UI -->
    <link href="{{ asset('assets/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet">



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li></li>
                            {{--  <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <font color='blue'>{{ Auth::user()->name }}</font> <span class="caret"></span>
                                </a>
                            </li>  --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <font color="green">Data</font>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->role==="root"||Auth::user()->role==="repair")
                                        <a class="dropdown-item" href="{{ route('inspection.index') }}">Repair</a>
                                    @endif
                                    @if (Auth::user()->role==="root"||Auth::user()->role==="welding")
                                        <a class="dropdown-item" href="{{ route('dot.index') }}">New Tank WELDING</a>
                                    @endif
                                    @if (Auth::user()->role==="root"||Auth::user()->role==="fg")
                                        <a class="dropdown-item" href="{{ route('dot.show_fg') }}">New Tank FG</a>
                                    @endif

                                    @if (Auth::user()->role==="root")
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('inspection.data') }}">Repair Data</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('dot.data') }}">New Tank Data</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('customer.index') }}"><font color='brown'>Customer</font></a>
                                        <a class="dropdown-item" href="{{ route('customer.data') }}"><font color='brown'>Customer Data</font></a>
                                    @endif


                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <font color='blue'>{{ Auth::user()->name }}</font> <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    <a class="nav-link" href="{{ route('logout.logout') }}">Logout</a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<!-- Scripts -->
{{--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  --}}
<!-- Jquery UI -->
<script src="{{ asset('assets/jquery-ui-1.12.1/jquery-ui.min.js') }}" defer></script>



<script>
        {{-- @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif --}}
</script>

@yield('scripts')

<script type="text/javascript">

    function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }


    function c1_select(){
        document.getElementById('C1').style.display ='block';
        document.getElementById('C2').style.display ='none';
        document.getElementById('CM1').style.display ='none';
        document.getElementById('CM2').style.display ='none';
    }
    function c2_select(){
        document.getElementById('C1').style.display ='none';
        document.getElementById('C2').style.display ='block';
        document.getElementById('CM1').style.display ='none';
        document.getElementById('CM2').style.display ='none';
    }
    function cm1_select(){
        document.getElementById('C1').style.display ='none';
        document.getElementById('C2').style.display ='none';
        document.getElementById('CM1').style.display ='block';
        document.getElementById('CM2').style.display ='none';
    }
    function cm2_select(){
        document.getElementById('C1').style.display ='none';
        document.getElementById('C2').style.display ='none';
        document.getElementById('CM1').style.display ='none';
        document.getElementById('CM2').style.display ='block';
    }

    function f1_select(){
        document.getElementById('F1').style.display ='block';
        document.getElementById('F2').style.display ='none';
        document.getElementById('FM1').style.display ='none';
        document.getElementById('FM2').style.display ='none';
    }

    function f2_select(){
        document.getElementById('F1').style.display ='none';
        document.getElementById('F2').style.display ='block';
        document.getElementById('FM1').style.display ='none';
        document.getElementById('FM2').style.display ='none';
    }

    function fm1_select(){
        document.getElementById('F1').style.display ='none';
        document.getElementById('F2').style.display ='none';
        document.getElementById('FM1').style.display ='block';
        document.getElementById('FM2').style.display ='none';
    }

    function fm2_select(){
        document.getElementById('F1').style.display ='none';
        document.getElementById('F2').style.display ='none';
        document.getElementById('FM1').style.display ='none';
        document.getElementById('FM2').style.display ='block';
    }

    function s1_select(){
        document.getElementById('S1').style.display ='block';
        document.getElementById('S2').style.display ='none';
    }

    function s2_select(){
        document.getElementById('S1').style.display ='none';
        document.getElementById('S2').style.display ='block';
    }

    $( document ).ready(function() {


        $('#retest_date').datepicker({
            dateFormat: 'dd-mm-yy'
        });

        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy'
        });

        $('.serialmask').mask('AAAA-AAA-AAA');
        $('.manu_month_year').mask('00-00');

        $(".numeric_number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                 // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                 // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });



        $('#expand_radio').click(function(){
            $('#expand_div').show();
        });
        $('#hydro_radio').click(function(){
            $('#expand_div').hide();
        });

        $('#expand_div').hide();


        document.getElementById('S1').style.display ='none';
        document.getElementById('S2').style.display ='none';

        document.getElementById('C1').style.display ='none';
        document.getElementById('C2').style.display ='none';
        document.getElementById('CM1').style.display ='none';
        document.getElementById('CM2').style.display ='none';

        document.getElementById('F1').style.display ='none';
        document.getElementById('F2').style.display ='none';
        document.getElementById('FM1').style.display ='none';
        document.getElementById('FM2').style.display ='none';



    });

    window.setTimeout(function() {
        $(".alert_message").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
        });
      }, 2000);
</script>
</html>
