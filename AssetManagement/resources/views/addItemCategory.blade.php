@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/dbaddCategory') }}">
<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>

{!! csrf_field() !!}

<style>

hg1 {
  font-weight: bold;
  font-size: 170%;
  color: #9ffea9;
  margin-left:500px;
}



table, th, td {
     
    border-collapse: collapse;
    background-color: #f1f1c1;
    margin-top:40px;
    margin-left:130px;
}
table td {

        height: 30px;

        padding: 3px !important;
    }
    table td input {

        size: 30 !important;
    }


</style>


<table style=width:50%>
 <hg1>Item-Category Details</hg1>
<tr>

        <td >Item Category: </td>
        <td> <input type='text' name='Category' id='category1' style = width:70%> </td></tr>

       <tr> <td colspan="2"><button class='btn btn-primary' type='submit' value ='submit' type='submit'>Submit</button></td>

        
               
</tr>
</table>

</form>

@endsection




