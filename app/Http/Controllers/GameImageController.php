<?php

namespace App\Http\Controllers;

use App\Image;
use App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Intervention;
use App\Events\UserUploadedImage;
use App\Points\Actions\UploadedImage;

class GameImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Game $game)
    {
        return view('game.edit.add_image', compact('game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Game $game)
    {
        if ($request->hasFile('game_image')) {
            $request->validate([
                'game_image' => 'mimes:jpeg,png|max:1014'
            ]);

            $file = $request->file('game_image');
            $filename_thumbnail = "thumb_". $file->hashName(); // thumb_asdasdasd.png
            $path_full = $file->store('images/games'); // /images/games images/games/s5xLCKUq7dAXacIPXVXM5Ozjbwf41EMpEAHG3bTt.png

            // storage_path() = /Users/johannilsson/code/sdb3/storage
            // resize image
            $thumbnail = Intervention::make(storage_path('app/public/images/games/'. basename($path_full)))->resize(300, 200, function($constraint){
                $constraint->aspectRatio();
            })->save(storage_path("app/public/images/games/thumbs/" . $filename_thumbnail)); // storage/images/games/thumbs/

            $image = new Image;
            $image->full = basename($path_full);
            $image->thumb = $filename_thumbnail;

            $game->images()->save($image);

            $request->user()->givePoints(new UploadedImage());

            // Send notification to all other participants
            event(new UserUploadedImage($game, $request->user()));
            
            return back()->with('success', "Bild uppladdad!");
        }else{
            return back()->with('success', 'Ooops.. something went wrong.');
        }
        abort(500, 'Could not upload image :(');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
