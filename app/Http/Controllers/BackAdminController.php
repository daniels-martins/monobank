<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackAdminController extends Controller
{
    public function index()
    {
      return view('admin.xxxadmin.index');
      // return 'ff';
    }
}
