<?php 

function page_title($title){
	$base_title = config('app.name');

	if($title == ""){
		return $base_title;
	}else{
		return $title.' | '.$base_title;
	}
}

function set_active_route($route){
		return Route::is($route) ? "active" : "";	
}



 ?>