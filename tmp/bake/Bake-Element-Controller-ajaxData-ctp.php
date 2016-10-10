
public function ajaxData() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
        $dbout=$this->CreateConfigs->find('all')->toArray();
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		$contain= => [<?= $this->Bake->stringifyList($belongsTo, ['indent' => false]) ?>];                             
        $output =$this->Datatable->getView($fields,$contain);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  
