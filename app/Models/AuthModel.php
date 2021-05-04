<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'ldr_user';
	protected $primaryKey           = 'id_user';
	protected $returnType           = 'object';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['username', 'password', 'nama', 'id_outlet', 'role'];

	// Dates
	protected $useTimestamps        = true;
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	// Validation
	// protected $validationRules      = [];
	// protected $validationMessages   = [];
	// protected $skipValidation       = false;
	// protected $cleanValidationRules = true;

}
