<!DOCTYPE html>
<html>
<head>
	<style >
		label.mandatory:after {
   content: ' *';
   color: #ff5a4d;
   display: inline;
}
.input-group{
	width:100%;
}
		
</style>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo isset($theme['title']) ? $theme['title'] : 'Maptell Zorba'; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <?php echo $this->Html->css('AdminLTE./bootstrap/css/bootstrap'); ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/css/ionicons.min.css">
     <link rel="stylesheet" href="/js/ol/ol.css">
   <?php echo $this->Html->css('AdminLTE./plugins/select2/select2.min'); ?>
    <!-- Theme style -->
    <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
<!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <?php echo $this->Html->css('AdminLTE.skins/skin-blue'); ?>
    <?php echo $this->Html->css('AdminLTE.skins/weather-icons'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('scriptTop'); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo $this->Url->build('/'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><?php echo $theme['logo']['mini'] ?></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><?php echo $theme['logo']['large'] ?></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <?php echo $this->element('nav-top') ?>
        </header>

        <!-- Left side column. contains the sidebar -->
        <?php echo $this->element('aside-main-sidebar'); ?>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?php echo $this->Flash->render(); ?>
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->fetch('content'); ?>

        </div>
        <!-- /.content-wrapper -->

        <?php echo $this->element('footer'); ?>

        <!-- Control Sidebar -->
        <?php echo $this->element('aside-control-sidebar'); ?>

        <!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<?php echo $this->Html->script('AdminLTE./plugins/jQuery/jQuery-2.1.4.min'); ?>
<!-- jQueryUI 1.11.4 -->
<?php echo $this->Html->script('AdminLTE./plugins/jQueryUI/jquery-ui.min.js'); ?>
<!-- Bootstrap 3.3.5 -->
<?php echo $this->Html->script('AdminLTE./bootstrap/js/bootstrap'); ?>
<!-- SlimScroll -->
<?php echo $this->Html->script('AdminLTE./plugins/slimScroll/jquery.slimscroll.min'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('AdminLTE./plugins/fastclick/fastclick'); ?>


<?php echo $this->Html->script('ol/ol'); ?>

<!-- AdminLTE for demo purposes -->
<?php echo $this->fetch('script'); ?>
<?php echo $this->fetch('scriptBotton'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".navbar .menu").slimscroll({
            height: "200px",
            alwaysVisible: false,
            size: "3px"
        }).css("width", "100%");
       
        var a = $('a[href="<?php echo $this->request->webroot . $this->request->url ?>"]');
        if (!a.parent().hasClass('treeview')) {
            a.parent().addClass('active').parents('.treeview').addClass('active');
        }
        var a = $('a[href="/<?php echo $this->request->params['controller'] ?>"]');
       if (!a.parent().hasClass('treeview')) {
			a.parent().addClass('active').parents('.treeview').addClass('active');
       }
        $(".actions a").each(function(){
                 if($(this).text()=='View')
                 {
                     $(this).addClass('fa fa-file-text-o p3');
                     $(this).text("");
                 }
                 if($(this).text()=='Edit')
                 {
                     $(this).addClass('fa fa-pencil p3');
                     $(this).text("");
                 }
                 if($(this).text()=='Delete')
                 {
                     $(this).addClass('fa fa-trash');
                     $(this).text("");
                 }
           });
	   $( ':input[required]' ).each( function () {
	       $("label[for='" + this.id + "']").addClass('mandatory');
	   });
	   
	   $("#myModal").on("show.bs.modal", function(e) {
		    var link = $(e.relatedTarget);
		   // alert(link.attr("href"));
		    $(this).find(".modal-body").load(link.attr("href"),function( response, status, xhr ){
		    	
		    	  if ( status == "error" ) {
					    var msg = "Sorry but there was an error: ";
					    alert(msg);
				  }else{
				  	   
				  	     table= $('#mptlindextblmaster').DataTable({
         					 "paging": true,
          					 "lengthChange": true,
          					 "ajax": link.attr("href")+"/ajaxData",
          					 "processing": true,
         					 "serverSide": true,
         					 "searching": true,
          					 "ordering": true,
         					 'columnDefs': [{
						        'targets': 0,
						        'className': 'dt-body-center',
						        'render': function (data, type, full, meta){
						            return '<input type="checkbox" class="mptl-lst-chkbox-master" name="chk-' + data + '" value="' + $('<div/>').text(data).html() + '">';
						        }
						     }]
				  		});
				  		
				  		$('<a href='+ link.attr("href") +'"/add/" id="masterdataadd" class="btn btn-sm btn-success" style="margin-left:5px;" title="Add New Work Order"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
   
				  		$("div.dataTables_filter").delegate("#masterdataadd","click", function(e){
				  			 e.preventDefault();
						     $(".modal-body").load(link.attr("href")+"/add",function( response, status, xhr ){
						     	
						     	   $('#myModal').on("submit", "form#masterdataform", function(e){ 
									    e.preventDefault(); 
									    
									    
									     	
									     	$('#myModal').modal("hide");
									     	
									     
									    
									    
									    
									});
						     });
						    
				  			
				  		});
				  		
					  
				  		
				  		
          
				 }
		    });
		});
		
		 
    });
    
    
</script>
<!-- AdminLTE App -->
<?php echo $this->Html->script('AdminLTE.AdminLTE.min'); ?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Master Data</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


</body>
</html>
