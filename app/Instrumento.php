<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Instrumento.
 *
 * @author  The scaffold-interface created at 2018-03-18 10:17:54am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Instrumento extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'instrumentos';

	
}
