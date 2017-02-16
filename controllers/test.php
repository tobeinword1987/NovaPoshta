<?php
// контролер
Class Controller_Test Extends Controller_Base {

    // шаблон
    public $layouts = "first_layouts";
    private $error = "Data is send to server successfuly)";
    private $result = "";

    // экшен
    function index() {

        //get data from user
        $data = $_POST['data'];
        $days = $_POST['days'];
        $sign = $_POST['sign'];

        //validation
        $regex = "/^[0-9]{4}\/(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])$/";
        $regex1 = "/^[0-9]{1,3}$/";

        if(preg_match($regex, $data) && (preg_match($regex1, $days))){
            $parts = explode('-', $data);

            $newData = new DateTime($data);

            if ($sign == '+'){
                $newData->add(date_interval_create_from_date_string($days.' days'));
            } else if ($sign == '-'){
                $newData->sub(date_interval_create_from_date_string($days.' days'));
            }

            $this->result = $newData->format('d.m.Y') . "\n";

            $model = new Model_Users();
            $this->error = $this->error.$model->insertData($data, $days, $newData->format('d.m.Y'), microtime(true));

        } else {
            if (!preg_match($regex, $data)){
                $this->error = "Format of first field is 'YYYY/mm/dd'".'<br>';
            }
            if (!preg_match($regex1, $days)){
                $this->error = $this->error."Format of days should be int".'<br>';
            }
        }
        
        $userInfo = array('error'=>$this->error, 'result'=>$this->result);
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            //Если запрос пришел через ajax
            echo json_encode(array($this->result, $this->error));
        } else {
            $this->template->vars('userInfo', $userInfo);
            $this->template->view('index');
        }
    }
}