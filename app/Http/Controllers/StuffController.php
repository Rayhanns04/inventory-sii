<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Stuff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StuffController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::all();

        if ($request->has('search')) {
            $stuffs = Stuff::where('name', 'LIKE', '%' . $request->search . '%')->paginate(50);
        } else {
            $stuffs = Stuff::paginate(20);
        }

        // Custome Variable
        $TITLE = "Stuff";
        $ACTION = "/settings/stuffs";

        return view('pages.stuff', compact('stuffs', 'rooms', 'TITLE', 'ACTION'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'room_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid fields', 422]);
        }

        $stuffs = new Stuff;
        $stuffs->name = $request->name;
        $stuffs->room_id = $request->room_id;
        $stuffs->save();

        return back()->with('status', 'Success create new stuff!');
    }

    public function update(Request $request, $id)
    {
        $stuff = Stuff::findOrFail($id);

        $stuff->name = $request->name;
        $stuff->room_id = $request->room_id;
        $stuff->update();

        return back()->with('status', 'Success delete stuff!');
    }

    public function destroy($id)
    {
        $floor = Stuff::findOrFail($id);
        $floor->delete();

        return back();
    }
}
