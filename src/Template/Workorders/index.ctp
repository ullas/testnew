<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li class="active">Work Orders</li>
    
  </ol>
</section>
     <style>
     	a.disabled {
  					opacity:0.4;
  					pointer-events: none;
  					}
     </style>          


<?php $this->start('scriptIndexBotton'); ?>
<script>
function aftertableloaded(){
	
	$("#mptlindextbl tbody").find('tr').each(function () {//alert($(this).find('td:eq(5)').html());
		if($(this).find('td:eq(5)').html()=="Closed"){
    		$('.deletelink').addClass('disabled');
    		$('.editlink').addClass('disabled');
    		$('.disabled').attr("disabled","disabled");
    	}
    });
	//set bool value
            $("#mptlindextbl tbody").find('tr').each(function () {
         	$(this).find('td').each (function() {
         	var innerHtml=$(this).find('div.mptldtbool').html();
         	(innerHtml=="1") ? $(this).find('div.mptldtbool').html("True")
			: $(this).find('div.mptldtbool').html("False");
         	});
         	});
    $(".deletelink").hover(function() {
        $(this).css('cursor','pointer').attr('title', 'This is a hover text.');
    }, function() {
        $(this).css('cursor','auto');
    });
}



</script>
<?php $this->end(); ?> 


<?php echo $this->element('indexbasic'); ?>