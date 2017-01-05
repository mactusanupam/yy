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
                      <!--  <a href="{{ url('/PdfReportByUserName') }}"><h2>Define Relationship</h2></a>-->
                        <li><a href="{{ url('/DefineRelationship') }}"><h2>Define Relationship</h2></a></li>
                        <li><a href="{{ url('/AppraisalDetails') }}"><h2>Appraisal Details</h2></a></li>
                        <li><a href="{{ url('/AddOrganizationGoals') }}"><h2>Add Organization Goals</h2></a></li>
                        <!--<a href="{{ url('/Taxfilterdate') }}"><h2>Service Tax</h2></a>
                        <a href="{{ url('/Pendingfilterdate') }}"><h2>Pending Payment </h2></a>-->
                    
                    </ul>
                  <!--  <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/home') }}"><h2>HOME</h2></a></li>
                    </ul> -->
                </div>
                 
                @elseif (Auth::user()->Role =='Manager')
                <div class='div4'>
                    <ul>  
                        <br>
                        <a href="{{ url('/AppraisalInformation') }}"><h2>Appraisal Information</h2></a>
                       <!-- <a href="{{ url('/filterdate') }}"><h2>Service Log Report</h2></a>-->
                    </ul>  
                </div>

            @else 
                <div class='div4'>
                    <ul>  
                        <br>
                        <a href="{{ url('/AppraisalInformation') }}"><h2>Appraisal Information</h2></a>
                       <!-- <a href="{{ url('/AppraisalInformation') }}"><h2>Information</h2></a>
                        <a href="{{ url('/filterdate') }}"><h2>Service Log Report</h2></a>-->
                    </ul>  
                </div>
                    </ul> -->
                   
                @endif
    </div>

                  
              
            
        
    

   
</body>
</html>

@endsection