<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property int $id
 * @property string $kode
 * @property string|null $nama
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'city';
	public $timestamps = false;

	protected $fillable = [
		'kode',
		'nama'
	];
}
