<?php
class brezza_ControllerProductCategory extends ControllerProductCategory {

public function preRender( $template_buffer, $template_name, &$data ) {
    if (!$this->endsWith( $template_name, '/template/product/category.tpl' )) {
      return parent::preRender( $template_buffer, $template_name, $data );
    } 
       
        // add new controller variables
        $this->load->language( 'product/category' );
        $data['text_quickview'] = $this->language->get('text_quickview');     
        $data['text_wishlist'] = $this->language->get('text_wishlist');
        $data['magikbrezza_sale_labeltitle']=$this->config->get('magikbrezza_sale_labeltitle');
        $data['magikbrezza_sale_label'] = $this->config->get('magikbrezza_sale_label');
        $data['magikbrezza_quickview_button'] = $this->config->get('magikbrezza_quickview_button');
        
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
