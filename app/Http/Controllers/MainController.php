<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class MainController extends Controller {
  public function index() {
    return view('welcome');
  }

  public function users() {
    return User::getCacheUsersPage();
  }

  public function user($id) {
    return User::find($id)->only('name', 'email');
  }
}
