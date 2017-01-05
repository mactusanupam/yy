<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App;
use PDF;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\projectdetails;
use App\projectrecord as projectrecords;
use App\itemname as itemnames;
use App\googlemaplocation as googlemaplocations;
use App\geomaplocation as geomaplocations;

//use App\service_logs;
use App\leaveinfos;
use App\leavetype;
use App\enabledisable;
use App\user;
use App\statusapprove;
use App\mastercustomertable;
use App\project;
use Response;
use DateTime;
use Carbon\Carbon;
use App\sitename;
use App\service_logs;
use App\SubmitServiceLog;
use Session;
use Alert;
//use Vinkla\Alert\Alert;
//use Vinkla\Alert\Facades\Alert;
class HomeController extends Controller
{

    protected $titles = null;
    protected $project_name = null;
    protected $project_list = null;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store()
    {
        Flash::message('Welcome Aboard!');

        return Redirect::home();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        /*$username = auth::user()->name;
       $db1= DB::table('information')->orderBy('id', 'desc')->take(5)->get();
       return view('home')->with('db1',$db1);*/

       


       $user_id = auth::user()->id;
       
       $tab_information= DB::table('information')->orderBy('id', 'desc')->take(5)->get();
       $tab_emprecords= DB::table('emprecords')->where('user_id', $user_id)->get();
       $db=[$tab_information, $tab_emprecords[0]];
       //print_r($db);
       return view('home')->with('db',$db);
 
    }

    
   public function inventory()
    {
     
      $projectdetail = DB::table('projectrecords')->select('id','project_Name')->get();
        
      
      $projectdetails= projectrecords::lists('project_Name','project_Name');
      $projectdetails->prepend('', '');
        
      $itemname= itemnames::lists('Item_name','Item_name');
      $itemname->prepend('', '');
      //dd($itemname);
       
        return view('inventorycall2')->with('projectdetails',$projectdetails)->with('projectdetail',$projectdetail)->with('itemname',$itemname); 
    }

    public function inventoryin()
    {
        $data = Input::all();
         //dd($data);
        $invoiceno = $data['invoiceno'];
        $projectname = $data['project_name'];
        $invoicevalue = $data['invoicevalue'];
        $invoicedate = $data['Invoicedate'];

      if($invoicevalue !="" && $projectname != "" && $invoicedate !=""&& $invoiceno != "") {

            $db_invoiceno = DB::table('inventoryins')->where('invoice_no', $invoiceno)->count();
            //echo $db_invoiceno;
            if($db_invoiceno == 0 ){
              
              for($i=0; $i <sizeof($data['item_name']); $i++){
                array(
                     $Item = $data['item_name'][$i],
                      //$Item=$data['item_name'][$i],
                      $Quantity = $data['Quantity'][$i],
                      $UnitPrice = $data['Price'][$i],
                      
                  );
                
                      
              if($Item!="" && $Quantity !="" &&  $UnitPrice !=""){
              //for($i=0; $i <sizeof($data['Item']); $i++) {
                      DB::table('inventoryins')->insert(array(
                        'Project_Name' => $data['project_name'],
                        'invoice_no' => $data['invoiceno'],
                        'invoice_value' => $data['invoicevalue'],
                        'invoice_date' => $data['Invoicedate'],
                        'item' => $data['item_name'][$i],
                        'Quantity' => $data['Quantity'][$i],
                        'Unit_Price' =>$data['Price'][$i]

                      ));

                      DB::table('itemnames')->where('Item_name', $data['item_name'][$i])->increment('Total_Quantity', $data['Quantity'][$i]); 
                    }

                    else {
                      return view('reportsubmit');
                    }
                
                }
              }
        else{
            return view('dbinvoiceno');
          }
        }
      else{
        return view('inventoryreturn')->with('invoiceno',$invoiceno)->with('invoicevalue',$invoicevalue)->
        with('invoicedate',$invoicedate)->with('projectname',$projectname);
      }

    return view('submitform');
    }  
    
    public function invoicein()
    {
        $projectdetails= projectrecords::lists('project_Name','project_Name');
        $projectdetails->prepend('', '');
        //dd($amounttotal);
         return view('report')->with('projectdetails',$projectdetails);
      }  


      
    public function inventoryinreport()
      {
        
        $insert=Input::all();
        //dd($insert);
        $fromdbdate = ($insert['ReportFrom']);
        $todbdate = ($insert['ReportTo']);
        $project_name= $insert['Project_name'];
        date_default_timezone_set('Asia/Kolkata');
        $todaydate = date('Y-m-d H:i:s');
        $current=auth::user()->name;
        $fromdate = strtotime($fromdbdate);
        $todate=strtotime($todbdate);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);

        if($fromdbdate == "" || $todbdate  == "")
            {
              return view('ReportTime')->with('fromdbdate',$fromdbdate)->with('todbdate',$todbdate);
              //echo "Please insert from date and To date.";
            }
         
      if($project_name != "")
        {
            $data = DB::table('inventoryins')->whereBetween('invoice_date', [ $startdate,$enddate])->where('Project_Name',$project_name)->get();

            
            
            $totalamount = DB::table('inventoryins')->select('item','Quantity','Unit_Price')->whereBetween('invoice_date', [ $startdate,$enddate])->where('Project_Name',$project_name)->get();//get();
            //dd($totalamount);
             //print_r($data);
              //die()
             $total_amount=0;
             for($i=0;$i<sizeof($totalamount);$i++)
             {
              $total_amountstr = ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);
              $total_amount = ($total_amount + $total_amountstr);

            //$total_amount= $total_amount + ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);

              }
            
            $allComplete = '<body style=margin-left:10%>

                            <table margin-left:10%>
                            <tr><h3><center>Mactus Technology Solutions <br> Inventory In Report</center></h3>
                            </tr>       
                                        
                            </table>
                            <table>
                            <tr > Printed By: '.$current.' <br> Print Date: '.$todaydate.'<br></tr>
                            </table>';
            if(isset($data[0]))
            {
              //echo $array[0];
              $allComplete = $allComplete. 
              '<table><tr><td>Project Name:-'.$data[0]->Project_Name.'<td></tr></table>';
              }
              else {
                  echo"some error?";
                 }   

            $allComplete = $allComplete.  '<table border=2 style='.'"border-collapse:collapse">
                        <tr>
                            <th style=width:80> ID </th>
                            <th style=width:90> Invoice No. </th> 
                            <th style=width:90> Invoice Date</th> 
                             <th style=width:90> Invoice Value</th>
                            
                            <th style=width:90> Item</th>
                            <th style=width:80> Quantity</th>
                            <th style=width:90> Unit Price</th>
                            

                            
                        </tr>';


        foreach($data as $row)
         {
            //print_r($row);
            //die();
          $allComplete = $allComplete.
                        "<tr>
                            <td>".$row->id."</td>
                            <td>".$row->invoice_no."</td>
                            <td>".$row->invoice_date."</td>
                            <td>".$row->invoice_value."</td>
                                   
                            <td>".$row->item."</td>
                            <td>".$row->Quantity."</td>
                            <td>".$row->Unit_Price."</td></tr>";
        }

          $allComplete =$allComplete ."<tr><td colspan='6' style='text-align:right;'>Total Amount</td>
          <td>".$total_amount."</td></tr></table></body>";
          
          $pdf = App::make('dompdf.wrapper');
          $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
          return $pdf->stream() ;
        
      }elseif($project_name == ""){
        
             $data = DB::table('inventoryins')->whereBetween('invoice_date', [ $startdate , $enddate])->get(); 
            //dd($data);
             $totalamount = DB::table('inventoryins')->select('item','Quantity','Unit_Price')->whereBetween('invoice_date', [ $startdate,$enddate])->get();//get();
            
            $total_amount=0;
           for($i=0;$i<sizeof($totalamount);$i++)
          {
            $total_amount= $total_amount + ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);
          }
                //echo"<h3>{{ Html::image('img/mactus.gif', 'a picture', array('class' => 'thumb')) }}</h3>";
                 //echo $url = asset('img/pic_mountain.jpg');
          $allComplete =  '<body>
                          <table width="100%">
                        <tr> <td style="border-bottom: 1px solid black; margin: 0; padding: 0;">

              <img src="img/mactus.gif" alt="logo" style="margin:0; padding: 0;"/>

              <span style="display: inline-block; text-align: right; margin-right: 7.5%;">

                <h5 style="margin: 5px;">Mactus Technology Solutions LLP</h5>

                <h6 style="margin: 5px;">

                  107 3rd Cross Road, 4th Main Road,<br />

                  MICO Layout II Stage, Arekere,<br />

                  Bannerghatta Road, Bangalore 560076 <br />

                  Email : contact@mactus.in<br />

                  Telephone : +91 80 26493474

                </h6>

              </span>

            </td>

          </tr>
          <tr>

            <td style="text-align: center;">

              <h3>Inventory In Report</h3>

            </td>

          </tr>

          <tr>

           <td>

            Printed By: '.$current.' <br>Print Date: '.$todaydate.'

           </td>

          </tr>

          <tr>

            <td>

              <table border="1" width="100%" style="border-collapse: collapse;">

                <tr>

                  <th> ID </th>

                  <th> Invoice No. <br></th> 

                  <th> Invoice<br>Date</th> 

                  <th> Invoice<br>Value</th>

                  <th> Project<br>Name</th>

                  <th> Item</th>

                  <th> Quantity</th>

                  <th> Unit Price</th>

                </tr>'; 
                foreach($data as $row)
            {
           // print_r($row);
            //die();
                $allComplete = $allComplete.
                            "<tr>
                                    <td>".$row->id."</td>
                                    <td>".$row->invoice_no."</td>
                                    <td>".$row->invoice_date."</td>
                                    <td>".$row->invoice_value."</td>
                                    <td>".$row->Project_Name."</td>
                                    <td>".$row->item."</td>
                                     <td>".$row->Quantity."</td>
                                    <td>".$row->Unit_Price."</td>   
                                     
                                    </tr>";
                            
            }

                $allComplete =$allComplete ."<tr><td colspan='7' style='text-align:right;'>Total Amount</td>

                                       <td>".$total_amount."</td></tr></table></body>";
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream() ;
       


    }


}//end of inventoryin


public function inventoryout()
    {
      /*$projectdetails= projectdetails::lists('projec_name','projec_name');
        $projectdetails->prepend('', '');
       return view('inventory')->with('projectdetails',$projectdetails);*/

       $projectdetails= projectrecords::lists('project_Name','project_Name');
      $projectdetails->prepend('', '');
        
      $itemname= itemnames::lists('Item_name','Item_name');
      $itemname->prepend('', '');
      //dd($itemname);
       
        return view('inventorysell')->with('projectdetails',$projectdetails)->with('itemname',$itemname);
  }

  public function inventoryoutdata()
  {

     $data = Input::all();
         //dd($data);
        $invoiceno = $data['invoiceno'];
        $projectname = $data['project_name'];
        $invoicevalue = $data['invoicevalue'];
        $invoicedate = $data['Invoicedate'];

        
        

      if($invoicevalue !="" && $projectname != "" && $invoicedate !=""&& $invoiceno != "") {

            $db_invoiceno = DB::table('inventoryouts')->where('Invoice_No', $invoiceno)->count();

             
            //echo $db_invoiceno;
            if($db_invoiceno == 0 ){

              if($data['Quantity'][0]=="")
                  {
                    return view('reportsubmit');
              
                  }

                $error_msg = "";
                $error_msg1= "";
              for($i=0; $i <sizeof($data['item_name']); $i++){
                                          

                  $db_Quantity = DB::table('itemnames')->select('Total_Quantity')
                  ->where('Item_name',$data['item_name'][$i])->get();
                  
                 //dd($db_Quantity);
                 //print_r($db_Quantity);
                  if(($db_Quantity[0]->Total_Quantity-5)==0){

                    $error_msg1 = $error_msg1." Store Quantity for  ".$data['item_name'][$i]." is 5 only so you should not out  that item."."<br />";
                
                    return view('lessitem')->with('error_msg1', $error_msg1)->with('error_msg', $error_msg);
                   }

                  if(($db_Quantity[0]->Total_Quantity-5) < $data['Quantity'][$i]) {

                    $error_msg = $error_msg."Quantity for ".$data['item_name'][$i]." should not be more than ".($db_Quantity[0]->Total_Quantity-5)."<br />";

                    return view('lessitem')->with('error_msg', $error_msg)->with('error_msg1', $error_msg1);
                  }

               }//end of forloop
                
          
            for($i=0; $i <sizeof($data['item_name']); $i++){
                  //for($i=1; $i <11; $i++){

                array(
                      //$Item = $data['Item'][$i],
                      $Item=$data['item_name'][$i],
                      $Quantity = $data['Quantity'][$i],
                      $UnitPrice = $data['Price'][$i],
                      

                  );

               if($Item!="" && $Quantity !="" &&  $UnitPrice !=""){
              
                      //for($i=0; $i <sizeof($data['Item']); $i++) {
                      DB::table('inventoryouts')->insert(array(
                        'Project_Name' => $data['project_name'],
                        'Invoice_No' => $data['invoiceno'],
                        'Invoice_Value' => $data['invoicevalue'],
                        'Invoice_Date' => $data['Invoicedate'],
                        'Item' => $data['item_name'][$i],
                        'Quantity' => $data['Quantity'][$i],
                        'Unit_Price' => $data['Price'][$i],

                       ));
                      
                      DB::table('itemnames')->where('Item_name', $data['item_name'][$i])->decrement('Total_Quantity', $data['Quantity'][$i]); 
                    

                    }
            else {
                    return view('lessitem')->with('error_msg1', $error_msg1)->with('error_msg', $error_msg);

                  } 
              
                }//end of forloop
              }
              else{
            return view('dbinvoiceno');
           } 
          
        }
      else{
        
        return view('inventoryreturn')->with('invoiceno',$invoiceno)->with('invoicevalue',$invoicevalue)->
        with('invoicedate',$invoicedate)->with('projectname',$projectname);
      }
        return view('submitform');
    } 
    
  public function invoiceout()
      {
        $projectdetails= projectrecords::lists('project_Name','project_Name');
        $projectdetails->prepend('', '');
        //dd($amounttotal);
         return view('inventoryoutreport')->with('projectdetails',$projectdetails);
      }       
 
     public function inventory_outreport()
      {
        
        $insert=Input::all();
        //dd($insert);
        $fromdbdate = ($insert['ReportFrom']);
        $todbdate = ($insert['ReportTo']);
        $project_name= $insert['Project_name'];
        date_default_timezone_set('Asia/Kolkata');
        $todaydate = date('Y-m-d H:i:s');
        $current=auth::user()->name;
        $fromdate = strtotime($fromdbdate);
        $todate=strtotime($todbdate);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);
         
         if($fromdbdate == "" || $todbdate  == "")
            {
              return view('ReportTime')->with('fromdbdate',$fromdbdate)->with('todbdate',$todbdate);
              //echo "Please insert from date and To date.";
            }

      if($project_name != "")
        {
            $data = DB::table('inventoryouts')->whereBetween('Invoice_Date', [ $startdate,$enddate])->where('Project_Name',$project_name)->get();
            
            $totalamount = DB::table('inventoryouts')->select('Item','Quantity','Unit_Price')->whereBetween('Invoice_Date', [ $startdate,$enddate])->where('Project_Name',$project_name)->get();//get();
            //dd($totalamount);
             //print_r($data);
              //die()
             $total_amount=0;
             for($i=0;$i<sizeof($totalamount);$i++)
             {
              $total_amountstr = ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);
              $total_amount = ($total_amount + $total_amountstr);

            //$total_amount= $total_amount + ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);

              }
            $allComplete = '<body style=margin-left:10%>

                            <table margin-left:10%>
                            <tr><h3><center>Mactus Technology Solutions <br> Inventory Out Report</center></h3>
                            </tr>       
                                        
                            </table>
                            <table>
                            <tr > Printed By: '.$current.' <br> Print Date: '.$todaydate.'<br></tr>
                            </table>';
            if(isset($data[0]))
            {
              $allComplete = $allComplete. 
              '<table><tr><td>Project Name:-'.$data[0]->Project_Name.'<td></tr></table>';
              }
              else {
                  echo"some error?";
                 }   

            $allComplete = $allComplete.  '<table border=2 style='.'"border-collapse:collapse">
                        <tr>
                            <th style=width:80> ID </th>
                            <th style=width:90> Invoice No. </th> 
                            <th style=width:90> Invoice Date</th> 
                             <th style=width:90> Invoice Value</th>
                            
                            <th style=width:90> Item</th>
                            <th style=width:80> Quantity</th>
                            <th style=width:90> Unit Price</th>
                            

                            
                        </tr>';


        foreach($data as $row)
         {
            //print_r($row);
            //die();
          $allComplete = $allComplete.
                        "<tr>
                            <td>".$row->id."</td>
                            <td>".$row->Invoice_No."</td>
                            <td>".$row->Invoice_Date."</td>
                            <td>".$row->Invoice_Value."</td>
                                   
                            <td>".$row->Item."</td>
                            <td>".$row->Quantity."</td>
                            <td>".$row->Unit_Price."</td></tr>";
        }

          $allComplete =$allComplete ."<tr><td colspan='6' style='text-align:right;'>Total Amount</td>
                            <td>".$total_amount."</td></tr></table></body>";
          
          $pdf = App::make('dompdf.wrapper');
          $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
          return $pdf->stream() ;
        
      }elseif($project_name == ""){
            
             $data = DB::table('inventoryouts')->whereBetween('Invoice_Date', [ $startdate,$enddate])->get();

             $totalamount = DB::table('inventoryouts')->select('Item','Quantity','Unit_Price')->whereBetween('Invoice_Date',[ $startdate,$enddate])->get();
            
            $total_amount=0;
           for($i=0;$i<sizeof($totalamount);$i++)
          {
            //$total_amount= $total_amount + ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);
            $total_amountstr = ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);
              $total_amount = ($total_amount + $total_amountstr);
          }
                //echo"<h3>{{ Html::image('img/mactus.gif', 'a picture', array('class' => 'thumb')) }}</h3>";
                 //echo $url = asset('img/pic_mountain.jpg');
          $allComplete =  '<body>
                          <table width="100%">
                        <tr> <td style="border-bottom: 1px solid black; margin: 0; padding: 0;">

              <img src="img/mactus.gif" alt="logo" style="margin:0; padding: 0;"/>

              <span style="display: inline-block; text-align: right; margin-right: 7.5%;">

                <h5 style="margin: 5px;">Mactus Technology Solutions LLP</h5>

                <h6 style="margin: 5px;">

                  107 3rd Cross Road, 4th Main Road,<br />

                  MICO Layout II Stage, Arekere,<br />

                  Bannerghatta Road, Bangalore 560076 <br />

                  Email : contact@mactus.in<br />

                  Telephone : +91 80 26493474

                </h6>

              </span>

            </td>

          </tr>
          <tr>

            <td style="text-align: center;">

              <h3>Inventory Out Report</h3>

            </td>

          </tr>

          <tr>

           <td>

            Printed By: '.$current.' <br>Print Date: '.$todaydate.'

           </td>

          </tr>

          <tr>

            <td>

              <table border="1" width="100%" style="border-collapse: collapse;">

                <tr>

                  <th> ID </th>

                  <th> Invoice No. <br></th> 

                  <th> Invoice<br>Date</th> 

                  <th> Invoice<br>Value</th>

                  <th> Project<br>Name</th>

                  <th> Item</th>

                  <th> Quantity</th>

                  <th> Unit Price</th>

                </tr>'; 
   foreach($data as $row)
         {
           // print_r($row);
            //die();

            
              $allComplete = $allComplete.
                            "<tr>
                                      <td>".$row->id."</td>
                                    <td>".$row->Invoice_No."</td>
                                    <td>".$row->Invoice_Date."</td>
                                    <td>".$row->Invoice_Value."</td>
                                    <td>".$row->Project_Name."</td>
                                    <td>".$row->Item."</td>
                                     <td>".$row->Quantity."</td>
                                    <td>".$row->Unit_Price."</td>   
                                     
                                    </tr>";
                            
        }

          $allComplete =$allComplete ."<tr><td colspan='7' style='text-align:right;'>Total Amount</td>

        <td>".$total_amount."</td></tr></table></body>";

       

        
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream() ;
       


    }


}//end of enventorylog out
  public function pdfview(Request $request)

    {
       $url = $request->url();
        $items = DB::table('itemnames')->get();
  //dd($items);
        view()->share('itemnames',$items);


        if($request->has('download')){

            $pdf = PDF::loadView('pdfview1');

            return $pdf->download('pdfview1');

            
        }

        return view('pdfview1')->with('url',$url);//->('items',$items);
}

 public function conferm()
{
  Alert::message("Are you sure to submit the data")->persistent('OK!');
  return view('conferm');
}

public function additemview()
{
  return view('additemview');
}

public function additem(){

      $data = Input::all();
      //dd($data);
      for($i=0; $i <sizeof($data['Item']); $i++)
      {
           array(
                      //$Item = $data['Item'][$i],
                      $Item=$data['Item'][$i],
                      $Code=$data['Code'][$i],
                      $Quantity = $data['Quantity'][$i],
                      $UnitPrice = $data['Price'][$i],
                      

                  );

       if($Item !="" && $Quantity !=""&& $UnitPrice !=""){
         DB::table('itemnames')->insert(array(
                        'Item_name' => $data['Item'][$i],
                        'Item_Code'=>  $data['Code'][$i],
                        'Total_Quantity' => $data['Quantity'][$i],
                        'Unit_Price'    => $data['Price'][$i],
                        'Item_Model_No' => $data['Model'][$i],
                        'Category_Id'   => $data['Category'][$i]

                        ));

      
     }

     //} 
        else
        {
          return view('reportsubmit');
        }
       } 
       return view('additem');

    }

     public function ItemReportView()
    {

       $itemname= itemnames::lists('Item_name','Item_name');
      $itemname->prepend('', '');

      return view('ItemReportForm')->with('itemname',$itemname);
    }


    public function ItemReport(Request $request)
    {

       $current=auth::user()->name;

       /*$fromdbdate = ($insert['ReportFrom']);
        $todbdate = ($insert['ReportTo']);
        $Itemname= $insert['Item_Name'];
        date_default_timezone_set('Asia/Kolkata');
        $todaydate = date('Y-m-d H:i:s');
        $current=auth::user()->name;
        $fromdate = strtotime($fromdbdate);
        $todate=strtotime($todbdate);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);*/

        $items = DB::table('itemnames')->get();
      //$insert=Input::all();
       
        if($request->has('download')){

         // $pdf = PDF::loadView('pdf.invoice', $data);
            //return $pdf->download('invoice.pdf');

     /*$fromdbdate = $todbdate= $Itemname = $startdate = $enddate ="";  

   


  if (isset($_POST['ReportFrom'])) {
      $fromdbdate = $_POST['ReportFrom'];
      $todbdate = $_POST['todbdate']; //this is line 32 and so on...
      $Itemname = $_POST['Itemname'];
      $startdate = $_POST['startdate'];
      $endtdate = $_POST['endtdate'];

      
//}*/




         /* $fromdbdate = ($insert['ReportFrom']);
        $todbdate = ($insert['ReportTo']);
        $Itemname= $insert['Item_Name'];
        date_default_timezone_set('Asia/Kolkata');
        $todaydate = date('Y-m-d H:i:s');
        //$current=auth::user()->name;
        $fromdate = strtotime($fromdbdate);
        $todate=strtotime($todbdate);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);*/


            $pdf = PDF::loadView('ItemReport');

            return $pdf->download('ItemReport');//->with('fromdbdate',$fromdbdate)->with('todbdate',$todbdate)->('Itemname',$Itemname)->with('todaydate',$todaydate )->with('fromdate',$fromdate)->('todate',$todate)->with('startdate',$startdate)->with('enddate',$enddate );

            
        }
       //} 

        return view('ItemReport');//->with('fromdbdate',$fromdbdate);//->('insert',$insert)->('data',$data);//->('items',$items);

    }

    public function addItemCategory()
    {

      return view('addItemCategory');
    }

    public function dbaddCategory()
    {
      $data = Input::all();

      $Category = $data['Category'];

      if($Category != "")
      {

      DB::table('item__categories')->insert(array(
                        
                        'Item_Category_Type' => $data['Category'],
                        ));

           return view('additem');            
    }

   
   else{
    return view('addcategory');
   } 

}


//}          
    





    public function project()
    {
        /* When project button pressed 
           return DB table : Projects data to project_list.blade.php*/
 
        $data= DB::table('projects')->where('Status', 'Enabled')->get();
        $data1 = Auth::user()->Company_id;

        if(Auth::user()->Company_id == 'Mactus') 
        {
              $user_options = sitename::lists('site', 'site');
              $user_options->prepend('', '');
              return view('project_list')->with('data',$data)->with('user_options',$user_options);
        }
        elseif(Auth::user()->Company_id == 'Greenleap')
        {
            return view('greenleapproject');
        }
        elseif(Auth::user()->Company_id == '')
        {
            return view('greenleapproject');
        }
    }

    public function submit1()
    {

        /* */

        $i=0;
        $data = Input::all();
  
        $username= Auth::user()->name;
        $data12 = DB::table('projects')->get();
        $sitename = DB::table('sitenames')->get();
        foreach($data as $key_name => $key_value)
        {            

            if(preg_match('/check_list/',$key_name)) {
                
                preg_match("/check_list(\d+)/", $key_name, $regs);
                $pos = $regs[1];
                if($key_value=="on")
                {
                  //  dd($key_value);
                    $id = $data['id'.$pos]; 
                    $projectname = DB::table('projects')->where('id',$id)->value('project_name');
                    //dd($projectname);
                    $allCompletesite='';
                    foreach ($sitename as $row)
                    {
                          $allCompletesite = $allCompletesite. $row->site.'<br>';
                    }
                    $start_time = $data['projectstart'.$pos]; // pulled from DB
                    $finish_time = $data['projectend'.$pos];// pulled from DB
                    $starttime = strtotime($start_time); // convert to timestring
                    $endtime = strtotime($finish_time); // convert to timestring
                    $diff = $endtime - $starttime; // do the math
                    $hours = ($diff)/60/60; // do the math converting seconds to hours
                    
                    $Estimatedtime=DB::table('projects')->where('project_name', $projectname)->value('Estimated_Time');
                     //dd($Estimatedtime);
                    $entire=DB::table('projectdetails')->where('project_name', $projectname)->get();
                    
                    $totalhour = '';

                     foreach ($entire as $row)
                     {
                          $totalhour = $totalhour + $row->duration;
                                  
                    }   
                   
                    $total = $totalhour + $hours;
                     $i = 80*$Estimatedtime/100;
                        if($i<$total)
                    {
                        if($total < $Estimatedtime)
                        {
                            $percentage = $total*100/$Estimatedtime;
                            $calpercentage =  $percentage."% of Estimated time exceeded";

                            Alert::message($calpercentage)->persistent('OK!');
                            return view('successful');
                        }
                    }
                    if($total > $Estimatedtime)
                    {   
                             
                        $est=DB::table('projects')->where('project_name', $projectname)->get();
                        $exceeded = "100% Estimated time for the project ".$projectname." exceeded";
                        Alert::message($exceeded)->persistent('OK!');
                        return view('successful');
                    }
                    if($start_time < $finish_time && $hours<='10')
                    {                     
                            $newrec = new projectdetails;
                            $newrec->project_name = $projectname;
                            $newrec->projectstart = $data['projectstart'.$pos];
                            $newrec->projectend = $data['projectend'.$pos];
                            $newrec->name = $username;
                            $newrec->duration = $hours.' hours';
                            $newrec->site = $data['site'.$pos];
                            $newrec->save(); 
                            DB::table('projects')->where('project_name', $projectname)->update(['Timespent' => $total]);
                    
                    }

                    else
                    {          

                        return view('invalid');
                    }


                }

            }
             
        }


    
                 
        return view('successful');
      
    }



     public function PdfReport()
    {
        

        $DBdata= Auth::user()->name;
        $data = DB::table('projectdetails')->where('name', $DBdata)->get();
               $allComplete = '<body>

                        <table >
                            <tr><h3> Mactus Technology Solutions <br> Project Report </h3></tr>       
                        </table>

                        <table border=1 style='.'"border-collapse:collapse">
                        <tr>
                            <th> ID </th>
                            <th> project_name</th> 
                            <th> project_start</th> 
                            <th> project_end</th>
                            <th> Duration </th>
                            <th> Site </th>
                        </tr>';

        foreach ($data as $row)
         {
              $allComplete = $allComplete.
                            "<tr>
                                    <td>".$row->id."</td>
                                    <td>".$row->project_name."</td>
                                    <td>".$row->projectstart."</td>
                                    <td>".$row->projectend."</td>
                                    <td>".$row->duration."</td>
                                    <td>".$row->site."</td>
                            </tr>";
        }

         

        $allComplete =$allComplete ."</table></body>";
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($allComplete);
        return $pdf->stream();
        //return view('PdfView')->with('data',$data); 
       
    }

     public function pdfgenerator()
    {
        $data = Input::all();
        //dd($data);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML();
        return $pdf->stream();
    }

     public function AdminReportPage()
    {
        return view('ReportPage');
    }

     public function ProjectReportPage()  
    {
        return view('ProjectReportPage');
    }

    public function ServiceLogReportPage()  
    {
        return view('ServiceLogReportPage');
    }

     public function PdfReportByUserName()
    {
        $data= DB::table('users')->get();
       return view('UserPdfReport')->with('data',$data);
          
    }




     public function userpdfsubmit()
    {
        $i=0;
        $data = Input::all();
        $ldate = date('YmdHis');
        $data12 = DB::table('users')->get();

        foreach($data as $key_name => $key_value)
        {            
            if(preg_match('/check_list/',$key_name)) {
                
                preg_match("/check_list(\d+)/", $key_name, $regs);
                
                $pos = $regs[1];
                if($key_value=="on")
                {
                    $username = $data12[$pos]->name;
                    $current=Auth::user()->name;
                    $data = DB::table('projectdetails')->where('name', $username)->get();
        
       
                    $allComplete = '<body>
                                    <table >
                                        <tr><h3> Mactus Technology Solutions <br> Report Based on Employee Name</h3></tr>       
                                        
                                    </table>
                                    <table>
                                     <tr> Employee Name: '.$username.' <br> Printed By: '.$current.' </tr>
                                      
                                    </table>


                                    <table border=1 style='.'"border-collapse:collapse">

                                    <tr>
                                        <th> ID </th>
                                        <th> Project Name</th> 
                                        <th> Project Start</th> 
                                        <th> Project End</th>
                                        <th> Duration </th>
                                        
                                    </tr>
                                    ';

                    foreach ($data as $row)
                     {
                          $allComplete = $allComplete.
                                        "<tr>
                                                <td>".$row->id."</td>
                                                <td>".$row->project_name."</td>
                                                <td>".$row->projectstart."</td>
                                                <td>".$row->projectend."</td>
                                                <td>".$row->duration."</td>

                                        </tr>";
                                       
                    }
                    $totaltime='';
                    foreach ($data as $row)
                     {
                        $totaltime=$totaltime + $row->duration;
                     }
                     
                  $allComplete =$allComplete .'
                                            <tr> 
                                                <td colspan="5">Total effort spent on project is (in hours) :'. $totaltime ."</td>
                                          </tr>";

                    $allComplete =$allComplete ."</table></body>";
                    $pdf = App::make('dompdf.wrapper');
                    $pdf->loadHTML($allComplete);
                    $pdf->save(storage_path('reports/Report-'.$username.'-'.$ldate.'.pdf'));
                    return $pdf->stream();
                   /* $pdf = App::make('dompdf.wrapper');
                        $pdf->loadHTML($allComplete."Total hour spent on project is ".$totaltime." hours"."<br>");
                        $pdf->save(storage_path('reports/Report-'.$username.'-'.$ldate.'.pdf'));
                        return view('PDFStore');*/
                       //return view('reportsuccessful');

                }


            }
           
        }
    }




    public function PdfReportByProjectName()
    {
       $data= DB::table('projects')->get();
        $user_options = user::lists('name', 'name');  
        $user_options->prepend('', '');
        //return View::make('test')->with('user_options',$user_options);
        return view('ProjectPdfReport')->with('user_options',$user_options)->with('data',$data);
    }



    public function projectpdfsubmit()
    {

        $i=0;
        $data = Input::all();
        //dd($data);
        $ldate = date('YmdHis');
        $name= Auth::user()->name;
        $data12 = DB::table('projects')->get();
        foreach($data as $key_name => $key_value)
        {            
            if(preg_match('/check_list/',$key_name))
            {
                preg_match("/check_list(\d+)/", $key_name, $regs);
                $pos = $regs[1];
                $selname = ($data['username'.$pos]);
                //dd($selname);
                //dd($selname);
                if($key_value=="on")
                {
                    $projectname = $data12[$pos]->project_name;
                    if($selname == "")
                    {
                       $data = DB::table('projectdetails')->where('project_name', $projectname)->get();
                      // dd($data);
                    }
                    else
                    {
                           $data = DB::table('projectdetails')->where('project_name', $projectname)->where('name', $selname)->get();
                    }      

                    $allComplete = '<body><table border=1 style='.'"border-collapse:collapse">
                                    <tr>
                                        <th> ID </th>
                                        <th> Project_name</th> 
                                        <th> project_start</th> 
                                        <th> project_end</th>
                                        <th> Name</th>
                                        <th> Duration </th>
                                    </tr>';
                    foreach ($data as $row)
                     {
                          $allComplete = $allComplete.
                                        "<tr>
                                                <td>".$row->id."</td>
                                                <td>".$projectname."</td>
                                                <td>".$row->projectstart."</td>
                                                <td>".$row->projectend."</td>
                                                <td>".$row->name."</td>
                                                <td>".$row->duration."</td>
                                                
                                        </tr>";


                    }
                     $totalhour = '';

                     foreach ($data as $row)
                     {
                          $totalhour = $totalhour + $row->duration;
                                  
                    }   

                    $Estimatedtime = $data12[$pos]->Estimated_Time;
                    
                    $allComplete =$allComplete .'<tr> <td colspan="6">Total hour spent for '. $projectname. '  project is:'. $totalhour ." hours</td> </tr>";
                    $allComplete =$allComplete .'<tr> <td colspan="6">Total hour estimated for '. $projectname. '  project is:'. $Estimatedtime ." hours</td> </tr>";                

                    $allComplete =$allComplete ."</table></body>";
                   
                    $i = 80*$Estimatedtime/100;
                    if($i < $totalhour)
                     {
                        $pdf = App::make('dompdf.wrapper');
                        $pdf->loadHTML($allComplete. "Total hour spent for ". $projectname. "  project is ".$totalhour." hours"."<br>". "Total Estimated Time for ".$projectname." is ".$Estimatedtime );
                        $pdf->save(storage_path('reports/Report-'.$projectname.'-'.$ldate.'.pdf'));
                        return $pdf->stream();
                       return view('alert');
                     }//else{
                      //return view('PDFStore');
                     //}

                        $pdf = App::make('dompdf.wrapper');
                        $pdf->loadHTML($allComplete. "Total hour spent for ". $projectname. "  project is ".$totalhour." hours"."<br>". "Total Estimated Time for ".$projectname." is ".$Estimatedtime );
                       
                        $pdf->save(storage_path('reports/Report-'.$projectname.'-'.$ldate.'.pdf'));
                       //return view('PDFStore');

                    return $pdf->stream();
                }
                


            }
           
        }
    }
//END OF PROJECT FILE





 public function AdminConfig()
    {
        if (Auth::user()->Role == 'Admin')
        {
            return view('AdminConfigPage');
        }
        else
            return view('auth.accessreg');
    }

    public function Addnewproject()
    {      
        if (Auth::user()->Role == 'Admin')
        {
           
            $status_options = enabledisable::lists('enabledisable', 'enabledisable'); 
            $status_options->prepend('', '');
            $customer_options = mastercustomertable::lists('Customer_Name', 'Customer_Name'); 
            $customer_options->prepend('', '');
            return view('Addnewproject')->with('status_options',$status_options)->with('customer_options',$customer_options);
        }

        else
            return view('auth.accessreg');
    }

     public function  SubmitInformation()
    {     // ->with('status_options',$status_options);
        if (Auth::user()->Role == 'Admin')
        {
            return view('InformationDisplay');
        }
        else
        return view('auth.accessreg');
        
    }




    public function submitprojectname()
    {
             
        $data=input::all();
       // dd($data);
                    $start_time = $data['projectstartdate']; // pulled from DB
                    $finish_time = $data['projectenddate'];// pulled from DB
                    $starttime = strtotime($start_time); // convert to timestring
                    $endtime = strtotime($finish_time); // convert to timestring
                    $diff = $endtime - $starttime; // do the math
                    $hours = ($diff)/60/60;
                    $maxhours=($hours/24)*8;
        //dd($maxhours);
        $Estimatedtime = $data['number'];         
        date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');

        $checkProjectID = DB::table('projects')->where('Project_ID',$data['project_id'])->value('project_id');

        if($Estimatedtime =="")
        {
            return view('invalidestimatedhour');
        }

        
        elseif ($checkProjectID)
        {
            return view('ProjectIdunique');
        }


        elseif($data['project_name'] != '' && ($start_time < $finish_time))
        {
        DB::table('projects')->insert([ 'Customer_name' => $data['customer_name'],
                                        'project_name' => $data['project_name'], 
                                        'Estimated_Time' => $data['number'],
                                        'Status'=>$data['project_status'],
                                        'Project_StartDate'=>$data['projectstartdate'],
                                        'Project_EndDate'=>$data['projectenddate'],
                                        'created_at' => $ldate,
                                        'PO_Number'=>$data['PO_number'],
                                        'PO_Date'=>$data['POdate'],
                                        'PO_Value'=>$data['PO_value'],
                                        'PO_Description'=>$data['PO_Description'],
                                        'Project_ID'=>$data['project_id'],
                                    ]);


        
       //dd($lor);
        return view('projectaddedsuccessfully');
        }else return view('invaliddatenewproject');
    }


     public function informationdb()
    {
        $data=input::all();
        $ldate = date('Y-m-d H:i:s');
        DB::table('information')->insert([ 'informationdetails' => $data['informationdetails']]);
        return view('infoaddedsuccessfully');
    }

      public function dateselection()
    {
       return view('date');
    }


     public function datesubmit()
    {
        //dd('testing');
      
    }

     public function EmployeeProfile()
    {
          $username = Auth::user()->name;
          $data1 = DB::table('teammembers')->where('name', $username)->get();
          $filepath = 'img/'.$username.'.png';
          return view('EmployeeProfile')->with('data1',$data1)->with('username',$filepath);
               
    }


     public function EmployeeProfile1()
    {
          $username = Auth::user()->name;
          $data1 = DB::table('teammembers')->where('name', $username)->get();
          $filepath = 'img/'.$username.'.png';
          return view('EmployeeProfile1')->with('data1',$data1)->with('username',$filepath);
               
    }


      public function img()
    {
         return view('date');
    }

      public function ApplyLeave()
    {
        $username=Auth::user()->name;        
        $sitename = DB::table('leavetypes')->get();       
        $data = DB::table('leaveinfos')->where('Name',$username)->orderBy('id', 'desc')->take(6)->get();
        $leave_options = leavetype::lists('leavetype', 'leavetype');
        $leave_options->prepend('', '');
        //dd($leave_options); 
        return view('leaveapply')->with('data',$data)->with('leave_options',$leave_options);



          //    return view('project_list')->with('data',$data)->with('user_options',$user_options);
               
    }
    public function ApplyLeaveSubmit()

    {
            $data = Input::all();
            date_default_timezone_set('Asia/Kolkata');
            $ldate = date('Y-m-d H:i:s');
            $username=Auth::user()->name;
            $types = DB::table('leaveinfos')->where('Name',$username)->where('Leave_Type',$data['leavetype'])->get();
            $actual=DB::table('leavetypes')->where('leavetype',$data['leavetype'])->value('Available_Leave');
            //dd($actual);
             $cltype = 1;

                     foreach ($types as $row)
                     {
                          $cltype++;
                                  
                    }   


           $leaveavl = ($data['leavetype']."-".$cltype."/".$actual);
           // dd($data);
            
                    $start_time = $data['leavefrom']; // pulled from DB
                    $finish_time = $data['leaveto'];// pulled from DB
                    $starttime = strtotime($start_time); // convert to timestring
                    $endtime = strtotime($finish_time); // convert to timestring
                    $diff = $endtime - $starttime; // do the math
                    $hours = ($diff)/60/60; // do the math converting seconds to hours
                    
                    if($start_time !="" || $finish_time !="")
                    {
                        if($start_time < $finish_time)
                            { 

                                 if($data['leavetype'] =='CL' ||$data['leavetype'] =='ML'||$data['leavetype'] =='EL') 
                                    {                   
                                         DB::table('leaveinfos')->insert(['Name' =>$username, 
                                                                        'Leave_Type'=>$data['leavetype'], 
                                                                        'Leave_From'=>$data['leavefrom'], 
                                                                        'Leave_To'=>$data['leaveto'], 
                                                                        'Reason'=>$data['Reason'], 
                                                                        'Approval_Status'=>'Scheduled',
                                                                        'Leavedays'=>'Full Day',
                                                                        'created_at'=>$ldate,
                                                                        'Available_Leave'=>$leaveavl
                                                                                        ]);

                                       //  DB::table('leaveinfos')->where('leavetype',$data['leavetype'])->where('Name',$username)

                                       return view('leavesuccessful');  
                                    }
                                    return view('invalidleavetype');

                            }

                             elseif($start_time == $finish_time)
                            {
                                    //dd('tea');
                                    if($data['leavetype'] =='CL' ||$data['leavetype'] =='ML'||$data['leavetype'] =='EL') 
                                    {                   
                                        DB::table('leaveinfos')->insert(['Name' =>$username, 
                                                                         'Leave_Type'=>$data['leavetype'], 
                                                                         'Leave_From'=>$data['leavefrom'],
                                                                         'Leave_To'=>$data['leaveto'], 
                                                                         'Reason'=>$data['Reason'], 
                                                                         'Approval_Status'=>'Scheduled', 
                                                                         'Leavedays'=>'Half Day'
                                                                                ]);
                                       return view('leavesuccessful'); 
                                    } return view('invalidleavetype');
                            }
                        return view('invaliddate');         
                                                                        
                    } 


                   
                     return view('enterdate');

                    

      
    }

     public function SiteInformation()
    {           
        if (Auth::user()->Role == 'Admin')
        {
            return view('SiteInformation');
        }
        else
            return view('auth.accessreg');  
       
    }


    public function submitsitetname()
    {
             
        $data=input::all();
        $ldate = date('Y-m-d H:i:s');
        DB::table('sitenames')->insert([ 'site' => $data['site_name'], 'created_at' => $ldate]);
        return view('siteaddedsuccessfully');
    }


    public function DisableEnableProject()
    {
        /* When project button pressed 
           return DB table : Projects data to project_list.blade.php*/

           if (Auth::user()->Role == 'Admin')
        {
           $data= DB::table('projects')->get();
           return view('DisableEnableProject')->with('data',$data);
        }
        else
            return view('auth.accessreg');
        
    }

    public function submitprojectstatus()
    {
        $i=0;
        $data = Input::all();
        $username= Auth::user()->name;
        $data12 = DB::table('projects')->get();
        $sitename = DB::table('sitenames')->get();
                
        DB::table('projects')->update(['Status' => 'Disabled']);
        foreach($data as $key_name => $key_value)
        {           
            
            if(preg_match('/enable/',$key_name)) 
            { 
                preg_match("/enable(\d+)/", $key_name, $regs);
                $pos = $regs[1];
                $projectname = $data12[$pos]->project_name;
                if (Input::get('enable'.$pos) == 'on') {
                   $projectname = $data12[$pos]->project_name;
                    DB::table('projects')->where('project_name', $projectname)->update(['Status' => 'Enabled']);
                } 

            }
          
        }
      
        return view('statussuccessful');
    }

     public function openpdf()
     {

         $pdf = App::make('dompdf.wrapper');
         $filename = Input::file('file')->getClientOriginalName();
         $path = storage_path('reports/'.$filename);
        return Response::make(file_get_contents($path), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
     }


     public function LeaveApproval()
     {
        if (Auth::user()->Role == 'Admin')
        {
            $data = DB::table('leaveinfos')->where('Approval_Status', 'Scheduled')->get();
            $approval_options = statusapprove::lists('ApprovalStatus', 'ApprovalStatus');
            $approval_options->prepend('', '');
            // dd($approval_options);
            return view('LeaveApproval')->with('approval_options',$approval_options)->with('data',$data);
        }
        else
            return view('auth.accessreg');
       
     }

     public function LeaveApproved()
     {
        $data=Input::all();
        //dd($data);
        foreach($data as $key_name => $key_value)
        {            

            if(preg_match('/check_list/',$key_name)) 
            {
                
                preg_match("/check_list(\d+)/", $key_name, $regs);
                $pos = $regs[1];
                
                if($key_value=="on")
                {
                    $username = $data['name'.$pos];
                    $id=$data['id'.$pos];
                    $Approval_Status=$data['Approval_Status'.$pos];
                   
                    DB::table('leaveinfos')->where('Name', $username)->where('id',$id)->update(['Approval_Status' => $Approval_Status]);
                }

            }
           
        }
        return view('LeaveApprovalSuccessful');
     }


        public function Accessreader() {
            $username= Auth::user()->name;
          $data = DB::table('fpdatas')->where('UserName',$username)->get();
          
          //dd($username);
          return view('attendance_sheet')->with('data', $data);
        }


    public function underdevelopment() 
    {
        
        return view('underdevelopment');
    } 

     public function ServiceLog() 
    {
        $user_options = user::lists('name', 'name');
        $user_options->prepend('', '');
        $site_options = sitename::lists('site', 'site');
        $site_options->prepend('', '');
        $customer_options = mastercustomertable::lists('Customer_Name', 'Customer_Name'); 
        $customer_options->prepend('', '');
        $Project_options=project::lists('project_name','project_name');
        $Project_options->prepend('', '');
        $rating_options=leavetype::lists('id','id')->take('5');
        return view('ServiceLog')->with('user_options',$user_options)->with('rating_options',$rating_options)->with('site_options',$site_options)->with('customer_options',$customer_options)->with('Project_options',$Project_options);
    }


     public function SubmitServiceLog()
    {
        
                    $data=input::all();
                     //dd($data);
                    $start_time = $data['Servicestartdate']; // pulled from DB
                    $finish_time = $data['Serviceenddate'];// pulled from DB
                    $starttime = strtotime($start_time); // convert to timestring
                    $endtime = strtotime($finish_time); // convert to timestring
                    $diff = $endtime - $starttime; // do the math
                    $hours = ($diff)/60/60;
                   
                  $created = $data['callrecieveddate'];
                  $created_date = strtotime($created);
                    
                  $createdat = date('Y-m-d H:i:s',$created_date);
                  //dd($createdat);

                  $checkserviceID = DB::table('logs_services')->where('Service_ID',$data['Service_ID'])->value('Service_ID');
                    if ($checkserviceID)
                     {
                        return view('CustomerIdunique');
                     }

                    $Actionval = DB::table('logs_services')->where('Service_ID', $data['Service_ID'])->value('Action');

                    if($start_time!="" && $start_time!= $finish_time)
                    {                     
                            DB::table('logs_services')->insert(['Date_call_recieved' =>$data['callrecieveddate'],
                                                       'Company_Name' => $data['CompanyName'],
                                                       'Site_Name' => $data['Site'],
                                                       'Customer_name' => $data['Customername'],
                                                       'Problem_Description' => $data['Description'],
                                                       'Service_Start' => $data['Servicestartdate'],
                                                       'Service_End' => $data['Serviceenddate'],
                                                       'Total_Time_Spent' => $data['effort'],
                                                       'Customer_Feedback' => $data['Customer_Feedback'],
                                                       'Feedback_Rating' => $data['Rating'],
                                                       'Mactus_Service_Person' => $data['User_name'],
                                                       'created_at'=>$createdat,
                                                       'Project_Name'=>$data['Project_Name'],
                                                       'Action'=>$data['Action'],
                                                       'Service_ID'=>$data['Service_ID']
                                                      ]);
                    }
                    else
                    {          

                        return view('invalid');
                    }

                    return view('servicelogsuccessful');
    }


    public function Editservicelog()
    {
        $servicerecord = DB::table('logs_services')->get();
         //dd($servicerecord);
        return view('servicelogrecord')->with('servicerecord',$servicerecord);
         
    }
    
    public function submiteditservicelog()
    {
        $data=input::all();
         //dd($data);
        foreach($data as $key_name => $key_value)
        {            

            if(preg_match('/check_list/',$key_name)) 
            {
                
                preg_match("/check_list(\d+)/", $key_name, $regs);
                $pos = $regs[1];
                
                if($key_value=="on")
                {
                    $appaction = DB::table('logs_services')->where('Project_Name',$data['Project_Name'.$pos])->value('Action');
                   //dd($appaction);
                    $projectname = $data['Project_Name'.$pos];
                    $timespent=$data['timespent'.$pos];
                    //dd($timespent);
                    $id=$data['id'.$pos];
                    $action=$data['Action'.$pos];

                    DB::table('logs_services')->where('project_name', $projectname)->where('id',$id)
                    ->update(['Total_Time_Spent'=>$timespent]);

                    DB::table('logs_services')->where('project_name', $projectname)->where('id',$id)
                    ->update(['Action' => $action]);
                }

            }
           
        }
        return view('servicelogsuccessful');
    }




    public function filterdate()
    {
         $customer_options = mastercustomertable::lists('Customer_Name', 'Customer_Name'); 
         $customer_options->prepend('', '');
         $Project_options=project::lists('project_name','project_name');
         $Project_options->prepend('', '');
        return view('filterdate')->with('customer_options',$customer_options)->with('Project_options',$Project_options);
    }


     public function generateservicelogreport()
    {
        
        $fil=Input::all();
   
        //dd($fil);


        $fromdatestr = ($fil['ReportFrom']);
        $todatestr = ($fil['ReportTo']);
        $customer_name= $fil['Customer_Name'];
        $project_name= $fil['Project_Name'];
        date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');
        $current=auth::user()->name;
        $fromdate = strtotime($fromdatestr);
        $todate=strtotime($todatestr);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);
        $DBdata= Auth::user()->name;


        if($customer_name == "")
        {
           return view('selectdetails');

        }
       
        else  if($project_name=="")
        {
            $data = DB::table('logs_services')->whereBetween('created_at', [$startdate,$enddate])->where('Company_Name',$customer_name)->get();


         
        }
        else
            $data = DB::table('logs_services')->whereBetween('created_at', [$startdate,$enddate])->where('Company_Name',$customer_name)->where('Project_Name',$project_name)->get();

            //dd($data);

     


        $allComplete = '<body>


                                    <table >
                                        <tr><h3> Mactus Technology Solutions <br> Service Log Report</h3></tr>       
                                        
                                    </table>
                                    <table>
                                     <tr>  Printed By: '.$current.' <br> Print Date: '.$ldate.'<br> Customer Name: '. $customer_name.' <br></tr>
                                      
                                    </table>


                        <table border=1 style='.'"border-collapse:collapse">
                        <tr>
                            <th> ID </th>
                            <th> Date <br>call recieved</th> 
                            <th> Company<br>Name</th> 
                            <th> Project Name</th>
                            <th> Site<br>Name</th>
                            <th> Customer<br>name </th>
                            <th> Problem<br>Description</th>
                            <th> Service Start</th>
                            <th> Service End</th>
                            <th> Total Time<br>Spent</th>
                            <th> Mactus_Service<br>Person</th>
                        </tr>';


        foreach ($data as $row)
         {
            //dd($row);
        //}
              $allComplete = $allComplete.
                            "<tr>
                                    <td>".$row->id."</td>
                                    <td>".$row->Date_call_recieved."</td>
                                    <td>".$row->Company_Name."</td>
                                    <td>".$row->Project_Name."</td>
                                    <td>".$row->Site_Name."</td>
                                    <td>".$row->Customer_name."</td>
                                    <td>".$row->Problem_Description."</td>
                                    <td>".$row->Service_Start."</td>
                                    <td>".$row->Service_End."</td>
                                    <td>".$row->Total_Time_Spent."</td>
                                    <td>".$row->Mactus_Service_Person."</td>

                            </tr>";
        }

         

        $allComplete =$allComplete ."</table></body>";
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream() ;
        //return view('PdfView')->with('data',$data); 
       
    }




     public function AddCustomer()
    {    

        if (Auth::user()->Role == 'Admin')
        {
            return view('AddCustomer');
        }
        else
            return view('auth.accessreg');         
       
    }


    public function SubmitNewCustomer()
    {
             $data=Input::all();
            // dd($data);
             date_default_timezone_set('Asia/Kolkata');
             $ldate = date('Y-m-d H:i:s');
            
            $checkcustomerID = DB::table('mastercustomertables')->where('Customer_Id',$data['Customer_Id'])->value('Customer_Id');
            if ($checkcustomerID)
             {
                return view('CustomerIdunique');
             }

            else
            {
             DB::table('mastercustomertables')->insert([ 'Customer_Id' => $data['Customer_Id'], 
                                                      'Customer_Name' => $data['Customer_Name'],
                                                      'Customer_Address' => $data['Address'],
                                                      'Customer_Contact' => $data['Contact_Details'],
                                                      'created_at'=> $ldate
                                                  
                                                  ]);
             return view('customeraddedsuccessfully');
         }
    }

    public function InvoiceInformation()
    {   

        if (Auth::user()->Role == 'Admin')
        {
            $PO_options = project::lists('PO_Number','PO_Number');
            $PO_options->prepend('', '');
            $user_options = user::lists('name','name');
            $user_options->prepend('', '');
            $Project_options=project::lists('project_name','project_name');
            $Project_options->prepend('', '');
            $customer_options = mastercustomertable::lists('Customer_Name', 'Customer_Name'); 
            $customer_options->prepend('', '');
        
            return view('InvoiceInformation')->with('PO_options',$PO_options)->with('Project_options',$Project_options)->with('customer_options',$customer_options)->with('user_options',$user_options);
        }
        else
            return view('auth.accessreg');   
       
    }

   
    public function SubmitInvoiceInformation()
    {
             
        $data=input::all();
        //dd($data);
       
       
        $Invoice_Number = $data['Invoice_Number'];         
        date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');

        $checkinvoicenumber = DB::table('invoices')->where('Invoice_Number',$data['Invoice_Number'])->value('Invoice_Number');
        //dd($checkinvoicenumber);

        if($Invoice_Number =="")
        {
            return view('invalidinvoicenumber');
        }

        
        elseif ($checkinvoicenumber)
        {
            return view('Invoicenounique');
        }


        else
        {
            DB::table('invoices')->insert([ 'Customer_Name' => $data['Customer_Name'],
                                        'Customer_PO_Number'=>$data['PO_Number'],
                                        'Project_Name' => $data['Project_Name'],
                                        'Invoice_Number'=>$data['Invoice_Number'],
                                        'Invoice_Date'=>$data['invoicedate'],
                                        'Invoice_Value'=>$data['Invoice_Value'],
                                        'Mactus_Value'=>$data['Mactus_Value'],
                                        'VAT'=>$data['VAT'],
                                        'Service_Tax'=>$data['Service_Tax'],
                                        'Invoice_Submitted_By'=>$data['user_name'],
                                        'Paymet_Rcvd_On'=>$data['payment_recd_on'],
                                        'Invoice_Description'=>$data['Invoice_Description'],
                                        'created_at'=>$ldate

                                    ]);

        return view('invoiceaddedsuccessfully');
        }
    }



// Service TAX
    public function Taxfilterdate()
    {
        return view('Taxfilterdate');
    }


     public function generateservicetaxlogreport()
    {
        
        $fil=Input::all();
        $fromdatestr = ($fil['ReportFrom']);
        $todatestr = ($fil['ReportTo']);
        $fromdate = strtotime($fromdatestr);
        $todate=strtotime($todatestr);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);
        $DBdata= Auth::user()->name;
        $data = DB::table('invoices')->whereBetween('created_at', [$startdate,$enddate])->get();


        $allComplete = '<body>
                        <table >
                            <tr><h3> Mactus Technology Solutions <br> Service Tax And VAT Report</h3></tr>       
                        </table>
                        <table border=1 style='.'"border-collapse:collapse">
                        <tr>
                            <th> Customer_PO_Number </th>
                            <th> Project Name</th> 
                            <th> Customer Name</th>
                            <th> Invoice Number</th>
                            <th> Invoice Date </th>
                            <th> Invoice Value</th>
                            <th> Mactus Value</th>
                            <th> Service Tax</th>
                            <th> VAT </th>
                            
                        </tr>';


        foreach ($data as $row)
         {
              $allComplete = $allComplete.
                            "<tr>
                                    <td>".$row->Customer_PO_Number."</td>
                                    <td>".$row->Project_Name."</td>
                                    <td>".$row->Customer_Name."</td>
                                    <td>".$row->Invoice_Number."</td>
                                    <td>".$row->Invoice_Date."</td>
                                    <td>".$row->Invoice_Value."</td>
                                    <td>".$row->Mactus_Value."</td>
                                    <td>".$row->Service_Tax."</td>
                                    <td>".$row->VAT."</td>
                                    
                            </tr>";
        }

         $totaltax='';
         foreach ($data as $row)
         {
            $totaltax=$totaltax + $row->Service_Tax;
         }

         $totalvat='';
         foreach ($data as $row)
         {
            $totalvat=$totalvat + $row->VAT;
         }
         
         $allComplete =$allComplete .
        '<tr> 
              <td colspan="9">  Total Service Tax is :'.$totaltax.'</td>
             
         </tr>'.
         '<tr> 
              <td colspan="9">  Total VAT is :'.$totalvat.'</td>
             
         </tr>';

        $allComplete =$allComplete ."</table></body>";
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream() ;
        
       
    }



    // payment pending

    public function Pendingfilterdate()
    {
        return view('Pendingfilterdate');
    }


     public function generatependinglogreport()
    {
        
        $fil=Input::all();
       // dd($fil);

        date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');


        $fromdatestr = ($fil['ReportFrom']);
        $todatestr = ($fil['ReportTo']);

        $fromdate = strtotime($fromdatestr);
        $todate=strtotime($todatestr);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);

      

        $data = DB::table('invoices')->whereBetween('created_at', [$startdate,$enddate])->where('Paymet_Rcvd_On', '')->get();
        //dd($data);
        $totaltax='';
        foreach ($data as $row)
        {
            $totaltax=  $row->created_at;
        }
        $datetime1 = new DateTime();
        $datetime2 = new DateTime($totaltax);
        $interval = $datetime1->diff($datetime2);
        $elapsed = $interval->format('%a');
   
        if($elapsed > 30)
        {
           $allComplete = 



                          '<body>
                            <table >
                                <tr><h3> Mactus Technology Solutions <br>Pending payments more then one month</h3></tr>       
                            </table>

                            <table border=1 style='.'"border-collapse:collapse">
                            <tr>
                                <th> Customer Name</th>
                                <th> Customer_PO_Number </th>
                                <th> Project Name</th> 
                                <th> Invoice Number</th>
                                <th> Invoice Date </th>
                                 

                            </tr>';


            foreach ($data as $row)
             {
                  $allComplete = $allComplete.
                                "<tr>
                                        <td>".$row->Customer_Name."</td>
                                        <td>".$row->Customer_PO_Number."</td>
                                        <td>".$row->Project_Name."</td>
                                        <td>".$row->Invoice_Number."</td>
                                        <td>".$row->Invoice_Date."</td>


                                        
                                </tr>";

            }
        
        
       
        
        }
        //$allComplete =$allComplete;
        $allComplete = $allComplete ."</table></body>";
         $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($allComplete)->setPaper('a4');
        return $pdf->stream();

       
    }

   
    public function viewprojects()
    {
       $data = DB::table('projects')->get();
       return view('Estimatedtime')->with('data',$data);
      // return view('Estimated_list',compact('data'));
    }

    public function submitestimatedtime()
    {
        $data = Input::all();
        //dd($data);
        foreach($data as $key_name => $key_value)
        {            

            if(preg_match('/check_list/',$key_name)) 
            {
                
                preg_match("/check_list(\d+)/", $key_name, $regs);
                $pos = $regs[1];
                
                if($key_value=="on")
                {
                    $projectname = $data['project_name'.$pos];
                    $estimated=$data['Estimated_Time'.$pos];
                    $id=$data['id'.$pos];
                   // echo $projectname;
                    //echo $estimated;
                     //dd($id);
                   
                    DB::table('projects')->where('project_name', $projectname)->where('id',$id)->update(['Estimated_Time' => $estimated]);
                }

            }
           
        }
        return view('Estimatetimeupdated');
    }


    public function ManualEntry()
    {
       // $username=auth::user()->name();
        $site_options = sitename::lists('site', 'site');
        $site_options->prepend('', '');
        return view('ManualEntry')->with('site_options',$site_options);
    }


    public function submitmanualentry()
    {
        $data = Input::all();
        // dd($data);

        $username=auth::user()->name;
        date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');
        
        $checktime = DB::table('fpdatas')->where('INREC_DateTime',$data['starttime'])->value('INREC_DateTime');
         //dd($checktime);
                    if ($checktime)
                     {
                        return view('timeunique');
                     }


        DB::table('fpdatas')->insert([ 'UserName' => $username,
                                        'INREC_DateTime'=>$data['starttime'],
                                        'Description'=>$data['Description1'],
                                        'Site'=>$data['site'],
                                        'created_at'=>$ldate

                                    ]);

        DB::table('fpdatas')->insert([ 'UserName' => $username,
                                        'INREC_DateTime'=>$data['endtime'],
                                        'Description'=>$data['Description2'],
                                        'Site'=>$data['site'],
                                        'created_at'=>$ldate

                                    ]);

       

        return view('manualentryaddedsuccessfully');
         
    }

    public function LeaveReport()
    {
         $user_options=user::lists('name','name');
         $user_options->prepend('', '');
        return view('leavefilterdate')->with('user_options',$user_options);
    }


    public function GetLeaveReport()
    {
        $data = Input::all();
       // dd($data);
        $fromdatestr = ($data['ReportFrom']);
        $todatestr = ($data['ReportTo']);
        $username=$data['User_Name'];
        $ldate = date('Y-m-d H:i:s');
        $current=auth::user()->name;
       
        $fromdate = strtotime($fromdatestr);
        $todate=strtotime($todatestr);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);
       $report = DB::table('leaveinfos')->whereBetween('created_at', [$startdate,$enddate])->get();

       // dd($report);
         
                           $data = DB::table('leaveinfos')->where('Name',$data['User_Name'])->whereBetween('created_at', [$startdate,$enddate])->get();
                         

                    $allComplete = '<body>

                                    <table >
                                        <tr><h3> Mactus Technology Solutions <br>Leave Report</h3></tr>       
                                    </table>

                                    <table  border=1 style="border-collapse:collapse" style= "width:82%">
                                    <tr>
                                        <th style=width:20%> User Name</th> 
                                        <th> Leave Type</th> 
                                        <th> Reason</th>
                                        <th> Approval Status</th>
                                        <th> Available Leave</th>
                                    </tr>';
                    foreach ($data as $row)
                     {
                          $allComplete = $allComplete.
                                        "<tr>
                                                <td>".$row->Name."</td>
                                                <td>".$row->Leave_Type."</td>
                                            
                                                <td>".$row->Reason."</td>
                                                <td>".$row->Approval_Status."</td>
                                                <td>".$row->Available_Leave."</td>
                                                
                                                
                                        </tr>";


                    }
                  
                    $allComplete =$allComplete ."</table></body>";
                    $pdf = App::make('dompdf.wrapper');
                    $pdf->loadHTML($allComplete);
                    return $pdf->stream();
                }
                

    


    public function EditLeaveValue()
    {
        $data =DB::table('leavetypes')->get();
        return view('leaveavailableedit')->with('data',$data);
       
    }


    public function Submitavailableleave()
    {
        $data = input::all();
          //dd($data);
         foreach($data as $key_name => $key_value)
        {            
            if(preg_match('/check_list/',$key_name))
            {
                preg_match("/check_list(\d+)/", $key_name, $regs);
                $pos = $regs[1];
                //dd($pos);
                $leavetype=$data['leavetype'.$pos];
                $data1 = DB::table('leavetypes')->where('leavetype',$leavetype)->update(['Available_Leave' => $data['availableleave'.$pos]]);
                //dd($data1);
            }
        }
        return view('leavetypesuccessful');
    }

    public function Generateservicelog()
    {
        $data = DB::table('logs_services')->where('id', DB::raw("(select max(`id`) from logs_services)"))->get();
        $current=auth::user()->name;
        date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');
        $allComplete = '<body>


                                    <table >
                                        <tr><h3> Mactus Technology Solutions <br> Service Log Report</h3></tr>       
                                        
                                    </table>
                                    <table>
                                     <tr>  Printed By: '.$current.' <br> Print Date: '.$ldate.'<br> <br></tr>
                                      
                                    </table>


                                   

                        <table border=1 style='.'"border-collapse:collapse">
                        <tr>
                            <th> Date <br>call recieved</th> 
                            <th> Project Name</th>
                            <th> Site<br>Name</th>
                            <th> Customer<br>name </th>
                            <th> Problem<br>Description</th>
                            <th> Service Start</th>
                            <th> Service End</th>
                            <th> Total Time<br>Spent</th>
                            <th> Mactus_Service<br>Person</th>
                        </tr>';


        foreach ($data as $row)
         {
              $allComplete = $allComplete.
                            "<tr>
                                    <td>".$row->Date_call_recieved."</td>
                                    <td>".$row->Project_Name."</td>
                                    <td>".$row->Site_Name."</td>
                                    <td>".$row->Customer_name."</td>
                                    <td>".$row->Problem_Description."</td>
                                    <td>".$row->Service_Start."</td>
                                    <td>".$row->Service_End."</td>
                                    <td>".$row->Total_Time_Spent."</td>
                                    <td>".$row->Mactus_Service_Person."</td>

                            </tr>";
        }

         

        $allComplete =$allComplete ."</table></body>";
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream() ;
    }


  Public function googlemap()
 {
  //return view('geolocation');
  //return view('geolocationsongooglemap');
  //return view('geocoordinate');
  //return view('BangaloreOnMap');
  return view('MultipleMarkerOnMap');
  //return view ('multimarkerincity');
 }
 public function geolocation()
 {
   $coordinate = DB::table('googlemaplocations')->get();

    $Latitude= geomaplocations::lists('Latitude','Latitude');
    $Latitude->prepend('', '');

    $Longitude= geomaplocations::lists('Longitude','Longitude');
    $Longitude->prepend('', '');


    //dd($coordinate);
  
  return view('GoogleMapAPIform')->with('Latitude',$Latitude)->with('Longitude',$Longitude);

  // return view('multimarker')->with('Latitude',$Latitude)->with('Longitude',$Longitude);

 }
  
public function geolocationshow()
  {
    $data = Input::all();
    //dd($data);
    
     return view('GoogleMapAPIformResult')->with('data',$data);
  }

public function Multimarker()
{
   $Latitude= geomaplocations::lists('Latitude','Latitude');
    $Latitude->prepend('', '');

    $Longitude= geomaplocations::lists('Longitude','Longitude');
    $Longitude->prepend('', '');

    /*$Latitude1= geomaplocations::lists('Latitude','Latitude');
    $Latitude1->prepend('', '');

    $Longitude1= geomaplocations::lists('Longitude','Longitude');
    $Longitude1->prepend('', '');*/

    return view('multiMarker')->with('Latitude',$Latitude)->with('Longitude',$Longitude);//->with('Latitude1',$Latitude1)->with('Longitude1',$Longitude1);

}
public function multimarkershow()
{
  $data = Input::all();
  //dd($data);
  return view ('MultiMarkerShow')->with('data',$data);

}

}

