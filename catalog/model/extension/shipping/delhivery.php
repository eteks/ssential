<?php
class ModelExtensionShippingDelhivery extends Model 
{
	function getQuote($address) 
	{
		$this->load->language('extension/shipping/delhivery');

		

		$token = $this->config->get('delhivery_token');

        //$pin = file_get_contents($this->config->get('delhivery_api_url')."/c/api/pin-codes/json/?token=".$token."&filter_codes=".$address['postcode']);
		//$pin = json_decode($pin);
		//echo "<pre>";
      	//print_r($address);
      	//echo "</pre>";
	    ////////////////////////////////////////Get Weight///////////////////////////////////////////
     	$weight = $this->cart->getWeight();

     	$weight_unit = $this->db->query("SELECT * FROM " . DB_PREFIX . "weight_class_description WHERE weight_class_id = " . (int)$this->config->get('config_weight_class_id'));
   		
   		$weight_unit = $weight_unit->row['unit'];

   		if($weight_unit == "gms")
   		{
   			$weight_slice=500;
   		}
   		else
   		{
   			$weight_slice=.5;
   		}

     	$drift = $weight/$weight_slice; 
     	
     	////////////////////////////////////////Get zeo zone///////////////////////////////////////////

     	$queryStr = $this->db->query("select geo_zone_id from " . DB_PREFIX . "zone_to_geo_zone WHERE country_id = ".(int)$address['country_id']." AND zone_id = ".(int)$address['zone_id']);
		$geo = $queryStr->row['geo_zone_id'];

		////////////////////////////////////////Calculate extra shipping ammount///////////////////////////////////////////

		if($geo == 6)
		{
			$amt =  60 + ((int)$drift * 55);
		}
        else if($geo == 9)
        {
        	$amt = 100 + ((int)$drift * 95);
        }        
        else
        {
        	$amt = 90 + ((int)$drift * 85);
        }

        $method_data = array();

		
			$quote_data = array();

			$quote_data['delhivery'] = array(
				'code'         => 'delhivery.delhivery',
				'title'        => $this->language->get('text_description'),
				'cost'         => $amt,
				'tax_class_id' => 0,
				'text'         => $this->currency->format($amt, $this->session->data['currency'])
			);

			$method_data = array(
				'code'       => 'delhivery',
				'title'      => $this->language->get('text_title'),
				'quote'      => $quote_data,
				'sort_order' => $this->config->get('delhivery_sort_order'),
				'error'      => false
			);
		return $method_data;
	}
}