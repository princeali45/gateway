<?php

namespace App\Services;
use App\Traits\ConsumesExternalService;

class BooksService
{
    use ConsumesExternalService;
    
    /**
    * The base uri to consume the User1 Service
    * @var string
    */
    public $baseUri;
    
    public $secret;

    public function __construct()    
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

    public function obtainBooks()
    {
        // <— this code will call the GET localhost:8000/users (our site1)
        return $this->performRequest('GET','/books'); 
    }

    public function createBooks($data)
    {
        return $this->performRequest('POST', '/books', $data);
    }

    public function obtainBook($id)
    {
        return $this->performRequest('GET', "/books/{$id}");
    }

    public function editBooks($data, $id)
    {
        return $this->performRequest('PUT', "/books/{$id}", $data);
    }

    public function deleteBooks($id)
    {
        return $this->performRequest('DELETE', "/books/{$id}");
    }
}