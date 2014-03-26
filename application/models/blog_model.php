<?php

class Blog_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getPublishedBlogPosts()
    {
    	$this->db->where('is_draft', 0);
    	$this->db->order_by('date_posted', 'DESC');
    	$q = $this->db->get('blog_posts');
    	if($q->num_rows() > 0) {
    		return $q->result_array();
    	} else {
    		return FALSE;
    	}
    }

    function getBlogPostBySlug($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->where('is_draft', 0);
        $q = $this->db->get('blog_posts');
        if($q->num_rows > 0) {
            return $q->row();
        } else {
            return FALSE;
        }
    }

    function getBlogCategories()
    {
        $this->db->order_by('name', 'ASC');
        $q = $this->db->get('blog_categories');
        return $q->result_array();
    }

}