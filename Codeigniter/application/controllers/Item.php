<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Item_model');
        date_default_timezone_set('Asia/Tokyo');
    }
    public function post()
    {
        $form = json_decode(file_get_contents('php://input'), true);
        $data = [
            'user_id' => $_SESSION['id'],
            'place_id' => $form['place_id'],
            'item_name' => $form['item_name'],
            'created_at' => date("Y-m-d H:i:s")
        ];
        $id = $this->Item_model->insert($data);

        $output = [
            'id' => $id
        ];
        $this->output->set_content_type('applicateion')
            ->set_output(json_encode($output));
    }

    public function put()
    {
        $form = json_decode(file_get_contents('php://input'), true);
        $data = [
            //'place_id' => $form['place_id'],
            'item_name' => $form['item_name']
        ];
        $id = $this->Item_model->update($form['id'],$data);

    }

    public function delete()
    {
        $form = json_decode(file_get_contents('php://input'), true);
        $id = $this->Item_model->delete($form['id']);
    }
}

?>