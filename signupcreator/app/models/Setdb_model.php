<?php


class Setdb_model
{

    public function __construct()
    {
        App::load_library('connection/pdo-connection');
        $this->con = new PDO_connection(HOST,USER,PASS,DB_NAME);

        App::load_library('encryption_decryption');
        $this->enc = new encryption_decryption;
    }

    public function savedb($request)
    {
//        exit(print_r($request));

        unset($request['url']);

        $schema = $request['schema'];
        $host = $request['host'];
        $username = $request['user'];
        $password = $request['password'];
        $date = date('Y-m-d H:i:s');

        $query = "Select * From setdb where db_schema = :db_schema";
        $this->con->query($query);
        $this->con->params('db_schema',$schema);
        $this->con->execute();

        $result = $this->con->result();

        if(count($result) >= 1)
        {
            $data =  array('responsecode'=> 0,'responsemsg'=>'The Database you entered is already EXIST!');
        }
        else
        {
            $query = "Insert Into setdb (db_schema, db_host, db_username, db_password, db_created)
                      VALUE (:db_schema, :db_host, :db_username, :db_password, :db_created)";
            $this->con->query($query);
            $this->con->params('db_schema', $schema);
            $this->con->params('db_host', $host);
            $this->con->params('db_username', $username);
            $this->con->params('db_password', $password);
            $this->con->params('db_created', $date);
            $this->con->execute();

            $result = $this->con->result();

//            exit(print_r($result,true));

            if($result != 0)
            {
                $data =  array('responsecode'=> 1,'responsemsg'=>'You have successfully set a Database! ');
            }
            else
            {
                $data =  array('responsecode'=> 0,'responsemsg'=>'Something went wrong! Please call the Developer!');
            }
            Response::output(Response::json_output($data));

        }

        Response::output(Response::json_output($data));

    }


    public function showdbs($request)
    {
        unset($request['url']);

        $query = "Select * From setdb ";
        $this->con->query($query);
        $this->con->execute();
        $result = $this->con->result();

//        exit(print_r($result));

        if(count($result) != 0)
        {
            $show = '';

            $show .='<select name="dbs" id="dbs" class="form-control" required>
                     <option value="Select">Select Database</option>';
                    foreach ($result as $val) {
                                $db_schema = $val['db_schema'];

                                $show .='<option value="'.$db_schema.'">'.$db_schema.'</option>';
                            }
            $show .='</select>';

            $data =  array('responsecode'=> 1,'responsemsg'=>'Now showing Database! ', 'showdbs'=>$show);

        }
        else
        {
            $show = '';

            $show .='<select name="dbs" id="dbs" class="form-control" required>
                    <option value="no">No data yet</option>
                    </select>';

            $data =  array('responsecode'=> 0,'responsemsg'=>'No data yet', 'showdbs'=>$show);

        }

        Response::output(Response::json_output($data));
    }


    public function setupdb()
    {

    }



}