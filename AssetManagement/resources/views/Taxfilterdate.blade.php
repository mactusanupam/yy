@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/generateservicetaxlogreport') }}">
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
  margin-left:150px;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    background-color: #f1f1c1;
    margin-top:50px;
    margin-left:150px;
}
th, td {
    padding: 5px;
    text-align: left;    
}
.foo {
    width: 500px;
}


</style>

<hg1>Select Date</hg1>

<table border=1 style=width:70%>

<tr>
         <td> Start Date:  </td>
        <td> <input type='Text' id="ReportFrom"  name="ReportFrom"  style=width:50% />
             <img src='newdt/images/cal.gif'  onclick='javascript:NewCssCal("ReportFrom", "ddMMyyyy")' style="cursor:pointer"/>
        <td> End Date: </td>
        <td> <input type='Text' id="ReportTo" name="ReportTo" style=width:50% />
             <img src='newdt/images/cal.gif' onclick='javascript:NewCssCal("ReportTo", "ddMMyyyy" )' style="cursor:pointer"/>
        
</tr>


 
</table>

<br> 
<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit' size='40'>Submit</button> </m1></td>

</form>

@endsection
