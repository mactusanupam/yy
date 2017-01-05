@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/SubmitServiceLog'),url('/Generateservicelog') }}" >
{!! csrf_field() !!}
<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>

<style>

hg1 {
  font-weight: bold;
  font-size: 170%;
  color: #9ffea9;
  margin-left:600px;
}

m1{
  margin-left:100px;
}

table, th, td {
     border: 1px solid black;
    border-collapse: collapse;
    background-color: #f1f1c1;
    margin-top:50px;
    margin-left:50px;
}
th, td {
    padding: 5px;
    text-align: left;    
}
.foo {
    width: 500px;
}
m1{
  margin-left:50px;
}

</style>


<table border=1 style=width:90%>
 <hg1>Service Log Entry</hg1> ;
<tr>

        <td >Service ID: </td>
        <td> <input type='text' name='Service_ID' value=''> </td>

        <td >Description: </td>
        <td colspan='3' > <input type='text' name='Description' value='' style=width:99.5% > </td>
               
</tr>

<tr>
        <td> Call Recieved Date: </td>
        <td> <input type='Text' id="callrecieveddate"  name="callrecieveddate"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("callrecieveddate", "ddMMyyyy" )' style="cursor:pointer"/> 

        <td >Company Name: </td>
        <td> {{ Form::select('CompanyName', $customer_options) }}  </td>   

        <td >Customer Name: </td>
        <td> <input type='text' name='Customername' value='' style=width:99% ></td>

        
</tr>
 

<tr>
        <td >Project Name:  </td>    
        <td colspan='2'> {{ Form::select('Project_Name', $Project_options) }} </td>

        <td >Site Name: </td>   
        <td colspan='2'> {{ Form::select('Site', $site_options ) }} </td>
        
      
</tr>

<tr>
        <td>Service Start Date:  </td>
        <td> <input type='Text' id="Servicestartdate"  name="Servicestartdate"  style=width:90% />
             <img src='newdt/images/cal.gif'  onclick='javascript:NewCssCal("Servicestartdate", "ddMMyyyy")' style="cursor:pointer"/>
        <td> Service End Date: </td>
        <td> <input type='Text' id="Serviceenddate" name="Serviceenddate" style=width:90% />
             <img src='newdt/images/cal.gif' onclick='javascript:NewCssCal("Serviceenddate", "ddMMyyyy" )' style="cursor:pointer"/>
        <td> Service Person </td>
        <td> {{ Form::select('User_name', $user_options) }}</td>

</tr>

<tr>
        <td>Customer Feedbck:  </td>
        <td colspan='3'><input type='text' name='Customer_Feedback' value='' style=width:99% ></td>
        <td> Customer Rating: </td>
        <td> {{ Form::select('Rating', $rating_options) }}</td>
         

</tr>

<tr>

        <td>Effort Spent(in hours):  </td>
        <td><input type='text' name='effort' value='' style=width:99% ></td>
        <td> Action: </td>
        <td colspan='3'><input type='text' name='Action' value='' style=width:99% ></td>
         

</tr>
 
</table>

<br> 
<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit' size='40'>Submit</button> </m1></td>
 <div class="btn-group btn-group-lg">
    <a  href="{{ url('/Editservicelog') }}" class="btn btn-primary">Edit</a>
</div>

<div class="btn-group btn-group-lg">
    <a  href="{{url('/Generateservicelog') }}" class="btn btn-primary" type='submit' value ='submit' type='submit'>Generate Report</a>
</div>


</form>

@endsection

