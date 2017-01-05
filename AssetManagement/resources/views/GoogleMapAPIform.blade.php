<!DOCTYPE html>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/geolocationshow') }}">
{!! csrf_field() !!}
<html>
<head>
	<title>Vehicle Location</title>
</head>
<style>


hg1 {
  font-weight: bold;
  font-size: 120%;
  color: #66e0ff;
  margin-left:500px;
}



table, th, td {
     
    border-collapse: collapse;
    background-color: #b3e6ff;
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


<table style=width:70%>
 <hg1>Vehicle Location</hg1>
 <tr><td colspan = "4"> Enter the Corresponding Latitude and Longitude</td>
<tr>
        </td>
         
        <td>Latitude: </td>
        <td > {{ Form::select('Latitude', $Latitude) }}</td>

         <td>Longitude: </td>
        <td > {{ Form::select('Longitude', $Longitude) }}</td>

  </tr>
<tr> 
    <td colspan ="2" style="text-align:left;"><div id="btnwrap">
        <button  class="btn btn-primary" id="idAddButton" onclick="idAddButton_onclick()" value ='submit' type='submit'>Submit</button>
        <a href="{{"javascript:history.go(-1)"}}"  button class="btn btn-primary" id="idAddButton" onclick="idAddButton_onclick()" type="button">Go Back to Previous Page</a>
         </div></td>

        
 </tr>
 <table>
 <form>
 </html>       










        
               
