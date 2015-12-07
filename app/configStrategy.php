<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
class configStrategy{
	public static function getGomecoInventoryWebsite(){
		$inventoryServer = "http://gomecoinventory.localhost:88/";
		return $inventoryServer;
	}
}