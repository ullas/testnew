<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


/**
 * Journeys Controller
 *
 * @property \App\Model\Table\JourneysTable $Journeys
 */
class JourneysController extends AppController
{
	 public $components = ['Datatable','Datatabletest','DatatableGroup'];

    private function toPostDBDate($date){
	
		 $ret="";
		 $parts=explode("/",$date);
		 if(count($parts)==3){
		 	// $ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
			$ret= $date= trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
		 }
		
	  return $ret;
	}
	public function topSpeedAjaxData()
	{
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
     	$fields = array();
		 
		// $fields[0] = array("name" =>"Journeys.id"  , "type" => "num");
		$fields[0] = array("name" =>"Journeys.start_time"  , "type" => "date");
		$fields[1] = array("name" =>"Journeys.end_time"  , "type" => "date");
		$fields[2] = array("name" =>"Journeys.maxspeed"  , "type" => "num");
		$fields[3] = array("name" =>"Journeys.distance"  , "type" => "num");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime']))
        	{
        	
			$usrfiter.="start_time BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
				$usrfiter.=" AND end_time BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
			
			}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " customer_id ='" .$this->loggedinuser['customer_id']. "' AND  trackingobject_id ='" .$this->request->query['assetname']. "'";
        }
    	
		//speed limit filter	
        if(isset($this->request->query['speedlimit'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " maxspeed >='" .$this->request->query['speedlimit']. "'";
		}else if($this->request->query['speedlimit'] =" "){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " maxspeed >=-1" ;
		}
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

	public function idleTimeAjaxData()
	{
		
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
		
		$journeyTable = TableRegistry::get('Journeys');
		$query=$journeyTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		$idletimesum=$query->sumOf('idletime') ;
		
     	$fields = array();
		 
		
		$fields[0] = array("name" =>"Journeys.start_time"  , "type" => "date");
		$fields[1] = array("name" =>"Journeys.start_loc"  , "type" => "char");
		$fields[2] = array("name" =>"Journeys.idletime" , "type" => "num");
		$fields[3] = array("name" =>"Journeys.distance"  , "type" => "num");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime']))
        	{
        	
			$usrfiter.="start_time BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
				 $usrfiter.=" AND idletime is not null";
						   
			}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " customer_id ='" .$this->loggedinuser['customer_id']. "' AND  trackingobject_id ='" .$this->request->query['assetname']. "'";
			
			
        	
        }
    	$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

	public function travelSummaryAjaxData()
	{
		
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
     	$fields = array();
		 
		//$fields[0] = array("name" =>"Journeys.id"  , "type" => "num");
		$fields[0] = array("name" =>"Journeys.start_time"  , "type" => "date");
		$fields[1] = array("name" =>"Journeys.distance"  , "type" => "num");
		$fields[2] = array("name" =>"Journeys.maxspeed"  , "type" => "num");
		$fields[3] = array("name" =>"Journeys.averagespeed"  , "type" => "num");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime']))
        	{
        	
			$usrfiter.="start_time BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
						   
			}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " customer_id ='" .$this->loggedinuser['customer_id']. "' AND  trackingobject_id ='" .$this->request->query['assetname']. "'";
				
        }
    	
    	//
    	$pre=(strlen($usrfiter)>0)?" and ":"";
		$usrfiter.=$pre. " customer_id ='" .$this->loggedinuser['customer_id']. "'";
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

	public function journeySummaryAjaxData()
	{
		
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Journeys.start_time"  , "type" => "date");
		$fields[1] = array("name" =>"Journeys.distance"  , "type" => "num");
		$fields[2] = array("name" =>"Journeys.maxspeed"  , "type" => "num");
		$fields[3] = array("name" =>"Journeys.averagespeed"  , "type" => "num");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime']))
        	{
        	
			$usrfiter.="start_time BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
						   
			}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " customer_id ='" .$this->loggedinuser['customer_id']. "' AND  trackingobject_id ='" .$this->request->query['assetname']. "'";
				
        }
    	
    	//
    	$pre=(strlen($usrfiter)>0)?" and ":"";
		$usrfiter.=$pre. " customer_id ='" .$this->loggedinuser['customer_id']. "'";
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

	public function groupDailyReportAjaxData()
	{
		
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
     	$fields = array();
		
		 $fields[0] = array("name" =>"Trackingobjects.name"  , "type" => "char");
		 $fields[1] = array("name" =>"Journeys.distance"  , "type" => "sum1");
		 $fields[2] = array("name" =>"Journeys.maxspeed"  , "type" => "sum2");
		 $fields[3] = array("name" =>"Journeys.Count"  , "type" => "countall");
		 $fields[4] = array("name" =>"Journeys.duration"  , "type" => "sum3");
		 
		$usrfiter="";
			if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null )
			{
        	
			$usrfiter.="('".$this->request->query['startdate']." 'BETWEEN date(start_time) and date(end_time))"; 
			}
			
			
		//Asset filter	
        if(isset($this->request->query['gpname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			//$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			//$usrfiter.=$pre. " trackingobject_id in (165,169)";
			$usrfiter.=$pre. " trackingobject_id in (select trackingobject_id from zorba.trackingobjects_groups where group_id =".$this->request->query['gpname'].")";
			$wherestr2 = $usrfiter;
        }
    	
    	//
    	$pre=(strlen($usrfiter)>0)?" and ":"";
		$usrfiter.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'group by trackingobjects.name";
		$wherestr2.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'";
		
		$output =$this->DatatableGroup->getView($fields,['Trackingobjects','Customers'],$usrfiter,$wherestr2,1);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

	public function groupWeeklyReportAjaxData()
	{
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
     	$fields = array();
		
		 $fields[0] = array("name" =>"Trackingobjects.name"  , "type" => "char");
		 $fields[1] = array("name" =>"Journeys.distance"  , "type" => "sum1");
		 $fields[2] = array("name" =>"Journeys.maxspeed"  , "type" => "sum2");
		 $fields[3] = array("name" =>"Journeys.Count"  , "type" => "countall");
		 $fields[4] = array("name" =>"Journeys.duration"  , "type" => "sum3");
		 
		$usrfiter="";
		// if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null )
			// {
        	
			$usrfiter.="date(Journeys.start_time) BETWEEN    NOW()::DATE-EXTRACT(DOW FROM NOW()) ::INTEGER     AND NOW()::DATE"; 
			
			// }
			
			
		//Asset filter	
        if(isset($this->request->query['gpname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id in (select trackingobject_id from zorba.trackingobjects_groups where group_id =".$this->request->query['gpname'].")";
			$wherestr2 = $usrfiter;	
        }
    	
    	//
    	$pre=(strlen($usrfiter)>0)?" and ":"";
		$usrfiter.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'group by trackingobjects.name";
		$wherestr2.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'";
		
		$output =$this->DatatableGroup->getView($fields,['Trackingobjects','Customers'],$usrfiter,$wherestr2,1);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
		public function groupMonthlyReportAjaxData()
	{
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
     	$fields = array();
		
		 $fields[0] = array("name" =>"Trackingobjects.name"  , "type" => "char");
		 $fields[1] = array("name" =>"Journeys.distance"  , "type" => "sum1");
		 $fields[2] = array("name" =>"Journeys.maxspeed"  , "type" => "sum2");
		 $fields[3] = array("name" =>"Journeys.Count"  , "type" => "countall");
		 $fields[4] = array("name" =>"Journeys.duration"  , "type" => "sum3");
		 
		$usrfiter="";
			//if current month is January previous month is dec of last year
			if (isset($this->request->query['monthname']) && $this->request->query['monthname'] == 0 )//curent month
			{
				 
        	 		$usrfiter.="EXTRACT('month' FROM START_TIME)  = EXTRACT('month' FROM NOW()::DATE) and EXTRACT('YEAR' FROM START_TIME)  =  EXTRACT('YEAR' FROM NOW()::DATE)  "; 
	        	 	$wherestr2 = $usrfiter;	
			}
			
			if (isset($this->request->query['monthname']) && $this->request->query['monthname'] == 1 )// last month
			{
				 if (date('m')==1)// for jan
        	 		{
        	 		$usrfiter.="EXTRACT('month' FROM START_TIME)  = 12 and EXTRACT('YEAR' FROM START_TIME)  =  EXTRACT('YEAR' FROM NOW()::DATE)-1  "; 
	        	 	}
	        	 else
	        	 	{
	        	 	$usrfiter.="EXTRACT('month' FROM START_TIME)  = EXTRACT('month' FROM NOW()::DATE)-1 and EXTRACT('YEAR' FROM START_TIME)  =  EXTRACT('YEAR' FROM NOW()::DATE)   "; 
	        	 	}
					$wherestr2 = $usrfiter;	
			}
        	
			
			
			
		//Asset filter	
        if(isset($this->request->query['gpname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id in (select trackingobject_id from zorba.trackingobjects_groups where group_id =".$this->request->query['gpname'].")";
			$wherestr2 = $usrfiter;		
        }
    	
    	//
    	$pre=(strlen($usrfiter)>0)?" and ":"";
		$usrfiter.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'group by trackingobjects.name";
	    $wherestr2.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'";
		
		$output =$this->DatatableGroup->getView($fields,['Trackingobjects','Customers'],$usrfiter,$wherestr2,1);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
	
	public function assetMonthlyReportAjaxData()
	{
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
     	$fields = array();
		
		 $fields[0] = array("name" =>"Journeys.start_time"  , "type" => "dateofjourney");
		 $fields[1] = array("name" =>"Journeys.distance"  , "type" => "sum1");
		 $fields[2] = array("name" =>"Journeys.maxspeed"  , "type" => "sum2");
		 $fields[3] = array("name" =>"Journeys.Count"  , "type" => "countall");
		 $fields[4] = array("name" =>"Journeys.duration"  , "type" => "sum3");
		 
		$usrfiter="";
			//if current month is January previous month is dec of last year
			if (isset($this->request->query['monthname']) && $this->request->query['monthname'] == 0 )//curent month
			{
				 
        	 		$usrfiter.="EXTRACT('month' FROM START_TIME)  = EXTRACT('month' FROM NOW()::DATE) and EXTRACT('YEAR' FROM START_TIME)  =  EXTRACT('YEAR' FROM NOW()::DATE)  "; 
	        	 	
			}
			
			if (isset($this->request->query['monthname']) && $this->request->query['monthname'] == 1 )// last month
			{
				 if (date('m')==1)// for jan
        	 		{
        	 		$usrfiter.="EXTRACT('month' FROM START_TIME)  = 12 and EXTRACT('YEAR' FROM START_TIME)  =  EXTRACT('YEAR' FROM NOW()::DATE)-1  "; 
	        	 	}
	        	 else
	        	 	{
	        	 	$usrfiter.="EXTRACT('month' FROM START_TIME)  = EXTRACT('month' FROM NOW()::DATE)-1 and EXTRACT('YEAR' FROM START_TIME)  =  EXTRACT('YEAR' FROM NOW()::DATE)   "; 
	        	 	}
			}
        	
			
			
			
		//Asset filter	
        if(isset($this->request->query['gpname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";	
			$wherestr2 = 	$usrfiter;
        }
    	
    	//
    	$pre=(strlen($usrfiter)>0)?" and ":"";
		// $usrfiter.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'group by trackingobjects.name,Journeys.start_time,Journeys.distance,Journeys.maxspeed";
		$usrfiter.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'group by date(start_time),trackingobjects.name";
		
		$wherestr2.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'";
		
		$output =$this->DatatableGroup->getView($fields,['Trackingobjects','Customers'],$usrfiter,$wherestr2,5);
		$out =json_encode($output);  
	   	$this->response->body($out);
		return $this->response;
	}
	
	public function assetWeeklyReportAjaxData()
	{
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
     	$fields = array();
		
		 $fields[0] = array("name" =>"Journeys.start_time"  , "type" => "dateofjourney");
		 $fields[1] = array("name" =>"Journeys.distance"  , "type" => "sum1");
		 $fields[2] = array("name" =>"Journeys.maxspeed"  , "type" => "sum2");
		 $fields[3] = array("name" =>"Journeys.Count"  , "type" => "countall");
		 $fields[4] = array("name" =>"Journeys.duration"  , "type" => "sum3");
		 
		$usrfiter="";
			//if current month is January previous month is dec of last year
			$usrfiter.="date(start_time) BETWEEN    NOW()::DATE-EXTRACT(DOW FROM NOW()) ::INTEGER     AND NOW()::DATE"; 
        	
			
			
			
		//Asset filter	
        if(isset($this->request->query['gpname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			$wherestr2 = 	$usrfiter;
        }
    	
    	//
    	$pre=(strlen($usrfiter)>0)?" and ":"";
		$usrfiter.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'group by trackingobjects.name,Journeys.start_time,Journeys.distance,Journeys.maxspeed";
		
		$wherestr2.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'";
		
		$output =$this->DatatableGroup->getView($fields,['Trackingobjects','Customers'],$usrfiter,$wherestr2,2);
		$out =json_encode($output);  
	   	$this->response->body($out);
		return $this->response;
	}

	public function assetDailyReportAjaxData()
	{
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
     	$fields = array();
		
		 // $fields[0] = array("name" =>"Journeys.start_time"  , "type" => "dateofjourney");
		 // $fields[1] = array("name" =>"Journeys.end_time"  , "type" => "enddateofjourney");
		 $fields[0] = array("name" =>"Journeys.start_time"  , "type" => "time");
		 $fields[1] = array("name" =>"Journeys.end_time"  , "type" => "time");
		 
		 $fields[2] = array("name" =>"Journeys.maxspeed"  , "type" => "num");
		 $fields[3] = array("name" =>"Journeys.idletime"  , "type" => "num");
		 $fields[4] = array("name" =>"Journeys.distance"  , "type" => "num");
		 
		$usrfiter="";
		$wherestr2 = 	$usrfiter;	
			// $usrfiter.="date(start_time) BETWEEN    NOW()::DATE-EXTRACT(DOW FROM NOW()) ::INTEGER     AND NOW()::DATE"; 
        	
			
			
			
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "' and date(start_time) = '".$this->request->query['date']."'";	
        	$wherestr2 = 	$usrfiter;
		}
    	
    	//
    	$pre=(strlen($usrfiter)>0)?" and ":"";
		$usrfiter.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']."'group by trackingobjects.name, Journeys.start_time,Journeys.end_time,Journeys.maxspeed,Journeys.idletime,Journeys.distance";
		$wherestr2.=$pre. " Journeys.customer_id ='" .$this->loggedinuser['customer_id']. "'";
		
		$output =$this->DatatableGroup->getView($fields,['Trackingobjects','Customers'],$usrfiter,$wherestr2,3);
		$out =json_encode($output);  
	   	$this->response->body($out);
		return $this->response;
	}
}
