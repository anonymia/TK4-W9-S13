<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();

        return view('video', ['videos' => $videos]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'filename' => ['required', 'string', 'max:255', Rule::unique('videos')],
            'video' => ['required', 'file', 'mimetypes:video/*', 'max:100000000'],
        ]);

        $mime = new \Mimey\MimeTypes;

        $file = $request->file('video');
        $filename = $request->filename.'.'.$mime->getExtension($file->getMimeType());
        $file->move('public/', $filename);

        $video = new Video();
        $video->filename = $filename;
        $video->save();

        return redirect()->route('video');
    }

    public function delete(Request $request, $id)
    {
        $video = Video::where('id', $id)->firstOrFail();

        if (File::exists('public/'.$video->filename)) {
            File::delete('public/'.$video->filename);
        }

        $video->delete();

        return redirect()->route('video');
    }
}
