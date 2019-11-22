<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

Session_start();
class MyController extends Controller {

	public function addcontact() {

		return view('pages.addcontact');
	}

	public function save_contact(Request $Request) {

		$data = array();
		$data['contact_name'] = $Request->contact_name;
		$data['contact_number'] = $Request->contact_number;

		DB::table('contact')->insert($data);

		Session::put('message', 'Contact added successfully!!');
		//return Redirect::to('addcontact');
		return Redirect::to('/allinfo');

	}

	public function allcontact() {

		$contact_info = DB::table('contact')->get();

		$show_contact = view('pages.allinfo')->with('hasan', $contact_info);
		return view('layouts.layout')->with('pages.allinfo', $show_contact);
		//return view('pages.allinfo');
	}

	public function edit_contact($id) {
		$contact_info = DB::table('contact')->where('id', $id)->first();

		$manage_contact = view('pages.edit_contact')->with('all_contact_info', $contact_info);
		return view('layouts.layout')->with('pages.edit_contact', $manage_contact);
	}

	public function update_contact(Request $Request, $id) {

		$data = array();
		$data['contact_name'] = $Request->contact_name;
		$data['contact_number'] = $Request->contact_number;

		DB::table('contact')->where('id', $id)->update($data);
		Session::put('message', 'Contact updated successfully!!');
		return Redirect::to('/allinfo');

	}
	public function delete_contact($id) {
		DB::table('contact')->where('id', $id)->delete();
		Session::put('message', 'Delete contact successfully!');
		return Redirect::to('/allinfo');
	}

}