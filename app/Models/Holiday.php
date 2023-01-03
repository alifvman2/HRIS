<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Holiday
 * 
 * @property int $id
 * @property string|null $name_holiday
 * @property string|null $date_holiday
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Holiday extends Model
{
	protected $table = 'holidays';

	protected $fillable = [
		'name_holiday',
		'date_holiday'
	];
}
