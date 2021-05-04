<?php

namespace App\Models;

use CodeIgniter\Model;

class OutletModel extends Model
{
	protected $table                = 'ldr_outlet';
	protected $primaryKey           = 'id_outlet';
	protected $returnType           = 'object';
	protected $protectFields        = false;

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	// Validation
	protected $validationRules      = 'formOutlet';

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = ['toLowerCase'];
	protected $beforeUpdate         = ['toLowerCase'];
	// protected $afterInsert          = [];
	// protected $afterUpdate          = [];
	// protected $beforeFind           = [];
	// protected $afterFind            = [];
	// protected $beforeDelete         = [];
	// protected $afterDelete          = [];

	protected function toLowerCase(array $data)
	{
		if (!isset($data['data']['nama_outlet'])) return $data;
		$data['data']['nama_outlet'] = strtolower($data['data']['nama_outlet']);
		return $data;
	}
}
