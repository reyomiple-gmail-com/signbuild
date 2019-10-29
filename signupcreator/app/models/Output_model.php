<?php


class Output_model
{
    public function __construct()
    {
        App::load_library('connection/pdo-connection');
        $this->con = new PDO_connection(HOST,USER,PASS,DB_NAME);

        App::load_library('encryption_decryption');
        $this->enc = new encryption_decryption;
    }

    public function show_output($request)
    {
        unset($request['url']);

        $sql = "Select * from htmls ";

        $this->con->query($sql);
        $this->con->execute();

        $result = $this->con->result();

        if(count($result) != 0)
        {
            array_walk($result, function (&$value, $key) {
                $value['html_body'] = $this->enc->__decryptor($value['html_body']);
            });

            $output = $result[0]['html_body'];

//            exit(print_r($output));

            $data =  array('responsecode'=> 1,'responsemsg'=>'Final output now showing', 'outputs' => $output);

//            exit(print_r($data));
        }
        else{
            $data =  array('responsecode'=> 1,'responsemsg'=>'Final output now showing Failed!');
        }

        Response::output(Response::json_output($data));
    }

    public function submit_form()
    {

    }


    public function _curl($data)
    {
//        exit('hah ');
        $url = $data['url'];
        $params = $data['params'];

//        exit(print_r($url,true));


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($curl, CURLOPT_VERBOSE, true);
        $response = curl_exec($curl);
        curl_close($curl);
        // exit(print_r($response));
        return $response;
    }

}