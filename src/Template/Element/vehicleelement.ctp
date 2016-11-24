<?php   
for ($row = 0; $row < count($par); $row++) {	
	echo '<li class="time-label"><span class="bg-red">'.$par[$row]['timelabel'].'</span></li>';
	
	for ($t = 0; $t < count($par[$row]['content']); $t++) {
		echo '<li><i class="'.$par[$row]['content'][$t]['icontent'].'"></i>';
		echo '<div class="timeline-item">';
		echo '<span class="time"><i class="fa fa-clock-o"></i>'.$par[$row]['content'][$t]['time'].'</span>';
		echo '<h3 class="timeline-header"><a href="#">'.$par[$row]['content'][$t]['header'].'</a> '.$par[$row]['content'][$t]['headercontent'].'</h3>';
		echo '<div class="timeline-body">'.$par[$row]['content'][$t]['bodycontent'].'</div>';
		echo '<div class="timeline-footer"><a class="btn btn-primary btn-xs">Read more</a> <a class="btn btn-danger btn-xs">Delete</a></div>';
		echo '</div></li>';
	}
} 

echo '<li><i class="fa fa-clock-o bg-gray"></i></li>';
?>



