<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $histories = History::orderByDesc('created_at')->paginate(25);

        return view('admin')->with('histories', $histories);
    }
}
