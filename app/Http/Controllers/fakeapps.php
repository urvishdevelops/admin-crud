<?php

namespace App\Http\Controllers;

use App\Models\fakeapp;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class fakeapps extends Controller
{
  function index()
  {
    return view('dashboard');
  }
  function user()
  {
    return view('content');
  }

  function appview(Request $request)
  {
    $name = $request->name;
    $downloads = $request->downloads;
    $hidden_id = $request->hidden_id;



    if ($request->hasFile('image')) {

      $extension = $request->file('image')->getClientOriginalExtension();
      $imageName = time() . '.' . $extension;

      $uploadDirectory = 'uploads';

      $uploadPath = public_path($uploadDirectory);

      if (!File::exists($uploadPath)) {
        File::makeDirectory($uploadPath, 0777, true, true);
      }

      $request->file('image')->move($uploadPath, $imageName);
      $imagePath = $uploadDirectory . '/' . $imageName;
    }

    // insert and update query together
    $fakeappmodel = new fakeapp;

    if (is_numeric($hidden_id)) {
      $fakeappmodel = fakeapp::find($hidden_id);
    }

    $fakeappmodel->name = $request->name;
    $fakeappmodel->downloads = $request->downloads;
    $fakeappmodel->image = $imageName;
    $fakeappmodel->save();

    if (is_numeric($hidden_id)) {
      return ['res' => "Data updated successfully!"];
    } else {
      return ['res' => "Data inserted successfully!"];
    }
  }


  function listing()
  {

    $allfakeAppData = fakeapp::all();

    //  $id = $allfakeAppData[0]['id'];
    //  $name = $allfakeAppData[0]['name'];
    //  $download = $allfakeAppData[0]['download'];
    //  $image = $allfakeAppData[0]['image'];

    $tbody = [];


    foreach ($allfakeAppData as $key => $value) {
      $tbody[] = [
        'id' => $value['id'],
        'name' => $value['name'],
        'downloads' => $value['downloads'],
        'image' => '<img src="' . asset('uploads/' . $value['image']) . '" alt="Not Found!" style="max-height: 50px;">',
        'action' => '<button id="' . $value['id'] . '" class="btn btn-warning edit">Edit</button> | <button id="' . $value['id'] . '" class="btn btn-danger delete">Delete</button>',
      ];
    }


    $output = ['data' => $tbody];

    return $output;
  }

  function edit(Request $request)
  {

    $editId = $request->editId;

    $editColumn = fakeapp::select('*')->where('id', $editId)->get();

    return $editColumn;

  }
  function delete(Request $request)
  {

    $deleteId = $request->deleteId;

    $editColumn = fakeapp::where("id", $deleteId)->delete();

    if($editColumn > 0){
      return ['res' => "Data deleted successfully!"];
    }else{
      return ['res' => "Error in query!"];
    }

  }
}
