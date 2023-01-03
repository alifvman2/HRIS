<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LeavesAdmin
 * 
 * @property int $id
 * @property string|null $rec_id
 * @property string|null $leave_type
 * @property string|null $from_date
 * @property string|null $to_date
 * @property string|null $day
 * @property string|null $leave_reason
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class LeavesAdmin extends Model
{
	protected $table = 'leaves_admins';

	protected $fillable = [
		'rec_id',
		'leave_type',
		'from_date',
		'to_date',
		'day',
		'leave_reason'
	];
}
