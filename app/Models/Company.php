<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $abbreviation
 * @property string|null $main_business
 * @property string|null $address
 * @property string|null $city
 * @property string|null $zip_code
 * @property int|null $country
 * @property string|null $phone
 * @property string|null $fax
 * @property string|null $email
 * @property int|null $bank
 * @property string|null $Branch
 * @property string|null $acc_no
 * @property string|null $acc_name
 * @property string|null $npwp
 * @property int|null $tax_locations
 * @property string|null $tax_penalty_employee
 * @property string|null $tax_penalty_company
 * @property int|null $bpjs_ketenagakerjaan
 * @property int|null $bpjs_kesehatan
 * @property string|null $photo
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
class Company extends Model
{
	use SoftDeletes;
	protected $table = 'company';

	protected $casts = [
		'country' => 'int',
		'bank' => 'int',
		'tax_locations' => 'int',
		'bpjs_ketenagakerjaan' => 'int',
		'bpjs_kesehatan' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int'
	];

	protected $fillable = [
		'code',
		'name',
		'abbreviation',
		'main_business',
		'address',
		'city',
		'zip_code',
		'country',
		'phone',
		'fax',
		'email',
		'bank',
		'Branch',
		'acc_no',
		'acc_name',
		'npwp',
		'tax_locations',
		'tax_penalty_employee',
		'tax_penalty_company',
		'bpjs_ketenagakerjaan',
		'bpjs_kesehatan',
		'photo',
		'keterangan',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}
