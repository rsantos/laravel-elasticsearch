<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = \Elasticsearch::search([
            'index' => 'portalpelotas',
            'type' => 'clients'
        ]);
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'body' => $request->all(),
            'index' => 'portalpelotas',
            'type' => 'clients'
        ];
        $response = \Elasticsearch::index($data);
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = \Elasticsearch::get([
            'index' => 'portalpelotas',
            'type' => 'clients',
            'id' => $id
        ]);
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'index' => 'portalpelotas',
            'type' => 'clients',
            'id' => $id,
            'body' => [
                'doc' => $request->all()
            ]
        ];
        $response = \Elasticsearch::update($data);
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = \Elasticsearch::delete([
            'index' => 'portalpelotas',
            'type' => 'clients',
            'id' => $id
        ]);
        return response()->json($response);
    }
}
