<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Exercicio.
 *
 * @author  The scaffold-interface created at 2018-08-03 12:58:20am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Exercicio extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'exercicios';

	
}
