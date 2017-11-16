<?php
class ControllerExtensionShippingGeozonesWeight extends Controller {
    private $error; 
    
    public function index() {
        $this->load->language('extension/shipping/geozones_weight');
        
        $this->load->model('setting/setting');
        $this->load->model('localisation/geo_zone');
        $this->load->model('localisation/tax_class');
        
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('geozones_weight', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');
        
            $this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token']. '&type=shipping', 'SSL'));
        }
        
        $this->document->setTitle($this->language->get('heading_title'));
        
        $language_keys = array('heading_title', 'text_enabled', 'text_disabled', 'text_none', 
                            'entry_status', 'entry_sort_order', 'entry_geozone', 'entry_tax_class', 'entry_weight_from', 'entry_weight_from_tooltip', 'entry_weight_to','entry_weight_to_tooltip','entry_first','entry_next','entry_title','entry_title_tooltip', 'entry_dsc', 'entry_dsc_tooltip',
                            'button_remove','button_add_geo_zone','entry_first','entry_next','button_add','button_save','button_cancel');

        foreach($language_keys as $k)
            $data[$k] = $this->language->get($k);
        
        $data['action'] = $this->url->link('extension/shipping/geozones_weight', 'token=' . $this->session->data['token'], 'SSL');
        
        $data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=shipping', true);
        
        $data['token'] = $this->session->data['token'];
        
        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }
        
        $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
        $data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();
        
        $data['breadcrumbs'] = array();
        
        $data['breadcrumbs'][] = array(
                'text'      => $this->language->get('text_home'),
                'href'      => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
        );
        
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'], true)
		);
        
        $data['breadcrumbs'][] = array(
                'text'      => $this->language->get('text_shipping'),
                'href'      => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=shipping', 'SSL')
        );
        
        $data['breadcrumbs'][] = array(
                'text'      => $this->language->get('heading_title'),
                'href'      => $this->url->link('extension/shipping/geozones_weight', 'token=' . $this->session->data['token'], 'SSL')
        );
        
        $postKeyArray = array('geozones_weight_status', 'geozones_weight_sort_order', 'geozones_weight_data');
        foreach($postKeyArray as $key)
        {
            if (isset($this->request->post[$key])) {
                $data[$key] = $this->request->post[$key];
            } else {
                $data[$key] = $this->config->get($key);
            }
        }
        
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/shipping/geozones_weight.tpl', $data));
    }
    
    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/shipping/geozones_weight')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
    
        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
}