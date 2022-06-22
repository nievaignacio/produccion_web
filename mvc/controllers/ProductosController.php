<?php

namespace controllers;

use Models\Carrito;
use \models\Producto;
use \Render;
use \core\Controller;

class ProductosController extends Controller
{

    public function index()
    {

        $productos = Producto::getAll();

       // require_once("views/productos/index.php");

        $this->render('Templates\AdminLayout', 'productos/index', ['productos'=>$productos]);
    }

    public function agregar()
    {

        if (!$_POST) {

            //require_once("views/productos/agregar.php");
            $this->render('Templates\AdminLayout', 'productos/agregar', []);
        } else {

            $permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
            $limite = 700;
            if(in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite * 1024 * 3){
                $imagen = date('is') . $_FILES['imagen']['name'];
                $ruta = "public/uploads/". $imagen;
                if(!move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)){
                    die("No se pudo cargar el archivo");
                }
                $productos = new Producto(null, $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $imagen );
                Producto::save($productos);

                $this->redirect("/admin/productos");

            }else{
                die("Archivo no permitido");
            }

        }
    }

    public function eliminar($id)
    {
        if ($id) {
            Producto::delete($id);
        }
        header("Location: " . BASE_URL. "/admin/productos");
    }


    public function editar($id){


        $producto = Producto::getById($id);

        if (!$_POST) {

            $this->render('Templates\AdminLayout', 'productos/editar', ["producto"=>$producto]);

        } else {
            $producto = new Producto($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $producto->imagen);
            Producto::update($producto);
            header("Location: " . BASE_URL. "/admin/productos");
        }


    }


    public function grilla(){

        $productos = Producto::getAll();
        
        require_once("views/productos/grilla.php");

    }


    public function detalle($id){
      
        //$id= $params[0];

        $producto = Producto::getById($id);

        $itemCompra = Carrito::getById($id);

        // if(isset($carrito[$id])){
        //     $itemCompra = [$id];
        // }

        //var_dump($itemCompra);

        //require_once("views/productos/detalle.php");

       $this->render('Templates\Layout', 'productos/detalle', ['producto'=>$producto, 'itemCompra'=>$itemCompra]);
    }



    
    public function buscador(){
        
        $search = "";

        if(isset($_GET)){
            if(isset($_GET["search"])){
             $search = $_GET["search"];
            }
        }   

        require_once("views/productos/buscador.php");

    }



    public function search(){
              
        if(isset($_GET)){
            if(isset($_GET["search"])){            
            
                $nombre=$_GET["search"];

                $productos=Producto::getByName($nombre);
              
                if($productos){
                    $resultados = count($productos);
                    if(count($productos)>1)
                        $resultados .= " resultados para la busqueda: ".$nombre;
                    else
                        $resultados .= " resultado para la busqueda: ".$nombre;
                }else{
                    $productos = [];
                    $resultados = "No se hallaron resultados para la busqueda: ".$nombre;
                }

                $this->render('Templates\Layout', 'productos/grilla', ['productos'=>$productos, 'resultados'=>$resultados]);

            }else {

                $productos = Producto::getAll();

                $this->render('Templates\Layout', 'productos/grilla', ['productos'=>$productos]);
            }

        }
        
    }


    public function stock(){

        $enStock = Producto::getInStock();
        $sinStock = Producto::getOutStock();

        $this->render('Templates\AdminLayout', 'productos/estadisticas', ['enStock'=>$enStock,'sinStock'=>$sinStock ]);
    }


}
