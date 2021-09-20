<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $floors = Floor::all();

        if ($request->has('search')) {
            $rooms = Room::where('name', 'LIKE', '%' . $request->search . '%')->paginate(100000);
        } else {
            $rooms = Room::paginate(100000);
        }

        // Custome Variable
        $TITLE = "Room";
        $ACTION = "/settings/rooms";

        return view('pages.room', compact('rooms', 'floors', 'TITLE', 'ACTION'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'floor_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid fields', 422]);
        }

        $rooms = new Room;
        $rooms->name = $request->name;
        $rooms->floor_id = $request->floor_id;
        $rooms->save();

        return back()->with('status', 'Success create new room!');
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $room->name = $request->name;
        $room->floor_id = $request->floor_id;
        $room->update();

        return back()->with('status', 'Success delete room!');
    }

    public function destroy($id)
    {
        $floor = Room::findOrFail($id);
        $floor->delete();

        return back();
    }
}
