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
    <link rel="stylesheet" href="/doozie/css/sweetalert.css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')               }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.css')             }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')                   }}">
    <script src="{{asset('js/jquery.min.js')                  }}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body 
        {            
            font-family: 'Lato';

            color: black;
            background-color: #4da6ff;
                 
        }
        
        h1 
        {
            font-size: 200%;
            color: #9ffea9;
            font-weight: bold;
        }
        h2 
        {
            font-size: 100%;
            color: #5959a6;
            font-weight: bold;
        }
        h3 
        {
            font-size: 90%;
            color: purple;
            text-align: center;
        }
        h4 
        {
            font-size: 75%;
            text-align: center;
        }
        
}
        .fa-btn 
        {

        }

       
    </style>
</head>


<body id="app-layout">

    <ul>
        <h1><center>Asset Tracking Management</center><h1>
    </ul>
          
    <nav class="navbar navbar-default navbar-static-top">
        <div class="collapse navbar-collapse" id="app-navbar-collapse"  >
            <ul class="nav navbar-nav navbar-top"  >
                <li style= "margin-left: 10px" ><h2> {{ Html::image('img/mactus.gif', 'a picture', array('class' => 'thumb')) }} </h2></li>
                <li ><a href="{{ url('/home') }}"><h2>Home</h2></a></li>


                <!--li class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><h2>
                       Inventory</h2></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/inventory') }}">Inventory In</a></li>
                        <li><a href="{{ url('/invoicein') }}">Inventory In Report</a></li>
                        <li><a href="{{ url('/inventoryout') }}">Inventory Out</a></li>
                        <li><a href="{{ url('/invoiceout') }}">Inventory Out Report</a></li>
                        <li><a href="{{ url('/ItemReportView') }}">Item-Report</a></li>
                        <li><a href="{{ url('/pdfview') }}">Item-Quantity Report</a></li>
                        <li><a href="{{ url('/additemview') }}">Add item in System Record</a></li>
                         <li><a href="{{ url('/addItemCategory') }}">Add Item Category in System Record</a></li>

                         <li><a href="{{ url('/inventorysell') }}">ItemSort Report</a></li>>
                    </ul>
                </li-->


                   <li class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><h2>
                       Asset Tracking API</h2></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/geolocation') }}">Vehicle Tracking</a></li>
                        <li><a href="{{ url('/Multimarker') }}">More Than one Vehicles Tracking</a></li>
                        
                    </ul>
                </li>
                 


                <!--li class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><h2>
                       Project</h2></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/project') }}">TimeSheet</a></li>
                        <li><a href="{{ url('/ProjectReport') }}">Report</a></li>
                        <li><a href="{{ url('/chart') }}">Effort Chart</a></li>

                    </ul>
                </li>


                <li class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><h2>
                       Attendance</h2></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/ApplyLeave') }}">Leave</a></li>
                        <li><a href="{{ url('/LeaveReport') }}">Leave Report</a></li>
                        <li><a href="{{ url('/accreader') }}">Report</a></li>
                        <li><a href="{{ url('/ManualEntry') }}">Manual Time Entry</a></li>

                         
                    </ul>
                </li>


                <li class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><h2>
                       Service</h2></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/ServiceLog') }}">Service Log</a></li>
                        <li><a href="{{ url('/filterdate') }}">Report</a></li>
                        
                        
                    </ul>
                </li-->


             

                    <!--<li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><h2>
                           Functions</h2></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/InvoiceInformation') }}">Financial Management</a></li>

                            <li><a href="{{ url('/underdevelopment') }}">Procurement Process</a></li>

                            <li><a href="{{ url('/AppraisalPage') }}">Appraisal Management</a></li>
                         
                        </ul>
                    </li>-->


                    <!--li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><h2>
                           Financial </h2></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/InvoiceInformation') }}">Invoice Information</a></li>
                            <li><a href="{{ url('/Taxfilterdate') }}">VAT and Service Tax</a></li>
                            <li><a href="{{ url('/Pendingfilterdate') }}">Pending Payment</a></li-->

                          <!--  <li><a href="{{ url('/underdevelopment') }}">Procurement Process</a></li>

                            <li><a href="{{ url('/AppraisalPage') }}">Appraisal Management</a></li>-->
                         
                        <!--/ul>
                    </li>

                     <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><h2>
                           Appraisal </h2></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                             
                            <li><a href="{{ url('/AppraisalPage') }}">Appraisal Management</a></li> 
                         
                        </ul>
                    </li>

                    <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><h2>
                           Lead </h2></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                             <li><a href="{{ url('/AddNewLead') }}">Lead Information </a></li>
                            <li><a href="{{ url('/leadreport') }}">Report</a></li>  
                         
                        </ul>
                    </li>
            </ul-->
            

                <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())


                        <li><a href="{{ url('/login') }}" width="50"><h2>Login</h2></a></li>
                       
                        
                    @else

                         <li class="dropdown" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><h2>
                                Admin</h2></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/Addnewproject') }}">Add New Project</a></li>

                                        <li><a href="{{ url('/SiteInformation') }}">Add New Site</a></li>

                                        <li><a href="{{ url('/AddCustomer') }}">Add Customer</a></li>

                                        <li><a href="{{ url('/DisableEnableProject') }}">Enable/Disable Project</a></li>

                                        <li><a href="{{ url('/LeaveApproval') }}">Approve Leave</a></li>

                                        <li><a href="{{ url('/SubmitInformation') }}">Dashboard Information </a></li>

                                       <!-- <li><a href="{{ url('/InvoiceInformation') }}">Invoice Information </a></li>

                                        <li><a href="{{ url('/lead') }}">Lead Information </a></li>-->
                            </ul>
                        </li>
 

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><h2>
                                {{ Auth::user()->name }}</h2> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                                <li><a href="{{ url('/register') }}"><i class="fa fa-btn fa-user"></i>Register</a></li>

                                <li><a href="{{ url('/EmployeeProfile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                            </ul>
                        </li>
                    @endif

                  
                </ul>


        </div>



    </nav>
            
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
