@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/inventory_outreport') }}">
{!! csrf_field() !!}

<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>
<style>
.navbar-static-top {

      z-index: 0;
    }
    </style>

<?php
echo '<style>
th {
  height: 30px;
  width: 100px;
  font-weight: bold;
  text-align: center;
  background-color: orange;
}

table{
    
    margin-left:10%;
    margin-top:5%;
    background-color:#f1f1c1;
}


hg1 {
  font-weight: bold;
  font-size: 170%;
	color: #9ffea9;
  margin-left: 35%;
  
}
m1{
	margin-left:140px;
}


</style>';


echo '<hg1>Inventory Out Report</hg1>';
//echo'<hg1>"<img src='.'"Chrysanthemum.jpg"''></hg1><br>"';
echo "<table border=2 style=width:70%>
<tr>
	 
	<th style=width:9%> Report From </th> 
	<th style=width:9%> Report To </th>
	
	<th style=width:5%> Project Name </th>
	
 
</tr>";
	$username = Auth::user()->name;
	$i = 0;
	
	echo "<tr>
	  		 		<td> <input type='Text' id=".  '"ReportFrom"'.  " name=".'"ReportFrom"'.  ' maxlength="30" size="32"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'ReportFrom'".','. "'yyyyMMdd'".','."'dropdown'".')"'. 'style=cursor:pointer/>'.
 
 					 "<td> <input type='Text' id=".  '"ReportTo"'.  " name=".'"ReportTo"'.  ' maxlength="30" size="32"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'ReportTo'".','. "'yyyyMMdd'".','."'dropdown'".')"'. 'style=cursor:pointer/>'.
    

	  		 		
	  		 		"<td>".Form::select('Project_name', $projectdetails )." </td></tr></table>"; 

		
 echo "<br>";   
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";

 /*for($i=0;$i<sizeof($totalamount['item']);$i++)
 {
 echo  "item:-".$totalamount[$i]->item;
}*/


?>

</form>


@endsection