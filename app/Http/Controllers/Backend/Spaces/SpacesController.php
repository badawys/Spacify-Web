<?php

namespace App\Http\Controllers\Backend\Spaces;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpacesController extends Controller
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {

        return view('backend.spaces.index');
    }
}
