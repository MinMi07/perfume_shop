<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class ContactController extends Controller
{
    public function view() {
        $data = Category::all();

        return view('contact', compact('data'));
    }
}
