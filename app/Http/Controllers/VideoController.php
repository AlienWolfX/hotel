<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $videos = Video::all();
        return view('admin.virtual_tour', compact('rooms', 'videos'));
    }

    public function updateVideo($id)
    {
        $video = Video::find($id);

        if (!$video) {
            return redirect()->back()->with('error', 'Video not found.');
        }

        $rooms = Room::all();
        return view('admin.update_video', compact('video', 'rooms'));
    }

    public function edit(Request $request, $id)
    {
        $video = Video::find($id);

        if (!$video) {
            return redirect()->back()->with('error', 'Video not found.');
        }

        $video->title = $request->title;
        $video->room_id = $request->room_id;

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $room = Room::find($request->room_id);
            $fileName = str_replace(' ', '_', $room->room_title) . '.' . $file->getClientOriginalExtension();
            $file->move('videos', $fileName);
            $video->url = $fileName;
        }

        $video->save();

        toastr()->closeButton(true)->success('Video updated successfully.');
        return redirect()->route('virtual_tour.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'video' => 'required|file|mimes:mp4,mov,ogg,qt|max:20000',
            'room_id' => 'required|exists:rooms,id',
        ]);

        $video = new Video;

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $room = Room::find($request->room_id);
            $fileName = str_replace(' ', '_', $room->room_title) . '.' . $file->getClientOriginalExtension();

            if (file_exists(public_path('videos/' . $fileName))) {
                return redirect()->back()->with('error', 'A file with the same name already exists.');
            }
            $file->move('videos', $fileName);

            $video->url = $fileName;
        }

        $video->title = $request->title;
        $video->room_id = $request->room_id;
        $video->save();

        $room = Room::find($request->room_id);
        $room->hasVideo = true;
        $room->save();

        return redirect()->route('virtual_tour.index')->with('success', 'Video added successfully.');
    }

    public function destroy(Video $video)
    {
        $filePath = public_path('videos/' . $video->url);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $room = $video->room;

        $video->delete();

        if ($room->videos()->count() == 0) {
            $room->hasVideo = false;
            $room->save();
        }

        return redirect()->route('virtual_tour.index')->with('success', 'Video deleted successfully.');
    }
}
