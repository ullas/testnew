<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="modalSettings">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalSettings">Settings</h4><small>Select the colums to display</small>
      </div>
      <div class="modal-body">
      	<div class="box box-primary">
        <table class="mptl-tbl-settings table table-hover" >
        	<thead>
        		<tr>
        			<th style="width:20px"><input type="checkbox" id="mptl_settings_chk_all" ></th>
        		    <th>Column Name</th>
        		</tr>

        	</thead>
        	<tbody>
        		
        		<!--<tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_2"></td>
        			<td>PO</td>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_3"></td>
        			<td>Invoice Number</td>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_4"></td>
        			<td>Start Date</td>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_5"></td>
        			<td>Odometer</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_6"></td>
        			<td>Issued By</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_7"></td>
        			<td>Assigned By</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Labour</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Parts</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_6"></td>
        			<td>Discount</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_7"></td>
        			<td>Tax</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Issued Date</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Completion Date</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_7"></td>
        			<td>Vendor</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Void</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Status</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Description</td>
        		</tr> -->
        		
        		<?php
        		   // print_r($configs);
        		     for($i=1;$i<count($configs);$i++){
        		     		
        		     	 echo "</tr><tr>";
						 echo '<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_', $i .'" ></td>';
						 echo '<td>' . $configs[$i]['title'] . '</td>';
						 echo "</tr>";
        		     }
        		
        		?>
        	</tbody>

        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="mptl-settings-save btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>