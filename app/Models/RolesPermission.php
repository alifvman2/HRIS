<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RolesPermission
 * 
 * @property int $id
 * @property string|null $permissions_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class RolesPermission extends Model
{
	protected $table = 'roles_permissions';

	protected $fillable = [
		'permissions_name'
	];
}
