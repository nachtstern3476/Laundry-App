<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class Auth extends BaseController
{
	public function render_auth()
	{
		$data['title'] = 'Login';
		return view('auth/index', $data);
	}
	
	public function login()
	{
		helper(['encrypt']);
		$model = new AuthModel();
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$result = $model->join('ldr_outlet', 'ldr_user.id_outlet = ldr_outlet.id_outlet')->where('username', $username)->first();
        if (!$result) {
			return redirect()->to(site_url('/'));
		}else{
			if ($password == decrypt($result->password)) {
				$session_data = [
					'id_user' => $result->id_user,
					'id_outlet' => $result->id_outlet,
					'nama_outlet' => $result->nama_outlet,
					'pajak' => (float)$result->pajak/100,
					'nama' => $result->nama,
					'role' => $result->role,
					'isLogged' => true
				];
				session()->set($session_data);
				if ($result->role == 'admin') {
					return redirect()->to(site_url('master'));
				}elseif($result->role == 'kasir'){
					return redirect()->to(site_url('services/transaksi'));
				}else{
					return redirect()->to(site_url('services/laporan'));
				}
			}else{
				return redirect()->to(site_url('/'));
			}
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(site_url('/'));
	}
}
