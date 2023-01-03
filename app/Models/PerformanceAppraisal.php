<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PerformanceAppraisal
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $date
 * @property string|null $rec_id
 * @property string|null $customer_experience
 * @property string|null $marketing
 * @property string|null $management
 * @property string|null $administration
 * @property string|null $presentation_skill
 * @property string|null $quality_of_Work
 * @property string|null $efficiency
 * @property string|null $integrity
 * @property string|null $professionalism
 * @property string|null $team_work
 * @property string|null $critical_thinking
 * @property string|null $conflict_management
 * @property string|null $attendance
 * @property string|null $ability_to_meet_deadline
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PerformanceAppraisal extends Model
{
	protected $table = 'performance_appraisals';

	protected $fillable = [
		'name',
		'date',
		'rec_id',
		'customer_experience',
		'marketing',
		'management',
		'administration',
		'presentation_skill',
		'quality_of_Work',
		'efficiency',
		'integrity',
		'professionalism',
		'team_work',
		'critical_thinking',
		'conflict_management',
		'attendance',
		'ability_to_meet_deadline',
		'status'
	];
}
