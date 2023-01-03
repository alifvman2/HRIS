<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PositionType
 * 
 * @property int $id
 * @property string|null $position
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PositionType extends Model
{
	protected $table = 'position_type';

	protected $fillable = [
		'position'
	];
}
