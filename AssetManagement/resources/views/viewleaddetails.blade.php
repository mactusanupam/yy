@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/moredetailsoflead') }}">
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
    
    margin-left:100px;
    margin-top:3%;
    background-color:ALICEBLUE;
}

hg1 {
    font-weight: bold;
    font-size: 170%;
  color: #9ffea9;
    margin-left:500px;
}

hg2 {
    font-weight: bold;
    font-size: 100%;
    margin-left:100px;
}

</style>';




echo "<table border=2 style=width:88%>
<tr>
    <th style=width:1%> Select </th>
    <th style=width:5%> Lead ID</th>
    <th style=width:4%>User Name</th>
    <th style=width:10%>Lead Name</th> 
     
    <th style=width:20%> Lead Description</th>
    <th style=width:10%> Customer Name</th> 
    <th Style=width:30%> Lead Action</th> 
    <th style=width:8%> More Details</th>
 
</tr>";
    
      for ($i = 0; $i < count($data) ; $i++)
    {
          echo "<tr>
                    <td> <input type='checkbox' name=".'"check_list'.$i.'"'."   ></td>
                    <td>".$data[$i]->LeadID."</td>
                    <td>".$data[$i]->User_Name."</td>
                    <td>".$data[$i]->Lead_Name."</td>
                    <td>".$data[$i]->LeadDescription."</td>
                    <td>".$data[$i]->Customer_Name."</td>
                    <td>".$data[$i]->Lead_Action."</td>
                    <td><button type='submit' value ='submit' type='submit'>More Details</button> </td>


                </tr>"; 

             // echo  "<tr>  <td><button type='submit' value ='submit' type='submit'>Submit</button> </td></tr>";

        echo "<input type='hidden' name=".'"Lead_name'.$i.'"'." value = ".$data[$i]->Lead_Name.">";
        echo "<input type='hidden' name=".'"User_Name'.$i.'"'." value = ".$data[$i]->User_Name.">";
        echo "<input type='hidden' name=".'"LeadID'.$i.'"'." value = ".$data[$i]->LeadID.">";
        echo "<input type='hidden' name=".'"LeadDescription'.$i.'"'." value = ".$data[$i]->LeadDescription.">";
        echo "<input type='hidden' name=".'"Customer_Name'.$i.'"'." value = ".$data[$i]->Customer_Name.">";
        echo "<input type='hidden' name=".'"Lead_Action'.$i.'"'." value = '".$data[$i]->Lead_Action."'>";
        
          
    }

echo "</table>";

?>
 
</form>

@endsection