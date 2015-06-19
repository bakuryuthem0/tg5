<?php

class AdminController extends Controller {
	
	public function getLogin()
	{
		$title = 'Login';
		return View::make('admin.login')
		->with('title',$title);
	}
	public function postLogin()
	{

		$input = Input::all();
		if (isset($input['remember'])) {
			$valor = true;
		}else
		{
			$valor = false;
		}
		$find = User::where('username','=',$input['username'])->pluck('user_deleted');
		if ($find == 1) {
			Session::flash('error', 'Su usuario ha sido eliminado, para más información contáctenos desde nuestro módulo de contacto.');
			return Redirect::to('iniciar-sesion');
		}
		$userdata = array(
			'username' 	=> $input['username'],
			'password' 	=> $input['password']

		);
		if (Auth::attempt($userdata,$valor)) {
				return Redirect::to('administrador/inicio');	
		}else
		{
			Session::flash('error', 'Usuario o contraseña incorrectos');
			return Redirect::to('administrador');
		}
		
	}
	public function getIndex()
	{
		$title = 'administrador';
		return View::make('admin.inicio')
		->with('title',$title);
	}

	public function getNewSlide()
	{
		$title = "Nuevo slide";
		return View::make('admin.newSlide')->with('title',$title);
	}
	public function postNewSlide()
	{
		$input = Input::all();

		$rules = array(
		    'img' => 'required|image|max:2000',
		    'tipo'=> 'required'
		);
		$messages = array(
			'image' => 'Todos los archivos deben ser imagenes',
			'max'	=> 'Las imagenes deben ser de menos de 3Mb',
			'required' => 'Todos los campos son obligatorios'
		);
		$validation = Validator::make($input, $rules, $messages);

		if ($validation->fails())
		{
			return Redirect::to('administrador/nuevo-slide')->withErrors($validation);
		}
		$file = Input::file('img');
		$tipo = Input::get('tipo');
		$images = new Slides;
		if (file_exists('images/slides-top/'.$file->getClientOriginalName())) {
			//guardamos la imagen en public/imgs con el nombre original
            $i = 0;//indice para el while
            //separamos el nombre de la img y la extensión
            $info = explode(".",$file->getClientOriginalName());
            //asignamos de nuevo el nombre de la imagen completo
            $miImg = $file->getClientOriginalName();
            //mientras el archivo exista iteramos y aumentamos i
            while(file_exists('images/slides-top/'.$miImg)){
                $i++;
                $miImg = $info[0]."(".$i.")".".".$info[1];              
            }
            //guardamos la imagen con otro nombre ej foto(1).jpg || foto(2).jpg etc
            $file->move("images/slides-top/",$miImg);

            $img = Image::make('images/slides-top/'.$miImg);
            if ($tipo == 1) {
	            if ($img->width() > $img->height()) {
					$img->widen(1280);
				}
				else 
				{ 
					$img->heighten(487);
				}
				if ($img->height() > 487)
				{ 
					$img->heighten(487);
				}
				$blanc = Image::make('images/fondo_slide.png');
	            $img->interlace();
	            $blanc->insert($img,'center')
	            	  ->save('images/slides-top/'.$file->getClientOriginalName());
            	
            }
            if($miImg != $file->getClientOriginalName()){
            	$images->image = $miImg;
            }
		}else
		{
			$file->move("images/slides-top/",$file->getClientOriginalName());

			$img = Image::make('images/slides-top/'.$file->getClientOriginalName());
			if ($tipo == 1) {
				if ($img->width() > $img->height()) {
					$img->widen(1280);
				}
				else 
				{ 
					$img->heighten(487);
				}
				if ($img->height() > 487)
				{ 
					$img->heighten(487);
				}
				$blanc = Image::make('images/fondo_slide.png');
	            $img->interlace();
	            $blanc->insert($img,'center')
	            	  ->save('images/slides-top/'.$file->getClientOriginalName());
			}
            $images->image = $file->getClientOriginalName();
		}

		$images->tipo = $tipo;
		if($images->save())
		{
			Session::flash('success','Imagen guardada correctamente');
			return Redirect::to('administrador/editar-slides');
		}else
		{
			Session::flash('danger','Error al guardar la imagen');
			return Redirect::to('administrador/nuevo-slide');
		}

	}
	
	public function postDeleteSlide()
	{
		$file 		= Input::get('name');
		$id     	= Input::get('id');
		$img = Slides::find($id);
		$img->deleted = 1;
		File::delete('images/slides-top/'.$img->image);
		$img->save();
		return Response::json(array('llego' => 'llego'));
	}

	public function getEditSlides()
	{
		$title = 'Editar slides';
		$slides = Slides::where('deleted','=',0)->get();
		return View::make('admin.editSlides')->with('title',$title)->with('slides',$slides);
	}
	public function postEditSlides()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$st = Input::get('status');
			$slide = Slides::find($id);
			if ($st == 1) {
				$slide->active = 0;
			}else
			{
				$slide->active = 1;
			}
			if($slide->save())
			{
				return Response::json(array('type' => 'success','msg' => 'Slide activado satisfactoriamente'));
			}else
			{
				return Response::json(array('type' =>'danger','msg' =>'Error al activar el slide'));
			}
		}
	}
	public function postElimSlides()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$slides = Slides::find($id);
			File::delete('images/slides-top/'.$slides->image);
			$slides->deleted = 1;
			if($slides->save())
			{
				return Response::json(array('type' => 'success','msg' => 'Slide eliminado satisfactoriamente'));
			}else
			{
				return Response::json(array('type' =>'danger','msg' =>'Error al eliminar el slide'));
			}

		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('inicio');
	}



}