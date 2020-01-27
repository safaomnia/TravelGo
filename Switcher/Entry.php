<?php
class Entry {
	
	private $route;
	private $method;
	private $routes;
	
	public function __construct($route,$method,$routes) {
		$this->route = $route;
		$this->routes = $routes;
		$this->method = $method;
		$this->checkUrl();
	}

	private function checkUrl() {
		if ($this->route !== strtolower($this->route)) {
			http_response_code(301);
			header('location:' . strtolower($this->route));
		}
	}
	private function View($contenu, $variables = []){
		extract($variables);
		ob_start();
		include  __DIR__ . "/../View/$contenu";
		return ob_get_clean();
	}
	public function run() {

		$routes = $this->routes->getRoutes();	
		$authentification = $this->routes->getAuthentification();
		if (isset($routes[$this->route]['Auth']) && !$authentification) header('location: ?route=connexion');
		else {
			if(isset($routes[$this->route])) {
				$controller = $routes[$this->route][$this->method]['controller'];
				$action = $routes[$this->route][$this->method]['method'];
				$page = $controller->$action();
				$title = $page['title'];
				if(isset($page['icon'])) $icon = $page['icon']; else $icon = 'SuccessRoad2.png';
				if (isset($page['variables'])) {
					$output = $this->View($page['contenu'], $page['variables']);
				} else {
					$output = $this->View($page['contenu']);
				}
				echo $this->View
				(   
					'Layout.htm.php',
					[
						'user' =>$this->routes->getUser(),
						'authentification' => $authentification,
						'output' => $output,
						'title' => $title,
						'icon' => $icon
					]
				);
			} else {
				header("Location: Erreur.htm");
			}
		}

	}
}