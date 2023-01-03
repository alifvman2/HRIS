<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string|null $name
 * @property int|null $position
 * @property int|null $organization
 * @property Carbon|null $join_date
 * @property int|null $employee_type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $employee_id
 * @property string|null $company
 * @property string|null $keterangan
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property int|null $updated_by
 * @property Carbon|null $updated_at
 * @property int|null $deleted_by
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Employee extends Model
{
	use SoftDeletes;
	protected $table = 'employees';

	protected $casts = [
		'position' => 'int',
		'organization' => 'int',
		'employee_type' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $dates = [
		'join_date'
	];

	protected $fillable = [
		'name',
		'position',
		'organization',
		'join_date',
		'employee_type',
		'email',
		'phone',
		'birth_date',
		'gender',
		'employee_id',
		'company',
		'keterangan',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}
