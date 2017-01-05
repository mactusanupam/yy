@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body 
        {            
            font-family: 'Lato';

            color: black;
            background-color: #5959a6;
                 
        }
        
        h1 
        {
            font-size: 200%;
            color: purple;
            font-weight: bold;
        }
        h2 
        {
            font-size: 100%;
            color: purple;
            font-weight: bold;
        }
        h3 
        {
            font-size: 90%;
            color: purple;
        }
        .fa-btn 
        {

        }

       
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                 @if (Auth::user()->Role =='Admin')
                    <ul class="nav navbar-nav navbar-down">                    
                        <li><a href="{{ url('/PdfReportByUserName') }}"><h2>Report By Username</h2></a></li>
                        <li><a href="{{ url('/PdfReportByProjectName') }}"><h2>Report by Project_name</h2></a></li>
                        <li><a href="{{ url('/filterdate') }}"><h2>Service Log Report</h2></a></li>
                        <li><a href="{{ url('/Taxfilterdate') }}"><h2>Service Tax</h2></a></li>
                        
                    

                  <!--  <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/home') }}"><h2>HOME</h2></a></li>
                    </ul> -->
                 
                @else
                    <ul class="nav navbar-nav navbar-down">  
                        <li><a href="{{ url('/PdfReport') }}"><h2>Project Report</h2></a></li>
                        <li><a href="{{ url('/filterdate') }}"><h2>Service Log Report</h2></a></li>
                    </ul>  

              <!--       <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/home') }}"><h2>HOME</h2></a></li>
                    </ul> -->
                   
                @endif

                  
              
            </div>
        </div>
    </nav>

    @yield('content')

</body>
</html>

@endsection