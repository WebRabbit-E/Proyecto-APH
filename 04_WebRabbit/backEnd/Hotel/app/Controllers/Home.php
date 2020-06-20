<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PersonasModel;


class Home extends BaseController
{

	////////////////////////////////////////////////////////////////////////////////////
	///////////////////////Formulario de agregar///////////////
	//////////////////////////////////////////////////////////////////////////////////
	
	public function __construct(){

		helper('form');



	}
	////////////////////////////////////////////////////////////////////////////////////
	///////////////////////METODO DE AGREGARr///////////////
	//////////////////////////////////////////////////////////////////////////////////

	public function agregar(){
		$personasModel= new PersonasModel($db);


		$request=\Config\Services::request();

		$data= array(

			'nombre'=>$request->getPostGet('nombre'),
			'apellido1'=>$request->getPostGet('apellido1'),
			'apellido2'=>$request->getPostGet('apellido2'),
			'pass'=>$request->getPostGet('pass'),
			'privilegios'=>$request->getPostGet('privilegios')

			);
		if ($request->getPostGet('idPersona')) {
			$data['idPersona']=$request->getPostGet('idPersona');
		}
		$personasModel->save($data);

		//SE LLAMA A LA VISTA PRINCIPAL CON EL NUEVO USUARIO AGREGADO
		$personas=$personasModel->findAll();
		$personas=array('personas' =>$personas );
		return view('templates\header').view('personas\welcome_message',$personas).view('templates\footer');

		}

		////////////////////////////////////////////////////////////////////////////////////
	///////////////////////METODO DE EDITAR///////////////
	//////////////////////////////////////////////////////////////////////////////////

	public function editarPersona(){
		$personasModel= new PersonasModel($db);


		$request=\Config\Services::request();
		$id=$request->getPostGet('idPersona');

		//SE LLAMA A LA VISTA PRINCIPAL CON EL NUEVO USUARIO AGREGADO
		$persona=$personasModel->find([$id]);
		$persona=array('persona' =>$persona );
		return view('templates\header').view('personas\agregarPersonas',$persona).view('templates\footer');

		}
			////////////////////////////////////////////////////////////////////////////////////
	///////////////////////METODO DE BORRAR///////////////
	//////////////////////////////////////////////////////////////////////////////////

	public function borrarPersona(){
		$personasModel= new PersonasModel($db);


		$request=\Config\Services::request();
		$id=$request->getPostGet('idPersona');

		//SE borra el usuario con el id recibido
		$personasModel->delete([$id]);
		//se lista todo de nuevo
		$personas=$personasModel->findAll();
		$personas=array('personas' =>$personas );


		return view('templates\header').view('personas\welcome_message',$personas).view('templates\footer');

		}
	////////////////////////////////////////////////////////////////////////////////////
	///////////////////////Formulario de agregar///////////////
	//////////////////////////////////////////////////////////////////////////////////

	public function agregarPersonas(){

		return view('templates\header').view('personas\agregarPersonas').view('templates\footer');

	}


	////////////////////////////////////////////////////////////////////////////////////
	///////////////////////AQUI SE LISTA Y SE LLAMA EL INDEX DE PERSONAS///////////////
	//////////////////////////////////////////////////////////////////////////////////
	///
	public function index()
	{
		$personasModel= new PersonasModel($db);
		$personas=$personasModel->findAll();
		$personas=array('personas' =>$personas );


		return view('templates\header').view('personas\welcome_message',$personas).view('templates\footer');
	}

	//--------------------------------------------------------------------

}
