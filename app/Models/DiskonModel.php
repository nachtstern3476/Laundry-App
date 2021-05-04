<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
	protected $table                = 'ldr_diskon';
	protected $primaryKey           = 'id_diskon';	
	protected $returnType           = 'object';
	protected $protectFields        = false;

	// Dates
	protected $useTimestamps        = true;
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	// Validation
	protected $validationRules      = 'formDiskon';

	// // Callbacks
	// protected $allowCallbacks       = true;
	// protected $beforeInsert         = [];
	// protected $afterInsert          = [];
	// protected $beforeUpdate         = [];
	// protected $afterUpdate          = [];
	// protected $beforeFind           = [];
	// protected $afterFind            = [];
	// protected $beforeDelete         = [];
	// protected $afterDelete          = [];
}
