<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StaffSalary
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $rec_id
 * @property string|null $salary
 * @property string|null $basic
 * @property string|null $da
 * @property string|null $hra
 * @property string|null $conveyance
 * @property string|null $allowance
 * @property string|null $medical_allowance
 * @property string|null $tds
 * @property string|null $esi
 * @property string|null $pf
 * @property string|null $leave
 * @property string|null $prof_tax
 * @property string|null $labour_welfare
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class StaffSalary extends Model
{
	protected $table = 'staff_salaries';

	protected $fillable = [
		'name',
		'rec_id',
		'salary',
		'basic',
		'da',
		'hra',
		'conveyance',
		'allowance',
		'medical_allowance',
		'tds',
		'esi',
		'pf',
		'leave',
		'prof_tax',
		'labour_welfare'
	];
}
