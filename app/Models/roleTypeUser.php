<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleTypeUser
 * 
 * @property int $id
 * @property string|null $role_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class RoleTypeUser extends Model
{
	protected $table = 'role_type_users';

	protected $fillable = [
		'role_type'
	];
}
