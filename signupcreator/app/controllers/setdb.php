<?php


class setdb extends Controller
{
    public function __construct()
    {
        $this->request = $_REQUEST;
    }

    public function index()
    {

        if (isset($_SESSION['acc_type'])){
            header('Location: login');
        }

        $this->view('templates/header');
        $this->view('db/index');
        $this->view('templates/footer');

    }


    public function savedb()
    {
        $model = $this->model('Setdb_model');
        $model->savedb($this->request);
    }




    public function showdbs()
    {
        $model = $this->model('Setdb_model');
        $model->showdbs($this->request);
    }





}