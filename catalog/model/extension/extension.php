<?php
class ModelExtensionExtension extends Model 
{
	function getExtensions($type) 
	{
		echo $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "extension WHERE `type` = '" . $this->db->escape($type) . "'");

		return $query->rows;
	}
}