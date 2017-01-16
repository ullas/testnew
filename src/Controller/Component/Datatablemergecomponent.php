<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;

   class DatatablemergeComponent extends Component {

       public function getView($fields,$contains,$usrFlier,$mergetbl)
       {

           $length = count($fields);
           $colmns = array();
           $i = 0;
		   $controller = $this->_registry->getController();
		   $model=$controller->loadModel($controller->modelClass);
		   $modalname=$controller->modelClass;
		   

           foreach($fields as $value){
           	
                if($value['type']=='boolean'){
                    
                    $colmns[] =array( 'db' => $value['name'], 'dt' => $i++,
                    						   'formatter' => function( $d, $row ,$modalname) {
                        						    $div='<div class="mptldtbool">'.$d.'</div>';
                                                    return $div;
                    							}
                       						);
                }else{
                	is_array($value) ? $colmns[] = array("db" => $value['name'] , "dt" => $i++) : $colmns[] = array("db" => $value , "dt" => $i++);
                }
                
            }
		   
		   $reportcontrollers = array("Tracking");
		  // if (!(in_array($controller->name, $reportcontrollers))) {
		   //enable/disable action buttons
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
           
           //getting filter 
           $where = $this->Filter( $colmns, $fields );
           //getting limit
           $limit = $this->Limit( );//echo 1/0;
           //set value to limit if it is null
           // if($limit!=""){
           	//getting page no
           	$page=ceil($this->request->query['start']/$limit)+1;
           // }
           

		   //append OR inbetween where string
           $wherestr="";$mergewherestr="";
           foreach($where  as $key => $value){
               if($wherestr != ''){$wherestr.=" OR ";}
               if($mergewherestr != ''){$mergewherestr.=" OR ";}
               
               $wherestr.=$modalname.".".$key. " '". $value. "'";
			   $mergewherestr.=$mergetbl.".".$key. " '". $value. "'";
           }
           //append AND before usrfilter
           if(strlen($wherestr)>3 && strlen($usrFlier)>3){
           	 $wherestr.= " and ".$usrFlier;
           }else{
           	  if(strlen($usrFlier)>3){
           	    $wherestr=$usrFlier;
           	  }
           }
           
           $data1 = $model->find('all')->contain($contains)->where($wherestr)->limit($limit)->page($page)->toArray();
		   
		   
		   if(strlen($mergewherestr)>3 && strlen($usrFlier)>3){
           	 $mergewherestr.= " and ".$usrFlier;
           }else{
           	  if(strlen($usrFlier)>3){
           	    $mergewherestr=$usrFlier;
           	  }
           }
		   $table = TableRegistry::get($mergetbl);
		   $data2 = $table->find('all')->contain($contains)->where($mergewherestr)->limit($limit)->page($page)->toArray();
           
		   
		   //getting orderby
           // $order = $this->Order( $colmns );
           
		   $data = array_merge($data1,$data2);
		   
           //getting totalcount
           $totalCount = $model->find() ->contain($contains)->count() + $table->find() ->contain($contains)->count();
           //getting filteredcount
           $filteredCount = $model->find()->contain($contains)->where($wherestr)->count() + $table->find() ->contain($contains)->where($mergewherestr)->count();

           $output =$this->GetData($colmns,$data,$totalCount,$filteredCount);
		   // $output = $this->array_sort($output['data'], 'id', SORT_ASC);
		   return  $output;
       }
		public function array_sort($array, $on, $order=SORT_ASC){

    		$new_array = array();
    		$sortable_array = array();

    		if (count($array) > 0) {
        		foreach ($array as $k => $v) {
            		if (is_array($v)) {
                		foreach ($v as $k2 => $v2) {
                    		if ($k2 == $on) {
                        		$sortable_array[$k] = $v2;
                    		}
                		}
            		} else {
                		$sortable_array[$k] = $v;
            		}
        		}

        		switch ($order) {
            		case SORT_ASC:
                		asort($sortable_array);
                	break;
            		case SORT_DESC:
                		arsort($sortable_array);
                	break;
        		}

        		foreach ($sortable_array as $k => $v) {
            		$new_array[$k] = $array[$k];
        		}
    		}

    		return $new_array;
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
                   $column = $columns[ $columnIdx ];    //$globalSearch[$column['db']]="tttt".$requestColumn['searchable'];
                   if ( $requestColumn['searchable'] == 'true' ) {

                       foreach ($fields as $rowval) {
                           if( ($rowval['name']==$column['db']) && ($rowval['type']=="char") ){
                               $globalSearch[$column['db'].' ILIKE'] = "%" . $str. "%";
                           }
                           else if( ($rowval['name']==$column['db']) && ($rowval['type']=="num") ){
                               if(is_numeric($str))	{
                                  $globalSearch[$column['db']. ' ='] = "" . $str. "";
							   }
                           }
                           else if( ($rowval['name']==$column['db']) && ($rowval['type']=="date") ){
								if($this->validateDate($str,'m/d/y')){
								$globalSearch[$column['db'].'::date ='] = $str;
                               }
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


          
           return $globalSearch;
       }
       public function Order ( $columns )
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
                       $dbname=$column['db'];
                       $orderBy[$dbname] = $dir;
                   }
               }
               $order = implode(', ', $orderBy);
           }
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