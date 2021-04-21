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

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
        date_default_timezone_set('Asia/Tokyo');
    }

	public function login()
	{
		$this->load->view('login');
	}

	public function index()
	{

		$this->load->model('Place_model');
		
		if(empty($_SESSION['id'])){
			header('Location: ' . base_url() . 'welcome/login');
			exit;
		}
		$user = $this->User_model->find($_SESSION['id']);
		
		$dataA = [];
		$cleanup = [];
		
		$dataA = $this->Place_model->findAllWithItem($_SESSION['id']);

			foreach ($dataA as $value) {
				$dataA['cleanup'][] = $value;
			}

		$this->load->view('header',$user);

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
		$_SESSION = [];
		session_destroy();
		$this->load->view('logout');
	}
}