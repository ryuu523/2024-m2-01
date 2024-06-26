<?php

namespace App\Http\Controllers;

use App\Models\Dispatche;
use App\Models\Event;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function event()
    {

        $data = Event::all()->toArray();
        return view('events/event')->with("data", $data);
    }
    public function show_event_register()
    {
        return view('events/event_register');
    }

    public function event_register(Request $request)
    {
        $post = new Event();
        $post->name = $request->name;
        $post->place = $request->place;
        $post->date = $request->date;
        try {
            $post->save();
            return view('events/event_register')->with("res", "登録に成功しました");
        } catch (\Throwable $th) {
            return view('events/event_register')->with("res", "エラーが発生しました");
        }
    }
    public function show_event_edit(Request $request)
    {

        $data = Event::where("events_id", $request["num"])->get()->toArray();
        return view('events/event_edit')->with("data", $data);
    }
    public function event_edit(Request $request)
    {
        $event = Event::find($request->findid);

        try {
            $event->update([
                "name" => $request->name,
                "place" => $request->place,
                "date" => $request->date,
            ]);
            $res = "編集に成功しました。";
            $data = Event::where("events_id", $request->findid)->get()->toArray();
            return view('events/event_edit', compact("res", "data"));
        } catch (\Throwable $th) {
            return view('events/event_edit')->with("res", "エラーが発生しました");
        }
    }
    public function event_delete(Request $request)
    {
        $event = Event::find($request->events_id);
        try {
            $event->delete();
            $data = Event::all()->toArray();
            $res = "削除に成功しました";

            return redirect(route("event"))->with(["res" => $res, "data" => $data]);
        } catch (\Throwable $th) {
            return view('events/event')->with("res", "エラーが発生しました");
        }
    }
    public function worker()
    {
        $data = Worker::all()->toArray();
        return view('workers/worker')->with("data", $data);
    }
    public function show_worker_register()
    {
        return view('workers/worker_register');
    }
    public function worker_register(Request $request)
    {
        $post = new Worker();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->password = Hash::make($request->password);
        $post->memo = $request->memo;
        try {
            $post->save();
            return redirect(route("worker_register"))->with("res", "登録に成功しました");
        } catch (\Throwable $th) {
            return redirect(route("worker_register"))->with("res", "エラーが発生しました");
        }
    }
    public function show_worker_edit(Request $request)
    {
        $data = Worker::where("workers_id", $request->workers_id)->get()->toArray();
        return view("workers/worker_edit")->with("data", $data);
    }
    public function worker_edit(Request $request)
    {
        $worker = Worker::find($request->workers_id);

        try {
            $worker->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $worker->password,
                "memo" => $worker->memo,
            ]);
            $res = "編集に成功しました。";
            $data = Worker::where("workers_id", $request->workers_id)->get()->toArray();
            return redirect(route("worker_edit"))->with(["res" => $res, "data", $data]);
        } catch (\Throwable $th) {

            return redirect(route("worker_edit"))->with("res", "エラーが発生しました");
        }
    }
    public function worker_delete(Request $request)
    {
        $worker = Worker::find($request->workers_id);
        try {
            $worker->delete();
            $data = Worker::all()->toArray();
            $res = "削除に成功しました";

            return redirect(route("worker"))->with(["res" => $res, "data" => $data]);
        } catch (\Throwable $th) {
            return redirect(route("worker"))->with("res", "エラーが発生しました");
        }
    }
    public function dispatche()
    {
        $data = Dispatche::all()->toArray();
        $worker = Worker::all()->toArray();
        $event = Event::all()->toArray();
        return view('dispatches/dispatche')->with(["data" => $data, "worker" => $worker, "event" => $event]);
    }
    public function show_dispatche_register()
    {
        $worker = Worker::all()->toArray();
        $event = Event::all()->toArray();
        return view("dispatches/dispatche_register")->with(["worker" => $worker, "event" => $event]);
    }
    public function dispatche_register(Request $request)
    {
        try {
            foreach (($request->workers_id) as $w) {
                $post = new Dispatche();
                $post->events_id = $request->events_id;
                $post->workers_id = $w;
                $post->is_approval = false;
                $post->memo = "";
                $post->save();
            }
            return redirect(route('show_dispatche_register'))->with("res", "登録に成功しました");
        } catch (\Throwable $th) {
            return redirect(route('show_dispatche_register'))->with("res", "エラーが発生しました");
        }
    }
    public function show_dispatche_edit(Request $request)
    {
        $data = Dispatche::where("events_id", $request->events_id)->where("workers_id", $request->workers_id)->get()->toArray();
        $worker = Worker::all()->toArray();
        $event = Event::all()->toArray();
        $selected_event_num = $request->events_id;
        $selected_worker_num = $request->workers_id;
        return view("dispatches/dispatche_edit")->with(["data" => $data, "worker" => $worker, "event" => $event, "se_e_num" => $selected_event_num, "se_wo_num" => $selected_worker_num]);
    }
    public function dispatche_edit(Request $request)
    {
        $dispatche = Dispatche::where("events_id", $request->find_events_id)->where("workers_id", $request->find_workers_id);

        try {
            $dispatche->update(["events_id"=>$request->events_id,"workers_id"=>$request->workers_id]);
            $res = "編集に成功しました。";
            $data = Dispatche::where("events_id", $request->events_id)->where("workers_id", $request->workers_id)->get()->toArray();
            return redirect(route("dispatche_edit"))->with(["res" => $res, "data", $data]);
        } catch (\Throwable $th) {
            return redirect(route("dispatche_edit"))->with("res", $th);
        }
    }
    public function dispatche_delete(Request $request)
    {
        $worker = Dispatche::where("events_id", $request->events_id)->where("workers_id", $request->workers_id);
        try {
            $worker->delete();
            $data = Dispatche::all()->toArray();
            $res = "削除に成功しました";
            return redirect(route("dispatche"))->with(["res" => $res, "data" => $data]);
        } catch (\Throwable $th) {
            return redirect(route("dispatche"))->with("res", "エラーが発生しました");
        }
    }
    public function menu()
    {
        return view('menu');
    }
    public function showLogin()
    {
        return view('login')->with("error", "");
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('menu');
        }

        return view('login')->with("error", "メールアドレスまたはパスワードが正しくありません。");
    }
}
