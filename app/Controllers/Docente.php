<?php

namespace App\Controllers;

class Docente extends BaseController
{
	public function index()
	{
    if (!session('guyu')) {return redirect()->to(base_url('/'));} //sesión inexistente retorna a baseurl

		$consulta = $this->db->query("select * from docente order by nomdoc");

		$docentes = $consulta->getResult();
		$data = [
			'uri' => current_url(true),
			'docentes' => $docentes
		];
		return view('admin/docente/docentes', $data);
	}
	
	public function Horadocente($idoc= NULL)
	{
		if (!session('guyu')) {			return redirect()->to(base_url('/'));		} //sesión inexistente retorna a baseurl

		$periodo = session('periodo');
		$consulta = $this->db->query("select * from docente where idoc='$idoc'");

		$docente = $consulta->getRow();

    $conmat= $this->db->query("select h.idoc, h.idh, h.idmat, m.nommat, m.credit from horario as h, materias as m where h.idmat=m.idmat and h.idoc='$idoc' and h.periodo='$periodo'");
    $materias=$conmat->getResult();
		$data = [
			'uri' => current_url(true),
			'doc' => $docente,
			'materias' => $materias,
		];
		return view('admin/docente/horadocente', $data);
	}
	public function aspirantes()
	{
		if (!session('guyu')) {
			return redirect()->to(base_url('/'));
		} //sesión inexistente retorna a baseurl

		$consulta = $this->db->query("select * from alumnos where status=0");

		$aspirantes = $consulta->getResult();
		$data = [
			'uri' => current_url(true),
			'aspirantes' => $aspirantes
		];
		return view('admin/alumno/aspirantes', $data);
	}
	public function altaspirante()
	{
		if (!session('guyu')) {
			return redirect()->to(base_url('/'));
		} //sesión inexistente retorna a baseurl

		return view('admin/alumno/altaspirante');
	}
	public function horarioalumno($matricula = NULL)
	{
		if (!session('guyu')) {return redirect()->to(base_url('/'));} //sesión inexistente retorna a baseurl
		//$request = \Config\Services::request();

		//verificar existencia del alumno PRIMERO
		// $matricula=$request->getPostGet('email');
		//$matricula = $request->uri->getSegment(2);
		$periodo = session('periodo');
		$consulta = "select h.idh, h.idoc, d.nomdoc, h.idmat, m.nommat, m.credit, o.opor, o.descopor, c.asigna, c.fecing from oportunidad as o, cursa as c, horario as h, docente as d, materias as m where c.idh=h.idh and h.idoc=d.idoc and h.idmat=m.idmat and o.opor=c.opor and h.periodo='$periodo' and c.matricula='$matricula'";
		$con = $this->db->query($consulta);
		$materias = $con->getResult();

		$datosal="select a.app, a.apm, a.nom, a.status, a.idcar, c.descar from alumnos as a, carrera as c where a.idcar=c.idcar and a.matricula='$matricula'";
		$alumnod = $this->db->query($datosal);
		$alumno = $alumnod->getRow();

		
		//print_r($matricula);
		$data = [
			'uri' => current_url(true),
			'materias' => $materias,
			'al' => $alumno,
			'matricula'=> $matricula
		];
		//print_r($materias);
		return view('admin/alumno/horarioalumno', $data);
	}
}
