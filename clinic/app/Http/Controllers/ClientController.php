<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function insert ($client,$request){
        $client->username = $request->username;
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->gender = $request->gender;
        $client->birthday = $request->birthday;
        $client->phone = $request->phone;
        $client->address = $request->address;
        if($request->password != null){
            $client->password  = Hash::make($request->password);
        }

        $client->save();
    }
    public function index()
    {
        return view('client.clientList')
            ->with('list_clients',Client::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.clientCreate')
            ->with('list_clients','list_clients');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required|unique:clients,username,',
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'birthday' => 'required|date',
            'phone' => 'required',
            'address'=> 'required',
            'password' => 'required|confirmed',
        ]);

        $client = new Client();
        $this->insert($client,$request);
        return redirect()->route('client.index')->with('success','ເພີ່ມ​ຂໍ້​ມູນ​ສຳ​ເລັດ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('client.clientCreate')
            ->with('list_clients','list_clients')
            ->with('edit',Client::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'birthday' => 'required|date',
            'phone' => 'required',
            'address'=> 'required',
            'password' => 'confirmed',
        ]);

        $client = Client::find($id);
        $this->insert($client,$request);
        return redirect()->route('client.index')->with('success','ແກ້​ໄຂ​ຂໍ້​ມູນ​ສຳ​ເລັດ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return back()->with('success','ລືບ​ຂໍ້​ມູນ​ສຳ​ເລັດ');
    }
}
