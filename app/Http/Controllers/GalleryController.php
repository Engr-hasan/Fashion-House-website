<?php

namespace App\Http\Controllers;
use App\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
	public function listGallery()
    {
        $allGallery = Gallery::all();
        return view('gallery.list-galleries',compact('allGallery'));
    }

    public function addGallery() {
		return view('gallery.add-gallery');
	}

	public function storeGallery(Request $request)
    {
        $this->validate($request,[
            'gallery_image_title' => 'required',
            'gallery_image' => 'required|mimes:jpeg,jpg,bmp,png'
        ]);

        $image = $request->file('gallery_image');
        $slug = str_slug($request->gallery_image_title);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.
            $image->getClientOriginalExtension();
            if(!file_exists('uploads/galleryImage')){
                mkdir('uploads/galleryImage',0777,true);
            }
            $image->move('uploads/galleryImage',$imagename);
        }else{
            $imagename = "default.png";
        }

        $gallery = new Gallery();
        $gallery->gallery_image_title = $request->gallery_image_title;
        $gallery->gallery_image = $imagename;
        $gallery->gallery_status = 1;
        $gallery->save();
        return redirect()->back()->with('successMsg','Gallery Successfully Saved');
    }

    public function editGallery($id)
    {
        $editGallery = Gallery::find($id);
        return view('gallery.edit-gallery',compact('editGallery'));
    }

    public function updateGallery(Request $request, $id)
    {
        $this->validate($request,[
            'gallery_image_title' => 'required',
            // 'gallery_image' => 'required|mimes:jpeg,jpg,bmp,png',
            'gallery_status' => 'required'
        ]);

        $updateGallery = Gallery::find($id);
        $image = $request->file('gallery_image');
        $slug = str_slug($request->gallery_image_title);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.
            $image->getClientOriginalExtension();
            if(!file_exists('uploads/galleryImage')){
                mkdir('uploads/galleryImage',0777,true);
            }
            // unlink('uploads/galleryImage/'.$updateGallery->gallery_image);
            $image->move('uploads/galleryImage',$imagename);
        }else{
            $imagename = $updateGallery->gallery_image;
        }
        
        $updateGallery->gallery_image_title = $request->gallery_image_title;
        $updateGallery->gallery_image = $imagename;
        $updateGallery->gallery_status = $request->gallery_status;
        $updateGallery->save();  
        return redirect()->back()->with('successMsg','Gallery Successfully Updated');
    }

    public function deleteGallery($id)
    {
        $deleteGallery = Gallery::find($id);
        if(file_exists('uploads/galleryImage/'.$deleteGallery->gallery_image)){
            unlink('uploads/galleryImage/'.$deleteGallery->gallery_image);
        }
        $deleteGallery->delete();
        return redirect()->back()->with('successMsg','Gallery successfully Deleted');
    }
}
