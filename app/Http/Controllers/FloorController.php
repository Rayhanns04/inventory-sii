<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $floors = Floor::where('name', 'LIKE', '%' . $request->search . '%')->paginate(100000);
        } else {
            $floors = Floor::paginate(100000);
        }

        // Custome Variable
        $TITLE = "Floor";
        $ACTION = "/settings/floors";

        return view('pages.floor', compact('floors', 'TITLE', 'ACTION'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid fields', 422]);
        }

        $floors = new Floor;
        $floors->name = "Lantai " . $request->name;
        $floors->save();

        return back()->with('status', 'Success create new floor!');
    }

    public function update(Request $request, $id)
    {
        $floor = Floor::findOrFail($id);

        $floor->name = $request->name;
        $floor->update();

        return back()->with('status', 'Success delete floor!');
    }

    public function destroy($id)
    {
        $floor = Floor::findOrFail($id);
        $floor->delete();

        return back();
    }
}
