@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/SubmitAddOrganizationGoals') }}">
{!! csrf_field() !!}
<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>

<style>

hg1 {
	font-weight: bold;
	font-size: 170%;
    color: #9ffea9;
	margin-left:550px;
}

m1{
  margin-left:100px;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    background-color: #f1f1c1;
    margin-top:50px;
    margin-left:100px;
}
th, td {
    padding: 5px;
    text-align: left;    
}
.foo {
    width: 500px;
}


</style>



<table border=1 style=width:80%>
<hg1>Add Organizational Goal</hg1>
<tr>
        <th colspan='4'><center>Details</center></th> 
</tr>

<tr>

        <td >Organization Goal ID: </td>
        <td><input type='text' name='goalid' value='' style=width:99% > </td>

        <td >Organization Goal Description: </td>
        <td><input type='text' name='goaldescription' value='' style=width:99% > </td>
               
</tr>


 
</table>

<br> 
<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit' size='40'>Submit</button> </m1></td>

</form>

@endsection
