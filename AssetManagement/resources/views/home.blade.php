@extends('layouts.app')

@section('content')
<form id="myform "class="form-horizontal" role="form" method="POST" action="{{ url('/ApplyLeave') }}">
  {!! csrf_field() !!}
  <!DOCTYPE html>
  <html>
  <head>
    <style>
      .div {
        font-family:Arial, Helvetica, sans-serif;
        margin-top: 1%;
        margin-bottom: 1%;
        text-align: center;
        float: left;
      }
      .div1 {
        width: 70%;
        margin-left:4%;
        font-size: 150%;
      }
      .div2 {
        width: 18%;
        font-size: 100%;
        margin-right: 5%;
        margin-left: 2%;
      }
      .even {
       background-color: #ffe6ff;
       margin-top:0.3%;
      }

     .odd {
        background-color: #80ccff;
        margin-top:0.3%;
      }

     h5 {
      font-weight: bold;
      font-size: 180%;
      color: LAVENDERBLUSH;
      margin-top:15px;
    }
    .table1 {
       
    }

    .tbody1 {
      height: 130px;
       
       display: table;
      display: inline-block;
      overflow-y: auto;
      overflow-x: hidden;
    }

    .th1 {
      padding: 3px;
      
      border: 1px solid black;
      background-color:#ffe6ff ;
      font-weight: bold;
    }

    .td1 {
      width: 200px;
      border: 1px solid black;
      background-color: #b3e6ff;
      text-align: left;
    }

    .table2 {
      margin-top: 20px;
       
    }

    .tbody2{
      height: 130px;
      
      display: table;
      display: inline-block;
      overflow-y: auto;
      overflow-x: hidden;
    }
    .th2 {
      padding: 3px;
     
      border: 1px solid black;
      background-color: #ffe6ff;
      font-weight: bold;
    }
    .td2 {
      width: 200px;
      border: 1px solid black;
      background-color: #b3e6ff;
      text-align: left;
    }


  </style>
<?php

$username = Auth::user()->name;
  //$filepath = $username;
  $filepath ='img/'.$username.'.png';

  echo '<h5><center> Announcement and Achievements at work space</center></h5>';


            $tab_information =$db[0];
            $tab_emprecords = $db[1];
            
            $today = date("y-m-d");
            $time = strtotime($today);
            $today_month = date('m', $time); 
            $today_date= date('d', $time); 
            $today_year= date('y', $time); 

$dateofbirth = $tab_emprecords->date_of_birth;
            $time1 = strtotime($dateofbirth);
            $db_month = date('m', $time1);
            $db_date = date('d', $time1); 

$joiningdate =  $tab_emprecords->joining_date;
            $time2 = strtotime($joiningdate);
            $db_joiningmonth = date('m', $time2);
            $db_joiningdate = date('d', $time2);
            $db_joiningyear = date('y', $time2);

echo "<div class='div div1'>"; 
for ($i = 0; $i < count($tab_information); $i++)
{
  $class = ( $i % 2 == 0 ) ? 'even' : 'odd';
  echo "<div class='".$class."'><br />".$tab_information[$i]->informationdetails."<br /><br /></div>"; 

}

//echo   "<div class='div1'><br> ".$db1['0']->informationdetails." </br><br></div>";
 //echo   "<div class='div2'><br> ".$db1['1']->informationdetails."</br><br></div>";
// echo   "<div class='div3'><br> ".$db1['2']->informationdetails."</br><br></div>";
// echo   "<div class='div4'><br> ".$db1['3']->informationdetails."</br><br></div>";
// echo   "<div class='div5'><br> ".$db1['4']->informationdetails."</br><br></div>";

echo("</div><div class='div div2'><table class='table1'><thead>");

$users = DB::table('users')->join('emprecords', 'users.id', '=', 'emprecords.user_id')->select('name')->where('date_of_birth', 'LIKE', '%-'.$today_month.'-'.$today_date)->where('emprecords.user_id', '!=', $tab_emprecords->user_id)->get();
 //dd($users);


if($today_month==$db_month && $today_date==$db_date)
{
    echo "<tr><th class='th1'>"." Happy Birthday !". "$username"."</th></tr>";

     if(count($users)!=0){

        echo "<tr><th class='th1'>".count($users)."  others have birthday"."<br />"." today!! "."</th></tr>";
       }

      } 
      else {

          echo "<tr><th class='th1'>".count($users)."people have birthday today "."</th></tr>";
      }

echo "</thead><tbody class='tbody1'>";

          for($i=0; $i < count($users); $i++) {

              echo '<tr><td class="td1">'.$users[$i]->name.'</td></tr>';
            }

echo "</tbody</table>";


echo "<table class='table2'><thead>";

  $users = DB::table('users')->join('emprecords', 'users.id', '=', 'emprecords.user_id')->select('name')->where('joining_date', 'LIKE', '%-'.$today_month.'-'.$today_date)->where('emprecords.user_id', '!=', $tab_emprecords->user_id)->where('joining_date', '!=', $today)->get();
//dd($users);

 if($today_month== $db_joiningmonth && $today_date== $db_joiningdate &&  $time!=$time2){
 
  echo "<tr><th class='th2'>"."Happy Work Anniversary!"."<br/>"."$username"."</th></tr>";
 
    echo "<tr><th class='th2'>"."This is your ".convert_number_to_ordinal($today_year-$db_joiningyear)."<br/>"."Work Anniversary!!"."</th></tr>"; 
   }

    if(count($users)!=0){

      echo "<tr><th class='th2'>".count($users)." others have Work "."<br/>"."Anniversary today!!"."</th></tr>";
    }

    else {

      echo "<tr><th class='th2'>".count($users)." people have Work"."<br/>"."Anniversary today!!"."</th></tr>";
    }

echo "</thead><tbody class='tbody2'>";

            for($i=0; $i < count($users); $i++) {

             echo '<tr><td class="td2">'.$users[$i]->name.'</td></tr>';
            }

echo "</tbody</table>";
echo "</div>";

  ?>
</head>

</html>
</form>

@endsection

<?php
function convert_number_to_ordinal($number)
{
  if (!in_array(($number % 100),array(11,12,13))){
    switch ($number % 10) {
      case 1:  return $number.'st';
      case 2:  return $number.'nd';
      case 3:  return $number.'rd';
    }
  }
  return $number.'th';
}

?>