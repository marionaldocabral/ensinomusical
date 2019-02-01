<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Chamada.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:34:45am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Chamada extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'chamadas';

	
}
