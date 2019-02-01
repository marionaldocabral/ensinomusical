<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Telefone.
 *
 * @author  The scaffold-interface created at 2018-09-18 11:53:47pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Telefone extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'telefones';

	
}
