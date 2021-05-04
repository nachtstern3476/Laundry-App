<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table                = 'ldr_user';
	protected $primaryKey           = 'id_user';
	protected $useAutoIncrement     = true;
	protected $returnType           = 'object';
	protected $protectFields        = false;

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	// Validation
	protected $validationRules      = 'formUser';
	protected $validationMessages   = 'formUser_errors';

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = ['hashPassword'];
	protected $beforeUpdate         = ['hashPassword'];
	protected $afterFind            = ['decryptPassword'];
	// protected $afterInsert          = [];
	// protected $afterUpdate          = [];
	// protected $beforeFind           = [];
	// protected $beforeDelete         = [];
	// protected $afterDelete          = [];

	protected function hashPassword(array $data)
	{
		helper(['encrypt']);
		if (! isset($data['data']['password'])) return $data;
	    $data['data']['password'] = encrypt($data['data']['password']);
	    return $data;
	}

	protected function decryptPassword(array $data)
	{
		helper(['encrypt']);
		if (! isset($data['data']->password)) return $data;
	    $data['data']->password = decrypt($data['data']->password);
	    return $data;
	}

}
