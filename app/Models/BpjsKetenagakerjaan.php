<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BpjsKetenagakerjaan
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $kpj
 * @property string|null $npp
 *
 * @package App\Models
 */
class BpjsKetenagakerjaan extends Model
{
	protected $table = 'bpjs_ketenagakerjaan';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'kpj',
		'npp'
	];
}
