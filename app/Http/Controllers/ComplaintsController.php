<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    public function store(Request $request)
    {
        DB::table('complaints')->insert([
            'name' => $request->name,
            'house_no_block' => $request->house_no_block,
            'complaint_text' => $request->complaint_text,
        ]);
        
        return redirect()->route('complaints.index');
    }

    // pull data from database
    public function index()
    {
        $complaints = DB::table('complaints')->get();
        return view('complaints', ['complaints' => $complaints]);
    }
}

?>
