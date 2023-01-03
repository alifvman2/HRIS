<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivityLog
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $description
 * @property string|null $date_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ActivityLog extends Model
{
	protected $table = 'activity_logs';

	protected $fillable = [
		'name',
		'email',
		'description',
		'date_time'
	];
}
