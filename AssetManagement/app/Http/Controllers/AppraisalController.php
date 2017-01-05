<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App;
use PDF;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\projectdetails;
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
use App\appraisalstatus;
use App\goalstatus;
use App\goalrating;
use App\appraisaldetails;
use App\goalfororganization;
use App\appraisalmaster;
class AppraisalController extends Controller
{
    //AppraisalPage
    public function AppraisalPage()
    {
    	// if (Auth::user()->Role == 'Admin')
       // {
           return view('AppraisalPage');
       // }
        //else
        //return view('auth.accessreg');
    	
    }

    public function DefineRelationship()
    {
    	$user_options = user::where('Role', 'User')->lists('name', 'name');
    	$mgr_options = user::where('Role', 'Manager')->lists('name','name');
		$mgr_options->prepend('', '');
		$user_options->prepend('', '');


    	return view('DefineRelationship')->with('user_options',$user_options)->with('mgr_options',$mgr_options);
    	
    }

    public function empmgrrelationshipsubmit()
    {
    	$data = Input::all();
    	$username = $data['username'];
    	$primary_mgr = $data['primary_mgr'];
    	$sec_mgr1 = $data['scecondary_mgr1'];
    	$sec_mgr2 = $data['scecondary_mgr2'];

    	date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');
       if($username == "")
    	{
    		return view('defineusername');
    	}
    	else if($primary_mgr == "")
    	{
    		return view('defineprimarymanager');
    	}
    	else if($primary_mgr == $sec_mgr1)
    	{
    		return view('samemanager');
    	}
    	else if($primary_mgr == $sec_mgr2)
    	{
    		return view('samemanager2');
    	}
    	else if($sec_mgr2 == $sec_mgr1)
    	{
    		return view('samemanager3');
    	}
    	else
    	{
    		DB::table('employeemanagerrelationships')->insert
    								([ 
    									'username' => $username,
                                        'primary_manager' => $primary_mgr, 
                                        'secondary_manager1' => $sec_mgr1,
                                        'secondary_manager2'=>$sec_mgr2,
                                        'created_at' => $ldate
                                    ]);
                    echo 'data is inserted in DB';
    	}
    }

	public function AppraisalDetails()
	{
		$Appraisal_options = appraisalstatus::lists('status','status');
		$Goalstatus_options = goalstatus::lists('Goal_Status','Goal_Status');
		$Goalrating_options = goalrating::lists('Goal_Rating','Goal_Rating');
		$Appraisal_options->prepend('', '');
		$Goalstatus_options->prepend('', '');
		$Goalrating_options->prepend('', '');
        //$user_options = user::lists('name','name');
        //$ProjectGoalstatus_options=project::lists('project_name','project_name');
        //$customer_options = mastercustomertable::lists('Customer_Name', 'Customer_Name'); 
		return view('AppraisalDetails')->with('Appraisal_options',$Appraisal_options)->with('Goalstatus_options',$Goalstatus_options)->with('Goalrating_options',$Goalrating_options);
	} 

	public function SubmitAppraisalDetails()
	{
		$data=Input::all();
		 //dd($data);
		$appraisalid = $data['Appraisal_ID'];
		$start_time = $data['appraisalstartfrom']; // pulled from DB
		$finish_time = $data['appraisalend'];// pulled from DB
        $starttime = strtotime($start_time); // convert to timestring
        $endtime = strtotime($finish_time); // convert to timestring
        $diff = $endtime - $starttime; // do the math
        $hours = ($diff)/60/60;

        date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');

         $checkappraisalID = DB::table('appraisaldetails')->where('Appraisal_ID',$data['Appraisal_ID'])->value('Appraisal_ID');
            if ($checkappraisalID)
             {
                return view('AppraisalIdunique');
             }

		 if($starttime < $endtime)
                    {                     
                            $newrec = new appraisaldetails;
                            $newrec->Appraisal_ID = $appraisalid;
                            $newrec->Appraisal_period_start = $data['appraisalstartfrom'];
                            $newrec->Appraisal_period_end =  $data['appraisalend'];
                            $newrec->Appraisal_status= $data['status'];
                            $newrec->Goal_Status = $data['Goal_Status'];
                            $newrec->Goal_Rating = $data['Goal_Rating'];
                            $newrec->created_at=$ldate;
                            $newrec->save(); 
                            return view('appraisaladdedsuccessfully');
                    }
                    else
          return view('appraisalinvaliddate');


	}

	public function AddOrganizationGoals()
	{
		
		return view('Addorganizationgoal');
	} 

	public function SubmitAddOrganizationGoals()
	{
		$data = input::all(); 
		date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');

        $rowcount = DB::table('goalfororganizations')->count();
        $checkgoalID = DB::table('goalfororganizations')->where('Goal_ID',$data['goalid'])->value('Goal_ID');
        
        
        if ($checkgoalID)
        {
            return view('GoalIdunique');
        }
        else if($rowcount >=12)
        {
        	return view('Goalcountexceeded');
        }
        else
        {
             $newrec = new goalfororganization;
             $newrec->Goal_ID = $data['goalid'];
             $newrec->Goal_Description = $data['goaldescription'];
             $newrec->created_at=$ldate;
             $newrec->save(); 
             return view('goaladdedsuccessfully');
        }

	}


	

	public function AppraisalInformation()
	{	
		$currentuser=Auth::user()->name;
		if(Auth::user()->Role == 'User')
		{
			$data = DB::table('appraisaldetails')->orderBy('id', 'desc')->take(1)->get();
			$project_options = project::lists('project_name','project_name');
			$project_options->prepend('', '');
			$orggoal_options = goalfororganization::lists('Goal_Description','Goal_Description');
			$orggoal_options->prepend('', '');
			return view('userappraisalinformation')->with('data',$data)->with('orggoal_options',$orggoal_options)->with('project_options',$project_options);
		}

		elseif (Auth::user()->Role == 'Manager')
		{
			$appdata = DB::table('appraisaldetails')->orderBy('id', 'desc')->take(1)->get();
			$data = DB::table('employeemanagerrelationships')->where('primary_manager',$currentuser)->get();
           // dd($data);
			$masterdata = DB::table('appraisalmasters')->get();
     		return view('ViewAppraisalInformation')->with('data',$data)->with('masterdata',$masterdata)->with('appdata',$appdata);
		}
		else
		return view('auth.accessreg');
	} 


	

	public function SubmitUserAppraisal()
	{
		$data = input::all();
		$appid = DB::table('appraisaldetails')->orderBy('id', 'desc')->take(1)->value('Appraisal_ID');
		$appstart = DB::table('appraisaldetails')->orderBy('id', 'desc')->take(1)->value('Appraisal_period_start');
		$append = DB::table('appraisaldetails')->orderBy('id', 'desc')->take(1)->value('Appraisal_period_end');
		
		$username=auth::user()->name;
		$start_time = $appstart ;// pulled from DB
		$finish_time = $append ;// pulled from DB
        $starttime = strtotime($start_time); // convert to timestring
        $endtime = strtotime($finish_time); // convert to timestring
        $diff = $endtime - $starttime; // do the math
        $hours = ($diff)/60/60;

        date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');

         if($starttime < $endtime)
                    {          	

                            $newrec = new appraisalmaster;
                            $newrec->User_Name=$username;
                            $newrec->Appraisal_ID = $appid;
                            $newrec->Appraisal_period_start = $appstart;
                            $newrec->Appraisal_period_end =  $append;
                            $newrec->Project_Name=$data['project_options'];

                            $newrec->Goal1_Description= $data['orggoal_options1'];
                            $newrec->Goal1_Start_Period = $data['g1startdate'];
                            $newrec->Goal1_End_Period = $data['g1enddate'];

                            $newrec->Goal2_Description= $data['orggoal_options2'];
                            $newrec->Goal2_Start_Period = $data['g2startdate'];
                            $newrec->Goal2_End_Period = $data['g2enddate'];

                            $newrec->Goal3_Description= $data['orggoal_options3'];
                            $newrec->Goal3_Start_Period = $data['g3startdate'];
                            $newrec->Goal3_End_Period = $data['g3enddate'];

                            $newrec->Goal4_Description= $data['orggoal_options4'];
                            $newrec->Goal4_Start_Period = $data['g4startdate'];
                            $newrec->Goal4_End_Period = $data['g4enddate'];

                            $newrec->Self_Rating = $data['Self_Rating'];
							//$newrec->Manager_Rating = $data[''];
							$newrec->Remarks= $data['Remarks'];
							//$newrec->Appraisal_Status= $data[''];
							
                            $newrec->created_at=$ldate;
                            $newrec->save(); 
                            return view('appraisaladdedsuccessfully');
                    }
                    else
          return view('appraisalinvaliddate');

	}



public function view1()
    {
            $data = Input::all();
            dd($data);
            $currentuser=Auth::user()->name;
            $appdata = DB::table('appraisaldetails')->orderBy('id', 'desc')->take(1)->get();
            $data = DB::table('employeemanagerrelationships')->where('primary_manager',$currentuser)->get();
            $masterdata = DB::table('appraisalmasters')->get();
            //($masterdata);
            $project_options = project::lists('project_name','project_name');
            $project_options->prepend('', '');
            $orggoal_options = goalfororganization::lists('Goal_Description','Goal_Description');
            $orggoal_options->prepend('', '');

            return view('AppraisalInformation')->with('data',$data)->with('masterdata',$masterdata)->with('appdata',$appdata)->with('orggoal_options',$orggoal_options)->with('project_options',$project_options);
        
        
    }



public function moredetailsofuser()
    {
        $data = Input::all();

        foreach($data as $key_name => $key_value)
        {            

            if(preg_match('/check_list/',$key_name)) 
            {
                
                preg_match("/check_list(\d+)/", $key_name, $regs);
                $pos = $regs[1]+1;
                
                if($key_value=="on")
                {
                    $currentuser=Auth::user()->name;
                    $appdata = DB::table('appraisaldetails')->orderBy('id', 'desc')->take(1)->get();
                    $data = DB::table('employeemanagerrelationships')->where('primary_manager',$currentuser)->get();
                    $masterdata = DB::table('appraisalmasters')->where('id', $pos)->get();
                    return view('AppraisalInformation')->with('masterdata',$masterdata);
                }

            }
           
        }
    }


    public function SubmitManagerAppraisal()
    {
        $data = input::all();
        dd($data);
        date_default_timezone_set('Asia/Kolkata');
        $ldate = date('Y-m-d H:i:s');
        //dd($data);
        $username = $data['User_Name'];
        $projectname = $data['Project_Name'];
        DB::table('appraisalmasters')
                    ->where('User_Name', $username)
                    ->where('Project_Name',$projectname)
                    ->update
                    ([
                        'Goal1_Description' => $data['Goal1_Description'],
                        'Goal1_Start_Period'=> $data['Goal1_Start_Period'],
                        'Goal1_End_Period'  => $data['Goal1_End_Period'],

                        'Goal2_Description' => $data['Goal2_Description'],
                        'Goal2_Start_Period'=> $data['Goal2_Start_Period'],
                        'Goal2_End_Period'  => $data['Goal2_End_Period'],

                        'Goal3_Description' => $data['Goal3_Description'],
                        'Goal3_Start_Period'=> $data['Goal3_Start_Period'],
                        'Goal3_End_Period'  => $data['Goal3_End_Period'],

                        'Goal4_Description' => $data['Goal4_Description'],
                        'Goal4_Start_Period'=> $data['Goal4_Start_Period'],
                        'Goal4_End_Period'  => $data['Goal4_End_Period'],

                        'Manager_Rating'    => $data['Manager_Rating'],
                        'Remarks'           => $data['Remarks'],
                        'Appraisal_Status'  => $data['status'],
                        'updated_at'        => $ldate
 
                    ]);
         return view('Appraisalsuccessful');
    }
	

}
