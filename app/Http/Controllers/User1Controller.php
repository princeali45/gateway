<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\User1Service;
use App\Services\User2Service;

class User1Controller extends Controller
{
    use ApiResponser;
    /**
    * The service to consume the User1 Microservice
    * @var User1Service
    */
    public $user1Service;
    public $user2Service;

    public function __construct(User1Service $user1Service, User2Service $user2Service){
        $this->user1Service = $user1Service;
        $this->user2Service = $user2Service;
    }

    /**
    * Return the list of users
    * @return Illuminate\Http\Response
    */

    public function index()
    {
        return $this->successResponse($this->user1Service->obtainUsers1()); 
    }

    // public function getUsers()
    // {
        
    // }

    public function add(Request $request )
    {
        // last
        if($request->jobid <= 2){
            $this->user1Service->obtainUser1($request->jobid);
            return $this->successResponse($this->user1Service->createUser1($request->all(), Response::HTTP_CREATED));
        }
        else
        {
            $this->user2Service->obtainUser2($request->jobid);
            return $this->successResponse($this->user2Service->createUser2($request->all(), Response::HTTP_CREATED));
        }
        
    }

    public function show($id)
    {
        return $this->successResponse($this->user1Service->obtainUser1($id));
    }

    public function update(Request $request,$id)
    {
        return $this->successResponse($this->user1Service->editUser1($request->all(), $id));
    }

    public function delete($id)
    {
        return $this->successResponse($this->user1Service->deleteUser1($id));
    }
}