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
 * @property int|null $repeat_interval_month
 * @property string|null $leave_period_based_on
 * @property string|null $leave_period_based_on_spesific_date
 * @property string|null $proportional_after
 * @property int|null $eligible_after
 * @property string|null $use_max_join_date_for_entitlement_leave
 * @property string|null $maximum_join_date
 * @property string|null $generate_method
 * @property int|null $increment_every
 * @property int|null $increment_month
 * @property string|null $generate_at
 * @property string|null $generate_at_spesific_date
 * @property string|null $leave_valid_until
 * @property int|null $leave_valid_month
 * @property int|null $leave_valid_remain
 * @property string|null $leave_valid_spesific_date
 * @property string|null $avoid_sequential_day_with_another_leave
 * @property string|null $avoid_taken_in_row
 * @property int|null $avoid_taken_in_row_days
 * @property string|null $avoid_taken_in_row_ignore
 * @property string|null $maximum_taken
 * @property int|null $maximum_taken_day
 * @property string|null $maximum_taken_select
 * @property int|null $based_on_same_period_month
 * @property string|null $mandatory_attachment
 * @property string|null $if_expired
 * @property string|null $carry_forward_method
 * @property int|null $carry_forward_method_days_maximum
 * @property string|null $cash_out_method
 * @property int|null $cash_out_method_days_maximum
 * @property string|null $advance_leave_allowed
 * @property int|null $max_advance_leave
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
		'repeat_interval_month' => 'int',
		'eligible_after' => 'int',
		'increment_every' => 'int',
		'increment_month' => 'int',
		'leave_valid_month' => 'int',
		'leave_valid_remain' => 'int',
		'avoid_taken_in_row_days' => 'int',
		'maximum_taken_day' => 'int',
		'based_on_same_period_month' => 'int',
		'carry_forward_method_days_maximum' => 'int',
		'cash_out_method_days_maximum' => 'int',
		'max_advance_leave' => 'int',
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
		'repeat_interval_month',
		'leave_period_based_on',
		'leave_period_based_on_spesific_date',
		'proportional_after',
		'eligible_after',
		'use_max_join_date_for_entitlement_leave',
		'maximum_join_date',
		'generate_method',
		'increment_every',
		'increment_month',
		'generate_at',
		'generate_at_spesific_date',
		'leave_valid_until',
		'leave_valid_month',
		'leave_valid_remain',
		'leave_valid_spesific_date',
		'avoid_sequential_day_with_another_leave',
		'avoid_taken_in_row',
		'avoid_taken_in_row_days',
		'avoid_taken_in_row_ignore',
		'maximum_taken',
		'maximum_taken_day',
		'maximum_taken_select',
		'based_on_same_period_month',
		'mandatory_attachment',
		'if_expired',
		'carry_forward_method',
		'carry_forward_method_days_maximum',
		'cash_out_method',
		'cash_out_method_days_maximum',
		'advance_leave_allowed',
		'max_advance_leave',
		'attendance_status',
		'day_limit_submit_request',
		'other_attendances_status',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}
