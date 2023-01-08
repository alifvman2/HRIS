<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Position
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property int|null $job_level
 * @property int|null $organization_structure
 * @property string|null $act_as_head
 * @property string|null $keterangan
 * @property int $created_by
 * @property Carbon $created_at
 * @property int|null $updated_by
 * @property Carbon|null $updated_at
 * @property int|null $deleted_by
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Position extends Model
{
	use SoftDeletes;
	protected $table = 'position';

	protected $casts = [
		'job_level' => 'int',
		'organization_structure' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'code',
		'name',
		'job_level',
		'organization_structure',
		'act_as_head',
		'keterangan',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}
