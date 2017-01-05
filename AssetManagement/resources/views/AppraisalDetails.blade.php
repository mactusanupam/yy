@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/SubmitAppraisalDetails') }}">
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
  margin-left:5%;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    background-color: #f1f1c1;
    margin-top:2%;
    margin-left:5%;
}
th, td {
    padding: 0.6%;
    text-align: left;    
}
.foo {
    width: 500px;
}

b1{
    font-weight: bold;
}


</style>


<table border=1 style=width:90%>
<tr>
        <th colspan='6'><center>Appraisal Details</center></th> 
</tr>

<tr>
        <td >Appraisal ID: </td>
        <td colspan='5' > <input type='text' name='Appraisal_ID' value='' style=width:99% ></td>
               
</tr>

<tr>
        <td> Appraisal Start Period:  </td>
        <td colspan='2'> <input type='Text' id="appraisalstartfrom"  name="appraisalstartfrom"  style=width:90% />
             <img src='newdt/images/cal.gif'  onclick='javascript:NewCssCal("appraisalstartfrom", "ddMMyyyy")' style="cursor:pointer"/>

        <td> Appraisal End Period:  </td>
        <td colspan='2'> <input type='Text' id="appraisalend"  name="appraisalend"  style=width:90% />
             <img src='newdt/images/cal.gif'  onclick='javascript:NewCssCal("appraisalend", "ddMMyyyy")' style="cursor:pointer"/>


        
</tr>
<tr>
        <td colspan='6'><center><b1> Appraisal Status</b1></center></td>
</tr>

<tr>
        <td> Intial: <input name="status" type="radio" value="Initial"></td>
        <td> In Progress: <input name="status" type="radio" value="In Progress"></td>
        <td> Completed: <input name="status" type="radio" value="Completed"></td>
        <td> Approved: <input name="status" type="radio" value="Approved"></td>
        <td> Previous: <input name="status" type="radio" value="Previous"></td>
        <td> Cancelled: <input name="status" type="radio" value="Cancelled"></td>
</tr>


<tr>
        <td colspan='6'><center><b1> Goal Status</b1></center></td>
</tr>

<tr>
        <td> Intial: <input name="Goal_Status" type="radio" value="Initial"></td>
        <td> 25%: <input name="Goal_Status" type="radio" value="25%"></td>
        <td> 50%: <input name="Goal_Status" type="radio" value="50%"></td>
        <td> 75%: <input name="Goal_Status" type="radio" value="75"></td>
        <td colspan = '2'> Completed: <input name="Goal_Status" type="radio" value="Completed"></td>
</tr>


<tr>
        <td colspan='6'><center><b1> Goal Rating</b1></center></td>
</tr>

<tr>
        <td> 1  : <input name="Goal_Rating" type="radio" value="1"></td>
        <td> 3  : <input name="Goal_Rating" type="radio" value="3"></td>
        <td> 5  : <input name="Goal_Rating" type="radio" value="5"></td>
        <td> 7  : <input name="Goal_Rating" type="radio" value="7"></td>
        <td colspan = '2'> 9  : <input name="Goal_Rating" type="radio" value="9"></td>
</tr>

</table>

<br> 
<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button> </m1></td>

</form>

@endsection
