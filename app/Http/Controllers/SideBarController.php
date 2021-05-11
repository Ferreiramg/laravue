<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Junges\ACL\Http\Models\Permission;

class SideBarController extends Controller
{
    public function index(){
       $perm = Permission::get();

        
    }
}
