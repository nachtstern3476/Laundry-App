<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
	protected $table                = 'ldr_jenis';
	protected $primaryKey           = 'id_jenis';
	protected $returnType           = 'object';
	protected $useSoftDelete        = false;
	protected $protectFields        = false;

	// Dates
	protected $useTimestamps        = true;
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	// Validation
	// protected $validationRules      = [];
	// protected $validationMessages   = [];
	// protected $skipValidation       = false;
	// protected $cleanValidationRules = true;

	// // Callbacks
	// protected $allowCallbacks       = true;
	// protected $afterInsert          = [];
	// protected $beforeInsert         = [];
	// protected $beforeUpdate         = [];
	// protected $afterUpdate          = [];
	// protected $beforeFind           = [];
	// protected $afterFind            = [];
	// protected $beforeDelete         = [];
	// protected $afterDelete          = [];

	// protected function findAll(array $data)
	// {
	// 	var_dump($data);
	// }
}
