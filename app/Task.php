<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{


  const CREATED_AT = 'createdAt';
  const UPDATED_AT = 'updatedAt';

  protected $table = 'crud_ttask';

  public $valMsg = array('name'=>'','desc'=>'');

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
