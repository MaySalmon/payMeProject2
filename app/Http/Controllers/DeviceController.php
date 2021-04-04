<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Validator;

class DeviceController extends Controller
{
    function list($id=null)
    {
           return $id?Device::find($id):Device::all();
    }
    //another option:
    //function list()
    //{
    //       return Device::all();
    //}
    //function listParameters($id)
    //{
    //       return Device::find($id);
    //}
    //and in the Route we put 2 urls:
    //Route::get("list/", [DeviceController::class, 'list']);
    //Route::get("list/{id}", [DeviceController::class, 'listParameters']);
    function add(Request $req)
    {
        $device= new Device;
        $device->id=$req->id;
        $device->Name=$req->Name;
        $device->age=$req->age;
        $result=$device->save();
        if($result)
        {
            return ["Result"=>"Data has been saved"];
        }
        else
        {
            return ["Result"=>"Data has'nt been saved"];

        }
    }

    function update(Request $req)
    {
        $device= Device::find($req->id);
        $device->Name = $req->Name;
        $device->age=$req->age;
        $result=$device->save();
        if($result)
        {
            return ["Result"=>"data is updated"];
        }
        else
        {
            return ["Result"=>"data is not updated"];
        }
    }

    function search($name)
    {
        return Device::where("Name", "like","%" .$name. "%")->get();
    }

    function delete($id)
    {
        $device= Device::find($id);
        $result=$device->delete();
        if ($result)
        {
            return ["Result"=> "record has been deleted"];
        }
        else
        {
            return ["Result"=> "record has not been deleted"];
        }
    }

    function testData(Request $req)
    {
        $rules=array(
            "id"=>"required",
            "name"=>"required"
        );
        $validator= Validator::make($req->all(), $rules);
        if($validator->fails())
        {
            return $validator->errors(); 
        }
        else
        {
            $device= new Device;
            $device->id=$req->id;
            $device->Name=$req->Name;
            $device->age=$req->age;
            $result=$device->save();
            if($result)
            {
                return ["Result"=>"Data has been saved"];
            }
            else
            {
                return ["Result"=>"Data has'nt been saved"];
    
            }
        }
    }
}
