@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/generatependinglogreport') }}">
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
        <th><center></center></th> 
</tr>



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
<td><m1><button type='submit' class='btn btn-primary btn-lg' value ='submit' type='submit' size='40'>Submit</button> </m1></td>
 

</form>

@endsection
<!-- 

<th style=width:20%> Estimated Start<br> Date</th>
<th style=width:20%> Estimated End<br> Date</th>
<th style=width:10%> Estimated Time<br>(in Hours)*</th>
<th style=width:1%> Status </th>


            "<td> <input type='Text' id=".  '"projectstartdate"'.  " name=".'"projectstartdate"'.  ' maxlength="35" size="30"/>'.
        "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'projectstartdate'".','. "'ddMMyyyy'".','."'dropdown'".','."true".','."'14'".')"'. 'style=cursor:pointer/>'.
 
      "<td> <input type='Text' id=".  '"projectenddate"'.  " name=".'"projectenddate"'.  ' maxlength="35" size="30"/>'.
        "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'projectenddate'".','. "'ddMMyyyy'".','."'dropdown'".','."true".','."'24'".')"'. 'style=cursor:pointer/>'.
             "<td ><input type='text' name='Estimated_Time' value='' size='30'></td>".
            "<td >".Form::select('Project_Status', $status_options )." </td>

-->