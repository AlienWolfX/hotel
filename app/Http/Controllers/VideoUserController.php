<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoUserController extends Controller
{
    public function viewTour($id)
    {
        $video = Video::where('room_id', $id)->first();

        if (!$video) {
            return redirect()->back()->with('error', 'Video not found.');
        }

        return view('home.view_tour', compact('video'));
    }
}
