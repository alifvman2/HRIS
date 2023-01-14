<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LeaveTypeSetting
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property int|null $initial_balance
 * @property string|null $deducted_leave
 * @property string|null $day_count
 * @property string|null $allowed_half_day
 * @property string|null $once_in_employment_period
 * @property string|null $repeat_interval
 * @property string|null $leave_period_based_on
 * @property int|null $eligible_after
 * @property string|null $use_max_join_date_for_entitlement_leave
 * @property string|null $generate_method
 * @property string|null $generate_at
 * @property string|null $leave_valid_until
 * @property string|null $avoid_sequential_day_with_Another_leave
 * @property string|null $avoid_taken_in_row
 * @property string|null $maximum_taken
 * @property string|null $mandatory_attachment
 * @property string|null $if_expired
 * @property string|null $advance_leave_allowed
 * @property string|null $attendance_status
 * @property int|null $day_limit_submit_request
 * @property string|null $other_attendances_status
 * @property int $created_by
 * @property Carbon $created_at
 * @property int|null $updated_by
 * @property Carbon|null $updated_at
 * @property int|null $deleted_by
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class LeaveTypeSetting extends Model
{
	use SoftDeletes;
	protected $table = 'leave_type_setting';

	protected $casts = [
		'initial_balance' => 'int',
		'eligible_after' => 'int',
		'day_limit_submit_request' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'code',
		'name',
		'initial_balance',
		'deducted_leave',
		'day_count',
		'allowed_half_day',
		'once_in_employment_period',
		'repeat_interval',
		'leave_period_based_on',
		'eligible_after',
		'use_max_join_date_for_entitlement_leave',
		'generate_method',
		'generate_at',
		'leave_valid_until',
		'avoid_sequential_day_with_Another_leave',
		'avoid_taken_in_row',
		'maximum_taken',
		'mandatory_attachment',
		'if_expired',
		'advance_leave_allowed',
		'attendance_status',
		'day_limit_submit_request',
		'other_attendances_status',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}
