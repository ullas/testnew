<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="modalSettings">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="padding-bottom:0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="modalSettings">Settings</h3><small>Select the columns to display. You can order the columns based on your preference.</small>
      </div>
      <div class="modal-body" style="padding-bottom:0">
      	<div class="box box-primary">
          <ul class="todo-list" style="margin-bottom:2px">
              <li>
                <input id="mptl_settings_chk_all" type="checkbox">
                <span class="text">Column Name</span>
                <small class="label label-success"><i class="fa fa-check-square"></i>
                  Check Column Name checkbox to select all columns. Drag <i class="fa fa-ellipsis-v"></i>&nbsp;<i class="fa fa-ellipsis-v"></i> to re-order the columns.
                </small>
              </li>
            </ul>
            <ul class="todo-list column-list">
              <?php
                $usa=explode(',',$usersettings[0]['value']);
                echo '<input type="hidden" class="mptl_settings_chk" id="mptl_settings_chk_0">';
                foreach ($configs as $key) {
                	$check=in_array($key['order'],$usa)?"":"checked";
                    $disable=($key['order']==0) ?"disabled":"";
                  echo '<li style="padding:7px;"><span class="handle"><i class="fa fa-ellipsis-v"></i>&nbsp;<i class="fa fa-ellipsis-v"></i></span>';
  						    echo '<input type="checkbox" class="mptl_settings_chk " ' .  $disable . ' ' . $check .  ' id="mptl_settings_chk_'.  $key['order'] .'" >';
  						    echo '<span>' . $key['title'] . '</span></li>';

          		     }
				  echo '<li><input type="hidden" class="mptl_settings_chk" id="mptl_settings_chk_"' . count($configs) .'></l>';
	            ?>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="mptl-settings-save btn btn-success">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
