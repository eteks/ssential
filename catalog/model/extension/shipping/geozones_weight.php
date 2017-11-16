<?php
class ModelExtensionShippingGeozonesWeight extends Model 
{
	function getQuote($address) {
		$this->load->language('extension/shipping/geozones_weight');
		
		$shippings = $this->config->get('geozones_weight_data');
		
		$geo_zone = $this->countryidZoneid2GeoZone($address['country_id'], $address['zone_id']);
		$geo_zone_ids = array();
		foreach($geo_zone as $gz)
		    $geo_zone_ids[] = $gz['geo_zone_id'];
		
		$weight = $this->cart->getWeight();
		
		foreach($shippings as $k => $s)
		{
		    if (!in_array($s['geo_zone_id'], $geo_zone_ids))
		        unset($shippings[$k]);
		    elseif ($s['weight_from'] != 0 && $weight <= $s['weight_from'])
		        unset($shippings[$k]);
		    elseif ($s['weight_to'] != 0 && $s['weight_to'] < $weight)
		        unset($shippings[$k]);
		}

		$method_data = array();

		if (count($shippings)) {
		    $shipping = reset($shippings);
		    $cost = $shipping['cost'] + $shipping['each_next']*($this->cart->countProducts()-1);
			$quote_data = array();
			
			$quote_data['geozones_weight'] = array(
				'code'         => 'geozones_weight.geozones_weight',
				'title'        => strlen($shipping['dsc']) ? $shipping['dsc'] : $this->language->get('text_default_description'),
				'cost'         => $cost,
				'tax_class_id' => $shipping['tax_class_id'],
				'text'         => $this->currency->format($this->tax->calculate($cost, $shipping['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'])
			);

			$method_data = array(
				'code'       => 'geozones_weight',
				'title'      => strlen($shipping['title']) ? $shipping['title'] : $this->language->get('text_default_title'),
				'quote'      => $quote_data,
				'sort_order' => $this->config->get('geozones_weight_sort_order'),
				'error'      => false
			);
		}

		return $method_data;
	}
	
	public function countryidZoneid2GeoZone($country_id, $zone_id)
	{
	    $queryStr = "select distinct " . DB_PREFIX . "geo_zone.* from " . DB_PREFIX . "geo_zone
                join " . DB_PREFIX . "zone_to_geo_zone USING (geo_zone_id)
                WHERE country_id = ".(int)$country_id." AND (zone_id = ".(int)$zone_id." OR zone_id = 0)";
	    $query = $this->db->query($queryStr);
	    
	    if ($query->num_rows)
	    {
	        return $query->rows;
	    }
	    return array(); 
	}
}