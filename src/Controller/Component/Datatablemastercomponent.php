<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Utility\Inflector;

   class DatatablemasterComponent extends Component {

       public function getView($fields,$contains,$usrFlier)
       {

           $length = count($fields);
           $colmns = array();
           $i = 0;
		   
		   
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
                    }else{
                        $colmns[] = array("db" => $value , "dt" => $i++);
                    }
                }
                
            }

           $colmns[] =array(
               'db' => 'id',
               'dt' => $length++,
               'formatter' => function( $d, $row ,$modalname) {
                   $buttons=' <a href="#" class="mptlmaster-edit fa fa-pencil p3" data-id="'.$modalname."/edit/".$d.'"></a>
                                   
                                   <a href="#" data-id="'.$modalname."/delete/".$d.'"  class="mptlmaster-delete fa fa-trash"></a>';

                   return $buttons;
               }
              );
           //getting orderby
              $order = $this->Order( $colmns );
           //getting filter
           
           $where = $this->Filter( $colmns, $fields );

           //getting limit
           $limit = $this->Limit( );
           //getting page no
$page=ceil($this->request->query['start']/$limit)+1;

           $controller = $this->_registry->getController();

$model=$controller->loadModel($controller->modelClass);

           $wherestr="";
           foreach($where  as $key => $value){
               if($wherestr != ''){$wherestr.=" OR ";}
               
               $wherestr.=$key. " '". $value. "'";
           }
           if(strlen($wherestr)>3 && strlen($usrFlier)>3){
           	 $wherestr.= " and ".$usrFlier;
           }else{
           	  if(strlen($usrFlier)>3){
           	    $wherestr=$usrFlier;
           	  }
           }
          
           $data = $model->find('all')->contain($contains)->where($wherestr)->order($order)->limit($limit)->page($page)->toArray();
           

           //getting totalcount
           $totalCount = $model->find() ->contain($contains)->count();
           //getting filteredcount
           $filteredCount = $model->find()->contain($contains)->where($wherestr)->count();

           $output =$this->GetData($colmns,$data,$totalCount,$filteredCount);

           return  $output;
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
                           }else if( ($rowval['name']==$column['db']) && ($rowval['type']=="num") ){
                               if(is_numeric($str))	{
                                  $globalSearch[$column['db']. '='] = "" . $str. "";
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