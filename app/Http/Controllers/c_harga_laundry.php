<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_harga_laundry extends Controller
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
        return view('harga_laundry.v_harga_laundry', compact('jsontoarray'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('localhost:8000/hargalaundry/'.$id); //method put
        $response = $request->getBody();

        $allhargalaundry = json_decode($response->getContents(), true);
//        dd($allhargalaundry);

        $client = new \GuzzleHttp\Client();
        $request = $client->get('localhost:8000/tipelaundry/show/'.$id); //method put
        $response = $request->getBody();
//        dd(json_decode(($response->getContents())));

        $jsontoarray = json_decode($response->getContents(),true);
        return view('harga_laundry.add_harga_laundry', compact('jsontoarray', 'allhargalaundry'));
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
            'tipe_laundry_id' => 'required|numeric',
            'harga' => 'required',
            'jenis_kilogram' =>  'required',
            'user_id' => 'required|numeric',
        ], $messages);

        $request = $client->post('localhost:8000/hargalaundry/store', [
            'json' => [
                'tipe_laundry_id' => $request->tipe_laundry_id,
                'harga' => $request->harga,
                'jenis_kilogram' => $request->jenis_kilogram,
                'user_id' => $request->user_id,
            ]
        ]);

//        dd($request);
        if ($request->getBody()->getContents()== "true"){
            return redirect()->back()->with('success', "Tambah Harga Laundry berhasil");
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
        $request = $client->get('localhost:8000/hargalaundry/show/'.$id); //method put
        $response = $request->getBody();
//        dd(json_decode(($response->getContents())));

        $jsontoarray = json_decode($response->getContents(),true);
        return view('harga_laundry.edit_harga_laundry', compact('jsontoarray'));
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
            'tipe_laundry_id' => 'required|numeric',
            'harga' => 'required',
            'jenis_kilogram' =>  'required',
            'user_id' => 'required|numeric',
        ], $messages);

//        dd($data);

        $request = $client->post('localhost:8000/hargalaundry/update/'.$id, [
            'json' => [
                'tipe_laundry_id' => $request->tipe_laundry_id,
                'harga' => $request->harga,
                'jenis_kilogram' => $request->jenis_kilogram,
                'user_id' => $request->user_id,

            ]
        ]);
        return redirect('hargalaundry/add/'.$id)->with('success', "Berhasil Diubah");
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
        $request = $client->post('localhost:8000/hargalaundry/destroy/'.$id); //method
        $response = $request->getBody();
        return redirect()->back()->with('success', "Berhasil Dihapus");
    }
}
