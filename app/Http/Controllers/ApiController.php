<?php

namespace App\Http\Controllers;


use App\Models\Dispatche;
use App\Models\Event;
use App\Models\Worker;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_events(Request $request)
    {
        $worker_id = $request->query("worker_id");
        $date = urldecode($request->query("date"));
        $place = urldecode($request->query("place"));
        $title = urldecode($request->query("title"));

        if (!$worker_id) {
            return response()->json(["error" => "Worker_id not assignment"], 404);
        }
        $event_ids = Dispatche::where("workers_id", $worker_id)->pluck("events_id");


        $events = Event::whereIn("events_id", $event_ids);
        if ($date) {
            $events->whereDate("date", $date);
        }
        if ($place) {
            $events->where("place", $place);
        }
        if ($title) {
            $events->where("name", "like", "%$title%");
        }
        $events = $events->get()->toArray();
        if (!$events) {
            return response()->json(["error" => "no data found"], 404);
        }

        return response()->json($events, 200);
    }
    public function events_approval(Request $request)
    {
        $event_id = $request->event_id;
        $worker_id = $request->worker_id;
        $dispatches = Dispatche::where("events_id", (int)$event_id)->where("workers_id", (int)$worker_id)->first();
        if (!$dispatches) {
            return response()->json(["error" => "no data found"], 404);
        }
        $dispatches = Dispatche::where("events_id", (int)$event_id)->where("workers_id", (int)$worker_id);
        $dispatches->update(["is_approval"=>true]);

        return response()->json(["status"=>"success"], 404);
    }
}
