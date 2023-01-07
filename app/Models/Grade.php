<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Grade
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $name
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
class Grade extends Model
{
	use SoftDeletes;
	protected $table = 'grade';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'code',
		'name',
		'order',
		'keterangan',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}
