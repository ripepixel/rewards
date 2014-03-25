<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
	}


	public function index()
	{
		$data['posts'] = $this->blog_model->getPublishedBlogPosts();

		$data['slider'] = 'blog/blog-slider';
		$data['main'] = 'blog/index';
		$this->load->view('template/template', $data);
	}
}
