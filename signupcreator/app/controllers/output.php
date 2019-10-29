<?php


class output extends Controller
{

    private $request;
    private $model;


    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->model = $this->model('Output_model');
    }


    public function index()
    {

        if (isset($_SESSION['acc_type'])){
            header('Location: login');
        }

        $this->view('templates/header');
        $this->view('output/index');
        $this->view('templates/footer');

    }

    public function show_output()
    {

        $this->model->show_output($this->request);
    }

    public function submit_from()
    {
        $this->model->submit_from($this->request);
    }

}