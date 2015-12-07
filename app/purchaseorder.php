<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class purchaseorder extends Model{
	protected $table = 'purchaseorders';
	 protected $fillable = [
	 'id'
	 ];
    public function orders()
    {
        return $this->hasMany('App\orders');
    }
    public function getStatus(){
    	switch($this->status){
    		case "pending":
    			return "<p style = 'color:orange'>pending</p>";
    		break;
    	}
    }
}
?>