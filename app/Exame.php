<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Exame.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:37:54am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Exame extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'exames';

	
}
