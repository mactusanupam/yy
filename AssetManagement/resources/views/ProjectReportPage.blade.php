@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    

    <style>
        body 
        {            
            font-family: 'Lato';

            color: black;
            background-color: #5959a6;
                 
        }
        .div3 {
     height: 80px;
     width: 1100px;
     font-family:Arial, Helvetica, sans-serif;
     font-size: 150%;
     background-color:#9999ff;
     margin-left:120px;
     margin-top:7px;
     text-align: center;
    
}

.div4 {
     height: 150px;
     width: 1100px;
     font-size: 120%;
     font-family:Arial, Helvetica, sans-serif;
     font-size: 150%;
     background-color:#f1f1c1;
     margin-left:120px;
     margin-top:7px;
     
    
}

.div5 {
     height:240px;
     width: 1100px;
     font-family:Arial, Helvetica, sans-serif;
     font-size: 120%;
     background-color:#f1f1c1;
     margin-left:120px;
     margin-top:7px;
     
     
}

h5 {
    font-weight: bold;
    font-size: 180%;
    color: LAVENDERBLUSH;
    margin-top:15px;
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
   
            
                 @if (Auth::user()->Role =='Admin')
                 <div class='div5'>
                    <ul >  
                        <br>                  
                        <a href="{{ url('/PdfReportByUserName') }}"><h2>Report By Username</h2></a>
                        <a href="{{ url('/PdfReportByProjectName') }}"><h2>Report by Project Name</h2></a>
                       
                    </ul>
                  <!--  <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/home') }}"><h2>HOME</h2></a></li>
                    </ul> -->
                </div>
                 
                @else
                <div class='div4'>
                    <ul>  
                        <br>
                        <a href="{{ url('/PdfReport') }}"><h2>Project Report</h2></a>
                       
                    </ul>  
                </div>

              <!--       <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/home') }}"><h2>HOME</h2></a></li>
                    </ul> -->
                   
                @endif
    </div>

                  
              
            
        
    

   
</body>
</html>

@endsection