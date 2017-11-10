<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Servicesentries Controller
 *
 * @property \App\Model\Table\ServicesentriesTable $Servicesentries
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class ServicesentriesController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Datatable'];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	/*

        */

         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Servicesentries'])->order(['"order"' => 'ASC'])->toArray();

         	 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Servicesentries'])->where(['key' => 'INIT_VISIBLE_COLUMNS_SERVICESENTRIES'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);

         }else{

         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Servicesentries'])->where(['key' => 'INIT_VISIBLE_COLUMNS_SERVICESENTRIES'])->toArray();
            $this->set('usersettings',$usersettings);

         }
		 $actions =[

                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['Not Void'],
      	                          'additional'=>[
      	                                ['name'=>'dateofservice','title'=>'Date Of Service']
      	                          ]];
		 $this->set('additional',$additional);
		 $this->set('actions',$actions);
         $this->set('configs',$configs);
         $this->set('_serialize', ['configs','usersettings','actions','additional']);


    }

	public function updateSettings()
	{

		$this->autoRender= false;
		$columns=$_POST['columns'];
		$visorder = $_POST['visorder'];


		$columns=isset($columns)?$columns:6;
		$userSettings = TableRegistry::get('Usersettings');
		$count = $userSettings->find('all')
		   ->where(['key' => 'INIT_VISIBLE_COLUMNS_SERVICESENTRIES'])
		  ->where(['user_id' => $this->loggedinuser['id']])
		   ->count();

		if($count>0)
			{
				$query = $userSettings->query();
				$res=$query->update()
			    ->set(['value' => $columns])
				->set(['value1' => $visorder])
			    ->where(['key' => 'INIT_VISIBLE_COLUMNS_SERVICESENTRIES'])
			    ->where(['user_id' => $this->loggedinuser['id']])
			    ->execute();
				$this->response->body($res);

	   		}
	   	else
	   		{

			   $query1 = $userSettings->query();
			   $res=$query1->insert(['key','value','user_id','module'])
			   ->values(
			       ['key'=>'INIT_VISIBLE_COLUMNS_SERVICESENTRIES',
			        'value'=>$columns,
			        'user_id'=>$this->loggedinuser['id'],
			        'module'=>'Servicesentries'])
			    ->execute();
			   	$this->response->body($res);
			}

	}

	private function toPostDBDate($date)
	{

		 $ret="";
		 $parts=explode("/",$date);
		 if(count($parts)==3)
		 {
		 	$ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);

		 }

	  	return $ret;
	}

	private function getDateRangeFilters($dates,$basic)
	{

		$sql="";

		$alldates=explode(",",$dates);

		$pre=($basic>0)?" and ":"";

		$datecol=explode("-",$alldates[0]);

		$sql .=  count($datecol)>1? " $pre dateofservice between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;

		//$datecol=explode("-",$alldates[1]);

		//$pre=(strlen($sql)>0)?" and ":"";

		//$sql .=  count($datecol)>1? " $pre startdate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;

		//$datecol=explode("-",$alldates[2]);
		//$pre=(strlen($sql)>0)?" and ":"";

		//$sql .= count($datecol)>1? " $pre completiondate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;


		return $sql;
	}


	public function ajaxdata()
	{
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";


        if($basic == 1){

			$usrfiter=" servicesentries.markasvoid='true'  ";

        }else{
        	$usrfiter=" servicesentries.markasvoid='false'  ";
        }
		$usrfiter.=$this->getDateRangeFilters($additional,2);


       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Servicesentries'])->order(['"order"' => 'ASC'])->toArray();

        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );

        }

		$output =$this->Datatable->getView($fields,[ 'Vehicles', 'Vendors',  'Customers'],$usrfiter);
        $out =json_encode($output);

		$this->response->body($out);
	    return $this->response;
	}
    /**
     * View method
     *
     * @param string|null $id Servicesentry id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicesentry = $this->Servicesentries->get($id, [
            'contain' => ['Vehicles', 'Vendors', 'Customers', 'Servicecompleted', 'Servicedocuments','Servicetasks','Issues']
        ]);

        $this->set('servicesentry', $servicesentry);
        $this->set('_serialize', ['servicesentry']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

    	$resissuesArray = $this->request->url;
		$this->log($resissuesArray);
		$resissues1 = explode('/', $resissuesArray);
		$str = implode(" ",$resissues1);
		$resissues2 = explode('/', $str);
		$resissues2 = implode(" ",$resissues2);
		$str = explode(",",$resissues1[2]);
		$stack = array();
		for ($i=0; $i < count($str) ; $i++) { 
			array_push($stack, $str[$i]);
		}
		$resissues = $stack;
		
		$servicesentry = $this->Servicesentries->newEntity();
		$issues_servicetable = TableRegistry::get('Issues_servicesentries');
		$this->loadModel('Issues');
        if ($this->request->is('post')) {
            $servicesentry = $this->Servicesentries->patchEntity($servicesentry, $this->request->data,['associated'=>['Servicetasks','Issues']]);
            $servicesentry['customer_id']=$this->loggedinuser['customer_id'];
			
			//set markasvoid false if not true
			if($servicesentry['markasvoid'] != TRUE)
			{
				$servicesentry['markasvoid'] = FALSE;
			}
			
            if ($this->Servicesentries->save($servicesentry)) {
                $this->Flash->success(__('The service entry has been saved.'));
				
				// $issuesquery = $this->Servicesentries->Issues->find('list', ['limit' => 200])->where (['id'=> $servicesentry['id']]);
				// ->andwhere(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
				
				$query[]=$issues_servicetable->find('All')->where(['servicesentry_id'=>$servicesentry['id']])->toArray();
				$query2=$issues_servicetable->find('All')->where(['servicesentry_id'=>$servicesentry['id']]);
				
		  		(isset($query)) ? $result=$query : $result="";
				
				// $this->log($servicesentry['id']);
				$this->log($query2->count());
				$issuesCount = $query2->count();
				if($issuesCount > 0)
					{
						for ($i=0; $i < $issuesCount ; $i++) 
							{ 
							$this->log($result[0][$i]['issue_id']);
							// $test[] = $this->Servicesentries->Issues->query("UPDATE zorba.issues SET issuestatus_id = 3 WHERE id = $result[0][$i]['issue_id']");
							$tttt = $this->Servicesentries->Issues->updateIssuesFromServiceentries($this->loggedinuser['customer_id'],$result[0][$i]['issue_id']);
	        				}
					}
		  		// $this->log($result[0][0]['issue_id']);
				// $this->log('$servicesentry[id]=='.$servicesentry['id']);
		  
				

                // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The service entry could not be saved. Please, try again.'));
            }
        }

        $vehicles = $this->Servicesentries->Vehicles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$vendors = $this->Servicesentries->Vendors->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$customers = $this->Servicesentries->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$servicetasks = $this->Servicesentries->Servicetasks->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$issues = $this->Servicesentries->Issues->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		
        $this->set(compact('servicesentry', 'vehicles', 'vendors', 'customers','servicetasks','issues','resissues'));
        $this->set('_serialize', ['servicesentry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicesentry id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicesentry = $this->Servicesentries->get($id, [
            'contain' => ['Servicetasks','Issues']
        ]);
		$issues_servicetable = TableRegistry::get('Issues_servicesentries');
		$this->loadModel('Issues');
		
		if($servicesentry['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicesentry = $this->Servicesentries->patchEntity($servicesentry, $this->request->data);
             $servicesentry['customer_id']=$this->loggedinuser['customer_id'];
			 
			 
			 	$qry[]=$issues_servicetable->find('All')->where(['servicesentry_id'=>$servicesentry['id']])->toArray();
				$qry2=$issues_servicetable->find('All')->where(['servicesentry_id'=>$servicesentry['id']]);
				(isset($qry)) ? $rslt=$qry : $rslt="";
				$this->log($qry2->count());
				$issuesCounter = $qry2->count();
				if($issuesCounter > 0)
					{
						for ($i=0; $i < $issuesCounter ; $i++) 
							{ 
							$this->log($rslt[0][$i]['issue_id']);
							$ttt = $this->Servicesentries->Issues->changeStatus($this->loggedinuser['customer_id'],$rslt[0][$i]['issue_id']);
	        				}
					}
			 
            if ($this->Servicesentries->save($servicesentry)) {
                $this->Flash->success(__('The service entry has been saved.'));
				$query[]=$issues_servicetable->find('All')->where(['servicesentry_id'=>$servicesentry['id']])->toArray();
				$query2=$issues_servicetable->find('All')->where(['servicesentry_id'=>$servicesentry['id']]);
				(isset($query)) ? $result=$query : $result="";
				$this->log($query2->count());
				$issuesCount = $query2->count();
				if($issuesCount > 0)
					{
						for ($i=0; $i < $issuesCount ; $i++) 
							{ 
							$this->log($result[0][$i]['issue_id']);
							$tttt = $this->Servicesentries->Issues->updateIssuesFromServiceentries($this->loggedinuser['customer_id'],$result[0][$i]['issue_id']);
	        				}
					}
				
				

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The service entry could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Servicesentries->Vehicles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$vendors = $this->Servicesentries->Vendors->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$customers = $this->Servicesentries->Customers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$servicetasks = $this->Servicesentries->Servicetasks->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		$issues = $this->Servicesentries->Issues->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
		
        $this->set(compact('servicesentry', 'vehicles', 'vendors', 'customers','servicetasks','issues'));
        $this->set('_serialize', ['servicesentry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicesentry id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicesentry = $this->Servicesentries->get($id);
		
		$issues_servicetable = TableRegistry::get('Issues_servicesentries');
		$this->loadModel('Issues');
		
		if($servicesentry['customer_id'] = $this->loggedinuser['customer_id'])
		{
			
			//Change status of resolved issues as Open in Issues table
				$query[]=$issues_servicetable->find('All')->where(['servicesentry_id'=>$servicesentry['id']])->toArray();
				$query2=$issues_servicetable->find('All')->where(['servicesentry_id'=>$servicesentry['id']]);
				(isset($query)) ? $result=$query : $result="";
				$this->log($query2->count());
				$issuesCount = $query2->count();
				if($issuesCount > 0)
					{
						for ($i=0; $i < $issuesCount ; $i++) 
							{ 
							$this->log($result[0][$i]['issue_id']);
							$tttt = $this->Issues->changeStatus($this->loggedinuser['customer_id'],$result[0][$i]['issue_id']);
        					}
					}
			
	        if ($this->Servicesentries->delete($servicesentry)) {
	            $this->Flash->success(__('The service entry has been deleted.'));
				
				
				
				
	        } else {
	            $this->Flash->error(__('The service entry could not be deleted. Please, try again.'));
	        }
		}
	    else
	    {
	   	    $this->Flash->error(__('You are not authorized.'));

	    }
        return $this->redirect(['action' => 'index']);
    }

	public function deleteAll($id=null){

		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;

		if(isset($data)){
		   foreach($data as $key =>$value){

		   	   	$itemna=explode("-",$key);

			    if(count($itemna)== 2 && $itemna[0]=='chk'){

					$record = $this->Servicesentries->get($value);

					 if($record['customer_id']== $this->loggedinuser['customer_id']) {

						   if ($this->Servicesentries->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}
			}


				if($sucess){
					$this->Flash->success(__('Selected Service entries have been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Service entries could not be deleted. Please, try again.'));
				}

		   }

             return $this->redirect(['action' => 'index']);
     }
	
	public function populateResIssues()
	     {
	    	if($this->request->is('ajax')) 
		    	{
		    		$this->log("sdfsdf");
		    		$this->loadModel('Issues');
					$this->autoRender=false;
					
					$vid = $this->request->query['vehicleid'];
					
					
					
					// $issues = array();
					
						// $ttt = $this->Issues->populateResIssues($this->loggedinuser['customer_id'],$vid);
						$resolvedissues = $this->Servicesentries->Issues->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0'])->andwhere(['vehicle_id' => $vid]) ;
						$this->set(compact('$resolvedissues'));
					
		    		
		    	}
		 }

}
