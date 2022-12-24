<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class additemController extends Controller
{
    public function store(Request $request)
    {
        DB::table('additems')->insert([
            'name' => $request->name,
            'house_no_block' => $request->house_no_block,
            'complaint_text' => $request->complaint_text,
        ]);
        
        return redirect()->route('additem.index');
    }

    // pull data from database
    public function index()
    {
        $additems = DB::table('additems')->get();
        return view('additems', ['additems' => $additems]);
    }

}


?>