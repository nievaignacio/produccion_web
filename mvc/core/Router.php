<?php

namespace core;

class Router{

    private array $handlers;
    private $notFoundHandler;
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';
    private const ANY_METOHD = '*';

    private array $guards;


    public function use(string $path, $handler): void 
    {
       $this->addHandler(self::ANY_METOHD, $path, $handler);

    }
    

    public function get(string $path, $handler): void 
    {
        // $this->handlers['GET'.$path] = [
        //     'path'=>$path, 
        //     'method'=>'GET',
        //     'handler' => $handler
        // ];  

        $this->addHandler(self::METHOD_GET, $path, $handler);

    }
    public function post(string $path, $handler): void {
        // $this->handlers['POST'.$path] = [
        //     'path'=>$path, 
        //     'method'=>'POST',
        //     'handler' => $handler
        // ];

        
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }

    private function addHandler(string $method, string $path, $handler): void{
        
        if(!str_ends_with($path, "/")) $path .=  "/";

        $this->handlers[$method.$path] = [
            'path'=>$path, 
            'method'=>$method,
            'handler' => $handler
        ];
    }

    public function addNotFoundHandler($handler):void
    {
        $this->notFoundHandler = $handler;
    }


    private function getParams($request, $path)
    {

        $params = [];

        if(str_contains($path,"{")){
            $pathExplode = explode("/", $path);
            $requestExplode = explode("/", $request);
            $names = array_diff($pathExplode, $requestExplode);
            $names = array_map(function($n){ return str_replace('{','',$n);}, $names);
            $names = array_map(function($n){ return str_replace('}','',$n);}, $names);
            $values = array_diff($requestExplode, $pathExplode);
            $params = array_combine($names, $values);
        }

       // var_dump($params);

        return $params;
    }

    public function run(){

         $requestUri = parse_url($_SERVER['REQUEST_URI']);
         $requestPath = $requestUri['path']; 
         $requestMethod = $_SERVER['REQUEST_METHOD'];  
         
         $requestPath = str_replace(BASE_DIR,'',$requestPath);

         if(!str_ends_with($requestPath, "/")) $requestPath .=  "/";
         
         //echo $requestPath;

         $callback = null;
         $params = [];


         foreach($this->handlers as $handler){
            

            $regx = preg_replace('/{\w+}/', "\w+", str_replace("/", "\/", $handler['path']));
            $match = preg_match('/^' . $regx . '$/', $requestPath);

            if ( $match > 0  && ($handler['method'] === $requestMethod || $handler['method'] === self::ANY_METOHD)) {
//           if($handler['path'] === $requestPath && $handler['method'] === $requestMethod){
                $callback = $handler['handler'];

                $params = $this->getParams($requestPath, $handler['path']);

             }
         }

         if(!$callback){
             header(header: "HTTP/1.0 404 Not Found");
             if(!empty($this->notFoundHandler)){ 
                $callback = $this->notFoundHandler;
             }else{
                return;
             }
         }

    

         call_user_func_array($callback, [array_merge($_GET,$_POST, $params)]);


    }


    

}