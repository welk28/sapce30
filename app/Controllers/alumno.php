<?php

namespace App\Controllers;

class Alumno extends BaseController
{
    public function index()
    {
        
    }
    public function todos(){
        if (!session('guyu')) {return redirect()->to(base_url('/'));}//sesión inexistente retorna a baseurl

        $consulta = $this->db->query("select * from alumnos order by matricula desc");

		$alumnos = $consulta->getResult();
        $data = [
            'uri' => current_url(true),
			'alumnos' => $alumnos
        ];
        return view('admin/alumno/historialumno', $data);
    }
    public function inscritos(){
        if (!session('guyu')) {return redirect()->to(base_url('/'));}//sesión inexistente retorna a baseurl

        $periodo=session('periodo');
        $consulta = $this->db->query("select distinct a.matricula, a.app, a.apm, a.nom, a.status, a.fecnac, a.sexo, a.idcar  from alumnos as a, horario as h, cursa as c where h.idh=c.idh and a.matricula=c.matricula and h.periodo='$periodo' order by a.idcar, a.status");

		$alumnos = $consulta->getResult();
        $data = [
            'uri' => current_url(true),
			'alumnos' => $alumnos
        ];
        return view('admin/alumno/inscritos', $data);
    }
}