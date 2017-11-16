<?php
class brezza_ControllerCommonFooter extends ControllerCommonFooter {

public function preRender( $template_buffer, $template_name, &$data ) {
      if (!$this->endsWith( $template_name, '/template/common/footer.tpl' )) {
      return parent::preRender( $template_buffer, $template_name, $data );
    }
       
        // add new controller variables

        //$this->load->language( 'common/footer' );
        //$this->language->load( 'common/footer' );
        $data['text_follow_us'] = $this->language->get( 'text_follow_us' );
        $data['text_pay_cards']= $this->language->get('text_pay_cards');
        $data['text_login'] = $this->language->get('text_login');
        $data['text_logout'] = $this->language->get('text_logout');
        $data['text_checkout'] = $this->language->get('text_checkout');
        $data['text_blog'] = $this->language->get( 'text_blog' );
        $data['blog_href']=$this->url->link('magikblog/article');
        $data['text_topbrand'] = $this->language->get( 'text_topbrand' );
        $data['text_search'] = $this->language->get('text_search');
        $data['text_home'] = $this->language->get('text_home');
        $data['home'] = $this->url->link('common/home');
        $data['language'] = $this->load->controller('common/language');
        $data['currency'] = $this->load->controller('common/currency');
        $data['logged'] = $this->customer->isLogged();
        $data['login'] = $this->url->link('account/login', '', 'SSL');
        $data['logout'] = $this->url->link('account/logout', '', 'SSL');
        $data['checkout'] = $this->url->link('checkout/checkout', '', 'SSL');

        $data['magik_theme']=$this->config->get('theme_default_directory');
        $data['facebookurl'] = $this->config->get('magikbrezza_fb');
        $data['twitterurl'] = $this->config->get('magikbrezza_twitter');
        $data['gplusurl'] = $this->config->get('magikbrezza_gglplus');
        $data['rssurl'] = $this->config->get('magikbrezza_rss');
        $data['pintresturl'] = $this->config->get('magikbrezza_pinterest');
        $data['linkedinurl'] = $this->config->get('magikbrezza_linkedin');
        $data['youtubeurl'] = $this->config->get('magikbrezza_youtube');
        $data['newslettersubscription_status'] = $this->config->get('newslettersubscription_status');
        $data['magikbrezza_footer_cb'] = $this->config->get('magikbrezza_footer_cb');
        $data['magikbrezza_footer_cbcontent'] = html_entity_decode($this->config->get('magikbrezza_footer_cbcontent'));
        $data['magikbrezza_address'] = $this->config->get('magikbrezza_address');
        $data['magikbrezza_footer_fb'] = $this->config->get('magikbrezza_footer_fb');
        $data['magikbrezza_footer_fbcontent'] = html_entity_decode($this->config->get('magikbrezza_footer_fbcontent'));
        $data['magikbrezza_powerby'] = $this->config->get('magikbrezza_powerby');
        $data['magikblog_status'] = $this->config->get('magikblog_status');
        $data['magikbrezza_phone'] = $this->config->get('magikbrezza_phone');
        $data['magikbrezza_email'] = $this->config->get('magikbrezza_email');
        
        $data['magikbrezza_home_option']=$this->config->get('magikbrezza_home_option');
        $data['magikblog_status'] = $this->config->get('magikblog_status');
        $data['magikbrezza_scroll_totop'] = $this->config->get('magikbrezza_scroll_totop');
        

        if (isset($this->request->get['search'])) {
            $data['search'] = $this->request->get['search'];
            } else {
            $data['search'] = '';
            }

        $data['newslettersubscription'] = $this->load->controller('extension/module/newslettersubscription');

        $this->load->model('catalog/manufacturer');
        $this->load->model('tool/image');

        $data['manufacturers'] = array();

        $results = $this->model_catalog_manufacturer->getManufacturers();

        foreach ($results as $result) {
            $data['manufacturers'][] = array(
                'manufacturer_image' => $this->model_tool_image->resize($result['image'],130,50),
                'name'            => $result['name'],
                'href'            => $this->url->link('product/manufacturer/info&manufacturer_id=' . $result['manufacturer_id'])
            );
        } 
        

       $this->load->model('catalog/category');
       $this->load->model('catalog/product');

        $data['categories1'] = array();

        $categories_1 = $this->model_catalog_category->getCategories(0);
          
          foreach ($categories_1 as $category_1) {
            if($category_1['top']){
             $level_2_data = array();
             
             $categories_2 = $this->model_catalog_category->getCategories($category_1['category_id']);
             
             foreach ($categories_2 as $category_2) {
                $level_3_data = array();
                
                $categories_3 = $this->model_catalog_category->getCategories($category_2['category_id']);
                
                foreach ($categories_3 as $category_3) {
                   $level_3_data[] = array(
                      'name' => $category_3['name'],
                                           'column'   => $category_3['column'] ? $category_3['column'] : 1,
                      'href' => $this->url->link('product/category', 'path=' . $category_1['category_id'] . '_' . $category_2['category_id'] . '_' . $category_3['category_id']),
                      'category_id'=> $category_3['category_id']
                   );
                }
                
                $level_2_data[] = array(
                   'name'     => $category_2['name'],
                   'children' => $level_3_data,
                   'href'     => $this->url->link('product/category', 'path=' . $category_1['category_id'] . '_' . $category_2['category_id']),
                   'category_id'=> $category_2['category_id']   
                );               
             }
             
             $data['categories1'][] = array(
                'name'     => $category_1['name'],
                'children' => $level_2_data,
                'column'   => $category_1['column'] ? $category_1['column'] : 1,
                'href'     => $this->url->link('product/category', 'path=' . $category_1['category_id']),
                'category_id'=> $category_1['category_id']
             );
          }}

        return parent::preRender( $template_buffer, $template_name, $data );
    }
    protected function endsWith( $haystack, $needle ) {
    if (strlen( $haystack ) < strlen( $needle )) {
      return false;
    }
    return (substr( $haystack, strlen($haystack)-strlen($needle), strlen($needle) ) == $needle);
   }
}