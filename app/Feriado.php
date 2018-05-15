<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Feriado.
 *
 * @author  The scaffold-interface created at 2018-03-13 12:11:20am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Feriado extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'feriados';

	
}
