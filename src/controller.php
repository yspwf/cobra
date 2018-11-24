<?php 
namespace app;

class controller{

	public $request = '';
	public $response = '';

	public function render(){
		$this->response->header('Content-type','text/html');

		$this->response->end("hello render");
	}

}





?>