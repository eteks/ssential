<?php
class ModelExtensionShippingDelhivery extends Model 
{

	public function addStore($data) 
	{
       $query =  $this->db->query("INSERT INTO " . DB_PREFIX . "delhivery_store SET warehouse_name = '" . $this->db->escape($data['warehouse_name']) . "',registred_name      = '" . $this->db->escape($data['registred_name']) . "', warehouse_address   = '" . $this->db->escape($data['warehouse_address']) . "', warehouse_city      = '" . $this->db->escape($data['warehouse_city']) . "',warehouse_pincode   = '" . $this->db->escape($data['warehouse_pincode']) . "', warehouse_country   = '" . $this->db->escape($data['warehouse_country']) . "',contact_person      = '" . $this->db->escape($data['contact_person']) . "',warehouse_email     = '" . $this->db->escape($data['warehouse_email']) . "',warehouse_phone     = '" . $this->db->escape($data['warehouse_phone']) . "'");
		return $this->db->getLastId();

	}

	public function updateStore($data) 
	{
      $query =  $this->db->query("UPDATE " . DB_PREFIX . "delhivery_store SET warehouse_name = '" . $this->db->escape($data['warehouse_name']) . "',registred_name      = '" . $this->db->escape($data['registred_name']) . "', warehouse_address   = '" . $this->db->escape($data['warehouse_address']) . "',warehouse_pincode   = '" . $this->db->escape($data['warehouse_pincode']) . "',contact_person      = '" . $this->db->escape($data['contact_person']) . "',warehouse_phone     = '" . $this->db->escape($data['warehouse_phone']) . "' WHERE warehouse_id = '" . $this->db->escape($data['warehouse_id']) . "'");
		//return $this->db->getLastId();
		//echo "UPDATE " . DB_PREFIX . "delhivery_store SET warehouse_name = '" . $this->db->escape($data['warehouse_name']) . "',registred_name      = '" . $this->db->escape($data['registred_name']) . "', warehouse_address   = '" . $this->db->escape($data['warehouse_address']) . "',warehouse_pincode   = '" . $this->db->escape($data['warehouse_pincode']) . "',contact_person      = '" . $this->db->escape($data['contact_person']) . "',warehouse_phone     = '" . $this->db->escape($data['warehouse_phone']) . "' WHERE warehouse_id = '" . $this->db->escape($data['warehouse_id']) . "'";
		return true;
	}

	public function getStore()
	{

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "delhivery_store ORDER BY warehouse_name ASC");

		$store_data = $query->rows;

		return $store_data;
	}
	public function getWare($id)
	{
		//echo "SELECT * FROM " . DB_PREFIX . "delhivery_store WHERE warehouse_id = " . $s_data . " ORDER BY warehouse_name ASC";

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "delhivery_store WHERE warehouse_id = " . $id );

		return $query->row;
	}
	public function delWare($id)
	{
		//echo "SELECT * FROM " . DB_PREFIX . "delhivery_store WHERE warehouse_id = " . $s_data . " ORDER BY warehouse_name ASC";

		$query = $this->db->query("DELETE FROM " . DB_PREFIX . "delhivery_store WHERE warehouse_id = " . $id );

		return $query->row;
	}

}
