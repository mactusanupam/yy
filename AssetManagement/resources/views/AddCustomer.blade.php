@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/SubmitNewCustomer') }}">
{!! csrf_field() !!}
<?php
echo '<style>
th {
  height: 30px;
  width: 100px;
  font-weight: bold;
  text-align: center;
  background-color: orange;
  font-size: 150%;
}

table{
    
    margin-left:100px;
    margin-top:50px;
    background-color :ALICEBLUE;
}

hg1 {
	font-weight: bold;
	font-size: 170%;
  color: #9ffea9;
	margin-left:550px;
}
m1{
  margin-left:100px;
}
</style>';
echo '<hg1>Add Customer Details</hg1>';
echo "<table border=1 style=width:80%><tr>
<th style=width:5%> Customer ID</th>
<th style=width:20%> Customer Name</th>
<th style=width:45%> Address </th> 
<th style=width:10%> Contact Details </th>
</tr>";
    echo "<tr>
	  		 		<td ><input type='text' name='Customer_Id' value='' size='20'></td>
            <td ><input type='text' name='Customer_Name' value='' size='40'></td>
            <td ><input type='text' name='Address' value='' size='80'></td>
            <td ><input type='text' name='Contact_Details' value='' size='20'></td>
				</tr>"; 


				

//echo "<td><button type='submit' value ='submit' type='submit'>Submit</button> </td>";


echo "</table>";
echo "<br>";
echo "<td><m1><button  class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1> </td>";


?>
</form>

@endsection