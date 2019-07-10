<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_outlet extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $client = new \GuzzleHttp\Client();
        $request = $client->get('localhost:8000/outlet');
        $response = $request->getBody();


        $jsontoarray = json_decode($response->getContents(),true);
        return view('outlet.v_outlet', compact('jsontoarray'));
    }

    public function getKurir(){
        $client = new \GuzzleHttp\Client();
        $request = $client->get('localhost:8000/getIDkurir');
        $response = $request->getBody();

        $jsontoarray = json_decode($response->getContents(),true);
        return view('outlet.v_outlet', compact('jsontoarray'));
    }

    public function add(){
        return view('outlet.add_outlet');
    }

    public function  store(Request $request){
        $client = new \GuzzleHttp\Client();
        $messages = [
            'required' => ':attribute wajib diisi',
        ];
        $data = $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'status' =>  'required',
            'alamat' => 'required',
            'nohp' => 'required'
        ], $messages);

        $request = $client->post('localhost:8000/outlet/store', [
            'json' => [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'status' => $request->status,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,

            ]
        ]);
        if ($request->getBody()->getContents()== "true"){
            return redirect('outlet')->with('success', "Tambah Outlet berhasil");
        }
    }

    public function show($id){

        $client = new \GuzzleHttp\Client();
        $request = $client->get('localhost:8000/outlet/show/'.$id); //method put
        $response = $request->getBody();
//        dd(json_decode(($response->getContents())));

        $jsontoarray = json_decode($response->getContents(),true);
        return view('outlet.edit_outlet', compact('jsontoarray'));
    }

    public function update(Request $request, $id)
    {
        $client = new \GuzzleHttp\Client();

        $messages = [
            'required' => ':attribute wajib diisi',
        ];
        $data = $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'status' =>  'required',
            'alamat' => 'required',
            'nohp' => 'required'
        ], $messages);

        $request = $client->post('localhost:8000/outlet/update/'.$id, [
            'json' => [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'status' => $request->status,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp

            ]
        ]);
        return redirect('outlet')->with('success', "Berhasil Diubah");
    }

    public function destroy($id){
        $client = new \GuzzleHttp\Client();
        $request = $client->post('localhost:8000/outlet/destroy/'.$id); //method
        $response = $request->getBody();
//        dd(json_decode(($response->getContents())));
        $jsontoarray = json_decode($response->getContents(),true);

        return redirect('outlet')->with('success', "Berhasil Dihapus");
    }
}
