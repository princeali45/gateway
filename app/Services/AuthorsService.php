<?php

namespace App\Services;
use App\Traits\ConsumesExternalService;

class AuthorsService
{
    use ConsumesExternalService;
    
    /**
    * The base uri to consume the User2 Service
    * @var string
    */
    public $baseUri;    
    
    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    public function obtainAuthors()
    {
        // <— this code will call the GET localhost:8000/users (our site1)
        return $this->performRequest('GET','/authors'); 
    }

    public function createAuthors($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    public function obtainAuthor($id)
    {
        return $this->performRequest('GET', "/authors/{$id}");
    }

    public function editAuthors($data, $id)
    {
        return $this->performRequest('PUT', "/authors/{$id}", $data);
    }

    public function deleteAuthors($id)
    {
        return $this->performRequest('DELETE', "/authors/{$id}");
    }
}