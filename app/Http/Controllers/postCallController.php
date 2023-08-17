<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postCallController extends Controller
{
    public $class;
    public $method;
    public $requestClass;
    public $data;
    public $requestSending;

    public function __construct($class, $method, $requestClass, $data)
    {
        $this->class = $class;
        $this->method = $method;
        $this->requestClass = $requestClass;
        $this->data = $data;

        $this->requestSending = new $this->requestClass();
        $this->requestSending->replace($this->data);
    }

    public function call()
    {
        $response = app($this->class)->{$this->method}($this->requestClass::createFromBase($this->requestSending));
        return $response;
    }
}
