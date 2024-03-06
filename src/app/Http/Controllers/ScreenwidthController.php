<?php

namespace Samybgt\Screenwidth\app\Http\Controllers;

use Illuminate\Http\Request;


use Cookie;

class ScreenwidthController extends Controller
{
  //
  static public function getScreenWidth(Request $request)
  {
    
    return view('screenwidth::screenwidth.getScreenWidth');

  }

  public function setScreenWidth(Request $request)
  {
    $data = [];

    $width = $request->screenWidth;
    
    Cookie::queue(Cookie::make('screenwidth', $width, 1440));
    
    $intend = Cookie::get('screenwidth') ? Cookie::get('screenwidth') : '/';

    return redirect($intend);

  }

  public function checkScreenWidth(Request $request)
  {
    $screenWidth = Cookie::get('screenwidth');
  
    echo $screenWidth;
  }

  public function reportWindowSize(Request $request)
  {
    $data = [];

    $width = $request->width;
    
    $newwidth = Cookie::queue(Cookie::make('screenwidth', $width, 1440));

    return response()->json([
    'oldWidth' => $oldWidth,
    'newWidth' => $newWidth,
    'width' => $width
    ]);

  }


}
