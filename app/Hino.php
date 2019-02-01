<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Hino.
 *
 * @author  The scaffold-interface created at 2018-04-21 12:45:42am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Hino extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'hinos';

	
}
