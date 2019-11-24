<?php

namespace App\Http\Controllers;
use App\HomeSlider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function listSlider()
    {
        $allSlider = HomeSlider::all();
        return view('home-slider.list-sliders',compact('allSlider'));
    }

    public function addSlider() {
		return view('home-slider.add-slider');
	}

	public function storeSlider(Request $request)
    {
        $this->validate($request,[
            'home_slider_title' => 'required',
            'home_slider_image' => 'required|mimes:jpeg,jpg,bmp,png',
            'home_slider_title_topics' => 'required',
            'slider_title_image' => 'required|mimes:jpeg,jpg,bmp,png'
        ]);

        $image = $request->file('home_slider_image');
        $slug = str_slug($request->home_slider_title);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.
            $image->getClientOriginalExtension();
            if(!file_exists('uploads/SliderImage')){
                mkdir('uploads/SliderImage',0777,true);
            }
            $image->move('uploads/SliderImage',$imagename);
        }else{
            $imagename = "default.png";
        }

        $image2 = $request->file('slider_title_image');
        $slug2 = 'home_slider_title_topics';
        if(isset($image2)){
            $currentDate2 = Carbon::now()->toDateString();
            $imagename2 = $slug2.'-'.$currentDate2.'-'.uniqid().'.'.
            $image2->getClientOriginalExtension();
            if(!file_exists('uploads/SliderTitleImage')){
                mkdir('uploads/SliderTitleImage',0777,true);
            }
            $image2->move('uploads/SliderTitleImage',$imagename2);
        }else{
            $imagename2 = "default.png";
        }

        $slider = new HomeSlider();
        $slider->home_slider_title = $request->home_slider_title;
        $slider->home_slider_image = $imagename;
        $slider->home_slider_title_topics = $request->home_slider_title_topics;
        $slider->slider_title_image = $imagename2;
        $slider->slider_status = 1;
        $slider->save();
        return redirect()->back()->with('successMsg','Slider Successfully Saved');
    }

    public function editSlider($id)
    {
        $editSlider = HomeSlider::find($id);
        return view('home-slider.edit-slider',compact('editSlider'));
    }

    public function updateSlider(Request $request, $id)
    {
        $this->validate($request,[
           'home_slider_title' => 'required',
            // 'home_slider_image' => 'required|mimes:jpeg,jpg,bmp,png',
            'home_slider_title_topics' => 'required',
            // 'slider_title_image' => 'required|mimes:jpeg,jpg,bmp,png',
            'slider_status' => 'required'
        ]);

        $updateSlider = HomeSlider::find($id);
        $image = $request->file('home_slider_image');
        $slug = str_slug($request->home_slider_title);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.
            $image->getClientOriginalExtension();
            if(!file_exists('uploads/SliderImage')){
                mkdir('uploads/SliderImage',0777,true);
            }
            unlink('uploads/SliderImage/'.$updateSlider->home_slider_image);
            $image->move('uploads/SliderImage',$imagename);
        }else{
            $imagename = $updateSlider->home_slider_image;
        }

        $image2 = $request->file('slider_title_image');
        $slug2 = 'slider_title_image';
        if(isset($image2)){
            $currentDate2 = Carbon::now()->toDateString();
            $imagename2 = $slug2.'-'.$currentDate2.'-'.uniqid().'.'.
            $image2->getClientOriginalExtension();
            if(!file_exists('uploads/SliderTitleImage')){
                mkdir('uploads/SliderTitleImage',0777,true);
            }
            unlink('uploads/SliderTitleImage/'.$updateSlider->slider_title_image);
            $image2->move('uploads/SliderTitleImage',$imagename2);
        }else{
            $imagename2 = $updateSlider->slider_title_image;
        }
        
        $updateSlider->home_slider_title = $request->home_slider_title;
        $updateSlider->home_slider_image = $imagename;
        $updateSlider->home_slider_title_topics = $request->home_slider_title_topics;
        $updateSlider->slider_title_image = $imagename2;
        $updateSlider->slider_status = $request->slider_status;
        $updateSlider->save();  
        return redirect()->back()->with('successMsg','Slider Successfully Updated');
    }

    public function deleteSlider($id)
    {
        $deleteSlider = HomeSlider::find($id);
        if(file_exists('uploads/SliderImage/'.$deleteSlider->home_slider_image)){
            unlink('uploads/SliderImage/'.$deleteSlider->home_slider_image);
        }
        
        if(file_exists('uploads/SliderTitleImage/'.$deleteSlider->slider_title_image)){
            unlink('uploads/SliderTitleImage/'.$deleteSlider->slider_title_image);
        }
        $deleteSlider->delete();
        return redirect()->back()->with('successMsg','Slider successfully Deleted');
    }
}
