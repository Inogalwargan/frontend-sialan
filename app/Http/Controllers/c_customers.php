<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_customers extends Controller
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
        $request = $client->get('localhost:8000/customers');
        $response = $request->getBody();


        $jsontoarray = json_decode($response->getContents(),true);
        return view('customers.v_customers', compact('jsontoarray'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('localhost:8000/getIDkurir');
        $response = $request->getBody();

        $jsontoarray = json_decode($response->getContents(),true);
//        dd($jsontoarray);
        return view('customers.add_customers', compact('jsontoarray'));
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
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute Wajib diisi Angka'
        ];
        $data = $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required',
            'alamat' =>  'required',
            'nohp' => 'required|numeric',
            'kurir_id' => 'required|numeric',
            'point' => 'required|numeric',
            'deposit' => 'required|numeric',
        ], $messages);

        $request = $client->post('localhost:8000/customers/store', [
            'json' => [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,
                'kurir_id' => $request->kurir_id,
                'point' => $request->point,
                'deposit' => $request->deposit,
            ]
        ]);

//        dd($request);
        if ($request->getBody()->getContents()== "true"){
            return redirect('customers')->with('success', "Tambah Outlet berhasil");
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
        $request = $client->get('localhost:8000/getIDkurir');
        $response = $request->getBody();
        $kurir = json_decode($response->getContents(),true);

        $client = new \GuzzleHttp\Client();
        $request = $client->get('localhost:8000/customers/show/'.$id); //method put
        $response = $request->getBody();
//        dd(json_decode(($response->getContents())));

        $jsontoarray = json_decode($response->getContents(),true);
        return view('customers.edit_customers', compact('jsontoarray', 'kurir'));
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = new \GuzzleHttp\Client();

        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute Wajib diisi Angka'
        ];
        $data = $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required',
            'alamat' =>  'required',
            'nohp' => 'required|numeric',
            'kurir_id' => 'required|numeric',
            'point' => 'required|numeric',
            'deposit' => 'required|numeric',
        ], $messages);

        $request = $client->post('localhost:8000/customers/update/'.$id, [
            'json' => [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,
                'kurir_id' => $request->kurir_id,
                'point' => $request->point,
                'deposit' => $request->deposit,

            ]
        ]);
        return redirect('customers')->with('success', "Berhasil Diubah");
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
        $request = $client->post('localhost:8000/customers/destroy/'.$id); //method
        $response = $request->getBody();
        return redirect('customers')->with('success', "Berhasil Dihapus");
    }
}
