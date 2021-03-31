<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function login()
	{
		$this->load->view('login');
	}

	public function index()
	{
		$this->load->view('header');

		$this->load->view('sidemenu');
	
		$this->load->view('main');

		$this->load->view('footer');
	}

	public function forget_password()
	{
		$this->load->view('password');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function logout()
	{
		$this->load->view('logout');
	}

	public function send_email()
    {
        $this->load->view('send_ok');
        $this->load->helper('phpmailer');
        phpmailer_send(
            'to_addr@eample.com',
            'FROM テスト',
            'from_addr@example.com',
            '件名',
            'メッセージ本文'
        );
    }
}