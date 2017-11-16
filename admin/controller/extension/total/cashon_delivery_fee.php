<?php
class ControllerExtensionTotalCashonDeliveryFee extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/total/cashon_delivery_fee');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('cashon_delivery_fee', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=total', true));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_percentage'] = $this->language->get('text_percentage');
		$data['text_fixed'] = $this->language->get('text_fixed');

		$data['entry_fee_type'] = $this->language->get('entry_fee_type');
		$data['entry_fee'] = $this->language->get('entry_fee');
		$data['entry_tax_class'] = $this->language->get('entry_tax_class');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$data['help_fee'] = $this->language->get('help_fee');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=total', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/total/cashon_delivery_fee', 'token=' . $this->session->data['token'], true)
		);

		$data['action'] = $this->url->link('extension/total/cashon_delivery_fee', 'token=' . $this->session->data['token'], true);

		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=total', true);
	
		if (isset($this->request->post['cashon_delivery_fee_type'])) {
			$data['cashon_delivery_fee_type'] = $this->request->post['cashon_delivery_fee_type'];
		} else {
			$data['cashon_delivery_fee_type'] = $this->config->get('cashon_delivery_fee_type');
		}
	
		if (isset($this->request->post['cashon_delivery_fee_fee'])) {
			$data['cashon_delivery_fee_fee'] = $this->request->post['cashon_delivery_fee_fee'];
		} else {
			$data['cashon_delivery_fee_fee'] = $this->config->get('cashon_delivery_fee_fee');
		}

		if (isset($this->request->post['cashon_delivery_fee_tax_class_id'])) {
			$data['cashon_delivery_fee_tax_class_id'] = $this->request->post['cashon_delivery_fee_tax_class_id'];
		} else {
			$data['cashon_delivery_fee_tax_class_id'] = $this->config->get('cashon_delivery_fee_tax_class_id');
		}

		$this->load->model('localisation/tax_class');
		$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

		if (isset($this->request->post['cashon_delivery_fee_status'])) {
			$data['cashon_delivery_fee_status'] = $this->request->post['cashon_delivery_fee_status'];
		} else {
			$data['cashon_delivery_fee_status'] = $this->config->get('cashon_delivery_fee_status');
		}

		if (isset($this->request->post['cashon_delivery_fee_sort_order'])) {
			$data['cashon_delivery_fee_sort_order'] = $this->request->post['cashon_delivery_fee_sort_order'];
		} else {
			$data['cashon_delivery_fee_sort_order'] = $this->config->get('cashon_delivery_fee_sort_order');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/total/cashon_delivery_fee', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/total/cashon_delivery_fee')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if($this->request->post['cashon_delivery_fee_type'] == 'P' && $this->request->post['cashon_delivery_fee_fee'] > 100) {
			$this->error['warning'] = $this->language->get('error_fee_amount');
		}
		
		return !$this->error;
	}
}
