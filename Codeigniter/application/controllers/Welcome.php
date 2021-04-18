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

		$this->load->model('place_model');
		$this->load->library('session');

		// テスト用
		$_SESSION['id'] = "1";

		$dataA = [];
		$cleanup = [];
		
		$dataA = $this->place_model->findAllWithItem($_SESSION['id']);

			foreach ($dataA as $value) {
				$dataA['cleanup'][] = $value;
			}

		$this->load->view('header');

		$this->load->view('sidemenu');
	
		$this->load->view('main',$dataA);

		$this->load->view('footer');
	}

	public function forget_password()
	{
		$this->load->view('password');
	}

	public function send_ok()
	{
		$this->load->view('send_ok');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function logout()
	{
		$this->load->view('logout');
	}

	// public function password()
	// {
	// 	$this->load->helper('phpmailer');
	// 	phpmailer_send();
	// 	$this->load->view('send_ok');
	// }
}