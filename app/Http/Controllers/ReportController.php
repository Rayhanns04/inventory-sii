<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Report;
use App\Models\Stuff;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function index(Request $request, Room $room)
    {
        // dd($room->stuffs());
        $roomID = $room->id;
        $room = $room;
        $stuffs = Stuff::all();
        $conditions = Condition::all();

        if ($request->has('search')) {
            $reports = Report::where('name', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $reports = Report::latest()->get();
        }

        $reports = $reports->groupBy(function ($item) {
            return $item->created_at->format('d F Y');
        });

        // Custome Variable
        $TITLE = "Report";
        $ACTION = "/reports/floors";

        return view('pages.reports', compact('roomID', 'room', 'reports', 'stuffs', 'conditions', 'TITLE', 'ACTION'));
    }

    public function detail(Room $room, $date)
    {
        $TITLE = "Report";
        $ACTION = "/reports/floors";
        $conditions = Condition::all();


        $reports = Report::groupBy($date);
        return view('pages.reports.detail', compact('conditions', 'room', 'reports', 'TITLE', 'ACTION'));
    }

    public function createReport(Room $room)
    {

        // Custome Variable
        $conditions = Condition::all();
        $TITLE = $room->name . " - Laporan " . Carbon::now()->format('Y/m/d');
        $ACTION = "/reports/floors";

        return view('pages.reports.create', compact('TITLE', 'ACTION', 'room', 'conditions'));
    }

    public function store(Request $request, Room $room)
    {

        // dd($request->reports);

        foreach ($request->reports as $key => $item) {
            $report = Report::create([
                'note' => $item['note'],
                'user_id' => Auth::user()->id,
                'stuff_id' => $key
            ]);

            foreach (Condition::all() as $condition) {
                $report->reportConditions()->create([
                    'condition_id' => $condition->id,
                    'quantity' => $item['conditions'][$condition->name]
                ]);
            }
        }

        return back()->with('status', 'Success create new report!');
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'note' => 'required|string',
            'quantity' => 'required|string',
            'item_id' => 'required',
            'condition_id' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid fields', 422]);
        }

        $report->name = $request->name;
        $report->item_id = $request->item_id;
        $report->item_id = $request->item_id;
        $report->condition_id = $request->condition_id;
        $report->condition_id = $request->condition_id;
        $report->user_id = request()->user()->id;
        $report->update();

        return back()->with('status', 'Success delete report!');
    }
}
