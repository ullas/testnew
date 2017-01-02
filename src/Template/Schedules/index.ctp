<!-- Content Header (Page header) -->
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Schedules 
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  	<li><a href="#"><i class="fa fa-puzzle-piece"></i> Administration</a></li>
    <li><a href="#"><i class="fa fa-puzzle-piece"></i> Schedules</a></li>
    
  </ol>
</section>



    <script type="text/javascript">
    $( document ).ready(function() {
    	//hide and remove active class for filter tab
		$( "#fltrlst" ).hide();
		$("#filterdiv").removeClass("active");
		//make additional filter tab active
		$("#additionalfltrlst").addClass("active");
		$("#addfilterdiv").addClass("active");
		//change text of addfilter
		$("#addfilterlink").text('Filter');
		
	});
	</script>

<?php echo $this->element('indexbasic'); ?>