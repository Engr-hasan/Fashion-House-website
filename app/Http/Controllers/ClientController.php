<?php

namespace App\Http\Controllers;
use App\Clients;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
	public function listClient()
    {
        $allClients = Clients::all();
        return view('clients.list-clients',compact('allClients'));
    }

    public function addClient() {
		return view('clients.add-clients');
	}

	public function storeClient(Request $request)
    {
        $this->validate($request,[
            'client_name' => 'required',
            'client_company_logo' => 'required|mimes:jpeg,jpg,bmp,png',
            'client_details' => 'required'
        ]);

        $image = $request->file('client_company_logo');
        $slug = str_slug($request->client_name);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'-'.
            $image->getClientOriginalExtension();
            if(!file_exists('uploads/clientLogo')){
                mkdir('uploads/clientLogo',0777,true);
            }
            $image->move('uploads/clientLogo',$imagename);
        }else{
            $imagename = "default.png";
        }

        $client = new Clients();
        $client->client_name = $request->client_name;
        $client->client_company_logo = 'uploads/clientLogo/'.$imagename;
        $client->client_details = $request->client_details;
        $client->client_status = 1;
        $client->save();
        return redirect()->back()->with('successMsg','Client Successfully Saved');
    }

    public function editClient($id)
    {
        $editClient = Clients::find($id);
        return view('clients.edit-clients',compact('editClient'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $item = Item::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'-'.
            $image->getClientOriginalExtension();
            if(!file_exists('uploads/item')){
                mkdir('uploads/item',0777,true);
            }
            unlink('uploads/item/'.$item->image);
            $image->move('uploads/item',$imagename);
        }else{
            $imagename = $item->image;
        }
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imagename;
        $item->save();
        return redirect()->route('item.index')->with('successMsg','Item Successfully Updated');
        //return $request;
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        if(file_exists('uploads/item/'.$item->image)){
            unlink('uploads/item/'.$item->image);
        }
        $item->delete();
        return redirect()->back()->with('successMsg','Item successfully Deleted');
    }
}
