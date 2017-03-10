<section class="content">
	<?php echo $this->Form->create($this->request->params['controller'],array('url' => array('controller' => $this->request->params['controller'], 'action' => 'deleteAll')));?>
   <input type="hidden" value="1"  id="basicfilter"/>
  	<div class="fmactionbtn"></div>
		 <div>
		  <?php
	      $title="Manage ". $this->request->params['controller'] ;
	      echo $this->element('actions',[$actions,'title'=>$title]);
		  ?>
	     </div>
  <div class="row">
        <div class="col-md-12">
  <div class="box box-primary">
      <div class="box-body">
    <table id="mptlindextblmaster" class="table table-hover  table-bordered ">
        <thead>
            <tr>
            	<th data-orderable="false"><input type="checkbox" name="select_all" value="1" id="select-all" ></th>
           	
               <?php
               if(isset($colheadsformasters))
			   {
			   
	               	 for($i=1;$i<count($colheadsformasters);$i++)
	               	 {
	                 echo "<th>". $colheadsformasters[$i]["title"] ."</th>";
	                 }
				
			   }
			   else
			   {
                    for($i=1;$i<count($configs);$i++)
                    {
                    echo "<th>". $configs[$i]['title'] ."</th>";
                    }
				  
			   }
			   ?>  
                
                <th data-orderable="false">Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table></div></div>
    </div></div>
    <?= $this->Form->end() ?>
</section>

<?php $this->start('scriptBotton'); ?>
<script>

 var table; var order;
	var prevselection = [];

   function deleteRecord(btn){

  	    if (btn == 'yes') {

            jQuery("form")[0].submit();
        }
  }

  $(function () {
  	setTurben();
  	 $("#delete").click(function(){

  	   if($(".mptl-lst-chkbox-master:checked").length==0){
      	alert("No item selected. Please select at least one item ");
      	return;
      }

			if($(".mptl-lst-chkbox-master:checked").length==1){
				if (confirm("Do you want to delete the record?")) {
		   	deleteRecord('yes');
		    }
			}
			else if($(".mptl-lst-chkbox-master:checked").length>1){
				if (confirm("Do you want to delete " + $(".mptl-lst-chkbox-master:checked").length + " records?")) {
		   	deleteRecord('yes');
		    }
			}
  	});
  	
  	 //Flat blue color scheme for iCheck
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
    
    
     table= $('#mptlindextbl').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "scrollX":true,
          colReorder: true,
          stateSave:false,
          responsive: true,
          "initComplete": function(settings, json) {
            //set bool value
            $("#mptlindextbl tbody").find('tr').each(function () {
         	$(this).find('td').each (function() {
         	var innerHtml=$(this).find('div.mptldtbool').html();
         	(innerHtml=="1") ? $(this).find('div.mptldtbool').html("True")
			: $(this).find('div.mptldtbool').html("False");
         	});
     	});
          },
          "fnServerParams": function ( aoData ) {

            aoData.additional =<?php

                $str=""; $c=0;
                foreach($additional['additional'] as $colms){
                	$plus="";
                	if($c>0){

						$str.= " + ',' + ";
                	}
                	$str.= '$("#' . $colms['name']    .'").val()' ;
                	$c++;
                }
				echo strlen($str)>0?$str:'""';

             ?>
            ,
            aoData.basic=$("#basicfilter").val()?$("#basicfilter").val():"-1";
          },
        //server side processing
          "processing": true,
          "serverSide": true,
          "ajax": "/<?php echo $this->request->params['controller'] ?>/ajaxData",
          'columnDefs': [{
        'targets': 0,
        'className': 'dt-body-center',
        'render': function (data, type, full, meta){
            return '<input type="checkbox" class="mptl-lst-chkbox-master" name="chk-' + data + '" value="' + $('<div/>').text(data).html() + '">';
        }
     },{
     	'targets': [<?php
			     	if(isset($colheadsformasters))
			   			{

			   			}
					else
						{
						echo $usersettings['0']['value'] ;
						}
			     	  ?>],
     	 "visible": false,
     },

     ]
    });
    
    // fmactions are added through setTurben. btn-group div is added separately.
	$('div.fmactionbtn').appendTo('div.dataTables_length');
	$('div.btn-group').appendTo('div.fmactionbtn');
	$('#filterstatus').appendTo('div.dataTables_filter');
	$('#filterstatus').addClass('pull-left');
    
     // Handle click on "Select all" control
   $('#select-all').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
      prevselection = setSelection();
			setTurben();
   });
    
    $('#mptlindextbl tbody').on('change', 'input[type="checkbox"]', function(){
		 var el = $('#select-all').get(0);
		 var c =	$(".mptl-lst-chkbox-master:checked").length;
		 var rows = table.rows({ 'search': 'applied' }).nodes();
		 // If checkbox is not checked
		 if(!this.checked && !(c==0)){
				// If "Select all" control is checked and has 'indeterminate' property
				if(el && el.checked && ('indeterminate' in el)){
					 // Set visual state of "Select all" control
					 // as 'indeterminate'
					 el.indeterminate = true;
				}
		 }
		 if (c==0){
				 el.indeterminate = false;
				 el.checked = false;
		 }
		 if (c==rows.length){
				el.indeterminate = false;
 		 }
		 prevselection = setSelection();
		 setTurben();
	});
	
	// Handle click on " Settings Select all" control
   $('#mptl_settings_chk_all').on('click', function(){
      // Check/uncheck checkboxes for all rows in the table
      if( $(this).is(':checked') ){
         $('.mptl_settings_chk').prop('checked', true);
      }else{
      	$('.mptl_settings_chk').prop('checked', false);
      }
   });
   // Handle click on checkbox to set state of "Settings Select all" control

   $('mptl-tbl-settings tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#mptl_settings_chk_all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });
	
  	setTurben();
  });
  function setSelection(){
		var valuearray = [];
		$(".mptl-lst-chkbox-master:checked").each(function(){
				valuearray.push($(this).attr("value"));
		});
		return valuearray;
}

function setTurben()
{
	// alert("inside");
	var c=$(".mptl-lst-chkbox-master:checked").length;
      $(".mptl-itemsel").html(c);
      if(c==0){
				   $('div.fmactions').hide();
      	   $( ".mptl-itemsel" ).fadeTo( "slow" , 0, function() {
		    // Animation complete.
		  });
      }else{
				 $('div.fmactions').appendTo('div.fmactionbtn');
				 $('div.fmactions').show()
      	  $( ".mptl-itemsel" ).fadeTo( "slow" , 1, function() {
		    // Animation complete.
		  });
      }
}



//Determines the fmaction and selection behaviour during asynchronous calls
function ajaxInitialise(){
		var el = $('#select-all').get(0);
		var rows = table.rows({ 'search': 'applied' }).nodes();
		var c =	$(".mptl-lst-chkbox-master:checked").length;
		if(rows.length == 0){
			$('#select-all').attr("disabled", true);
		}
		else{
			$('#select-all').attr("disabled", false);
		}
		if(prevselection.length > 0){
			var newselection = [];
			$(".mptl-lst-chkbox-master").each(function(){
				newselection.push($(this).attr("value"));
			});
			var commonselection = $.grep(prevselection, function(element) {
			    return $.inArray(element, newselection ) !== -1;
				});
			if (commonselection.length > 0){
					$.each(commonselection,function(key,val){
        	  $("input[type='checkbox'][value="+val+"]").prop("checked",true);
    			});
			}
			if (el && el.checked && (commonselection.length == newselection.length)){
					el.indeterminate = false;
			}
			else if (el && el.checked && (commonselection.length < newselection.length)){
					el.indeterminate = true;
			}
			else if(el && el.checked && ('indeterminate' in el)){
					 el.indeterminate = true;
			}
			else if(el && el.checked && (c == 0)){
					el.indeterminate = false;
			}
			else if (el && el.checked && (rows.length == newselection.length)){
					el.indeterminate = false;
			}
			else{
					el.checked = false;
					el.indeterminate = false;
			}
			if (el && el.checked && (rows.length == 0)){
				  el.checked = false;
					el.indeterminate = false;
			}
			setTurben();
		}
		else{
			 prevselection = setSelection();
			 setTurben();
		}
	}
</script>
<?php $this->end(); ?>

