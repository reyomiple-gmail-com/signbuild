<?php


class Login_model
{
    public function __construct()
    {
        App::load_library('connection/pdo-connection');
        $this->con = new PDO_connection(HOST,USER,PASS,DB_NAME);
    }

    public function login($request)
    {
        unset($request['url']);

        $query = "Select acc_id, username, acc_type From accounts where username = :username and password = :password ";
        $this->con->query($query);
        $this->con->params('username',$request['username']);
        $this->con->params('password',md5($request['password']));
        $this->con->execute();

        $result = $this->con->result();
//        echo $result;

        if(count($result) >= 1)
        {
            $_SESSION['acc_type'] = $result[0]['acc_type'];
            $data =  array('responsecode'=> 1,'responsemsg'=>'login success');


        }else
        {
            $data =  array('responsecode'=> 0,'responsemsg'=>'login failed');
        }

//       exit(json_encode($data));
         Response::output(Response::json_output($data));

    }



}