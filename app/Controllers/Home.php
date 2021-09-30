<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $mensaje = session('mensaje');
        $datos = $this->db->query("select * from rol");
		
        $result = $datos->getResult();
	
        $data = [
            'uri' => current_url(true),
			'roles' => $result,
            'mensaje' => $mensaje
        ];
        return view('login', $data);
    }
    public function auth(){
        $rol=$this->request->getPost('rol');
		$rfcp=$this->request->getPost('rfcp');
		$contra=$this->request->getPost('contra');
		print_r($_POST);

        $datos = $this->db->query("SELECT p.rfcp, pe.nomdoc, p.idr, r.tipo, pe.passdoc FROM rol r,permisos p, personal pe WHERE r.idr=p.idr and p.rfcp=pe.rfcp AND p.status=1 AND p.idr=$rol and pe.passdoc=sha1('$contra') AND p.rfcp='$rfcp'");

		$nr = $datos->getRow();
		
        print_r($nr);
        
        if(!empty($nr)){
			//establecer periodo
            $periodo = $this->db->query("SELECT * from periodo where predet=1");
		    $per = $periodo->getRow();

			//ver si aparece
			echo"existen registros <br>";	
			echo $nr->rfcp." ".$nr->nomdoc." ".$nr->idr." ".$nr->tipo." ".$per->periodo." ".$per->descper;
			$data  = [
				'rfcp' => $nr->rfcp, 
				'nombre' => $nr->nomdoc,
				'guyu' => TRUE,
				'idr'=> $nr->idr,
				'tipo'=> $nr->tipo,
				'periodo' => $per->periodo, 
				'descper' => $per->descper
			];
		
			
			$this->session->set($data);
			//return redirect()->to(base_url('/inicio'))->with('mensaje','1');
			return redirect()->to(base_url('/panel'));
			//redirect(base_url('/panel'));
		}else{
			return redirect()->to(base_url('/'))->with('mensaje','El usuario y/o contraseña son incorrectos');
			//redirect(base_url('/'));
		}
    }
	public function logout(){
		$this->session->destroy();
		return redirect()->to(base_url('/'));
	}
}
