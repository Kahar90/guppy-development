<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class additemController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all()
        // );

        DB::table('items')->insert([
            'item_name' => $request->item_name,
            'picture_link' => $request->picture_link,
        ]);
        
        return redirect()->route('additem.index');
    }

    // pull data from database
    public function index()
    {
        $additems = DB::table('items')->get();
        return view('additem', ['additems' => $additems]);
    }

}


?>