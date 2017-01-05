@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/submitleadreport') }}">
{!! csrf_field() !!}

<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>
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
    
    margin-left:15%;
    margin-top:5%;
    background-color:ALICEBLUE;
}


hg1 {
  font-weight: bold;
  font-size: 170%;
  color: #9ffea9;
  margin-left: 35%;
  
}

m1{
  margin-left:210px
}

</style>';


echo '<hg1>Lead filter date</hg1>';

echo "<table border=2 style=width:50%>
<tr>
	 
	<th style=width:25%> Report From </th> 
	<th style=width:25%> Report To </th>
 
 
</tr>";
	$username = Auth::user()->name;
	$i = 0;
	
	echo "<tr>
	  		 		<td> <input type='Text' id=".  '"ReportFrom"'.  " name=".'"ReportFrom"'.  ' maxlength="35" size="30"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'ReportFrom'".','. "'ddMMyyyy'".','."'dropdown'".')"'. 'style=cursor:pointer/>'.
 
 					 "<td> <input type='Text' id=".  '"ReportTo"'.  " name=".'"ReportTo"'.  ' maxlength="35" size="30"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'ReportTo'".','. "'ddMMyyyy'".','."'dropdown'".')"'. 'style=cursor:pointer/>'.
    

	  		 		" 

				</tr>"; 

echo "</table>";
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";

    
//echo "<td><button type='submit' value ='submit' type='submit'>Submit</button> </td>";



?>
</form>

@endsection