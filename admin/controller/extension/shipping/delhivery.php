<?php
class ControllerExtensionShippingdelhivery extends Controller {
	private $error = array();
	public function create_store() 
	{
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "delhivery_store`  (
			`warehouse_id` INT(10) NOT NULL AUTO_INCREMENT ,
			`warehouse_name` VARCHAR(250) NOT NULL ,
			`registred_name` VARCHAR(250) NOT NULL ,
			`warehouse_address` VARCHAR(250) NOT NULL ,
			`warehouse_city` VARCHAR(250) NOT NULL ,
			`warehouse_country` VARCHAR(250) NOT NULL ,
			`warehouse_pincode` INT(10) NOT NULL ,
			`contact_person` VARCHAR(250) NOT NULL ,
			`warehouse_email` VARCHAR(250) NOT NULL ,
			`warehouse_phone` VARCHAR(250) NOT NULL ,
			`activation_status` TINYINT(1) NOT NULL ,
			`created_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
			PRIMARY KEY (`warehouse_id`));"
		);
	}
	public function index() {
		//create database
		$this->create_store();
		// check whether curl installed or not
		$data['curlinstall'] = function_exists('curl_version');
		// add custom style sheet
		$this->document->addStyle('view/stylesheet/custom.css');
		// load predefined constant values
		$this->load->language('extension/shipping/delhivery');
		//load all country list
		$data['countries'] = array();
		$this->load->model('localisation/country');
		$this->load->model('extension/shipping/delhivery');
		$countries = $this->model_localisation_country->getCountries();
		foreach ($countries as $country) {
			$data['countries'][] = array(
				'name' => $country['name'],
			);
		}
		// Set broweser tab menu title
		$this->document->setTitle($this->language->get('heading_title'));

		//function for API key store into database using POST method

		$this->load->model('setting/setting');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate() && $this->request->post['apikeyedit']) 
		{

			$this->model_setting_setting->editSetting('delhivery', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/shipping/delhivery', 'token=' . $this->session->data['token'] . '&type=shipping', 'SSL'));
		}

		// needed variables for particular pages
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_store_edit'] = $this->language->get('text_store_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['delhi_status'] = $this->language->get('delhi_status');
		$data['delhi_token_name'] = $this->language->get('delhi_token');
		$data['delhi_api_url'] = $this->language->get('delhi_api_url');

		$data['warehousename'] = $this->language->get('warehousename');
		$data['warehouseusername'] = $this->language->get('warehouseusername');
		$data['warehouseaddress'] = $this->language->get('warehouseaddress');
		$data['warehousecity'] = $this->language->get('warehousecity');
		$data['warehousecountry'] = $this->language->get('warehousecountry');
		$data['warehousepin'] = $this->language->get('warehousepin');
		$data['warehousecontactperson'] = $this->language->get('warehousecontactperson');
		$data['warehouseemail'] = $this->language->get('warehouseemail');
		$data['warehousephone'] = $this->language->get('warehousephone');

		$data['store_list'] = $this->language->get('store_list');

		// set breadcrumbs
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_shipping'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=shipping', 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/shipping/delhivery', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['action'] = $this->url->link('extension/shipping/delhivery', 'token=' . $this->session->data['token'], 'SSL');

		$data['refresh'] = $this->url->link('extension/shipping/delhivery', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=shipping', 'SSL');


		$data['add_action'] = $this->url->link('extension/shipping/delhivery/warehouse_add', 'token=' . $this->session->data['token'], 'SSL');
		
		$data['edit_action'] = $this->url->link('extension/shipping/delhivery/warehouse_edit', 'token=' . $this->session->data['token'], 'SSL');


		$data['update_action'] = $this->url->link('extension/shipping/delhivery/warehouse_update', 'token=' . $this->session->data['token'], 'SSL');

		$data['delete_action'] = $this->url->link('extension/shipping/delhivery/warehouse_delete', 'token=' . $this->session->data['token'], 'SSL');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_refresh'] = $this->language->get('button_refresh');
		$data['button_remove'] = $this->language->get('button_remove');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['column_action'] = $this->language->get('column_action');
		// error message
		if (isset($this->error['warning'])) 
		{
			$data['error_warning'] = $this->error['warning'];
		} else 
		{
			$data['error_warning'] = '';
		}
		// load header, sidebar, footer
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		// get API credential form values
		if (isset($this->request->post['delhivery_status'])) 
		{
			$data['delhivery_status'] = $this->request->post['delhivery_status'];
		} 
		else 
		{
			$data['delhivery_status'] = $this->config->get('delhivery_status');
		}
		if (isset($this->request->post['delhivery_token'])) 
		{
			$data['delhivery_token'] = $this->request->post['delhivery_token'];
		} 
		else 
		{
			$data['delhivery_token'] = $this->config->get('delhivery_token');
		}
		if (isset($this->request->post['delhivery_api_url'])) 
		{
			$data['delhivery_api_url'] = $this->request->post['delhivery_api_url'];
		}
		else 
		{
			$data['delhivery_api_url'] = $this->config->get('delhivery_api_url');
		}// End API credential form values


		if (isset($this->request->post['delhivery_sort_order'])) {
			$data['delhivery_sort_order'] = $this->request->post['delhivery_sort_order'];
		} else {
			$data['delhivery_sort_order'] = $this->config->get('delhivery_sort_order');
		}
		//get API credential form values

		

		$data['stores'] = array();
		$stores = $this->model_extension_shipping_delhivery->getStore();
		
			foreach ($stores as $store) 
			{
				$data['stores'][] = array(
					'warehouse_id' => $store['warehouse_id'],
					'warehouse_name' => $store['warehouse_name'],
					'registred_name' => $store['registred_name'],
					'warehouse_address' => $store['warehouse_address'],
					'warehouse_city' => $store['warehouse_city'],
					'warehouse_country' => $store['warehouse_country'],
					'warehouse_pincode' => $store['warehouse_pincode'],
					'contact_person' => $store['contact_person'],
					'warehouse_email' => $store['warehouse_email'],
					'warehouse_phone' => $store['warehouse_phone'],
					'activation_status' => $store['activation_status']
				);
			}
		//finally call page wht date_create
		
		$this->response->setOutput($this->load->view('extension/shipping/delhivery', $data));
	}

	public function warehouse_add()
	{
		$this->load->model('extension/shipping/delhivery');
        
			$add_store = array();
			unset($this->request->post['storeedit']);
			$createstoredata = $this->request->post;

			//print_r(json_encode($createstoredata));

			//print_r($createstoredata);	
			$data['delhivery_token'] = $this->config->get('delhivery_token');
			$data['delhivery_api_url'] = $this->config->get('delhivery_api_url');
		    $serveroutput = $this->do_request($data['delhivery_api_url'].'/api/backend/clientwarehouse/create/',$data['delhivery_token'],json_encode($createstoredata));

			$decode_output = json_decode($serveroutput, true);
			if($decode_output['success'])
			{
				$data['store_add_message'] = $decode_output['data']['message'];
				$add_store['warehouse_name']	= $this->request->post['name'];
				$add_store['registred_name']	= $this->request->post['registered_name'];
				$add_store['warehouse_address']	= $this->request->post['address'];
				$add_store['warehouse_city']	= $this->request->post['city'];
				$add_store['warehouse_country']	= $this->request->post['country'];
				$add_store['warehouse_pincode']	= $this->request->post['pin'];
				$add_store['contact_person']	= $this->request->post['contact_person'];
				$add_store['warehouse_email']	= $this->request->post['email'];
				$add_store['warehouse_phone']	= $this->request->post['phone'];
				$add_store['activation_status']	= $decode_output['data']['active'];
				if($this->model_extension_shipping_delhivery->addStore($add_store))
				{
					echo "success";
				}
			}
			else
			{
				echo $data['error_warning'] = $decode_output['error'];

			}		
	}

	public function warehouse_update()
	{
		$this->load->model('extension/shipping/delhivery');
        
			$add_store = array();
			$createstoredata = $this->request->post;

			//print_r(json_encode($createstoredata));

			//print_r($createstoredata);	
			$data['delhivery_token'] = $this->config->get('delhivery_token');
			$data['delhivery_api_url'] = $this->config->get('delhivery_api_url');
		    $serveroutput = $this->do_request($data['delhivery_api_url'].'/api/backend/clientwarehouse/edit/',$data['delhivery_token'],json_encode($createstoredata));

			$decode_output = json_decode($serveroutput, true);
		    if($decode_output['success'])
			{
				$data['store_add_message'] = $decode_output['data']['message'];
				$add_store['warehouse_id']	= $this->request->get['edit_id'];
				$add_store['warehouse_name']	= $this->request->post['name'];
				$add_store['registred_name']	= $this->request->post['registered_name'];
				$add_store['warehouse_address']	= $this->request->post['address'];
				$add_store['warehouse_pincode']	= $this->request->post['pin'];
				$add_store['contact_person']	= $this->request->post['contact_person'];
				$add_store['warehouse_phone']	= $this->request->post['phone'];
				$add_store['activation_status']	= $decode_output['data']['active'];
				if($this->model_extension_shipping_delhivery->updateStore($add_store))
				{
					//echo $data['store_add_message'] = $decode_output['data']['message'];
					echo "updated";
				}
			}
			else
			{
				echo $data['error_warning'] = $decode_output['error'];
			}		
			
	}

	public function warehouse_edit()
	{
		$id=$this->request->get['edit_id'];
		//$data = $this->book_model->get_by_id($id);
		$this->load->model('extension/shipping/delhivery');
		$data = $this->model_extension_shipping_delhivery->getWare($id);
        
		echo json_encode($data);
		//echo "hi";
	}

	public function warehouse_delete()
	{
		$id=$this->request->get['del_id'];
		//$data = $this->book_model->get_by_id($id);
		$this->load->model('extension/shipping/delhivery');
		$data = $this->model_extension_shipping_delhivery->delWare($id);
		echo json_encode($data);
		//echo "hi";
	}
	

	protected function validate() 
	{
		if (!$this->user->hasPermission('modify', 'extension/shipping/delhivery')) 
		{
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
	public function do_request($url,$auth_token,$params) 
	{

      // init curl object
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  	$headers = [
		    'Accept: application/json',
			'Content-Type: application/json',
			'Authorization: Token '.$auth_token
		];
		
		// prepare post array if available
		
		curl_setopt($ch,CURLOPT_POST, count($params));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      	
      	// execute request
        $result = curl_exec($ch);

      	// close connection
      	curl_close($ch);
      	return $result;
    }

}
