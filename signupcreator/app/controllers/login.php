<?php
Session::init();
    class Login extends Controller
    {
        public function __construct()
        {
            $this->request = $_REQUEST;
//            echo md5('admin');

        }

        public function index()
        {
            if (isset($_SESSION['acc_type'])){
                header('Location: index');
            }

            $this->view('templates/header');
            $this->view('login/index');
            $this->view('templates/footer',array(JS_PATH.'login.js'));


        }

        public function run()
        {
//           exit('im here');
//            exit($this->request['password']);
            $model = $this->model('Login_model');
            $model->login($this->request);
        }


        public function logout()
        {
            Session::destroy();
            header('location:' . URL . 'login');
        }
    }