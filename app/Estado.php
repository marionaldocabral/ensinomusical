<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Estado.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:16:16am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Estado extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'estados';

	
}
