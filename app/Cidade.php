<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cidade.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:16:59am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Cidade extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'cidades';

	
}
