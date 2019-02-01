<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recurso.
 *
 * @author  The scaffold-interface created at 2018-03-26 06:33:38pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Recurso extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'recursos';

	
}
