<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Paise.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:13:10am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Paise extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'paises';

	
}
