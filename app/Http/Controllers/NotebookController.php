<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotebookController extends Controller
{
    protected $notebook;
    
    public function __construct(NotebookInterface $notebook)
    {
        $this->notebook = $notebook;
    }
    
    public function notebookHomePage()
    {
        $index = $this->notebook->getCompleteNotebookHierarchy();
        
        \View::share('index', $index);
        
        return \View::make('notebook');
    }
}
