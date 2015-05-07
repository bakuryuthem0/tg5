<?php

class ServiceController extends BaseController {


	public function getService($id)
	{
		$all = Servicios::get();
		$serv = Servicios::where('id','=',$id)->get();
		$servicio = ContServ::where('id_serv','=',$id)->get();
		$title = 'Servicios | Tecnographic Venezuela';
		$meta = "Ofrecemos la mayor calidad en desarrollo de paginas web, ademas de servicios de imagen corporativa de exelente calidad";
		$home = explode('"', link_to('servicios/../#home'));
		$project = explode('"', link_to('servicios/../#project'));
		$about = explode('"', link_to('servicios/../#about'));
		$news = explode('"', link_to('servicios/../#news'));
		$contact = explode('"', link_to('../#contact'));
		$href = array($home[1] ,$project[1],$about[1],$news[1],$contact[1]);
		$aux = "holahola";
		$self = Request::server('REQUEST_URI');
		return View::make('servicios')
		->with('servicios',$servicio)
		->with('serv',$serv[0])
		->with('title',$title)
		->with('href',$href)
		->with('servicio','servicio_'.$id)
		->with('meta',$meta)
		->with('refer',$self)
		->with('id',$id)
		->with('all',$all)
		->with('aux',$aux);
	}
	public function postMobilService()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$serv = Servicios::where('id','=',$id)->get();
			$servicio = ContServ::where('id_serv','=',$id)->get();
			return Response::json(array('serv' => $serv,'contserv' => $servicio));
		}
	}
	public function postService()
	{
		if (Request::ajax()) {
			$input = Input::all();
			$servicio = ContServ::where('id','=',$input['id'])->get();
			$img2 = "";
			if (file_exists('images/mobile/'.$servicio[0]->title.'.png')) {
				$img2 = $servicio[0]->title;
			}
			return Response::json(
				array('success' => true,
						'nombre'=> $servicio[0]->nombre,
						'title' => $servicio[0]->title,
						'desc'  => $servicio[0]->desc,
						'meta'  => strip_tags($servicio[0]->desc),
						'img1'  => $servicio[0]->title,
						'img2'  => $img2,
						'fondo' => $servicio[0]->fondo));
		}else
		{
			return Response::json(array(
					'success' => false,
					'message' => 'ups hubo un error.'
				));
		}
	}

}