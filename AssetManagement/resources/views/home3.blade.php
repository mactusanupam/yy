@extends('layouts.app')

@section('content')
<form id="myform "class="form-horizontal" role="form" method="POST" action="{{ url('/ApplyLeave') }}">
{!! csrf_field() !!}
<!DOCTYPE html>
<html>
<head>
<style>

.div5{
      width:18;
      font-size: 100;
      margin-right: 5%
      margin-left:2%;
}


 
.div0 {
    height: 80%;
    width: 72%;
   
    font-size: 150%;
    font-family:Arial, Helvetica, sans-serif;
    background-color: #ccccff;
    margin-left:5%;
    margin-top:1%;
    text-align: center;
}



.div1 {
    height: 80%;
    width: 72%;
    
    font-size: 150%;
    font-family:Arial, Helvetica, sans-serif;
    background-color: #b3b3ff;
    margin-left:5%;
    margin-top:0.2%;
    text-align: center;
     
}

.div2 {
    height: 80%;
    width: 72%;
   
    font-size: 150%;
    font-family:Arial, Helvetica, sans-serif;
    background-color:#9999ff;
    margin-left:5%;
    margin-top:0.2%;
    text-align: center;
    
}

.div3 {
    height: 80%;
    width: 72%;
   
    font-size: 150%;
    font-family:Arial, Helvetica, sans-serif;
    background-color:#8080ff;
    margin-left:5%;
    margin-top:0.2%;
    text-align: center;
    
}

.div4 {
    height: 80%;
    width: 72%;
   
    font-size: 150%;
    font-family:Arial, Helvetica, sans-serif;
    background-color:#6666ff;
    margin-left:5%;
    margin-top:0.2%;
    text-align: center;
     
}
 
  h5 {
    font-weight: bold;
    font-size: 180%;
    color: LAVENDERBLUSH;
    margin-top:15px;
}
  .table1 {
    border-collapse:collapse;
    text-align: right;
    position: absolute;
    left: 80%;
    top: 39%;
    width: 17%;
    display:block;
}

  thead, tbody{
    display: block;
}

 .tbody1 {
    
    height: 130px;
    width: 200px;
    overflow-y: auto;
    overflow-x: hidden;

    
    
}


 .th1 {
    width: 200px;
    padding: 3px;
    border: 1px solid black;

    background-color:#ccccfc;
    font-weight: bold;
    <!--color:#fafaff;-->
}

 .td1 {
    width: 200px;
    border: 1px solid black;
    background-color: #aabee1;
    text-align: left;
}
 

.table2 {
    border-collapse:collapse;
    text-align: right;
    position: absolute;

    left: 80%;
    top: 45%
    width: 17%;
    display:block;
}

  thead, tbody{
    display: block;
}

 .tbody2 {

    height: 130px;
    width: 200px;
    overflow-y: auto;
    overflow-x: hidden;
}



 .th2 {
    width: 200px;
    padding: 3px;
    
    border: 1px solid black;
    background-color:#ccccfc;
    font-weight: bold;
    <!--color:#fafaff;-->
}

 .td2 {
    width: 200px;
    border: 1px solid black;
    background-color: #aabee1;
    text-align: left;
    

}



</style>
<?php
       
         echo "name".$db[1]->email;

            $user_name= Auth::user()->name; 
            $filepath = 'img/'.$user_name.'.png';

             echo   '<h5><center> Announcement and Achievements at work space<center></h5>';
            
            $tab_information =$db[0];
            $tab_empdetails = $db[1];

            $today = date("y-m-d");
            $time = strtotime($today);
            $today_month = date('m', $time); 
            $today_date= date('d', $time); 
            $today_year= date('y', $time);   
               
            $dateofbirth = $tab_empdetails ->DateofBirth;
            $time1 = strtotime($dateofbirth);
            $db_month = date('m', $time1);
            $db_date = date('d', $time1); 

            $joiningdate =  $tab_empdetails ->joining_date;
            $time2 = strtotime($joiningdate);
            $db_joiningmonth = date('m', $time2);
            $db_joiningdate = date('d', $time2);
            $db_joiningyear = date('y', $time2);




           
            for ($i = 0; $i < count($tab_information) ; $i++){ 

                echo "<div class='div".$i."'><br>".$tab_information[$i]->informationdetails."</br><br></div>"; 
            
            }
            
               
            // echo("</div><div class='div div2'><table class='table1'><thead>");

                echo"<div class='div6'><table class='table1'><head>";

              
            $users = DB::table('empdetails')->join('users', 'users.email', '=', 'empdetails.email')->select('name')
            ->where('DateofBirth', 'LIKE', '%-'.$today_month.'-'.$today_date)->where('empdetails.email' , '!=' , $tab_empdetails->email)->get(); ;

            if( $today_month==$db_month && $today_date==$db_date) {
                echo "<thead><tr><th class='th1'>"."Happy Birthday !". "$user_name"."</th></tr></thead>";
            if(count($users) != 0){
                echo "<thead><tr><th class='th1'>".count($users)." more people have Birthday today!"."</th></tr></thead>";
            }
                
         
            }

            else{
            
               echo "<thead><tr><th class='th1'>".count($users)." People have a birthday today"."</th></tr></thead>";
            }

               
              echo"</head><tbody class='tbody1'>";

            for( $i=0; $i <count($users); $i++ ) {

                      echo '<tr><td class="td1">'.$users[$i]->name.'</td></tr>'; 
            
             }

                //echo "</tbody class='tbody1'>";
                 echo "</tbody1</table1>";

                echo "<table class='table2'><head>";
           
                
            

            $users = DB::table('empdetails')->join('users', 'users.email', '=', 'empdetails.email')->select('name')
            ->where('joining_date', 'LIKE', '%-'.$today_month.'-'.$today_date)->where('empdetails.email' , '!=' , $tab_empdetails->email)->where('empdetails.joining_date','!=',$today)->get(); 
            //if($today_year != $db_joiningyear)

               //{
            if( $today_month== $db_joiningmonth && $today_date== $db_joiningdate &&  $time!=$time2){
                //echo "<thead><tr><th class='th2'>"."Happy Work Anniversary !". "$user_name"."</th></tr></thead>";
               echo "<thead><tr><th class='th2'>". "  & Happy work Anniversary $user_name .This is your  ".convert_number_to_ordinal($today_year-$db_joiningyear)." Work Anniversary."."</th></tr></thead>";
            if(count($users != 0)){
                echo "<thead><tr><th class='th2'>".count($users)." more people have  Work Anniversary today!"."</th></tr></thead>";
            }

            }
            else{
            

                echo "<thead><tr><th class='th2'>".count($users)." People have  an anniversary today"."</th></tr></thead>";
                }

            echo"</head><tbody class='tbody2'>"; 
             

           
               for( $i=0; $i <count($users); $i++ ) {

                echo '<tr><td class="td2">'.$users[$i]->name.'</td></tr>';
            
            
            }



                     echo "</tbody2</table>";

                     //echo "</div2>";


 
            /*for ($i = 0; $i < count($tab_information) ; $i++){ 

                echo "<div class='div".$i."'><br>".$tab_information[$i]->informationdetails."</br><br></div>"; 
            
            }*/
            
    


             //echo"</div5>";
                

                //echo "<tbody class='tbody2'>";
                //echo "</tbody2></table2>";
                 
         

            
     
            

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

