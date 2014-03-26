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
		$data['blog_categories'] = $this->blog_model->getBlogCategories();

		$data['slider'] = 'blog/blog-slider';
		$data['main'] = 'blog/index';
		$this->load->view('template/template', $data);
	}

	public function article()
	{
		// get article by slug
		$slug = $this->uri->segment(3);
		$data['article'] = $this->blog_model->getBlogPostBySlug($slug);

		$data['slider'] = 'blog/blog-slider';
		$data['slider_title'] = $data['article']->title;
		$data['main'] = 'blog/article';
		$this->load->view('template/template', $data);
	}
}
