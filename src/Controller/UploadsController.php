<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Locations Controller
 *
 * @property \App\Model\Table\LocationsTable $Locations
 */
class UploadsController extends AppController
{
	 public function upload(){
     	
		$this->autoRender= false;
		
		if (!empty($_FILES)) {
				
			$tempFile = $_FILES['file']['tmp_name'];  
		
  			$targetPath = APP.'webroot'.DS.'uploadedpics'.DS;
  			$targetFile =  $targetPath. $this->request->data['file']['name'];
  			move_uploaded_file($tempFile,$targetFile);
  		
     		// $this->Flash->success(__( "File uploaded.." ));
			$this->response->body($targetFile);
	    	return $this->response;
  		}
		
     }
    
}
