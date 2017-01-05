@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/SubmitUserAppraisal') }}">
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
  margin-left:4%;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    background-color: #f1f1c1;
    margin-top:10px;
    margin-left:50px;
}
th, td {
    padding: 5px;
    text-align: left;    
}
.foo {
    width: 500px;
}

b1{
    font-weight: bold;
}


</style>

<script>
function myFunction() {
    document.getElementById("manager").disabled = true;
}
</script>

<?php
    if(auth::user()->Role == 'User')
?>  
  

<table border=1 style=width:90%>
<tr>
        <th colspan='6'><center>Appraisal Details</center></th> 
</tr>

<tr> 
        <td >Appraisal ID: </td>
        <td> <?php  $i = 0;  echo $appID = $data[$i]->Appraisal_ID;?></td>

        <td> Appraisal Start Period:  </td>
        <td> <?php  $i = 0;  echo $data[$i]->Appraisal_period_start;?></td>

        <td> Appraisal End Period:  </td>
        <td> <?php  $i = 0;  echo $data[$i]->Appraisal_period_end;?></td>
               
</tr>


<tr>
        <td >User Name</td>
        <td colspan='2'><?php  $i = 0;  echo auth::user()->name;?></td>

        <td > Project Name</td>
        <td colspan='2'>{{ Form::select('project_options' , $project_options ) }}</td>
</tr>

<tr>
        <td colspan='6'><center><b1>Goal for the project</b1></center></td>
        
</tr>

<tr>

        <td >Goal - 1 Description: </td> 
        <td> {{ Form::select('orggoal_options1' , $orggoal_options ) }} </td>

        <td >Start Date:  </td>    
        <td> <input type='Text' id="g1startdate"  name="g1startdate"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("g1startdate", "ddMMyyyy" )' style="cursor:pointer"/>

        <td >End Date:  </td>    
        <td> <input type='Text' id="g1enddate"  name="g1enddate"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("g1enddate", "ddMMyyyy" )' style="cursor:pointer"/>

        
</tr>

<tr>

        <td >Goal - 2 Description: </td> 
        <td> {{ Form::select('orggoal_options2' , $orggoal_options ) }} </td>

        <td >Start Date:  </td>    
        <td> <input type='Text' id="g2startdate"  name="g2startdate"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("g2startdate", "ddMMyyyy" )' style="cursor:pointer"/>

        <td >End Date:  </td>    
        <td> <input type='Text' id="g2enddate"  name="g2enddate"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("g2enddate", "ddMMyyyy" )' style="cursor:pointer"/>

        
</tr>

<tr>

        <td >Goal - 3 Description: </td> 
        <td> {{ Form::select('orggoal_options3' , $orggoal_options ) }} </td>

        <td >Start Date:  </td>    
        <td> <input type='Text' id="g3startdate"  name="g3startdate"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("g3startdate", "ddMMyyyy" )' style="cursor:pointer"/>

        <td >End Date:  </td>    
        <td> <input type='Text' id="g3enddate"  name="g3enddate"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("g3enddate", "ddMMyyyy" )' style="cursor:pointer"/>

        
</tr>

<tr>

        <td >Goal - 4 Description: </td> 
        <td> {{ Form::select('orggoal_options4' , $orggoal_options ) }} </td>

        <td >Start Date:  </td>    
        <td> <input type='Text' id="g4startdate"  name="g4startdate"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("g4startdate", "ddMMyyyy" )' style="cursor:pointer"/>

        <td >End Date:  </td>    
        <td> <input type='Text' id="g4enddate"  name="g4enddate"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("g4enddate", "ddMMyyyy" )' style="cursor:pointer"/>

</tr>

<tr>    
        <td><b1> Self Rating</b1></td>
        <td> 1  : <input name="Self_Rating" type="radio" value="1"></td>
        <td> 3  : <input name="Self_Rating" type="radio" value="3"></td>
        <td> 5  : <input name="Self_Rating" type="radio" value="5"></td>
        <td> 7  : <input name="Self_Rating" type="radio" value="7"></td>
        <td> 9  : <input name="Self_Rating" type="radio" value="9"></td>
</tr>


   
     <td><b1>Manager Rating</b1></td>
     <td> 1  : <input name="Manager_Rating"  type="radio" disabled='disabled'value="1"></td>
     <td> 3  : <input name="Manager_Rating" type="radio" disabled='disabled' value="3"></td>
     <td> 5  : <input name="Manager_Rating" type="radio" disabled='disabled' value="5"></td>
     <td> 7  : <input name="Manager_Rating" type="radio" disabled='disabled' value="7"></td>
     <td> 9  : <input name="Manager_Rating" type="radio" disabled='disabled' value="9"></td>

 
<tr>
        <td > Remarks</td>
        <td colspan='2'> <input type='text' name='Remarks' value='' style=width:99% ></td>
</tr>


<tr>
        <td colspan='6'><center><b1>Status</b1></center></td>
</tr>

<tr>
        <td> Intial: <input name="status" type="radio" disabled='disabled' value="Initial"></td>
        <td> In Progress: <input name="status" type="radio" disabled='disabled' value="In Progress"></td>
        <td> Completed: <input name="status" type="radio" disabled='disabled' value="Completed"></td>
        <td> Approved: <input name="status" type="radio" disabled='disabled' value="Approved"></td>
        <td> Previous: <input name="status" type="radio" disabled='disabled' value="Previous"></td>
        <td> Cancelled: <input name="status" type="radio" disabled='disabled' value="Cancelled"></td>
</tr>

</table>

<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit' size='40'>Submit</button> </m1></td>

</form>

@endsection
