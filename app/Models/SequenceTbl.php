<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SequenceTbl
 * 
 * @property int $id
 *
 * @package App\Models
 */
class SequenceTbl extends Model
{
	protected $table = 'sequence_tbls';
	public $timestamps = false;
}
