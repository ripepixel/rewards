<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
		$data['slider'] = 'pages/home-slider';
		$data['main'] = 'pages/index';
		$this->load->view('template/template', $data);
	}

	public function contact()
	{
		$data['slider'] = 'pages/contact-slider';
		$data['main'] = 'pages/contact';
		$this->load->view('template/template', $data);
	}

	public function submit_contact()
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$telephone = $_POST['telephone'];
		$message = $_POST['message'];

		$this->email->from($email);
		$this->email->to('contact@how-media.co.uk');
		$this->email->subject('Message from contact form');
		$msg = "
Name: ".$name."
Telephone: ".$telephone."
Message; ".$message."
";

		$this->email->message($msg);
		$this->email->send();

	}
}
