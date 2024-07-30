<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class ItemImageController extends Controller
{
    public function upload(Request $request, Item $item)
    {
        $request->validate([
            "file"  => "required",
        ]);

        $data = array();
        $data['item_id'] = $item->id;

        if($request->hasFile("file")){
            $file = $request->file("file");
            $data['original_file_name'] = $file->getClientOriginalName();
            $file_type = explode(".", $data['original_file_name']);
            $file_type = strtolower($file_type[count($file_type) - 1]);

            $images = ["jpeg", "jpg", "png", "webp"];

            $gen_thumbnail = in_array($file_type, $images);

            $data['file_name'] = Str::uuid() . "." . $file_type;

            //create Entry
            $ii = ItemImage::create($data);

            $path = $ii->path;

            $request->file("file")->storeAs($path, $data['file_name'], 'public');

            if($gen_thumbnail){
                $image = ImageManager::gd()->read($file);
                $image->scale(width: 250);
                \Storage::disk('public')->put($path . "/thumb_" . $data['file_name'], $image->toWebp());
            }

        }

    }
}
