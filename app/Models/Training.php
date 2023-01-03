<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Training
 * 
 * @property int $id
 * @property string|null $trainer_id
 * @property string|null $employees_id
 * @property string|null $training_type
 * @property string|null $trainer
 * @property string|null $employees
 * @property string|null $training_cost
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $description
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Training extends Model
{
	protected $table = 'trainings';

	protected $fillable = [
		'trainer_id',
		'employees_id',
		'training_type',
		'trainer',
		'employees',
		'training_cost',
		'start_date',
		'end_date',
		'description',
		'status'
	];
}
