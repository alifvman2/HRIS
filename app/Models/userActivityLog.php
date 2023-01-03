<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserActivityLog
 * 
 * @property int $id
 * @property string|null $user_name
 * @property string|null $email
 * @property string|null $phone_number
 * @property string|null $status
 * @property string|null $role_name
 * @property string|null $modify_user
 * @property string|null $date_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class UserActivityLog extends Model
{
	protected $table = 'user_activity_logs';

	protected $fillable = [
		'user_name',
		'email',
		'phone_number',
		'status',
		'role_name',
		'modify_user',
		'date_time'
	];
}
