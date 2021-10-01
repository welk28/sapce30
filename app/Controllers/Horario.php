<?php

namespace App\Controllers;

class Horario extends BaseController
{
	public function index()
	{
		if (!session('guyu')) {
			return redirect()->to(base_url('/'));
		} //sesión inexistente retorna a baseurl
		$consulta = $this->db->query("select * from carrera");

		$carreras = $consulta->getResult();
		$data = [
			'uri' => current_url(true),
			'carreras' => $carreras
		];
		return view('admin/horario/horario', $data);
	}
}
