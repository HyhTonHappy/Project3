<?php

namespace App\Controllers;

use App\Models\Todo\Todos;

class ListSub extends BaseController
{
    public function index()
    {
        $todoModel = new Todos(); 
        $subjects = $todoModel->listSubjects(); 

        return view('List', ['subjects' => $subjects]); 
    }
}
