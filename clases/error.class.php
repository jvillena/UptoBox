<?php
class Error{
	
	
	private $sUrl404;
	
	private $sUrlIndex;
	
	private $sUrlAccesoRestringido;
	
	private $sUrlUsuarioNoRegistrado;
	
	private $sUrlUsuarioYaRegistrado;
	
	private $indexUsuario;
	
	private $indexEmpresa;
	
	private $eventosEmpresa;
	
	private $indexAdministrador;
	private $eventosUsuario;
	private $evento;
	private $permisosInsuficientes;
	private $ofertasUsuario;
	private $ofertasUsuarioEmpresa;
	private $perfilUsuario;
	
	private $perfilAdmin;
	
	private $gente;
	private $mensajeriaUsuario;
	
	private $errorFuncionalidad;
	
	public function __construct(){
		
		$this->sUrl404 = "";
		
		$this->sUrlIndex = BASE_URL;
		
		$this->sUrlAccesoRestringido = BASE_URL;	
		
		$this->sUrlUsuarioNoRegistrado = BASE_URL.'login';
		
		$this->sUrlUsuarioYaRegistrado = BASE_URL;
		
		$this->indexUsuario=BASE_URL.'usuario/misitio';
		
		$this->permisosInsuficientes=BASE_URL.'login';

		$this->errorFuncionalidad=BASE_URL.'errorFuncionalidad';
		
		$this->indexEmpresa=BASE_URL.'empresa/misitio';
		$this->eventosEmpresa=BASE_URL.'empresa/eventos';
		
		$this->perfilUsuario = BASE_URL.'usuario';
		
		$this->mensajeriaUsuario = BASE_URL.'usuario/mensajeria';
		
		$this->gente=BASE_URL.'usuario/gente';
		
		$this->perfilAdmin = BASE_URL.'administrador';
		
		
	}
	
	public function redirect404(){
		
		header("Location: $this->sUrl404");
	}
	
	public function redirectIndex(){
		header("Location: $this->sUrlIndex");
		
	}
	
	public function redirectAccesoRestringido(){
		
		header("Location: $this->sUrlAccesoRestringido");
	}
	
	public function redirectUsuarioNoRegistrado(){
		
		header("Location: $this->sUrlUsuarioNoRegistrado");
	}
	public function redirectUsuarioYaRegistrado(){
		
		header("Location: $this->sUrlUsuarioYaRegistrado");
	}
	
	public function redirectEventos(){
		header("Location: $this->eventosUsuario");
	}
	
	public function redirectEvento($id){
		header("Location: $this->evento".$id);
	}
	
	public function permisosInsuficientes(){
		header("Location: $this->permisosInsuficientes");
	}
	
	public function errorFuncionalidad(){
		header("Location: $this->errorFuncionalidad");
	}
	
	public function redirectOfertas(){
		header("Location: $this->ofertasUsuario");
	}
	
	public function redirectOfertasPublico($id){
		header("Location: $this->ofertasUsuario/$id");
	}
	
	public function redirectOfertasEmpresa(){
		header("Location: $this->ofertasUsuarioEmpresa");
	}
	
	public function redirectPerfilPublico($id){
		header("Location: $this->perfilUsuario".$id);
	}
	
	public function redirectVerEvento($id){
		header("Location: $this->eventosUsuario/".$id);
	}
	
	public function redirectVerOferta($id){
		header("Location: $this->ofertasUsuario"."/$id");
	}
	
	public function redirectMensajeria(){
		header("Location: $this->mensajeriaUsuario");
	}
	
	public function redirectUsuario(){
		header("Location: $this->perfilUsuario");
	}
	
	public function redirectAdministrador(){
		header("Location: $this->perfilAdmin");
	}
	
}

$oError = new Error();

?>