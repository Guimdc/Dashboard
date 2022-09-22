<?php

/**
 * home - Controller de exemplo
 * @author Cândido Farias
 * @package mvc
 * @since 0.1
 */
class HomeController extends MainController
{
	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['user'])){
			header("Location:".URL_BASE."users/login");
		}
	}

	/**
	 * Carrega a página "/views/home/index.php"
	 */
    public function index() {
		#Instanciar um objeto da classe MovimentModel 
		$model=$this->load_model("Home");
		//var_dump($model);
		# busca a lista de movimento para o periodo
		$listMoviments=$model->list();
		$data['moviments']=$listMoviments;
		$cash_balance=$model->cash_balance();
		$data['cash_balance']=$cash_balance;

		$values=$model->values();
		
		//print_r($data);
		/** Carrega os arquivos do view **/	
		$this->view->show('home/home', $data);
	
		
    } // index
	
} // class HomeController