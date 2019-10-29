<?php
Session::init();

class index extends Controller
{

    private $request;
    private $model;

    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->model = $this->model('Index_model');
    }

    public function index()
    {
        if(empty($_SESSION['acc_type']))
        {
            header('Location: login');
        }

        $this->view('templates/header');
        $this->view('index/index');
        $this->view('templates/footer');
    }

    public function insertData()
    {
        $this->model->insertData($this->request);
    }

//    public function selectdb()
//    {
//        exit(print_r($this->request));
//        $model = $this->model('Index_model');
//        $this->model->selectdb($this->request);
//    }

    public function show_htmls()
    {
        $this->model->show_htmls($this->request);
    }

    public function update_schema()
    {
        $this->model->update_schema($this->request);
    }


    public function get_tables()
    {
        if(empty($_SESSION['acc_type'])){
            header('Location: login');
        }

        $this->view('templates/header');
        $this->view('db/querys',$_SESSION['db_tables']);
        $this->view('templates/footer');
    }


    public function get_columns()
    {
        $this->model->get_columns($this->request);
    }


    public function infoquery()
    {
        $this->model->infoquery($this->request);
    }


    public function set_val()
    {
        if(empty($_SESSION['acc_type'])){
            header('Location: login');
        }
        $data = $this->model->set_val($this->request);
        $this->view('templates/header');
        $this->view('db/setvalues',$data);
        $this->view('templates/footer');



//        $this->view('db/setvalues',$_SESSION['html_body']);
//        $this->view('templates/footer');

    }

    public function save_value()
    {
        $this->model->save_value($this->request);
    }


}