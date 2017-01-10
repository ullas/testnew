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
      <div>
      	<?php echo  $this->element('filters',$additional) ?>
     </div> <!-- COL-7-->

  <div class="row">
        <div class="col-md-12">
  <div class="box box-primary">
      <div class="box-body">
      	<!-- export buttons without flash -->
      	<div id="exportdiv" style="margin-bottom: 5px;"><a href="#" id="copydt" class="btn btn-sm btn-success" style="margin-left:5px;display:none;" title="Copy"><i class='fa fa-files-o'></i></a>
      	<a href="#" id="printdt" class="btn btn-sm btn-success" style="margin-left:5px;display:none;" title="Print"><i class='fa fa-print'></i></a>
      	<a href="#" id="savexlsx" class="btn btn-sm btn-success" style="margin-left:5px;display:none;" title="Save as xlsx"><i class='fa fa-file-excel-o'></i></a>
      	<!-- <a href="#" id="savepdf" class="btn btn-sm btn-success" style="margin-left:5px;" title="Save as pdf"><i class='fa fa-file-pdf-o'></i></a> --></div>
		<table id="mptlindextbl" class="table table-hover  table-bordered ">
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
<div class="modal fade" id="assign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- export plugin scripts -->
<script type="text/javascript" src="http://oss.sheetjs.com/js-xlsx/xlsx.core.min.js"></script>
<script type="text/javascript" src="http://sheetjs.com/demos/FileSaver.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.1.0/jspdf.plugin.autotable.js"></script> -->

 <?php

  if(isset($colheadsformasters))
   {
   	echo $this->element('settings',[$configs]);
   }
  else
  {
  echo $this->element('settings',[$configs,$usersettings]);
  }


  ?>
<?php
$this->Html->css([
'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/iCheck/all',
   'AdminLTE./plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min',
 ], ['block' => 'css']);

$this->Html->script([
    'AdminLTE./plugins/datatables/extensions/TableTools/js/dataTables.tableTools',
    'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
  'AdminLTE./plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min',
  'AdminLTE./plugins/daterangepicker/moment.min',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/iCheck/iCheck.min',
], ['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  var table; var order;
   function deleteRecord(btn){

  	    if (btn == 'yes') {

            jQuery("form")[0].submit();
        }
  }
  $(function () {



  	// xlxsx
  	$.fn.dataTable.Api.register('column().title()', function() {
        var colheader = this.header();
        return $(colheader).text().trim();
    });

    // var table = $('#example').DataTable();

    function Workbook() {
        if (!(this instanceof Workbook)) return new Workbook();
        this.SheetNames = [];
        this.Sheets = {};
    }

    function datenum1(v, date1904) {
        if (date1904) v += 1462;
        var epoch = Date.parse(v);
        return (epoch - new Date(Date.UTC(1899, 11, 30))) / (24 * 60 * 60 * 1000);
    }

    function s2ab(s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i = 0; i != s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
        return buf;
    }

    function sheet_from_array_of_arrays(data, opts) {
        var ws = {};
        var range = {
            s: {
                c: 10000000,
                r: 10000000
            },
            e: {
                c: 0,
                r: 0
            }
        };
        for (var R = 0; R != data.length; ++R) {
            for (var C = 0; C != data[R].length; ++C) {
                if (range.s.r > R) range.s.r = R;
                if (range.s.c > C) range.s.c = C;
                if (range.e.r < R) range.e.r = R;
                if (range.e.c < C) range.e.c = C;
                var cell = {
                    v: data[R][C]
                };
                if (cell.v == null) continue;
                var cell_ref = XLSX.utils.encode_cell({
                    c: C,
                    r: R
                });

                if (typeof cell.v === 'number') cell.t = 'n';
                else if (typeof cell.v === 'boolean') cell.t = 'b';
                else if (cell.v instanceof Date) {
                    cell.t = 'n';
                    cell.z = XLSX.SSF._table[14];
                    cell.v = datenum(cell.v);
                } else cell.t = 's';

                ws[cell_ref] = cell;
            }
        }
        if (range.s.c < 10000000) ws['!ref'] = XLSX.utils.encode_range(range);
        return ws;
    }

    $('#savexlsx').on('click', function(btn) {
        var ws_name = "DataTables";

        var data = table.data();

        var names = [];
        table.columns().every(function() {
            names.push(this.title());
        });

        data.unshift(names);

        var wb = new Workbook();
        var ws = sheet_from_array_of_arrays(data);

        wb.SheetNames.push(ws_name);
        wb.Sheets[ws_name] = ws;
        var wbout = XLSX.write(wb, {
            bookType: 'xlsx',
            bookSST: true,
            type: 'binary'
        });

        saveAs(new Blob([s2ab(wbout)], {
            type: "application/octet-stream"
        }), "DataTables.xlsx");

    });
    // xlsx end
    //copy start
    $('#copydt').click(function(){
		var rows = [];
		// $('tr[role="row"]').each(function() {
		$('#mptlindextbl tr:visible').each(function() {
			var columns = [];
			$(this).children("th").each(function() {
				columns.push($(this).text());
			});
			$(this).children("td").each(function() {
				columns.push($(this).text());
			});
			//delimiter tab between each cell
			rows.push(columns.join("\t"));
		});
		//delimit newline between each row
		var data = rows.join("\n"); //console.log(data);
		copyToClipboard(data);
		alert('Copied to Clipboard !');
	});
	function copyToClipboard(arr) {
    	var $temp = $("<input>");
    	$("body").append($temp);
    	$temp.val(arr);
    	$temp.select();
    	document.execCommand("copy");
    	$temp.remove();
	}
	//copy end
	//print start
	$('#printdt').click(function(){

		var divToPrint=document.getElementById("mptlindextbl");
		$('.dataTables_sizing').css('height', '20px');
   		newWin= window.open("");
   		newWin.document.write(divToPrint.outerHTML);
   		newWin.print();
   		newWin.close();
   		$('.dataTables_sizing').css('height', '0px');
	});
	//print end here
  	 updateFilterActiveFlag();

     $("#delete").click(function(){

  	   if($(".mptl-lst-chkbox:checked").length==0){
      	alert("No item selected. Please select at least one item ");
      	return;
      }
       if (confirm("Do you want to delete the record?")) {
	   	deleteRecord('yes');
	   }
  	});

    $('#settings').on('shown.bs.modal', function() {
       setOrder();
    })

    //Flat blue color scheme for iCheck
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
    //daterangepicker for advanced filtering
    $('.mptl-daterange').daterangepicker(
    	{
				autoApply:false,
				locale : {
      format : 'DD/MM/YY',
			cancelLabel: 'Clear'
    }}).val('');
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
            return '<input type="checkbox" class="mptl-lst-chkbox" name="chk-' + data + '" value="' + $('<div/>').text(data).html() + '">';
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

		$('<a href="/<?php echo $this->request->params['controller'] ?>/add/" id="addfltr" class="btn btn-sm btn-success" style="margin-left:5px;" title="Add New"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');

	$('#copydt').appendTo('div.dataTables_filter');$('#copydt').css("display", "");
	$('#printdt').appendTo('div.dataTables_filter');$('#printdt').css("display", "");
	$('#savexlsx').appendTo('div.dataTables_filter');$('#savexlsx').css("display", "");

	// fmactions are added through setTurben. btn-group div is added separately.
	$('div.fmactionbtn').appendTo('div.dataTables_length');
	$('div.btn-group').appendTo('div.fmactionbtn');
	$('#filterstatus').appendTo('div.dataTables_filter');
	$('#filterstatus').addClass('pull-left');

    //table tools like export
    // var tt = new $.fn.dataTable.TableTools( table, {aButtons: [ { "sExtends": "copy","sButtonText": "<i class='fa fa-files-o'></i>","sToolTip": "Copy" },
    																						 // { "sExtends": "csv","sButtonText": "<i class='fa fa-file-word-o'></i>","sToolTip": "Csv"  },
 																							 // { "sExtends": "xls","sFileName": "*.xls","sButtonText": "<i class='fa fa-file-excel-o'></i>","sToolTip": "Excel"  },
   																							 // { "sExtends": "pdf","sButtonText": "<i class='fa fa-file-pdf-o'></i>","sToolTip": "Pdf"  },
   																							 // { "sExtends": "print","sButtonText": "<i class='fa fa-print'></i>","sToolTip": "Print" } ]} );
	// $( tt.fnContainer() ).appendTo('div.dataTables_filter');


    $('<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#settings" style="margin-left:5px;" title="Table Settings"><i class="fa fa-gear" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');

       $('.dataTables_filter input').unbind().on('keyup', function() {

	var searchTerm = this.value.toLowerCase();
	$.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
       //search only the following columns
       return true;
   })
   console.log(searchTerm);
   table.search(searchTerm).draw();
   $.fn.dataTable.ext.search.pop();
})
//col reorder
 order= new $.fn.dataTable.ColReorder( table );
  // Handle click on "Select all" control
   $('#select-all').on('click', function(){
      // Get all rows with search applied

      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
      setTurben();
   });
   // Handle click on checkbox to set state of "Select all" control
   $('#mptlindextbl tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
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
   $(".mptl-settings-save").click(function(){
       var hiddencols="";
       var c=<?php echo count($configs) ?> ;

       $('.mptl_settings_chk').each(function () {
		    var sThisVal = (this.checked ? $(this).val() : "");
		    var id=$(this).attr("id");
		    var col=id.split("_")[3];

		    if(col !=0 && c!=col){
			    if(sThisVal){

			    	table.column(col).visible(true);

			    }else{
			    	hiddencols.length>0? hiddencols+="," :hiddencols;
			    	hiddencols+=col;
			    	table.column(col).visible(false);
			    }
		    }
	   });



	   $.post("/<?php echo $this->request->params['controller'] ?>/updateSettings",
   		 {
       		 columns: hiddencols

   		 },
	    function(data, status){
	        $('#settings').modal('hide');
	    });

	     $('#settings').modal('hide');

   });

	 $('#datatabfilter').on('click',function(){$('#datatabfilterul').toggle()});

	 $(document).on('click', function (e) {
	 if (!$('.daterangepicker').is(e.target) && $('.daterangepicker').has(e.target).length === 0 && !$('#datatabfilterul').is(e.target) && $('#datatabfilterul').has(e.target).length === 0) {
			 $("#datatabfilterul").hide();
	 }
 	});

	 $('.mptl-daterange').on('cancel.daterangepicker', function() {
      	$(this).val('');
				updateFilterActiveFlag();
				table.ajax.reload(null,false);
    	  table.draw();
		});

    $('.mptl-daterange').change(function(){
    	updateFilterActiveFlag();
    	// var ordr=table.colReorder.order();
    	 table.ajax.reload(null,false);
    	// table.colReorder.order(ordr);
    	 table.draw();
    });
        //jQuery UI sortable for the settings modal
    $(".column-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999
    });
     setTurben();
  });

function setTurben()
{
	var c=$(".mptl-lst-chkbox:checked").length;
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

function updateFilterActiveFlag()
{
	    var flagActive=false;

	    $('.mptl-daterange').each(function () {
		    var l= $(this).val().length;
		    if(l>3){
		    	flagActive=true;
		    }
	   });
	 	$('.mptl-filter-base').each(function (){
    		if(this.checked  && !($(this).is(':disabled'))){
    			flagActive=true;

    		}
    	});
    	  flagActive  ? $("#filterstatus").show() : 	$("#filterstatus").hide();
}

$('.mptl-filter-base').on('ifChecked', function(event){

	setBasicFilter();

});
$('.mptl-filter-base').on('ifUnchecked', function(event){

	setBasicFilter();

});

 function setBasicFilter()
  {
  	  var filter="";

       $('.mptl-filter-base').each(function () {
		    var sThisVal = (this.checked ? $(this).val() : "");
		    var id=$(this).attr("id");
		    var col=id.split("_")[3];
		    if(sThisVal){

		    	filter.length>0? filter+="," :filter;
		    	filter+=col;
		    }
	   });
  	  $("#basicfilter").val(filter);
  	  updateFilterActiveFlag();
    	 table.ajax.reload(null,true);
    	 table.draw();
  }
  function setOrder()
  {

  }
</script>
<?php $this->end(); ?>
