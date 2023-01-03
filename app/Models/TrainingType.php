<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TrainingType
 * 
 * @property int $id
 * @property string|null $type
 * @property string|null $description
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TrainingType extends Model
{
	protected $table = 'training_types';

	protected $fillable = [
		'type',
		'description',
		'status'
	];
}
