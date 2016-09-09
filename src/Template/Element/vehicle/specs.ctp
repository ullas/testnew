<div class="col-md-1 mptl-trimpad">
    <div class="pull-right user-block mptl-driv" id="drivimgs">
            <img class="img-circle img-bordered-sm dimg" src="/img/cross.png" alt="User Image" id="driverimg<?php echo $id ?>">    
        <p class="pdriver">Driver</p>
    </div>
    <!-- <div class="bg-red">..</div> -->
    <!-- <span class="info-box-icon">70%</span> -->

</div>
<div class="col-md-1 mptl-trimpad">
    <div class="pull-right user-block" id="drivimgs">
        <img class="img-circle img-bordered-sm vimg" src="/img/cross.png" alt="Driver Image" id="vehicleimg<?php echo $id ?>">
        <p class="pvehicle">Vehicle</p>
    </div>

</div>
<div class="col-md-1 mptl-trimpad user-block">
    <div class="pull-right mptl-mt9">

        <?php if($tripstart) {
        ?>
            <span class="label triplabel bg-green">Start</span>
        <?php }else { ?><span class="label triplabel bg-green">Start</span>
        <?php } ?>
    </div>
</div>
<!-- /.tab-pane -->
<div class="col-md-7 mptl-trimpad">

    <div class="timeline mptl-mt9">
        
        <?php foreach ($statusarr as $value): 
            
                
                switch ($value[0]) {
    case "1":
        echo "<div class='event down bg-olive'>";
        break;
    case "2":
        echo "<div class='event down bg-orange'>";
        break;
    case "3":
        echo "<div class='event down bg-red'>";
        break;
    case "4":
        echo "<div class='event down bg-purple'>";
        break;
    case "5":
        echo "<div class='event down bg-aqua'>";
        break;
    default:
        echo "<div class='event down bg-blue'>";
}
?>
        
                <div class="timeline-badge">
                    <i class="fa fa-truck fa-lg fa-flip-horizontal"></i>
                </div>
                <div class="detail">
                    <span class="text-muted"><?php echo $value[1] ?></span>
                </div>
            </div>
        <?php endforeach; ?>
            

    </div>

</div>
<div class="col-md-1 mptl-trimpad user-block">
    <div class="pull-left mptl-mt9">

        <?php if($tripend) {
        ?>
            <span class="label triplabel bg-red">End</span>
        <?php }else { ?><span class="label triplabel bg-red">....</span>
        <?php } ?>
    </div>
</div>
<div class="col-md-1 mptl-mt9">
    <a class="btn btn-primary btn-xs">More</a>
</div>