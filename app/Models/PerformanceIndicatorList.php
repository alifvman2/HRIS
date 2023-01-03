<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PerformanceIndicatorList
 * 
 * @property int $id
 * @property string|null $per_name_list
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PerformanceIndicatorList extends Model
{
	protected $table = 'performance_indicator_lists';

	protected $fillable = [
		'per_name_list'
	];
}
