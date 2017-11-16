<?php
    class ControllerProductOutofstockEnquiry extends Controller {
        private $error = array();
        
        public function index() {
            
            $this->load->language('product/outofstock_enquiry');
            
            if (isset($this->request->get['product_id'])) {
                $product_id = (int)$this->request->get['product_id'];
                } else {
                $product_id = 0;
            }
            
            $this->load->model('catalog/product');
            
            $product_info = $this->model_catalog_product->getProduct($product_id);
            
	
			$this->document->addStyle('catalog/view/javascript/jquery/magnific/out-of-stock-enquiry.css');
            
            $data['product_name'] = $product_info['name'];
            
            $data['heading_title'] = sprintf($this->language->get('heading_title'), $product_info['name']);
            $data['entry_name'] = $this->language->get('entry_name');
            $data['entry_email'] = $this->language->get('entry_email');
            $data['entry_phone'] = $this->language->get('entry_phone');
            $data['entry_subject'] = $this->language->get('entry_subject');
            $data['entry_enquiry'] = $this->language->get('entry_enquiry');
            $data['button_save'] = $this->language->get('button_save');
            $data['error_required'] = $this->language->get('error_required');
            
            $data['product_id'] = (int)$this->request->get['product_id'];
            $data['model'] = $product_info['model'];
            
			$this->load->model('tool/image');
			
			if ($product_info['image']) {
				$data['thumb'] = $this->model_tool_image->resize($product_info['image'], $this->config->get($this->config->get('config_theme') . '_image_thumb_width'), $this->config->get($this->config->get('config_theme') . '_image_thumb_height'));
			} else {
				$data['thumb'] = '';
			}
            $this->response->setOutput($this->load->view('product/outofstock_enquiry', $data));
        }
        
        
        public function write() {
            $this->load->language('product/outofstock_enquiry');
            
            $json = array();
            
            if ($this->request->server['REQUEST_METHOD'] == 'POST') {
                
                if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 25)) {
                    $json['error'] = $this->language->get('error_name');
                }
                if (!filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL)) {
                    $json['error'] = $this->language->get('error_email');
                }
                
                if ((utf8_strlen($this->request->post['enquiry']) < 10) || (utf8_strlen($this->request->post['enquiry']) > 3000)) {
                    $json['error'] = $this->language->get('error_enquiry');
                }
                
                if (!isset($json['error'])) {
                    
                    //Send mail to stor owner
                    $subject = sprintf($this->language->get('heading_title'), $this->request->post['product_name']);
                    
                    $message = 'Hello Admin,<br/><br/>';
                    $message .= 'User send you Out Of Stock Enquiry for product <strong>' . $this->request->post['product_name'] . '</strong><br/><br/>';
                    $message .= '<strong>' . $this->language->get('entry_name') . ': </strong>' .$this->request->post['name']. "<br/>";
                    $message .= '<strong>' . $this->language->get('entry_email') . ': </strong>' .$this->request->post['email']. "<br/>";
                    $message .= '<strong>' . $this->language->get('entry_phone') . ': </strong>' .$this->request->post['phone']. "<br/>";
                    $message .= '<strong>' . $this->language->get('entry_enquiry') . ': </strong>' .$this->request->post['enquiry']. "<br/>";
                    $message .= '<br/><br/>';
                    $message .= 'Thank you, <br/>';
                    
                    $mail = new Mail();
                    $mail->protocol = $this->config->get('config_mail_protocol');
                    $mail->parameter = $this->config->get('config_mail_parameter');
                    $mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
                    $mail->smtp_username = $this->config->get('config_mail_smtp_username');
                    $mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
                    $mail->smtp_port = $this->config->get('config_mail_smtp_port');
                    $mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
                    
                    $mail->setTo($this->config->get('config_email'));
                    $mail->setFrom($this->request->post['email']);
                    $mail->setSender(html_entity_decode($this->request->post['name'], ENT_QUOTES, 'UTF-8'));
                    $mail->setSubject(html_entity_decode($subject), ENT_QUOTES, 'UTF-8');
                    
                    $mail->setHtml($message);
                    $mail->setText(html_entity_decode($message, ENT_QUOTES, 'UTF-8'));
                    $mail->send();
                    
                    $json['success'] = $this->language->get('text_success');
                }
            }
            
            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
        }
    }