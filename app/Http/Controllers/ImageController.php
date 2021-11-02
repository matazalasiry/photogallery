<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class ImageController extends Controller
{
    public function index(){
    $images =Image::paginate(9);
    return view('welcome',compact('images'));
    }
    public function post(Request $request){
        $this->validate($request,[
            'image'=>'required'
        ]);
        $images =$request->image;
        foreach ($images as $image) {
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('images', $image_new_name);
            $post = new Image;
            $post->user_id = Auth::user()->id;
            $post->image = $image_new_name;
            $post->save();
        }
        Session()->flash('success','Images uploaded');
        return redirect('/');

        }
public function destroy($id){
$image =Image::find($id);
$image->delete();
    $path = public_path()."/images/".$image->image;
    unlink($path);
Session()->flash('success','Image deleted');
return redirect('/');

}



}
