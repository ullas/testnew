<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Utility\Inflector;
   class DatatableTestComponent extends Component {
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
           // if($limit!=""){
           //getting page no
           	$page=ceil($this->request->query['start']/$limit)+1;
           // }
           
		   
           $wherestr="";
		    $havingstr="";
		    // return $where;
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
		   
		   if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != '' ) 
		    {
				$havingstr=$havingstr;
			}
		   else
		   	{
		   		$havingstr=$wherestr;
		   	}
          
		 // return $select;
           $data = $query->select($select)->contain($contains)->where($havingstr)->order($order)->limit($limit)->page($page)->toArray();
           // $data = $query->select($select)->contain($contains)->where($wherestr)->order($order)->limit($limit)->page($page)->toArray();
           
           // $data = $query->select($select)->contain($contains)->where($usrFlier)->having("Alertcategories.name ILIKE '%3%' OR count(alertcategories_id)= '3' OR location ILIKE '%3%'")->order($order)->limit($limit)->page($page)->toArray();
           
           // return $data;
           
           
           
           //getting totalcount
           $totalCount = $model->find() ->contain($contains)->count();
           //getting filteredcount
           // $this->find('all',array('fields'=>array('id','name')));
		  
		   // $filteredCount = $model->find('all')->contain($contains)->where($wherestr2)->count();
		   // $filteredCount = $model->find()->select(['*'])->contain($contains)->where($wherestr2)->count();
			
			// for group queries
			if($flg == 1)
			{
				$countQuery = $model->find()->contain($contains);
				$mycount = $countQuery->select(['trackingobjects.name'])->group('trackingobjects.name')->count();
				$filteredCount = $mycount;	
			}
			else if($flg == 2) // for alerts summary report in adhoc
			{
				$countQuery = $model->find()->contain($contains);
				// $mycount = $countQuery->select(['alertcategories.name'])->where($havingstr)->group('alertcategories.name')->count();
				// $mycount = $countQuery->select(['alertcategories.name'])->where($wherestrforfilter)->group('alertcategories.name')->count();
				
				if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != '' ) 
			    {
			    	
			    	$searchItem = $this->request->query['search']['value']; 
					if(is_numeric($searchItem))
					{
						// $mycount = $countQuery->select(['alertcategories.name,'])->where($havingstr)->order($order)->limit($limit)->page($page)->count();
					
						$mycount = $countQuery->select(['alertcategories.name'])->where($wherestr2)->having("Alertcategories.name ILIKE '%$searchItem%' OR count(alertcategories_id)= '$searchItem' OR location ILIKE '%$searchItem%'")->order($order)->limit($limit)->page($page)->group('alertcategories.name')->group('location')->count();
				
					}
					else
					{
						
						// $mycount = $countQuery->select(['alertcategories.name',])->where($havingstr)->order($order)->limit($limit)->page($page)->count();
				
						
						$mycount = $countQuery->select(['alertcategories.name'])->where($wherestr2)->having("Alertcategories.name ILIKE '%$searchItem%' OR  location ILIKE '%$searchItem%'")->order($order)->limit($limit)->page($page)->group('alertcategories.name')->group('location')->count();
				
					}	
			    	
			    }
			    else
			    {
			    	$mycount = $countQuery->select(['alertcategories.name'])->where($wherestr2)->order($order)->limit($limit)->page($page)->group('alertcategories.name')->group('location')->count();
				
			    }
				
				// $mycount = $countQuery->select(['alertcategories.name'])->where($havingstr)->count();
				$filteredCount = $mycount;	
			}
			else if($flg == 3) // for ZoneVisitcount report in adhoc 
			{
				// return 	$wherestr2;
				$query2 = $model->find();
				$countQuery = $model->find()->contain($contains);
				if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != '' ) 
			    {
			    	
			    	$searchItem = $this->request->query['search']['value']; 
					if(is_numeric($searchItem))
					{
						$mycount = $countQuery->select(['Trackingobjects.name'])->where($wherestr2)->having("Trackingobjects.name ILIKE '%$searchItem%' OR Alerts.count= '$searchItem' OR Alerts.location ILIKE '%$searchItem%' ")->group('Trackingobjects.name')->group('date(alert_dtime)')->group('Alerts.location')->count();
				
					}
					else
					{
						$mycount = $countQuery->select(['Trackingobjects.name'])->where($wherestr2)->having("Trackingobjects.name ILIKE '%$searchItem%'  OR Alerts.location ILIKE '%$searchItem%'  ")->group('Trackingobjects.name')->group('date(alert_dtime)')->group('Alerts.location')->count();
				
					}
					
					
			    }
				else 
				{
					$mycount = $countQuery->select(['Trackingobjects.name'])->where($wherestr2)->group('Trackingobjects.name')->group('date(alert_dtime)')->group('Alerts.location')->count();
				
				}
				
				$filteredCount = $mycount;
				
				// return $filteredCount;
			}
			else if($flg == 4) // for RunningTime Summary report in adhoc 
			{
				// return 	$wherestr2;
				$query2 = $model->find();
				$countQuery = $model->find()->contain($contains);
				if ( isset($this->request->query['search']) && $this->request->query['search']['value'] != '' ) 
			    {
			    	
			    	$searchItem = $this->request->query['search']['value']; 
					if(is_numeric($searchItem))
					{
						
						$mycount = $countQuery->select(['Trackingobjects.name'])->where($wherestr2)->having("Trackingobjects.name ILIKE '%$searchItem%'  ")->group('Dailysummary.mdate')->group('Trackingobjects.name')->count();
				
					}
					else
					{
						if($this->validateDate($searchItem,'m/d/y')){
							$mycount = $countQuery->select(['Trackingobjects.name'])->where($wherestr2)->having("Trackingobjects.name ILIKE '%$searchItem%' OR Dailysummary.mdate::date = '$searchItem'   ")->group('Dailysummary.mdate')->group('Trackingobjects.name')->count();
				
						}else
						{
							$mycount = $countQuery->select(['Trackingobjects.name'])->where($wherestr2)->having("Trackingobjects.name ILIKE '%$searchItem%'  ")->group('Dailysummary.mdate')->group('Trackingobjects.name')->count();
				
						}
						
					}
					
					
			    }
				else 
				{
					$mycount = $countQuery->select(['Trackingobjects.name'])->where($wherestr2)->group('Dailysummary.mdate')->group('Trackingobjects.name')->count();
				
				}
				
				$filteredCount = $mycount;
				
				// return $filteredCount;
			}
			else
			{
				 $filteredCount = $model->find()->contain($contains)->where($wherestr2)->count();	
			}		
          
		   // print_r($colmns);
		   // $filteredCount = count($data);
           $output =$this->GetData($colmns,$data,$totalCount,$filteredCount);
		   // $output =$this->GetData($colmns,$data,$totalCount,count($data));
           // return $data;
		   // return $wherestr2;
		   // return $order;
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
                                  $globalSearch[$column['db']. '='] = "" . $str. "";
							   }
                           }
						   else if( ($rowval['name']==$column['db']) && ($rowval['type']=="sum2") ){
                               if(is_numeric($str))	{
                                  $globalSearch[$column['db']. '='] = "" . $str. "";
							   }
                           }
						   else if( ($rowval['name']==$column['db']) && ($rowval['type']=="count2") ){
                               if(is_numeric($str))	{
                                  $globalSearch[$column['db']. '='] = "" . $str. "";
								  // $globalSearch[ 'count(alertcategories_id)='] = "" . $str. "";
							   }
                           }
						    else if( ($rowval['name']==$column['db']) && ($rowval['type']=="sum4") ){
                               if(is_numeric($str))	{
                                  //$globalSearch[$column['db']. '='] = "" . $str. "";
								  // $globalSearch[ 'count(alertcategories_id)='] = "" . $str. "";
							   }
                           }
							else if( ($rowval['name']==$column['db']) && ($rowval['type']=="countall") ){
                               if(is_numeric($str))	{
                                  $globalSearch[$column['db']. '='] = "" . $str. "";
								  // $globalSearch[ 'count(alertcategories_id)='] = "" . $str. "";
							   }
                           }
						   // else if( ($rowval['name']==$column['db']) && ($rowval['type']=="sum3") ){
                               // if(is_numeric($str))	{
                                  // $globalSearch[$column['db']. '='] = "" . $str. "";
							   // }
                           // }
                           // else if( ($rowval['name']==$column['db']) && ($rowval['type']=="countall") ){
                               // if(is_numeric($str))	{
                                  // $globalSearch[$column['db']. '='] = "" . $str. "";
							   // }
                           // }

                           else if( ($rowval['name']==$column['db']) && ($rowval['type']=="date") ){
								if($this->validateDate($str,'m/d/y')){
								$globalSearch[$column['db'].'::date ='] = $str;
                               }
                           }
						   else if( ($rowval['name']==$column['db']) && ($rowval['type']=="dateofjourney") ){
								 $my_date = date('Y-m-d', strtotime($str));
								 $globalSearch["to_char(".$column['db']." , 'YYYY-MM-DD') ILIKE"] = "%" . $my_date. "%";
                           }
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
       		// echo json_encode($columns);
			// echo json_encode($select);
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
			 // return  json_encode($orderBy) ;
			 echo $order;
			 // return $order;
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