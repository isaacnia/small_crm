<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id=1)
    {
        $ticket = Category::find($id);
        $cat = $ticket->tickets;
        $res = $cat->pluck('id')->toArray();
        foreach ($res as $item){
            echo '<pre>'.$item.'</pre>';
        }
    }
}
