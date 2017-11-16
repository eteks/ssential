<?php  
class ControllerExtensionModuleMagikblogCategory extends Controller {

	public function index() {

		$this->language->load('extension/module/magikblog_category');

		$data['heading_title'] = $this->language->get('heading_title');

		$this->load->model('magikblog/category');
		$data['categoryList'] = array();
		$categoryList = $this->model_magikblog_category->categoryParentChildTree(); 

		foreach ($categoryList as $category) {
			$data['categoryList'][] = array(
					'category_id' => $category['category_id'],
					'name'     => $category['name'],
					'href'     => $this->url->link('magikblog/category', 'mgkblogcategory_id=' . $category['category_id'])
			);
		}

		return $this->load->view('extension/module/magikblog_category', $data);
		

	}
}
?> 
