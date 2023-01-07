<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JobClass
 * 
 * @property int $id
 * @property int|null $grade
 * @property int|null $rank
 * @property string|null $order
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
class JobClass extends Model
{
	use SoftDeletes;
	protected $table = 'job_class';

	protected $casts = [
		'grade' => 'int',
		'rank' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'grade',
		'rank',
		'order',
		'keterangan',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}
