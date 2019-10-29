<?php 


class Errors extends Controller
{
	public function __construct()
	{
		$this->view('templates/header');
		$this->view('error/index');
		$this->view('templates/footer');
	}
}