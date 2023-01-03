<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfileInformation
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $rec_id
 * @property string|null $email
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $address
 * @property string|null $state
 * @property string|null $country
 * @property string|null $pin_code
 * @property string|null $phone_number
 * @property string|null $department
 * @property string|null $designation
 * @property string|null $reports_to
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ProfileInformation extends Model
{
	protected $table = 'profile_information';

	protected $fillable = [
		'name',
		'rec_id',
		'email',
		'birth_date',
		'gender',
		'address',
		'state',
		'country',
		'pin_code',
		'phone_number',
		'department',
		'designation',
		'reports_to'
	];
}
