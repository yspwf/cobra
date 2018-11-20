<?php 

class Article{

	public function index($request, $response){
		$response->header('Content-type','text/plain');
		$response->end("hello  i am second coming ");
		//echo "article index";
	}

}


?>