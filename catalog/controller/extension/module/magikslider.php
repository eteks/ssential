<?php

class ControllerExtensionModuleMagikslider extends Controller {
	public function index($setting) {

		$this->load->model('tool/image');
		//$this->document->addStyle('catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/revslider.css');
		//$this->document->addScript('catalog/view/theme/'.$this->config->get('config_template').'/js/revslider.js');
		$data = array();
		if (isset($setting['magikslider_image'])) {
			$slider = array();
			foreach ($setting['magikslider_image'] as $slide) {
		
 			$slider[] = array('title'=>isset($slide['magikslider_image_title'][$this->config->get('config_language_id')]['title']) ? html_entity_decode($slide['magikslider_image_title'][$this->config->get('config_language_id')]['title']) : "",'link'=>$slide['link'],'image'=>$this->model_tool_image->resize($slide['image'],600,500),'description'=>isset($slide['magikslider_image_description'][$this->config->get('config_language_id')]['description']) ? html_entity_decode($slide['magikslider_image_description'][$this->config->get('config_language_id')]['description']) : ""); 

			}
		}
		$data['magikslider_width']=$setting['width'];
		$data['magikslider_height']=$setting['height'];
		$data['slider'] = $slider;

			
		return $this->load->view('extension/module/magikslider', $data);
			
		}
}
	