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
        // TODO: 入力値チェック

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
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function login()
    {
        $form = json_decode(file_get_contents('php://input'), true);
        // TODO: 入力値チェック

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

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
    }

    // public function send_email()
    // {
    //     $this->load->view('send_ok');
    //     $this->load->helper('phpmailer');
    //     phpmailer_send(
    //         'to_addr@eample.com',
    //         'FROM テスト',
    //         'from_addr@example.com',
    //         '件名',
    //         'メッセージ本文'
    //     );
    // }
}

