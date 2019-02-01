<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;
use Alert;
use Hash;
use Validator;
use Session;
use File;
use Image;
use Auth;
use Carbon\Carbon;
use App\User;
use App\topup;
use App\withdraw;
use App\balance;
use App\receiver;
use App\transfer;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index()
  {
    $tf = db::table('transfer')
    ->where('user_id', Auth()->id())
    ->select('receiver', 'rekening', 'value', 'created_at')
    ->get();

    $wt = db::table('withdraw')
    ->where('user_id', Auth()->id())
    ->select('value', 'created_at')
    ->get();

    $tp = db::table('topup')
    ->where('user_id', Auth()->id())
    ->select('value', 'created_at')
    ->get();

    $bal = db::table('balance')
    ->where('user_id', Auth()->id())
    ->select(DB::raw("SUM(value) as value"))
    ->first();

    return view('home', compact('tf', 'wt', 'tp', 'bal'));
  }

  public function topup()
  {
    return view('topup');
  }

  public function topupsave(Request $request)
  {
    $this->validate($request, [
      'value' => 'required|min:0',
    ]);

    $post = new topup();
    $post->id = $request->id;
    $post->value = $request->value;
    $post->user_id = Auth()->id();
    $post->created_at = carbon::now();
    $post->updated_at = carbon::now();

    $balan = new balance();
    $balan->value = $request->value;
    $balan->user_id = Auth()->id();
    $balan->created_at = carbon::now();
    $balan->updated_at = carbon::now();

    DB::beginTransaction();
    try {
      $post->save();

      $bals = db::table('balance')
      ->where('user_id', Auth()->id())
      ->sum('value');

      if (empty( $bals ) ) {
        $balan->save();
      }

      $bal = db::table('topup')
      ->where('user_id', Auth()->id())
      ->sum('value');

      DB::table('balance')->where('user_id',Auth()->id())->update(['value'=> $bal]);

      DB::commit();
      return redirect()->back()->with('success','Data has been added');
    }
    catch (\Exception $e) {
      $errorCode = $e->errorInfo[1];
      if($errorCode == '1048'){
        dd('Ups 1048 | Some fields are required');
      }
      if($errorCode == '1062'){
        dd('Ups 403 | Some fields are required');
      }

      if($errorCode == '1064'){
        dd('Ups 422 | Some fields are required');
      }
    }
  }

  public function withdraw()
  {
    $balance = db::table('balance')
    ->where('user_id', Auth()->id())
    ->select(DB::raw("SUM(value) as value"))
    ->first();

    return view('withdraw', compact('balance'));
  }

  public function withdrawsave(Request $request)
  {
    $balance = db::table('balance')
    ->where('user_id', Auth()->id())
    ->sum('value');

    $this->validate($request, [
      'value' => "required|min:0|max:$balance",
    ]);

    $post = new withdraw();
    $post->id = $request->id;
    $post->value = $request->value;
    $post->user_id = Auth()->id();
    $post->created_at = carbon::now();
    $post->updated_at = carbon::now();

    DB::beginTransaction();
    try {
      $post->save();

      $bal = $balance-$post->value;

      DB::table('balance')->where('user_id',Auth()->id())->update(['value'=> $bal]);

      DB::commit();
      return redirect()->back()->with('success','Data has been added');
    }
    catch (\Exception $e) {
      $errorCode = $e->errorInfo[1];
      if($errorCode == '1048'){
        dd('Ups 1048 | Some fields are required');
      }
      if($errorCode == '1062'){
        dd('Ups 403 | Some fields are required');
      }

      if($errorCode == '1064'){
        dd('Ups 422 | Some fields are required');
      }
    }
  }

  public function transfer()
  {
    $balance = db::table('balance')
    ->where('user_id', Auth()->id())
    ->select(DB::raw("SUM(value) as value"))
    ->first();

    return view('transfer', compact('balance'));
  }

  public function transfersave(Request $request)
  {
    $balance = db::table('balance')
    ->where('user_id', Auth()->id())
    ->sum('value');

    $this->validate($request, [
      'value' => "required|min:0|max:$balance",
      'rekening' => "required",
      'receiver' => "required",
    ]);

    $post = new transfer();
    $post->id = $request->id;
    $post->value = $request->value;
    $post->user_id = Auth()->id();
    $post->rekening = $request->rekening;
    $post->receiver = $request->receiver;
    $post->created_at = carbon::now();
    $post->updated_at = carbon::now();

    DB::beginTransaction();
    try {
      $post->save();

      $bal = $balance-$post->value;

      DB::table('balance')->where('user_id',Auth()->id())->update(['value'=> $bal]);

      DB::commit();
      return redirect()->back()->with('success','Data has been added');
    }
    catch (\Exception $e) {
      $errorCode = $e->errorInfo[1];
      if($errorCode == '1048'){
        dd('Ups 1048 | Some fields are required');
      }
      if($errorCode == '1062'){
        dd('Ups 403 | Some fields are required');
      }

      if($errorCode == '1064'){
        dd('Ups 422 | Some fields are required');
      }
    }
  }

}
