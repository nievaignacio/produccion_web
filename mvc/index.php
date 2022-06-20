<?php
use core\Router;
use core\Auth;

require_once("config.php");
require_once("core/autoload.php");

//\core\ExceptionHandler::run();
 
$guards = new Router;

$guards->use('/admin.*', function(){ 
        Auth::check();
    });
    
$guards->run();


$router = new Router;


$router->get('/', function(){ 
    (new controllers\HomeController)->index(); 
});

$router->get('/productos/detalle/{id}', function($params){ 
    (new controllers\ProductosController)->detalle($params['id']); 
});



$router->get('/carrito', function(){ 
    (new controllers\CarritoController)->index(); 
});

$router->post('/carrito/agregar', function(){ 
    (new controllers\CarritoController)->agregar(); 
});


$router->get('/usuarios/login', function(){ 
    (new controllers\UsuariosController)->login(); 
});

$router->post('/usuarios/login', function(){ 
    (new controllers\UsuariosController)->login(); 
});

$router->get('/usuarios/logout', function(){ 
    (new controllers\UsuariosController)->logout(); 
});

//admin

$router->get('/admin', function(){ 
    // Auth::check();
    (new controllers\ProductosController)->stock(); 
});

$router->get('/admin/productos', function(){ 
    // Auth::check();
    (new controllers\ProductosController)->index(); 
});


$router->get('/admin/productos/editar/{id}', function($params){ 
    // Auth::check();
    (new controllers\ProductosController)->editar($params["id"]); 
});

$router->post('/admin/productos/editar/{id}', function($params){ 
    // Auth::check();
    (new controllers\ProductosController)->editar($params["id"]); 
});

$router->get('/admin/productos/eliminar/{id}', function($params){ 
    // Auth::check();
    (new controllers\ProductosController)->eliminar($params["id"]); 
});


$router->get('/admin/usuarios', function(){ 
    // Auth::check();
    (new controllers\UsuariosController)->index(); 
});

$router->get('/admin/usuarios/agregar', function(){ 
    // Auth::check();
    (new controllers\UsuariosController)->agregar(); 
});

$router->post('/admin/usuarios/agregar', function(){ 
    // Auth::check();
    (new controllers\UsuariosController)->agregar(); 
});


// $router->use('/admin/.*', function(){ // sobre escribe los handlers anteriores
//     Auth::check();
// });



// rutas estaticas

$router->get('/about', function(){echo 'about';});

// not found

$router->addNotFoundHandler(function(){
    require_once("./views/404.php");
});

$router->run();





// //$layout = new Layout();


// // $uri = explode('/', str_replace(BASE_DIR,'',$_SERVER['REQUEST_URI']));

// // print_r($uri);

// // $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// // print_r($path);


// //if (empty($uri)>0) {
// if (isset($_GET['uri'])) {


//     //print_r($_GET);

//     // parseo el request
//      $uri = explode('/', $_GET['uri']);

//     //extraigo segun las posiciones
//     $controller = "controllers\\" . $uri[0] . "Controller";
//     $method = isset($uri[1]) ? $uri[1] : 'index';
    
//    // $query = explode('?', $uri[2]);

// //    if(isset($uri[2])){
// //        $query = parse_url($uri[2], PHP_URL_QUERY);
// //         parse_str($query, $arr);
// //         var_dump($arr);

// //    }
    
//     $params = array_splice($uri, 2);

//     if (class_exists($controller) & method_exists($controller, $method)) {
//         if ($params) {
//             (new $controller)->$method($params);
//         } else {
//             (new $controller)->$method();
//         }
//     } else {
//        // echo "Pagina no encontrada 404";
//        require_once("./views/404.php");
//     }

// } else {
//     // si no recibi ningua URI
//     (new controllers\HomeController)->index();
// }



