<?php
defined('BASEPATH') or exit('No direct script access allowd');

class Place extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Place_model');
        date_default_timezone_set('Asia/Tokyo');
    }

    // placeを全て取得（アイテム情報込み）
    public function getAllWithItem()
    {
        // TODO: ログインチェック

        $places = $this->Place_model->findAllWithItem($_SESSION['id']);
        $output = [
            'places' => $places
        ];
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function post()
    {
        $form = json_decode(file_get_contents('php://input'), true);
        // TODO: 入力値チェック

        $data = [
            'name' => $form['name'],
            'user_id' => $_SESSION['id']
        ];
        // placeのidを取得
        $id = $this->Place_model->insert($data);

        $output = [
            'id' => $id
        ];
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function put()
    {
        $form = json_decode(file_get_contents('php://input'), true);
        // TODO: 入力値チェック

        $data = [
            'name' => $form['name']
        ];

        $this->Place_model->update($form['id'], $data);

    }

    public function delete()
    {
        $form = json_decode(file_get_contents('php://input'), true);
        // TODO: 入力値チェック

            $this->Place_model->delete($form['id']);
    }
} 