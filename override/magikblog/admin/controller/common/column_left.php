<?php
class magikblog_ControllerCommonColumnLeft extends ControllerCommonColumnLeft {

    /* overridden method, this newly introduced function is always called
       before the final rendering
    */
    public function preRender( $template_buffer, $template_name, &$data ) {

        if ($template_name != 'common/column_left.tpl') {
            return parent::preRender( $template_buffer, $template_name, $data );
        }

        // modify template file
        if($this->config->get('magikblog_status')==1) {    
        $this->load->language('magikblog/blog');
        $data['text_blog'] = $this->language->get('text_blog');
        $data['text_blog_category'] = $this->language->get('text_blog_category');
        $data['text_blog_post'] = $this->language->get('text_blog_post');
        $data['text_blog_comment'] = $this->language->get('text_blog_comment');       
       
        $magikblog = array();

         if ($this->user->hasPermission('access', 'magikblog/category')) {
            $magikblog[] = array(
              'name'     => $this->language->get('text_blog_category'),
              'href'     => $this->url->link('magikblog/category', 'token=' . $this->session->data['token'], true),
              'children' => array()   
            );  
          }          
          if ($this->user->hasPermission('access', 'magikblog/article')) {
            $magikblog[] = array(
              'name'     => $this->language->get('text_blog_post'),
              'href'     => $this->url->link('magikblog/article', 'token=' . $this->session->data['token'], true),
              'children' => array()   
            );  
          }
          if ($this->user->hasPermission('access', 'magikblog/comment')) {
            $magikblog[] = array(
              'name'     => $this->language->get('text_blog_comment'),
              'href'     => $this->url->link('magikblog/comment', 'token=' . $this->session->data['token'], true),
              'children' => array()   
            );  
          }
          
               
          if ($magikblog) {
                $data['menus'][] = array(
                    'id'       => 'blog',
                    'icon'     => 'fa fa-rss', 
                    'name'     => $this->language->get('text_blog'),
                    'href'     => '',
                    'children' => $magikblog
                );
            }
          
        }    
        // call parent method
        return parent::preRender( $template_buffer, $template_name, $data );
    }
}
?> 
