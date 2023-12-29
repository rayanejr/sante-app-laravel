<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Affiche la page d'administration.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    return view('admin.index');
}

}
