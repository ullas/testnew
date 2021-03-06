<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Utility\Inflector;
   class DatatableGroupComponent extends Component {
       public function getView($fields,$contains,$usrFlier,$wherestr2,$flg)
       {
           $length = count($fields);
           $colmns = array();
           $i = 0;
		   $controller = $this->_registry->getController();
		   $model=$controller->loadModel($controller->modelClass);
		   $select = array();
		   
		   $query = $model->find();
		   
           foreach($fields as $value){
                if($value['type']=='boolean'){
                    
                    $colmns[] =array( 
                    'db' => $value['name'], 
                    'dt' => $i++,
                    'formatter' => function( $d, $row ,$modalname) {
                        $div='<div class="mptldtbool">'.$d.'</div>';
                        return $div;
                    }
                       );
                    
              }else{
                    if(is_array($value)) {
                          $colmns[] = array("db" => $value['name'] , "dt" => $i++);
						//print_r($value['name']);
						// if($value['name']=='alert_dtime'){$value['name']="";}
                    }else{
                        $colmns[] = array("db" => $value , "dt" => $i++);
                    }
                }
                
				//select query
				if($value['type']=='count' ){
					$tempquerystr="";
					$tempquerystr=$query->func()->count($value['name']);
					$select[$value['name']] = $tempquerystr;
				}else if($value['type']=='count2' ){
					$select['alertcategories_id'] = 'count(alertcategories_id)';
				}else if($value['type']=='dateof' ){
					$select['alert_dtime'] = 'date(alert_dtime)';
				}else if($value['type']=='dateofjourney' ){
					$select['start_time'] = 'date(start_time)';
				}else if($value['type']=='enddateofjourney' ){
					$select['end_time'] = 'date(end_time)';
				}else if($value['type']=='sum1' ){
					$select['distance'] = 'sum(Journeys.distance)';
				}else if($value['type']=='sum2' ){
					$select['maxspeed'] = 'max(Journeys.maxspeed)';
				}else if($value['type']=='sum3' ){
					$select['duration'] ="sum(Journeys.end_time - Journeys.start_time) ";
					//TO_CHAR((sum(Journeys.end_time - Journeys.start_time) || ' second')::interval, 'DD:HH24:MI:SS')
					//$select['duration'] = 'to_char (sum(Journeys.end_time - Journeys.start_time), text)';
					// $select['duration'] = "cast(TO_CHAR((sum(Journeys.end_time - Journeys.start_time) || 'second')::interval, 'DD:HH24:MI:SS') as varchar)";
					// print_r($select['duration'] );
				}else if($value['type']=='sum4' ){
					$select['duration'] ="sum(Dailysummary.runningtime * interval '1 sec') ";
				}else{
					$select[] = $value['name'] ;
				}
				
				
            }
		   
		   
		   
		   $reportcontrollers = array("Alerts", "Journeys");
		   
		   // if (!(in_array($controller->name, $reportcontrollers))) {
		   if($controller->loggedinuser['customer_id']=="0"){
           		$colmns[] =array(
               		'db' => 'id',
               		'dt' => $length++,
               		'formatter' => function( $d, $row ,$modalname) {
                   		$buttons='<a class="fa fa-file-text-o p3 mptldisabled"></a>
                                   		<a class="fa fa-pencil p3 mptldisabled"></a>
                                   		<a class="fa fa-trash mptldisabled"></a>';
                   		return $buttons;
               		}
              	);
              }else{
              	$colmns[] =array(
               		'db' => 'id',
               		'dt' => $length++,
               		'formatter' => function( $d, $row ,$modalname) {
                   		$buttons='<a href="/'.   $modalname  . '/view/'.$d.'" class="fa fa-file-text-o p3"></a>
                                   <a href="/'.   $modalname . '/edit/'.$d.'" class="fa fa-pencil p3"></a>
                                   <form name="formdelete" id="formdelete' .$d. '" method="post" action="/'.   $modalname  . '/delete/'.$d.'" style="display:none;" >
                                   <input type="hidden" name="_method" value="POST"></form>
                                   <a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # '.$d.'?&quot;)) { document.getElementById(&quot;formdelete'.$d.'&quot;).submit(); }
                                    event.returnValue = false; return false;" class="fa fa-trash"></a>';
                   		return $buttons;
               		}
              	);
			  }
			  // }
           //getting orderby
           $order = $this->Order( $colmns,$select );
           
           //getting filter
           $where = $this->Filter( $colmns, $fields );
		  
		   //getting limit
           $limit = $this->Limit( );//echo 1/0;
           //set value to limit if it is null
           
           //getting page no
           	$page=ceil($this->request->query['start']/$limit)+1;
           // }
           
		   
           $wherestr="";
		   $havingstr="";
		    
           foreach($where  as $key => $value){
               if($wherestr != ''){$wherestr.=" OR ";}
               if($havingstr != ''){$havingstr.=" OR ";}
               if($key == "alertcategories_id="){$key="count(alertcategories_id)=";}
               $wherestr.=$key. " '". $value. "'";
               $havingstr.=$key. " '". $value. "'";
               
           }
           $wherestr="(". $wherestr .")";
           if(strlen($wherestr)>3 && strlen($usrFlier)>3){
           	 $wherestrforfilter = $wherestr;
           	 $wherestr.= " and ".$usrFlier;
			 $havingstr= $usrFlier." having ".$havingstr;
           	 $wherestrforfilter.= " and ".$wherestr2;
           }else{
           	  if(strlen($usrFlier)>3){
           	    $wherestr=$usrFlier;
				 $wherestrforfilter = $wherestr2; $havingstr = $usrFlier." having ".$havingstr;
           	  }
           }
		    if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != "" && $this->request->query['search']['value'] != " " ) 
		    {
		    	// echo "kkk";
				$havingstr=$havingstr;
			}
		   else
		   	{
		   		$havingstr=$wherestr;
		   	}
			// return $this->request->query['search']['value'] ;
		  // return $havingstr;
		  
		  if($flg ==3 || $flg ==5 || $flg == 2)
		  {
		  	if(!is_numeric($this->request->query['search']['value']))	
			{
				// return $havingstr;
				$searchItem=$this->request->query['search']['value'];
				if($havingstr == $wherestr )
				{$havingstr.=" having Trackingobjects.name ILIKE '%$searchItem%'" ;}
				else{$havingstr.="  Trackingobjects.name ILIKE '%$searchItem%'" ;}
			}
		  }
		  // return $havingstr;
		  
		  if($flg == 4) //for alertDetailsforAssetDailyAjaxData
			{
		  		$data = $query->select($select)->contain($contains)->where($wherestr)->order($order)->limit($limit)->page($page)->toArray();
			} 
		  else
			{
		  		$data = $query->select($select)->contain($contains)->where($havingstr)->order($order)->limit($limit)->page($page)->toArray();
			} 
           //getting totalcount
           $totalCount = $model->find() ->contain($contains)->count();
          
		   //getting filteredcount
           
			if($flg == 1) // for groupDailyReport
			{
				if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != '' ) 
			    {
					
					$searchItem = $this->request->query['search']['value']; 
					$countQuery = $model->find()->contain($contains);
					if(is_numeric($searchItem))
					{
						$mycount = $countQuery->select(['trackingobjects.name'])->where($wherestr2)
						->group('Trackingobjects.name')
						->having(" Trackingobjects.name ILIKE '%$searchItem%'  OR sum(Journeys.distance)= '$searchItem' OR max(Journeys.maxspeed)= '$searchItem' OR Journeys.Count= '$searchItem'")
						->count();
					}
					else
					{
						
						$mycount = $countQuery->select(['trackingobjects.name'])->where($wherestr2)
						->group('Trackingobjects.name')
						// ->having(" Trackingobjects.name ILIKE '%$searchItem%' OR  sum(Journeys.end_time - Journeys.start_time)= '$searchItem'   ")
						->having(" Trackingobjects.name ILIKE '%$searchItem%'    ")
						->count();
						
						
					}
					
				}
				else
				{
					
					$searchItem = $this->request->query['search']['value']; 
					$countQuery = $model->find()->contain($contains);
					$mycount = $countQuery->select(['trackingobjects.name'])->where($wherestr2)
					->group('Trackingobjects.name')
					->count();
						
				}
				$filteredCount = $mycount;	
			}
			else if($flg == 2)// for assetweekly reports to_char(Journeys.start_time , "YYYY-MM-DD") ILIKE '%$searchItem%'   
			{
				if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != '' ) 
			    {
				$searchItem = $this->request->query['search']['value']; 
				$countQuery = $model->find()->contain($contains);
				if(is_numeric($searchItem))
					{
						$mycount = $countQuery->select(['trackingobjects.name'])->where($wherestr2)
						->group('Trackingobjects.name')
						->group('Journeys.start_time')
						->group('Journeys.distance')
						->group('Journeys.maxspeed')
						->having(" sum(Journeys.distance)= '$searchItem' OR max(Journeys.maxspeed)= '$searchItem' OR Journeys.Count= '$searchItem'")
						->count();
						$filteredCount = $mycount;
					}
				else
					{
						$mycount = $countQuery->select(['trackingobjects.name'])->where($wherestr2)
						->group('Trackingobjects.name')
						->group('Journeys.start_time')
						->group('Journeys.distance')
						->group('Journeys.maxspeed')
						->having("to_char(Journeys.start_time , 'YYYY-MM-DD') = '$searchItem' ")
						->count();
						$filteredCount = $mycount;
					}
					
				}
				else 
				{
				$searchItem = $this->request->query['search']['value']; 
				$countQuery = $model->find()->contain($contains);
				$mycount = $countQuery->select(['trackingobjects.name'])->where($wherestr2)
				->group('Trackingobjects.name')
				->group('Journeys.start_time')
				->group('Journeys.distance')
				->group('Journeys.maxspeed')
				->count();
				$filteredCount = $mycount;		
				}
			}
			else if($flg == 3)// for assetdaily reports to_char(Journeys.start_time , "YYYY-MM-DD") ILIKE '%$searchItem%' 
			{
				if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != '' ) 
			    {
				$searchItem = $this->request->query['search']['value']; 
				$countQuery = $model->find()->contain($contains);
				if(is_numeric($searchItem))
					{
						$mycount = $countQuery->select(['trackingobjects.name'])->where($wherestr2)
						->group('Trackingobjects.name')
						->group('Journeys.start_time')->group('Journeys.end_time')
						->group('Journeys.maxspeed')->group('Journeys.idletime')->group('Journeys.distance')
						->having(" Journeys.maxspeed= '$searchItem' OR Journeys.idletime= '$searchItem' OR Journeys.distance= '$searchItem'")
						->count();
					}
				else 
					{
						$mycount = $countQuery->select(['trackingobjects.name'])->where($wherestr2)
						->group('Trackingobjects.name')
						->group('Journeys.start_time')->group('Journeys.end_time')
						->group('Journeys.maxspeed')->group('Journeys.idletime')->group('Journeys.distance')
						 ->having(" Trackingobjects.name ILIKE '%$searchItem%'  ")
						->count();
					}
				
				$filteredCount = $mycount;	
				}
				else 
				{
				$searchItem = $this->request->query['search']['value']; 
				$countQuery = $model->find()->contain($contains);
				$mycount = $countQuery->select(['trackingobjects.name'])->where($wherestr2)
				->group('Trackingobjects.name')
				->group('Journeys.start_time')->group('Journeys.end_time')
				->group('Journeys.maxspeed')->group('Journeys.idletime')->group('Journeys.distance')
				->count();
				$filteredCount = $mycount;		
				}
			}
			
			else if($flg == 5)// for assetmonthlyreports  
			{
				if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != '' ) 
			    {
				$searchItem = $this->request->query['search']['value']; 
				$countQuery = $model->find()->contain($contains);
				if(is_numeric($searchItem))
					{
						$mycount = $countQuery->select(['Trackingobjects.name'])->where($wherestr2)
						
						->group('date(Journeys.start_time)')->group('Trackingobjects.name')
						
						
						->having(" max(Journeys.maxspeed)= '$searchItem' OR  Journeys.Count= '$searchItem' OR sum(Journeys.distance)= '$searchItem'")
						->count();
					}
				else 
					{
						$mycount = $countQuery->select(['Trackingobjects.name'])->where($wherestr2)
						
						->group('date(Journeys.start_time)')->group('Trackingobjects.name')
						
						->having(" Trackingobjects.name ILIKE '%$searchItem%'  ")
						// ->having(" Journeys.maxspeed= '$searchItem' OR Journeys.idletime= '$searchItem' OR Journeys.distance= '$searchItem'")
						->count();
					}
				
				$filteredCount = $mycount;	
				}
				else 
				{
				$searchItem = $this->request->query['search']['value']; 
				$countQuery = $model->find()->contain($contains);
				$mycount = $countQuery->select(['Trackingobjects.name'])->where($wherestr2)
				->group('date(Journeys.start_time)')->group('Trackingobjects.name')
				->count();
				$filteredCount = $mycount;		
				}
			}
			
			else
			{
				 $filteredCount = $model->find()->contain($contains)->where($wherestr)->count();
			}
		   // print_r($colmns);
		   // $filteredCount = count($data);
           $output =$this->GetData($colmns,$data,$totalCount,$filteredCount);
		   // return $data;
		   // return $wherestr;
		   // return $filteredCount;
		   return $output;
       }
       public function Limit(){
           $limit = '';
           if ( isset($this->request->query['start']) && $this->request->query['length'] != -1 ) {
               $limit = intval($this->request->query['length']);
           }
           return $limit;
       }
       function validateDate($date, $format)
       {
           $d = \DateTime::createFromFormat($format, $date);
           return $d && $d->format($format) == $date;
       }
	   function validateDuration($duration,$format)
	   {
		   	$dur = \DateTime::createFromFormat ( $format ,$duration);
			// echo "klhlh";
			return $dur;
			//return $d && $d->format($format) == $date;
	   }
       function isBoolean($value) {
              if ($value && (strtolower($value) == "false" || strtolower($value) == "true")) {
                 return true;
              } else {
                 return false;
              }
       }
       public function Filter( $columns, $fields ){
           $globalSearch = [];
           // $columnSearch = array();
           $dtColumns = $this->pluck( $columns, 'dt' );
           if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != '' ) {
               $str = $this->request->query['search']['value'];
               $str = pg_escape_string($str);
               for ( $i=0, $ien=count($this->request->query['columns']) ; $i<$ien ; $i++ ) {
                   $requestColumn = $this->request->query['columns'][$i];
                   $columnIdx = array_search( $requestColumn['data'], $dtColumns );
                   $column = $columns[ $columnIdx ];
                   if ( $requestColumn['searchable'] == 'true' ) {
                       foreach ($fields as $rowval) {
                           if( ($rowval['name']==$column['db']) && ($rowval['type']=="char") ){
                               $globalSearch[$column['db'].' ILIKE'] = "%" . $str. "%";
                           }
                           else if( ($rowval['name']==$column['db']) && ($rowval['type']=="num") ){
                               if(is_numeric($str))	{
                                  $globalSearch[$column['db']. '='] = "" . $str. "";
							   }
                           }
						   else if( ($rowval['name']==$column['db']) && ($rowval['type']=="sum1") ){
                               if(is_numeric($str))	{
                                  // $globalSearch[$column['db']. '='] = "" . $str. "";
								  $countstr1 = 'sum('.$column['db'].')';
								   $globalSearch[$countstr1. '='] = "" . $str. "";
							   }
                           }
						   else if( ($rowval['name']==$column['db']) && ($rowval['type']=="sum2") ){
                               if(is_numeric($str))	{
                                  // $globalSearch[$column['db']. '='] = "" . $str. "";
                                  $countstr2 = 'max('.$column['db'].')';
                                  $globalSearch[$countstr2. '='] = "" . $str. "";
							   }
                           }
                           // //sum(Journeys.end_time - Journeys.start_time)
                           // else if( ($rowval['name']==$column['db']) && ($rowval['type']=="sum3") ){
                               // // if(is_numeric($str))	{
                                  // // $globalSearch[$column['db']. '='] = "" . $str. "";
                                  // $countstr2 = 'sum(Journeys.end_time - Journeys.start_time)';
                                  // $globalSearch[$countstr2. '='] = "" . $str. "";
							   // // }
                           // }
						   else if( ($rowval['name']==$column['db']) && ($rowval['type']=="count2") ){
                               if(is_numeric($str))	{
                                  $globalSearch[$column['db']. '='] = "" . $str. "";
								  // $globalSearch[ 'count(alertcategories_id)='] = "" . $str. "";
							   }
                           }
						   else if( ($rowval['name']==$column['db']) && ($rowval['type']=="sum3") ){
                             	if($this->validateDuration($str,'H/I/S')){
                             		$countstr2 = 'sum(Journeys.end_time - Journeys.start_time)';
                                  // $globalSearch[$column['db']. '='] = "" . $str. "";
                                  $globalSearch[$countstr2. '='] = "" . $str. "";
								}
                           }
                           else if( ($rowval['name']==$column['db']) && ($rowval['type']=="countall") ){
                               if(is_numeric($str))	{
                                  $globalSearch[$column['db']. '='] = "" . $str. "";
							   }
                           }

                           else if( ($rowval['name']==$column['db']) && ($rowval['type']=="date") ){
								if($this->validateDate($str,'m/d/y')){
								$globalSearch[$column['db'].'::date ='] = $str;
                               }
                           }
						   // else if( ($rowval['name']==$column['db']) && ($rowval['type']=="dateofjourney") ){
								 // $my_date = date('Y-m-d', strtotime($str));
							     // $datestr = 'date('.$column['db'].')';
								 // // $globalSearch["to_char(".$column['db']." , 'YYYY-MM-DD') ILIKE"] = "%" . $my_date. "%";
								 // $globalSearch["to_char(".$datestr." , 'YYYY-MM-DD') ILIKE"] = "%" . $my_date. "%";
                           // }
                           else if( ($rowval['name']==$column['db']) && ($rowval['type']=="boolean") ){
                               if($this->isBoolean($str) === true){
                                   $globalSearch[$column['db'].' ='] =  $str;
                               }
                           }
                       }
                   }
               }
           }
           // echo json_encode($globalSearch) ;
           return $globalSearch;
       }
       public function Order ( $columns,$select )
       {
           $order = array();
           if ( isset($this->request->query['order']) && count($this->request->query['order']) ) {
           	
               $orderBy = array();
               $dtColumns = $this->pluck( $columns, 'dt' );
               for ( $i=0, $ien=count($this->request->query['order']) ; $i<$ien ; $i++ ) {
                   // Convert the column index into the column data property
                   $columnIdx = intval($this->request->query['order'][$i]['column']);
                   $requestColumn = $this->request->query['columns'][$columnIdx];
                   $columnIdx = array_search( $requestColumn['data'], $dtColumns );
                   $column = $columns[ $columnIdx ];
                   if ( $requestColumn['orderable'] == 'true' ) {
                       $dir = $this->request->query['order'][$i]['dir'] === 'asc' ?
                           "ASC" :
                           "DESC";
						   // echo $column['db'];
                       $dbname=$column['db'];
					   // $dbname='max(Journeys.maxspeed)';
                       // $orderBy[$dbname] = $dir;
                   }
               }
               $order = implode(', ', $orderBy);
           }
		
		$i =0;
		foreach ($select  as $key=> $value)
		{
			// echo $select[$key];
			// echo "Key: $key; Value: $value<br />\n";
			$select[$i] = $value;
			$i++;
		}
			// echo json_encode($select[$columnIdx]) ;
			
			 $orderBy[$select[$columnIdx]] = $dir;
			 // echo json_encode($orderBy) ;
           return $orderBy;
       }
       public function pluck ( $a, $prop )
       {
           $out = array();
           for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
               $out[] = $a[$i][$prop];
           }
           return $out;
       }
       public function GetData($columns,$data,$totalCount,$filteredCount){
       	   $controller = $this->_registry->getController();
           $modalname=$controller->modelClass;
           $out = array();
           for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
               $row = array();
               for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
                   $column = $columns[$j];
                   if (isset( $column['alias'] )){
                   		 if ($column['alias']!= '' ){
                           $c = $column['alias'];
                       }else{
                           $c = $column['db'];
                       }
                   }else{
                       $c = $column['db'];
                   }
                   // Is there a formatter?
                   if ( isset( $column['formatter'] ) ) {
                       $row[ $column['dt'] ] = utf8_encode($column['formatter']( $data[$i][ $c ], $data[$i],$modalname ));
                   }
                   else {
                       if(strpos($c, '.') !== false){
                           $colname="";
                           $colname[]=explode(".",$c);
						   
						   $secmodal=strtolower(Inflector::singularize( $colname[0][0]));
						   if ($secmodal=='template'){
						     $secmodal=$colname[0][0];
						   }
                           $row[ $column['dt'] ] = utf8_encode($data[$i][$secmodal][$colname[0][1]]);
                           //if it is null check the second value from dot seperated in data
                           if($row[ $column['dt'] ]=="" && $colname[0][0]==$controller->name){
                               $row[ $column['dt'] ] = utf8_encode($data[$i][$colname[0][1]]);
                           }
                       }else{
                           $row[ $column['dt'] ] = utf8_encode($data[$i][$c]);
                       }
                   }
               }
               $out[] = $row;
           }
           return array(
               "draw"            => intval( $this->request->query['draw'] ),
                "recordsFiltered"    => $filteredCount,
                "recordsTotal" => $totalCount,
                "data"            => $out
            );
       }
   }
?>