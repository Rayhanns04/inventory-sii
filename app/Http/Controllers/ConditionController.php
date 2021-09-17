<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConditionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $conditions = Condition::where('name', 'LIKE', '%' . $request->search . '%')->paginate(50);
        } else {
            $conditions = Condition::paginate(20);
        }

        // Custome Variable
        $TITLE = "Condition";
        $ACTION = "/settings/conditions";

        return view('pages.condition', compact('conditions', 'TITLE', 'ACTION'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid fields', 422]);
        }

        $conditions = new Condition;
        $conditions->name = $request->name;
        $conditions->save();

        return back()->with('status', 'Success create new condition!');
    }

    public function update(Request $request, $id)
    {
        $condition = Condition::findOrFail($id);

        $condition->name = $request->name;
        $condition->update();

        return back()->with('status', 'Success delete condition!');
    }

    public function destroy($id)
    {
        $floor = Condition::findOrFail($id);
        $floor->delete();

        return back();
    }
}
