@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/submitprojectname') }}">
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
  margin-left:50px;
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


</style>';

<hg1>Add New Project</hg1>

<table border=1 style=width:90%>
<tr>
        <th colspan='6'><center>Details</center></th> 
</tr>

<tr>
        <td >Customer name: </td>
        <td colspan='5' > {{ Form::select('customer_name' , $customer_options ) }} </td>
               
</tr>

<tr>
        <td> PO Date: </td>
        <td> <input type='Text' id="POdate"  name="POdate"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("POdate", "ddMMyyyy" )' style="cursor:pointer"/> 
        <td >PO Number: </td>
        <td> <input type='text' name='PO_number' value='' maxlength="20" style=width:99% ></td>             
        <td >PO Value: </td>
        <td> <input type='text' name='PO_value' value='' style=width:99% ></td>

        
</tr>

<tr>
        <td >Prj Description: </td>
        <td colspan='5'> <input type='text' name='PO_Description' value='' style=width:99.5% ></td>
        
</tr>

<tr>
        <td >Project ID:  </td>    
        <td> <input type='text' name='project_id' value=''  style=width:99% ></td>
        <td >Project Name: </td>   
        <td> <input type='text' name='project_name' value=''  style=width:99%  ></td>
        <td >Project Status: </td> 
        <td> {{ Form::select('project_status' , $status_options ) }} </td>
      
</tr>

<tr>
        <td> Prj. Start Date:  </td>
        <td> <input type='Text' id="projectstartdate"  name="projectstartdate"  style=width:90% />
             <img src='newdt/images/cal.gif'  onclick='javascript:NewCssCal("projectstartdate", "ddMMyyyy")' style="cursor:pointer"/>
        <td> Prj. End Date: </td>
        <td> <input type='Text' id="projectenddate" name="projectenddate" style=width:90% />
             <img src='newdt/images/cal.gif' onclick='javascript:NewCssCal("projectenddate", "ddMMyyyy" )' style="cursor:pointer"/>
        <td> Prj. Est. Days:</td>
         <td>
    <?php
    echo Form::selectRange('number', 10, 500);
    ?>
</td>
        <!--td> <input type='text' name='Estimated_Time' value='' size='25' style=width:99% ></td-->

</tr>
 
</table>

<br> 
<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit' size='40'>Submit</button> </m1></td>
<div class="btn-group btn-group-lg">
              <a  href="http://localhost:8000/viewprojects" class="btn btn-primary">Estimated</a>
             
            </div>
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