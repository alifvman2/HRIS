<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModulePermission
 * 
 * @property int $id
 * @property string|null $employee_id
 * @property string|null $module_permission
 * @property string|null $id_count
 * @property string|null $read
 * @property string|null $write
 * @property string|null $create
 * @property string|null $delete
 * @property string|null $import
 * @property string|null $export
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ModulePermission extends Model
{
	protected $table = 'module_permissions';

	protected $fillable = [
		'employee_id',
		'module_permission',
		'id_count',
		'read',
		'write',
		'create',
		'delete',
		'import',
		'export'
	];
}
