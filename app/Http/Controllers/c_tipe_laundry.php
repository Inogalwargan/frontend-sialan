<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_tipe_laundry extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('localhost:8000/tipelaundry');
        $response = $request->getBody();


        $jsontoarray = json_decode($response->getContents(),true);
        return view('tipe_laundry.v_tipe_laundry', compact('jsontoarray'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipe_laundry.add_tipe_laundry');
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $messages = [
            'required' => ':attribute wajib diisi'
        ];
        $data = $this->validate($request, [
            'nama' => 'required',
        ], $messages);

        $request = $client->post('localhost:8000/tipelaundry/store', [
            'json' => [
                'nama' => $request->nama,
            ]
        ]);

        if ($request->getBody()->getContents()== "true"){
            return redirect('tipelaundry')->with('success', "Tambah Tipe Laundry berhasil");
        }
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('localhost:8000/tipelaundry/show/'.$id); //method put
        $response = $request->getBody();

        $jsontoarray = json_decode($response->getContents(),true);
        return view('tipe_laundry.edit_tipe_laundry', compact('jsontoarray'));
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = new \GuzzleHttp\Client();

        $messages = [
            'required' => ':attribute wajib diisi',
        ];
        $data = $this->validate($request, [
            'nama' => 'required',
        ], $messages);

        $request = $client->post('localhost:8000/tipelaundry/update/'.$id, [
            'json' => [
                'nama' => $request->nama,
            ]
        ]);
        return redirect('tipelaundry')->with('success', "Berhasil Diubah");
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->post('localhost:8000/tipelaundry/destroy/'.$id); //method
        $response = $request->getBody();
        return redirect('tipelaundry')->with('success', "Berhasil Dihapus");
    }
}
