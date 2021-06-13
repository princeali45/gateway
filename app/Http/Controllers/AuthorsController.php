<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\AuthorsService;
use App\Services\BooksService;

class AuthorsController extends Controller
{
    use ApiResponser;
    /**
    * The service to consume the User1 Microservice
    * @var AuthorsService
    */
    public $authorsService;
    public $booksService;

    public function __construct(AuthorsService $authorsService, BooksService $booksService){
        $this->authorsService = $authorsService;
        $this->booksService = $booksService;
    }

    /**
    * Return the list of users
    * @return Illuminate\Http\Response
    */

    public function index()
    {
        return $this->successResponse($this->authorsService->obtainAuthors()); 
    }

    // public function getUsers()
    // {
        
    // }

    public function add(Request $request )
    {
  
           
            return $this->successResponse($this->authorsService->createAuthors($request->all(), Response::HTTP_CREATED));
        
    }

    public function show($id)
    {
        return $this->successResponse($this->authorsService->obtainAuthor($id));
    }

    public function update(Request $request,$id)
    {
        return $this->successResponse($this->authorsService->editAuthors($request->all(), $id));
    }

    public function delete($id)
    {
        return $this->successResponse($this->authorsService->deleteAuthors($id));
    }
}
