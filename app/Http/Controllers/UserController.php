<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function all(Request $request)
    {

        $datos = User::orWhereRaw("concat(codMat,dni,nomb,apepa) LIKE ?", ["%".$request['busq']."%"])->where("idEst","!=","1")->orderBy('id', 'ASC')->paginate(20);

        return [
            'pagination' => [
                'total'         => $datos->total(),
                'current_page'  => $datos->currentPage(),
                'per_page'      => $datos->perPage(),
                'last_page'     => $datos->lastPage(),
                'from'          => $datos->firstItem(),
                'to'            => $datos->lastPage(),
            ],
            'datos' => $datos
        ];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoCcpu  $tipoCcpu
     * @return \Illuminate\Http\Response
     */
    public function show( $tipoCcpu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoCcpu  $tipoCcpu
     * @return \Illuminate\Http\Response
     */
    public function edit( $tipoCcpu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoCcpu  $tipoCcpu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $tipoCcpu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoCcpu  $tipoCcpu
     * @return \Illuminate\Http\Response
     */
    public function destroy( $tipoCcpu)
    {
        //
    }
}
