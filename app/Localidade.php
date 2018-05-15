<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Localidade.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:20:08am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Localidade extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'localidades';

	
}
