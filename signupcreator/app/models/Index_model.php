<?php


class Index_model
{
    public function __construct()
    {
        App::load_library('connection/pdo-connection');
        $this->con = new PDO_connection(HOST,USER,PASS,DB_NAME);

        App::load_library('encryption_decryption');
        $this->enc = new encryption_decryption;
    }


    function insertData($request)
    {
        unset($request['url']);

        $html = $request['html'];

//        $fname = 'sample 1';
        $fname = $request['fname'];

//        $ftitle = 'sample 1';
        $ftitle = $request['ftitle'];

//        $html = '';
//
//        $html .=' <div class="field-title" align="center">
//                                <h2>info</h2>
//                  </div>
//                  <div class="row row-holder" id="row_2">
//                      <div class="form-input  ">
//                          <label id="lb_2">Username</label>
//                          <input type="text" name="username" class="form-control">
//                      </div>
//                  </div><div class="row row-holder" id="row_3">
//                      <div class="form-input  ">
//                          <label id="lb_3">Password</label>
//                          <input type="text" name="password" class="form-control">
//                      </div>
//                  </div><div class="row row-holder" id="row_4">
//                      <div class="form-input  ">
//                          <label id="lb_4">Account type</label>
//                          <input type="text" name="type" class="form-control">
//                      </div>
//                  </div>';


        $output = '';

        $output .='<div class="panel-form">
                        <div class="signup-form-holder col col-10 offset-1">
                            <div class="suf-title">
                            </div>
                            <div class="suf-body">
                                <form id="signup_form"  method="post">
                                    <ul class="section-tabs flex-center">
                                       <li class="dot active-dot"></li>
                                    </ul>
                                   <div class="fieldsets row" id="fieldsets">
                                       '.$html.'                        
                                   </div>
                                    <button type="button" class="btn btn-primary btn-md" id="next">Next</button>
                                    <button type="submit" class="btn btn-primary btn-md">Submit</button>
                               </form>
                           </div>
                        <div class="suf-footer">
                        </div>
                    </div>';


        $html = $this->enc->__encryptor($output);

        $link = 'N/A';

        $date = date('Y-m-d H:i:s');

        $sql = "Insert Into htmls (html_name, html_title, html_body, html_schema, html_created) VALUE (:fname, :ftitle, :html, :link, :created)";
        $this->con->query($sql);
        $this->con->params('fname',$fname);
        $this->con->params('ftitle',$ftitle);
        $this->con->params('html',$html);
        $this->con->params('link',$link);
        $this->con->params('created',$date);
        $this->con->execute();
        $result = $this->con->result();

        if($result != 0)
        {
            $data =  array('responsecode'=> 1,'responsemsg'=>'You have successfully created a signup form!', 'result'=> $result);
        }
        else{
            $data =  array('responsecode'=> 0,'responsemsg'=>'You have failed to create a signup form!', 'result'=> $result);
        }

        Response::output(Response::json_output($data));

    }

    public function show_htmls($request)
    {
        unset($request['url']);

        $sql = "Select * From htmls ";
        $this->con->query($sql);
        $this->con->execute();

        $result = $this->con->result();

        if(count($result) != 0)
        {
            $show = '';

            $show .='<select name="htmls"  class="form-control" required>';
            foreach ($result as $val) {
                $db_title = $val['html_title'];
                $html_id = $val['html_id'];

                $show .='<option value="'.$html_id.'">'.$db_title.'</option>';
            }
            $show .='</select>';

            $data =  array('responsecode'=> 1,'responsemsg'=>'Showing htmls', 'outputs'=> $show);
        }
        else{
            $data =  array('responsecode'=> 0,'responsemsg'=>'failed to show htmls', 'outputs'=> $result);
        }
        Response::output(Response::json_output($data));
    }



    function update_schema($request)
    {
        unset($request['url']);

        if($request['dbs'] == 'Select')
        {
            $data =  array('responsecode'=> 0,'responsemsg'=>'Please SELECT a database first!');
        }
        else
        {
            $schema = $request['dbs'];
            $id = $request['htmls'];

            $sql = "Select * From setdb s inner join htmls h on s.db_schema = h.html_schema Where s.db_schema = :schems and h.html_id = :id ";
            $this->con->query($sql);
            $this->con->params('schems',$schema);
            $this->con->params('id',$id);
            $this->con->execute();
            $result22 = $this->con->result();

            if(count($result22) != 0)
            {
                $sql="Select * From setdb s inner join htmls h on s.db_schema = h.html_schema Where s.db_schema = :schems and h.html_id = :id ";
                $this->con->query($sql);
                $this->con->params('schems',$schema);
                $this->con->params('id',$id);
                $this->con->execute();
                $result21 = $this->con->result();

                $this->get_table($result21);


                $_SESSION['db_name'] = $request['dbs'];
                $_SESSION['html_id'] = $request['htmls'];

                $data =  array('responsecode'=> 1,'responsemsg'=>'Success!', 'outputs'=> $result21);

            }else{
                $sql = "Update htmls Set html_schema = :db_schema Where html_id = :id";
                $this->con->query($sql);
                $this->con->params('db_schema',$schema);
                $this->con->params('id',$id);
                $this->con->execute();
                $result = $this->con->result();

                if($result != 0 )
                {

                    $sql="Select * From setdb s inner join htmls h on s.db_schema = h.html_schema Where s.db_schema = :schems and h.html_id = :id ";
                    $this->con->query($sql);
                    $this->con->params('schems',$schema);
                    $this->con->params('id',$id);
                    $this->con->execute();
                    $result2 = $this->con->result();

                    $this->get_table($result2);
//                 $this->get_columns($result2);

                    $_SESSION['db_name'] = $request['dbs'];
                    $_SESSION['html_id'] = $request['htmls'];

                    $data =  array('responsecode'=> 1,'responsemsg'=>'Success!', 'outputs'=> $result2);
                }
                else{
                    $data =  array('responsecode'=> 1,'responsemsg'=>'Nothing Happened');
                }
                Response::output(Response::json_output($data));
            }

            Response::output(Response::json_output($data));

        }

        Response::output(Response::json_output($data));

    }


    public  function get_table($request)
    {

        $host = $request[0]['db_host'];
        $user = $request[0]['db_username'];
        $password = $request[0]['db_password'];
        $db_name = $request[0]['db_schema'];

        $this->con = new PDO_connection($host,$user,$password,$db_name);
        $this->con->query('SHOW TABLES');
        $this->con->execute();

        $result = $this->con->result();

        $_SESSION['db_tables'] = $result;

    }

    public function get_db()
    {
        $db_name = $_SESSION['db_name'];


        $sql = "Select * from setdb Where db_schema = :schems";
        $this->con->query($sql);
        $this->con->params('schems',$db_name);
        $this->con->execute();

        $result = $this->con->result();

        return $result;
    }


    public function get_columns($request)
    {
        $db_info = $this->get_db();

        unset($request['url']);

            $host = $db_info[0]['db_host'];
            $user = $db_info[0]['db_username'];
            $password = $db_info[0]['db_password'];
            $db_name = $db_info[0]['db_schema'];

            $this->con = new PDO_connection($host,$user,$password,$db_name);

            foreach ($request as $key => $value) {
                $this->con->query("SELECT column_name FROM information_schema.columns WHERE table_name = '$value' AND table_schema ='" . $_SESSION['db_name'] . "'");
                $this->con->execute();
                $result = $this->con->result();

            }

            exit(json_encode($result,true));
    }



    public function infoquery($request)
    {
        unset($request['url']);

        $columns = $request['columns'];

        if(empty($columns) || $columns == null || $columns == '' || $columns == 0)
        {
            $data =  array('responsecode'=> 1,'responsemsg'=>'Please Select column/s first!');
        }
        else{

            $table = $request['table'];
            $column = implode(', ',$columns);
            $form_title = $_SESSION['html_id'];

            $data = [
                'table'=>$table,
                'columns'=>$column,
                'html_id'=>$form_title
            ];

            $_SESSION['to_insert'] = $data;

            return $data;

        }

        Response::output(Response::json_output($data));

    }


    public function set_val($request)
    {
        unset($request['url']);

        $get_id = $_SESSION['to_insert'];
        $html_id = $get_id['html_id'];


        $sql = "Select * from htmls where html_id = :id";
        $this->con->query($sql);
        $this->con->params('id',$html_id);
        $this->con->execute();

        $result = $this->con->result();

        if(count($result) != 0)
        {
            array_walk($result, function (&$value, $key) {
                $value['html_body'] = $this->enc->__decryptor($value['html_body']);
            });

            $hbody = $result[0]['html_body'];
        }

        $data = [
            'html_body'=>$hbody,
            'tablumn'=>$get_id
        ];

        return $data;
    }



    public function save_value($request)
    {

        unset($request['url']);

        $str = implode(', :',$request);
        $vals = ['values'=>$str];

        $tablumn = $_SESSION['to_insert'];
        $db_name = $_SESSION['db_name'];

        $sql = "Select * from setdb Where db_schema = :schems";
        $this->con->query($sql);
        $this->con->params('schems',$db_name);
        $this->con->execute();

        $db_info = $this->con->result();

        $host = $db_info[0]['db_host'];
        $user = $db_info[0]['db_username'];
        $password = $db_info[0]['db_password'];
        $db_name = $db_info[0]['db_schema'];

        $this->con = new PDO_connection($host,$user,$password,$db_name);

        $table = $tablumn['table'];
        $columns = $tablumn['columns'];
        $values = $vals['values'];


        $sql = "INSERT INTO $table ($columns) VALUES (:$values)";
        $this->con->query($sql);

        foreach ($request as $key => $val){
        $this->con->params($val,$val);
        }

        $this->con->execute();
        $result = $this->con->result();

        exit(print_r($result,true));

    }



}