<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $search = request('search');

        if($search) {
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $events = Event::all();
        }

        return view('home', ['events' => $events, 'search' => $search]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {
        $event = new Event();

        $event->fill($request->only(['title', 'date', 'description', 'city', 'private', 'items']));

        //Upload de imagem
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect()->route('home')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id) {
        $event = Event::findOrFail($id);
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard() {
        $user = auth()->user();
        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id) {
        Event::findOrFail($id)->delete();
        return redirect()->route('dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id) {
        $event = Event::findOrFail($id);
        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request) {
        $data = $request->all();

        //Upload de imagem
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }

        Event::findOrFail($request->id)->update($data);

        return redirect()->route('dashboard')->with('msg', 'Evento editado com sucesso!');
    }
}
