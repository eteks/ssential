<?php
class brezza_ControllerCommonHeader extends ControllerCommonHeader {

public function preRender( $template_buffer, $template_name, &$data ) {
      if (!$this->endsWith( $template_name, '/template/common/header.tpl' )) {
      return parent::preRender( $template_buffer, $template_name, $data );
    }
       
        // add new controller variables
            $data['magik_theme']=$this->config->get('theme_default_directory');
            $data['magikbrezza_home_option']=$this->config->get('magikbrezza_home_option');
            $data['magikbrezza_menubar_cb']=$this->config->get('magikbrezza_menubar_cb');   
            $data['magikbrezza_menubar_cbtitle']=$this->config->get('magikbrezza_menubar_cbtitle');
            $data['magikbrezza_menubar_cbcontent']=html_entity_decode($this->config->get('magikbrezza_menubar_cbcontent'));
            
                    
            $this->load->language( 'common/header' );
            $data['text_menu'] = $this->language->get( 'text_menu' );
            $data['text_all_categories'] = $this->language->get( 'text_all_categories' );
            $data['text_welcome'] = $this->language->get( 'text_welcome' );
            $data['text_home'] = $this->language->get('text_home');
            $data['text_menu'] = $this->language->get('text_menu');
            $data['text_register'] = $this->language->get('text_register');
            $data['text_or'] = $this->language->get('text_or');
            $data['register'] = $this->url->link('account/register', '', true);
            $data['text_blog'] = $this->language->get( 'text_blog' );
            $data['blog_href']=$this->url->link('magikblog/article');
            $data['text_information'] = $this->language->get('text_information'); 
            $data['compare_href']=$this->url->link('product/compare');   
            $data['magikblog_status'] = $this->config->get('magikblog_status');      

            /*Main color section */
            $data['magikbrezza_fonttransform']=$this->config->get('magikbrezza_fonttransform');
            $data['magikbrezza_sale_labelcolor']=$this->config->get('magikbrezza_sale_labelcolor');

            $data['magikbrezza_body_bg_ed']=$this->config->get('magikbrezza_body_bg_ed');
            $data['magikbrezza_body_bg']=$this->config->get('magikbrezza_body_bg');

            $data['magikbrezza_fontcolor_ed']=$this->config->get('magikbrezza_fontcolor_ed');            
            $data['magikbrezza_fontcolor']=$this->config->get('magikbrezza_fontcolor');

            $data['magikbrezza_linkcolor_ed']=$this->config->get('magikbrezza_linkcolor_ed');
            $data['magikbrezza_linkcolor']=$this->config->get('magikbrezza_linkcolor');

            $data['magikbrezza_linkhovercolor_ed']=$this->config->get('magikbrezza_linkhovercolor_ed');
            $data['magikbrezza_linkhovercolor']=$this->config->get('magikbrezza_linkhovercolor');

            $data['magikbrezza_headerbg_ed']=$this->config->get('magikbrezza_headerbg_ed');
            $data['magikbrezza_headerbg']=$this->config->get('magikbrezza_headerbg');

            $data['magikbrezza_headerlinkcolor_ed']=$this->config->get('magikbrezza_headerlinkcolor_ed');
            $data['magikbrezza_headerlinkcolor']=$this->config->get('magikbrezza_headerlinkcolor');

            $data['magikbrezza_headerlinkhovercolor_ed']=$this->config->get('magikbrezza_headerlinkhovercolor_ed');
            $data['magikbrezza_headerlinkhovercolor']=$this->config->get('magikbrezza_headerlinkhovercolor');            
            
            $data['magikbrezza_headerclcolor_ed']=$this->config->get('magikbrezza_headerclcolor_ed');
            $data['magikbrezza_headerclcolor']=$this->config->get('magikbrezza_headerclcolor');

            $data['magikbrezza_mmbgcolor_ed']=$this->config->get('magikbrezza_mmbgcolor_ed');
            $data['magikbrezza_mmbgcolor']=$this->config->get('magikbrezza_mmbgcolor');

            $data['magikbrezza_mmlinkscolor_ed']=$this->config->get('magikbrezza_mmlinkscolor_ed');
            $data['magikbrezza_mmlinkscolor']=$this->config->get('magikbrezza_mmlinkscolor');

            $data['magikbrezza_mmlinkshovercolor_ed']=$this->config->get('magikbrezza_mmlinkshovercolor_ed');
            $data['magikbrezza_mmlinkshovercolor']=$this->config->get('magikbrezza_mmlinkshovercolor');

            $data['magikbrezza_mmslinkscolor_ed']=$this->config->get('magikbrezza_mmslinkscolor_ed');
            $data['magikbrezza_mmslinkscolor']=$this->config->get('magikbrezza_mmslinkscolor');

            $data['magikbrezza_mmslinkshovercolor_ed']=$this->config->get('magikbrezza_mmslinkshovercolor_ed');
            $data['magikbrezza_mmslinkshovercolor']=$this->config->get('magikbrezza_mmslinkshovercolor');

            $data['magikbrezza_buttoncolor_ed']=$this->config->get('magikbrezza_buttoncolor_ed');
            $data['magikbrezza_buttoncolor']=$this->config->get('magikbrezza_buttoncolor');

            $data['magikbrezza_buttonhovercolor_ed']=$this->config->get('magikbrezza_buttonhovercolor_ed');
            $data['magikbrezza_buttonhovercolor']=$this->config->get('magikbrezza_buttonhovercolor');

            $data['magikbrezza_pricecolor_ed']=$this->config->get('magikbrezza_pricecolor_ed');
            $data['magikbrezza_pricecolor']=$this->config->get('magikbrezza_pricecolor');

            $data['magikbrezza_oldpricecolor_ed']=$this->config->get('magikbrezza_oldpricecolor_ed');
            $data['magikbrezza_oldpricecolor']=$this->config->get('magikbrezza_oldpricecolor');

            $data['magikbrezza_newpricecolor_ed']=$this->config->get('magikbrezza_newpricecolor_ed');
            $data['magikbrezza_newpricecolor']=$this->config->get('magikbrezza_newpricecolor');

            $data['magikbrezza_footerbg_ed']=$this->config->get('magikbrezza_footerbg_ed');
            $data['magikbrezza_footerbg']=$this->config->get('magikbrezza_footerbg');

            $data['magikbrezza_footerlinkcolor_ed']=$this->config->get('magikbrezza_footerlinkcolor_ed');
            $data['magikbrezza_footerlinkcolor']=$this->config->get('magikbrezza_footerlinkcolor');

            $data['magikbrezza_footerlinkhovercolor_ed']=$this->config->get('magikbrezza_footerlinkhovercolor_ed');
            $data['magikbrezza_footerlinkhovercolor']=$this->config->get('magikbrezza_footerlinkhovercolor');

            $data['magikbrezza_powerbycolor_ed']=$this->config->get('magikbrezza_powerbycolor_ed');
            $data['magikbrezza_powerbycolor']=$this->config->get('magikbrezza_powerbycolor');

            $data['magikbrezza_fonttransform']=$this->config->get('magikbrezza_fonttransform');
            $data['magikbrezza_fonttransform']=$this->config->get('magikbrezza_fonttransform');

            /*Main color section */     

            $this->load->model('setting/setting');
            $data['cbim_data']=$this->model_setting_setting->getSetting('custom_menu_content');
            $this->load->model('tool/image');
            $data['cat_id']=0;


            if(isset($this->request->get['path'])) {
              $path = $this->request->get['path'];
              $cats = explode('_', $path);
             $data['cat_id'] = $cats[0];
            } 
          

          
         $data['text_welcome'] = sprintf($this->language->get('text_welcome'), $this->url->link('account/login', '', true), $this->url->link('account/register', '', true));
         $data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', true), $this->customer->getFirstName(), $this->url->link('account/logout', '', true));
         
        if (isset($this->request->get['category_id'])) {
        $data['category_id'] = $this->request->get['category_id'];
        } else {
        $data['category_id'] = 0;
        }

       $this->load->model('catalog/category');
       $this->load->model('catalog/product');

        // for only Top Categories
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
          } 
        }



     // For manufacture page specific css
      if (isset($this->request->get['route'])) {
        if (isset($this->request->get['manufacturer_id'])) {
            $brand_class=$this->request->get['route'];
            $data['brand_class'] = str_replace('/', '-', $this->request->get['route']);//exit;
        } else { $brand_class=''; $data['brand_class']='';  }
      } 

      // for information links on header
        $this->load->model('catalog/information');

        $data['informations'] = array();

        foreach ($this->model_catalog_information->getInformations() as $result) {
          if ($result['bottom']) {
            $data['informations'][] = array(
              'title' => $result['title'],
              'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
            );
          }
        }


        // call parent method
        return parent::preRender( $template_buffer, $template_name, $data );
    }
    
    protected function endsWith( $haystack, $needle ) {
    if (strlen( $haystack ) < strlen( $needle )) {
      return false;
    }
    return (substr( $haystack, strlen($haystack)-strlen($needle), strlen($needle) ) == $needle);
   }
}