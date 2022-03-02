<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Intervention;
use App\Events\UserUploadedImage;
use App\Points\Actions\UploadedImage;

class GameCoverImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Game $game)
    {
        return view('game.edit.add_cover_image', compact('game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Game $game)
    {
        if ($request->hasFile('game_cover_image')) {
            $request->validate([
                'game_cover_image' => 'mimes:jpeg,png,webp|max:1014'
            ]);

            $file = $request->file('game_cover_image');
            $filename_thumbnail = "thumb_". $file->hashName(); // thumb_asdasdasd.png
            $path_full = $file->store('images/games/covers'); // /images/games/covers images/games/covers/s5xLCKUq7dAXacIPXVXM5Ozjbwf41EMpEAHG3bTt.png
// den hamnar i storage/app/images
            // storage_path() = /Users/johannilsson/code/sdb3/storage
            // resize image
            $thumbnail = Intervention::make(storage_path('app/public/images/games/covers/'. basename($path_full)))->resize(300, 200, function($constraint){
                $constraint->aspectRatio();
            })->save(storage_path("app/public/images/games/covers/thumbs/" . $filename_thumbnail)); // storage/images/games/thumbs/

            $game->cover_image = basename($path_full);
            $game->update();

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->cover_image = NULL;

        $game->update();

        return back()->with('success', "Bild borttagen!");
    }
}
