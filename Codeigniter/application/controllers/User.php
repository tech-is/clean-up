<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
        date_default_timezone_set('Asia/Tokyo');
    }
    public function register()
    {
        $form = json_decode(file_get_contents('php://input'), true);
            
        $message = null;
        if(empty($form['your_name']) || empty($form['mail']) || 
        empty($form['password']) || empty($form['confirmationPassword']) ){
            $message = '全て入力してください。';
        }elseif($form['password'] !== $form['confirmationPassword']){
            $message = 'パスワードを一致させてください。';
        }
        if (isset($message)) {
            $output = [
                'message' => $message
            ];
            $this->output->set_status_header(400)
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
            return;
        }
        //CSRF対策（独自ヘッダを持たせる）
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
            header('Content-Type: application/json',true,400);
            exit('{"error":"incalid request"}');
        }

        $data = [
            'name' => $form['your_name'],
            'mail' => $form['mail'],
            'postcode' => '',
            'prefecture' => '',
            'address' => '',
            'phone_number' => 0,
            'fax_number' => 0,
            'update_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'password' => password_hash($form['password'], PASSWORD_DEFAULT)
        ];

        $id = $this->User_model->insert($data);
        

        // 登録が完了したらログイン状態にする
        $_SESSION['id'] = $id;

        $output = [
            'id' => $id
        ];
    }

    public function login()
    {
        $form = json_decode(file_get_contents('php://input'), true);
        // TODO: 入力値チェック
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
            header('Content-Type: application/json',true,400);
            exit('{"error":"incalid request"}');
        }        
        $user = $this->User_model->findByMail($form['name']);
        $message = null;
        if (isset($user) && password_verify($form['password'], $user['password'])) {
            $_SESSION['id'] = $user['id'];
        } else {
            $message = 'ユーザIDまたはパスワードが異なります';
        }
        if (isset($message)) {
            $output = [
                'message' => $message
            ];
            $this->output->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
            return;
        }
    }

    public function password()
    {
        $form = json_decode(file_get_contents('php://input'), true);
        $pattern = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";
        if(empty($form['mail'])){
            $message = 'メールアドレスを入力してください。';
        }elseif(!preg_match($pattern, $form['mail'])){
            $message = '正しい形式で送信してください。';
        }
        if (isset($message)) {
            $output = [
                'message' => $message
            ];
            $this->output->set_status_header(400)
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
            return;
        }
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
            header('Content-Type: application/json',true,400);
            exit('{"error":"incalid request"}');
        }
        $this->load->helper('phpmailer');
        phpmailer_send($form['mail']);
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
    }
}

