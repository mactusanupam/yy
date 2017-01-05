<?php



namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use DB;
use App;
use PDF;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\mastercustomertable;
use App\enabledisable;
use App\leadtable;
use DateTime;
use App\user;
use Carbon\Carbon;

class leadcontroller extends Controller
{
    public function AddNewLead()
    {   

         if (Auth::user()->Role == 'Admin' || Auth::user()->Role = 'Manager')
        {
           
        $status_options = enabledisable::lists('enabledisable', 'enabledisable'); 
        $customer_options = mastercustomertable::lists('Customer_Name', 'Customer_Name'); 
        $lead_options = leadtable::lists('LeadID','LeadID');
        $user_options = user::lists('name', 'name');
        return view('AddNewLead')->with('status_options',$status_options)
                                 ->with('lead_options',$lead_options )
                                 ->with('customer_options',$customer_options)
                                 ->with('user_options',$user_options);
        }

        else
            return view('auth.accessreg');


        
    }

     public function  SubmitLeadInformation()
    {     
    	$data= Input::all();
        //dd($data);
    	date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d');

        $db_rec = new Leadtable;
    	$db_rec->LeadID = $data['leadID'];
        $db_rec->customer_name = $data['customer_name'];
    	$db_rec->LeadDescription = $data['LeadDescription'];
    	$db_rec->LeadProbability = $data['LeadProbability'];
    	$db_rec->LeadEstimatedValue= $data['LeadEstimatedValue'];
    	$db_rec->LeadEstimatedStartDate = $data['LeadEstimatedStartDate'];
    	$db_rec->LeadStatus = $data['LeadStatus'];
        $db_rec->LeadUpdatedDateTime=$ldate;
        $db_rec->created_at=$ldate;
        $db_rec->User_Name=$data['User_Name'];
        $db_rec->Lead_Name=$data['Lead_Name'];
    	$db_rec->save();

         return view('leadaddedsuccessfully');
    }

    public function  display_on_lead_value()
    {     
    	$data= DB::table('leadtables')->where('LeadStatus', '!=', '0' )
    								  ->where('LeadStatus', '!=', '100' )
    								  ->orderBy('LeadEstimatedValue', 'desc')
    								  ->get();

 

         return view('DisplayLead',compact('data'));
    }

    public function  display_on_lead_progress()
    {     
    	$data= DB::table('leadtables')->where('LeadStatus', '!=', '0' )
    								  ->where('LeadStatus', '!=', '100' )
    								  ->orderBy('LeadStatus', 'desc')
    								  ->get();

 

         return view('DisplayLead',compact('data'));
    }

    public function  display_on_lead_start_date()
    {     
    	$data= DB::table('leadtables')->where('LeadStatus', '!=', '0' )
    								  ->where('LeadStatus', '!=', '100' )
    								  ->orderBy('LeadEstimatedStartDate', 'desc')
    								  ->get();

 

         return view('DisplayLead',compact('data'));
    }

    public function leadreport()
    {
        return view('leadfilterdate');
      
    }
    public function submitleadreport()
    {
        $fil = Input::all();
        
        $fromdatestr = ($fil['ReportFrom']);
        $todatestr = ($fil['ReportTo']);
        $fromdate = strtotime($fromdatestr);
        $todate=strtotime($todatestr);
        $startdate = date('Y-m-d',$fromdate);
        $enddate = date('Y-m-d',$todate);
        date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');
        $current = auth::user()->name;
        $data = DB::table('leadtables')->whereBetween('created_at', [$startdate,$enddate])->get();

        $allComplete = '<body>

                        <table >
                            <tr><h3> Mactus Technology Solutions <br> Lead Progress Report</h3></tr>       
                        </table>
                        <table>
                            <tr> Print Date Time: '.$ldate.' <br> Printed By: '.$current.' </tr>
                        </table>

                        <table border=1 style='.'"border-collapse:collapse">
                        <tr>
                            <th> Lead ID  </th>
                            <th> Description</th> 
                            <th> Probability<br>(in %)</th>
                            <th> Estimated Value</th>
                            <th> Start Date </th>
                            <th> Status<br>(in %)</th>
                            <th> Customer Name</th>
                            <th> Focal Name</th>
                            <th> Lead Action </th>
                            
                            
                        </tr>';


        foreach ($data as $row)
         {
              $allComplete = $allComplete.
                            "<tr>
                                    <td>".$row->LeadID."</td>
                                    <td>".$row->LeadDescription."</td>
                                    <td>".$row->LeadProbability."</td>
                                    <td>".$row->LeadEstimatedValue."</td>
                                    <td>".$row->LeadEstimatedStartDate."</td>
                                    <td>".$row->LeadStatus."</td>
                                    <td>".$row->Customer_Name."</td>
                                    <td>".$row->User_Name."</td>
                                    <td>".$row->Lead_Action."</td>
                                     
                                    
                            </tr>";
        }

        
        $allComplete =$allComplete ."</table></body>";
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream() ;
       
    }


    public function viewleadproject()
    {
       $data=DB::table('leadtables')->get();
       return view('viewleaddetails')->with('data',$data);
    }

    public function moredetailsoflead()
    {
        $data1=input::all();
        
         foreach($data1 as $key_name => $key_value)
        {            

            if(preg_match('/check_list/',$key_name)) 
            {
                
                preg_match("/check_list(\d+)/", $key_name, $regs);
                 if($key_value=="on")
                {
                    $pos = $regs[1];
                $lid=$data1['LeadID'.$pos];
               //    dd($lid);
                $currentuser=Auth::user()->name; //->where('id', $pos)
                $data=DB::table('leadtables')->where('LeadID', $lid)->get();
               // dd($data1);
                return view('leadInformation')->with('data',$data);
                 }

            }
           
        }
    }

    public function Submitleadinfo()
    {
        $data = Input::all();
        date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');
        $leadid = $data['Lead_ID'];
        $username=$data['User_Name'];
        

        $update = [
            'LeadDescription'     => $data['LeadDescription'],
            'LeadProbability'   => $data['LeadProbability'],
            'LeadEstimatedValue'     => $data['LeadEstimatedValue'],
            'LeadEstimatedStartDate'    => $data['LeadEstimatedStartDate'],
            'LeadUpdatedDateTime'=> $ldate,
            'LeadStatus'=>$data['LeadStatus'],
            'Lead_Action'=>$data['Lead_Action']

        
        ];
           
                   
        DB::table('leadtables')->where('LeadID', $leadid)->where('User_Name',$username)->update($update);
         return view('leaddetailupdated');
    }

   

}


            //$table->dateTime('LeadUpdatedDateTime');
