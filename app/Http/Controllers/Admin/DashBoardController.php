<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index() {

        $count_project = Project::count();

        return view('admin.home', compact('count_project'));
    }
}
