<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{


  const CREATED_AT = 'createdAt';
  const UPDATED_AT = 'updatedAt';

  protected $table = 'crud_invoice';

  public $valMsg = array('name'=>'','items'=>'','price'=>'','customer'=>'','date_of_invoicing'=>'','due_date'=>'','status'=>'','code'=>'');

  function validate(){
  		if(strlen($this->name) < 1){
  			$this->valMsg['name'] = 'Zadali ste kratky retazec pre nazov'; 
        return false;
  		}
  		if(strlen($this->desc) < 10){
        $this->valMsg['desc'] = 'Zadali ste kratky retazec pre popis ulohy';  
  			return false;
  		}
  		return true;
  }
}
