<?php
$token = "0f96a32eb1d48315c15599368668e55693f75e75"; // replace this with your token key
$url = "https://test.delhivery.com/cmu/push/json/?token=".$token;
$params = array(); // this will contain request meta and the package feed
$package_data = array(); // package data feed
$shipments = array();
$pickup_location = array();
/////////////start: building the package feed/////////////////////
$shipment = array();
$waybill = file_get_contents("https://test.delhivery.com/waybill/api/bulk/json/?cl=POOJAESSENTIALS&token=".$token."&count=1");
		
$waybill = json_decode($waybill);

$shipment['waybill'] = $waybill;// waybill number
$shipment['name'] = 'John Kapoor'; // consignee name
$shipment['order'] = '30021998232209D'; // client order number
$shipment['products_desc'] = 'Resume services test test';
$shipment['order_date'] = '2013-04-08T18:30:00+00:00'; // ISO Format
$shipment['payment_mode'] = 'COD';
$shipment['total_amount'] = '2.0'; // in INR
$shipment['cod_amount'] = '2.0'; // amount to be collected, required for COD
$shipment['add'] = '36, vinayagar koil street, thilarshpet, puducherry 605009'; // consignee address
$shipment['city'] = 'Puducherry';
$shipment['state'] = 'Puducherry';
$shipment['country'] = 'India';
$shipment['phone'] = '9944919023';
$shipment['pin'] = '605009';

$shipments = array($shipment);
$package_data['shipments'] = $shipments;
$package_data['pickup_location'] = $pickup_location;
$params['format'] = 'json';
$params['data'] =json_encode($package_data);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($params));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
$result = curl_exec($ch);
print_r($result);
curl_close($ch);

$waybill = file_get_contents($this->config->get('delhivery_api_url')."/waybill/api/bulk/json/?cl=POOJAESSENTIALS&token=".$token."&count=1");

$waybill = json_decode($waybill);
$this->load->model('checkout/order');

$data['orderDetails'] = $this->model_checkout_order->getOrder($this->session->data['order_id']);
$shipment['waybill'] = $waybill; // waybill number
$shipment['name'] = $address['firstname'] . ' ' . $address['lastname']; // consignee name
$shipment['order'] = $data['orderDetails']['order_id']; // client order number
$shipment['products_desc'] = 'Resume services test test';
$shipment['order_date'] = $data['orderDetails']['date_modified']; // ISO Format
$shipment['payment_mode'] = $data['orderDetails']['payment_method'];
$shipment['total_amount'] = $data['orderDetails']['total']; // in INR
$shipment['cod_amount'] = $data['orderDetails']['total']; // amount to be collected, required for COD
$shipment['add'] = $address['address_1'] . ' ' . $address['address_2']; // consignee address
$shipment['city'] = $address['city'];
$shipment['state'] = $address['zone'];
$shipment['country'] = $address['country'];
$shipment['phone'] = $address['address_1'];
$shipment['pin'] = $address['postcode'];
// pickup location information //

$shipments = array($shipment);
$package_data['shipments'] = $shipments;
$package_data['pickup_location'] = $pickup_location;
$params['format'] = 'json';
$params['data'] =json_encode($package_data);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($params));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
$result = curl_exec($ch);
print_r($result);
curl_close($ch);

//$waybill = file_get_contents($this->config->get('delhivery_api_url')."/c/api/pin-codes/json/?token=".$token."&filter_codes=".$address['postcode']);

//$waybill = json_decode($waybill);
//print_r($waybill);

$source_address=$address['postcode'];
		$destination_address='403801';
		$url = "http://maps.googleapis.com/maps/api/directions/json?origin=".str_replace(' ', '+', $source_address)."&destination=".str_replace(' ', '+', $destination_address)."&sensor=false";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_all = json_decode($response);
		// print_r($response);
		$distance = $response_all->routes[0]->legs[0]->distance->text;
		$w_string = array(",", " km");
		$s_string = array("","");

        $distance = str_replace($w_string,$s_string,$distance);