@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/submitprojectstatus') }}">
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
    
    margin-left:300px;
    margin-top:10px;
    background-color:ALICEBLUE;
}

hg1 {
  font-weight: bold;
  font-size: 170%;
  color: #9ffea9;
  margin-left:500px;
}

</style>';


echo '<hg1>Access Reader Data Entries</hg1>';

echo "<table border=2 style=width:56%>
<tr>
  <th style=width:10%> ID </th>
  <th style=width:30%> User Name</th> 
  <th style=width:30%> Date Time</th>  
 
</tr>";
  
 
  for ($i = 0; $i < count($data) ; $i++)
    {
          echo "<tr><td>".($i+1)."</td>
                <td>".$data[$i]->UserName."</td>
          <td>".$data[$i]->INREC_DateTime."</td>
          
        </tr>"; 

      
    }


echo "</table>"
?>



</form>

@endsection