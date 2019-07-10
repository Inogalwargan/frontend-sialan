<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_pengeluaran extends Controller
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
        $request = $client->get('localhost:8000/pengeluaran');
        $response = $request->getBody();

        $jsontoarray = json_decode($response->getContents(),true);
        return view('pengeluaran.v_pengeluaran', compact('jsontoarray'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.add_pengeluaran');
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
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'nota' =>  'required',
            'user_id' => 'required|numeric',
        ], $messages);

        $request = $client->post('localhost:8000/pengeluaran/store', [
            'json' => [
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'nota' => $request->nota,
                'user_id' => $request->user_id,
            ]
        ]);

//        dd($request);
        if ($request->getBody()->getContents()== "true"){
            return redirect('pengeluaran')->with('success', "Tambah Pengeluaran berhasil");
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
        $request = $client->get('localhost:8000/pengeluaran/show/'.$id); //method put
        $response = $request->getBody();

        $jsontoarray = json_decode($response->getContents(),true);
        return view('pengeluaran.edit_pengeluaran', compact('jsontoarray'));
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
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'nota' =>  'required',
            'user_id' => 'required|numeric',
        ], $messages);

        $request = $client->post('localhost:8000/pengeluaran/update/'.$id, [
            'json' => [
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'nota' => $request->nota,
                'user_id' => $request->user_id,

            ]
        ]);
        return redirect('pengeluaran')->with('success', "Berhasil Diubah");
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
        $request = $client->post('localhost:8000/pengeluaran/destroy/'.$id); //method
        $response = $request->getBody();
        return redirect('pengeluaran')->with('success', "Berhasil Dihapus");
    }
}
