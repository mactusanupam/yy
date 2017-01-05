@extends('layouts.appother')

@section('content')

<form class="form-horizontal" role="form" method="POST">
<center>
{{ Html::image($username,'a picture', array('class' => 'thumb','width' => 150, 'height' => 150, 'align' => "center")) }}
</center>
{!! csrf_field() !!}

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
    
    margin-left:440px;
    margin-top: 70px;
   	background-color :ALICEBLUE;
   	text-align: center;
}

hg1 {
	font-weight: bold;
	font-size: 170%;
  color: #9ffea9;
	margin-left:480px;
}
</style>';

echo "<table border=2 style=width:40%>
<tr>
	
	<th style=width:30%>Details</th> 
	<th style=width:10%>Designation</th> 
	
 </tr>";
	 	
	  for ($i = 0; $i < count($data1) ; $i++)
    {
          echo "<tr>
          			     <td>".$data1[$i]->MemeberDetails."</td>
					           <td>".$data1[$i]->Designation."</td>
			         	</tr>"; 
		  
    }



echo "</table>"
?>


</form>
@endsection