<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buddy extends Model
{


  const CREATED_AT = 'createdAt';
  const UPDATED_AT = 'updatedAt';

  protected $table = 'crud_tuser';

  public $valMsg = array('username'=>'','password'=>'');

  function validate(){
  		if(strlen($this->email)){
  			$this->valMsg['name'] = 'Zadali ste kratky retazec pre nazov'; 
        return false;
  		}
  		if(strlen($this->password) < 10){
        $this->valMsg['desc'] = 'Zadali ste kratky retazec pre popis ulohy';  
  			return false;
  		}
  		return true;
  }
}
