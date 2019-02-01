<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Administradore.
 *
 * @author  The scaffold-interface created at 2018-03-10 10:35:55am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Administradore extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'administradores';

	
}
