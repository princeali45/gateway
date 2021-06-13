<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\BooksService;
use App\Services\AuthorsService;

class BooksController extends Controller
{
    use ApiResponser;
    /**
    * The service to consume the User1 Microservice
    * @var BooksService
    */
    public $booksService;
    public $authorsService;

    public function __construct(BooksService $booksService, AuthorsService $authorsService){
        $this->booksService = $booksService;
        $this->authorsService = $authorsService;
    }

    /**
    * Return the list of users
    * @return Illuminate\Http\Response
    */

    public function index()
    {
        return $this->successResponse($this->booksService->obtainBooks()); 
    }

    // public function getUsers()
    // {
        
    // }

    public function add(Request $request )
    {
        // last
        if($request->authorid <= 5){
            $this->booksService->obtainBooks($request->authorid);
            return $this->successResponse($this->booksService->createBooks($request->all(), Response::HTTP_CREATED));
        }
        else
        {
            return $this->errorResponse('Author ID is not found in the author database', Response::HTTP_NOT_FOUND); 
        }
        
    }

    public function show($id)
    {
        return $this->successResponse($this->booksService->obtainBook($id));
    }

    public function update(Request $request,$id)
    {
        return $this->successResponse($this->booksService->editBooks($request->all(), $id));
    }

    public function delete($id)
    {
        return $this->successResponse($this->booksService->deleteBooks($id));
    }
}