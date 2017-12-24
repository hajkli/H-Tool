<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{


  const CREATED_AT = 'createdAt';
  const UPDATED_AT = 'updatedAt';

  protected $table = 'crud_customer';

  public $valMsg = array('name'=>'','street'=>'','city'=>'','zip'=>'','iban'=>'','ico'=>'','dic'=>'','dic-dph'=>'');

  function validate(){
  		if(strlen($this->name) < 1){
  			$this->valMsg['name'] = 'Zadali ste kratky retazec pre nazov'; 
        return false;
  		}
  		return true;
  }
}
