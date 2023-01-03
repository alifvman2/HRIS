<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Trainer
 * 
 * @property int $id
 * @property string|null $full_name
 * @property string|null $trainer_id
 * @property string|null $role
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $status
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Trainer extends Model
{
	protected $table = 'trainers';

	protected $fillable = [
		'full_name',
		'trainer_id',
		'role',
		'email',
		'phone',
		'status',
		'description'
	];
}
