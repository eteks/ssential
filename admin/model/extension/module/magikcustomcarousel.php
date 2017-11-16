<?php
class ModelExtensionModuleMagikcustomcarousel extends Model {
	public function getInfo($module_id) {
		$magikcustomcarousel_image_data = array();

		$magikcustomcarousel_image_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE module_id = '" . (int)$module_id . "' ");
        $info = $magikcustomcarousel_image_query->rows;
        $magikcustomcarousel = json_decode($info[0]['setting'],true);
		foreach ($magikcustomcarousel['magikcustomcarousel_image'] as $magikcustomcarousel_image) {

			foreach ($magikcustomcarousel_image['magikcustomcarousel_image_description'] as $key => $value) {
				$description[$key]=array('description'=>$value['description']);
				}
			foreach ($magikcustomcarousel_image['magikcustomcarousel_image_title'] as $key => $value) {
			$title[$key]=array('title'=>$value['title']);
			}	

			$magikcustomcarousel_image_data[] = array(
				'magikcustomcarousel_image_title'       => $title,
				'link'                          => $magikcustomcarousel_image['link'],
				'image'                         => $magikcustomcarousel_image['image'],
				'magikcustomcarousel_image_description' => $description				
			);
		}

		return $magikcustomcarousel_image_data;
	}
}?>