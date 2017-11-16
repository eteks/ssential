<?php
class ModelExtensionTotalCashonDeliveryFee extends Model {
	public function getTotal($total) {
		if ($this->config->get('cashon_delivery_fee_status') && isset($this->session->data['payment_method']) && $this->session->data['payment_method']['code'] == 'cod') {
			
			$this->load->language('extension/total/cashon_delivery_fee');
			
			$fee_amount = 0;
			
			$sub_total = $this->cart->getSubTotal();
			
			if($this->config->get('cashon_delivery_fee_type') == 'P') {
				$fee_amount = round((($sub_total * $this->config->get('cashon_delivery_fee_fee')) / 100), 2);
			} else {
				$fee_amount = $this->config->get('cashon_delivery_fee_fee');
			}
			
			$tax_rates = $this->tax->getRates($fee_amount, $this->config->get('cashon_delivery_fee_tax_class_id'));

			foreach ($tax_rates as $tax_rate) {
				if (!isset($taxes[$tax_rate['tax_rate_id']])) {
					$taxes[$tax_rate['tax_rate_id']] = $tax_rate['amount'];
				} else {
					$taxes[$tax_rate['tax_rate_id']] += $tax_rate['amount'];
				}
			}
			
			
			$total['totals'][] = array(
				'code'       => 'cashon_delivery_fee',
				'title'      => $this->language->get('text_cashon_delivery_fee'),
				'value'      => $fee_amount,
				'sort_order' => $this->config->get('cashon_delivery_fee_sort_order')
			);
			
			$total['total'] += $fee_amount;
		}
	}
}
