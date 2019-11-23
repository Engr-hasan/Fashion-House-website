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
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.
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
        $client->client_company_logo = $imagename;
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

    public function updateClient(Request $request, $id)
    {
        $this->validate($request,[
            'client_name' => 'required',
            // 'client_company_logo' => 'required|mimes:jpeg,jpg,bmp,png',
            'client_details' => 'required'
        ]);

        $updateClient = Clients::find($id);
        $image = $request->file('client_company_logo');
        $slug = str_slug($request->name);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.
            $image->getClientOriginalExtension();
            if(!file_exists('uploads/clientLogo')){
                mkdir('uploads/clientLogo',0777,true);
            }
            unlink('uploads/clientLogo/'.$updateClient->client_company_logo);
            $image->move('uploads/clientLogo',$imagename);
        }else{
            $imagename = $updateClient->client_company_logo;
        }
        
        $updateClient->client_name = $request->client_name;
        $updateClient->client_company_logo = $imagename;
        $updateClient->client_details = $request->client_details;
        $updateClient->client_status = $request->client_status;
        $updateClient->save();  
        return redirect()->back()->with('successMsg','Clients Successfully Updated');
    }

    public function deleteClient($id)
    {
        $deleteClient = Clients::find($id);
        if(file_exists('uploads/clientLogo/'.$deleteClient->client_company_logo)){
            unlink('uploads/clientLogo/'.$deleteClient->client_company_logo);
        }
        $deleteClient->delete();
        return redirect()->back()->with('successMsg','Clients successfully Deleted');
    }
}

