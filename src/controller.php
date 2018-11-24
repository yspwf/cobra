<?php 
namespace app;

class controller{

	public $request = '';
	public $response = '';

	public function __construct($request, $response){
		$this->request = $request;
		$this->response = $response;
	}

	public function render(){
		$this->response->header('Content-type','text/html');

		$this->response->end("hello render");
	}

}





?>