<?php

namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		if ($this->session->get('name')) {
			return redirect()->to('/dashboard');
		}

		$data = [
			'title' => 'Selamat Datang di Aplikasi PDPS'
		];

		echo view('auth/header', $data);
		echo view('auth/employe');
		echo view('auth/footer');
	}

	public function admin()
	{
		if ($this->session->get('name')) {
			return redirect()->to('/dashboard');
		}

		$data = [
			'title' => 'Selamat Datang di Aplikasi PDPS'
		];

		echo view('auth/header', $data);
		echo view('auth/admin');
		echo view('auth/footer');
	}

	public function lock()
	{
		if ($this->session->get('password')) {
			return redirect()->to('/dashboard');
		}

		$fetchData = $this->employes->where('id', $this->session->get('id'))->first();

		$data = [
			'nama' => $this->session->get('name'),
			'title' => 'Selamat Datang di Aplikasi PDPS',
			'avatar' => $fetchData['foto']
		];

		echo view('auth/header', $data);
		echo view('auth/lock', $data);
		echo view('auth/footer');
	}

	public function confirmPassword()
	{
		$data = [
			'nama' => $this->session->get('name'),
			'title' => 'Selamat Datang di Aplikasi PDPS'
		];

		echo view('auth/header', $data);
		echo view('auth/confirmPassword', $data);
		echo view('auth/footer');
	}

	public function confirmPasswordProcess()
	{
		$password = htmlspecialchars($this->request->getPost('password'), true);
		$confpassword = htmlspecialchars($this->request->getPost('confpassword'), true);

		if ($password != $confpassword) {
			echo 'notSame';
		} else if ($password == '12345678') {
			echo 'notDefault';
		} else if (strlen($password) < 8) {
			echo 'notMin';
		} else {
			$this->employes->update($this->session->get('id'), ['password' => md5($confpassword)]);
			echo 'success';
		}
	}

	public function employeprocess()
	{
		$nip = htmlspecialchars($this->request->getPost('username'), true);
		$password = htmlspecialchars($this->request->getPost('password'), true);

		$user = $this->employes->where('nip', $nip)->first();

		if ($user) {
			if ($user['password'] == md5($password)) {
				$data = [
					'id' => $user['id'],
					'username'  => $user['nip'],
					'name'  => $user['nama'],
					'password' => true,
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
					'id' => $user['id'],
					'username'  => $user['username'],
					'name'  => $user['nama'],
					'password' => true,
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

	public function lockProcess()
	{

		$username = htmlspecialchars($this->request->getPost('username'), true);
		$password = htmlspecialchars($this->request->getPost('password'), true);
		$role = $this->request->getPost('role');

		if ($role == "admin") {
			$user = $this->admin->where('username', $username)->first();
			if ($user) {
				if ($user['password'] == md5($password)) {
					$data = [
						'id' => $user['id'],
						'username'  => $user['username'],
						'name'  => $user['nama'],
						'password' => true,
						'role' => 'admin'
					];

					$this->session->set($data);

					echo "success";
				} else {
					echo "passwordErrror";
				}
			}
		} else {
			$user = $this->employes->where('nip', $username)->first();
			if ($user) {
				if ($user['password'] == md5($password)) {
					$data = [
						'id' => $user['id'],
						'username'  => $user['nip'],
						'name'  => $user['nama'],
						'password' => true,
						'role' => 'employe'
					];

					$this->session->set($data);

					echo "success";
				} else {
					echo "passwordErrror";
				}
			}
		}
	}
}
