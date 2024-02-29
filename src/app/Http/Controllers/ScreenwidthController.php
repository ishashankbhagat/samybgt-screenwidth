<?php

namespace Samybgt\Screenwidth\app\Http\Controllers;

use Illuminate\Http\Request;


use Session;

class ScreenwidthController extends Controller
{
    //
    static public function getScreenWidth(Request $request)
    {
        // dd('dd');
        return view('screenwidth::screenwidth.getScreenWidth');

    }

    public function setScreenWidth(Request $request)
    {
        $data = [];

        $width = $request->screenWidth;
        // dd($width);
        Session::put('screenWidth',$width);

        $intend = $request->session()->get('screenWidthIntend') ? $request->session()->get('screenWidthIntend') : '/';

        return redirect($intend);

    }

    public function checkScreenWidth(Request $request)
    {
        $screenWidth = $request->session()->get('screenWidth');

        echo $screenWidth;
    }


}