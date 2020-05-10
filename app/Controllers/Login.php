<?php

namespace App\Controllers;

class Login extends BaseController
{
	public function admin()
	{
		$data = [
			'title' => 'Selamat Datang di Aplikasi PDPS'
		];

		echo view('auth/header', $data);
		echo view('auth/admin');
		echo view('auth/footer');
	}

	public function employe()
	{
		$data = [
			'title' => 'Selamat Datang di Aplikasi PDPS'
		];

		echo view('auth/header', $data);
		echo view('auth/employe');
		echo view('auth/footer');
	}

	public function employeprocess()
	{
		$nip = htmlspecialchars($this->request->getPost('nip'), true);
		$password = htmlspecialchars($this->request->getPost('password'), true);

		$user = $this->employes->where('nip', $nip)->first();
		if ($user) {
			if ($user['password'] == md5($password)) {
				$data = [
					'nip'  => $user['nip'],
					'name'  => $user['nama'],
					'role' => 'employe'
				];

				$this->session->set($data);

				echo "success";
			} else {
				echo "passwordErrror";
			}
		} else {
			echo "nipError";
		}
	}

	public function adminprocess()
	{
		$username = htmlspecialchars($this->request->getPost('username'), true);
		$password = htmlspecialchars($this->request->getPost('password'), true);

		$user = $this->admin->where('username', $username)->first();
		if ($user) {
			if ($user['password'] == md5($password)) {
				$data = [
					'username'  => $user['username'],
					'name'  => $user['nama'],
					'role' => 'admin'
				];

				$this->session->set($data);

				echo "success";
			} else {
				echo "passwordErrror";
			}
		} else {
			echo "usernameError";
		}
	}
}
