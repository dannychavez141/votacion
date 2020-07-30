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

        $datos = User::orWhereRaw("concat(codMat,dni,nomb,apepa) LIKE ?", ["%".$request['busq']."%"])->where("idTipo","=","2")->orderBy('id', 'ASC')->paginate(20);

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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $dato = new User();
        $dato->codMat = $request->get('codMat');
        $dato->dni = $request->get('dni');
        $dato->nomb = $request->get('nomb');
        $dato->apepa = $request->get('apepa');
        $dato->email = $request->get('email');
        $dato->fmat = $request->get('fmat');
        $dato->password = bcrypt($request->get('codMat'));
        $dato->ext = "0";
        $dato->idTipo = "2";
        $dato->idEst = "1";
        $dato->save();
       /* $dato = new User();
        $dato->codMat = $request->codMat;
        $dato->dni = $request->dni;
        $dato->nomb = $request->nomb;
        $dato->apepa = $request->apepa;
        $dato->email = $request->email;
        $dato->fmat = $request->fmat;
        $dato->password = Hash::make($request->codMat);
        $dato->ext = "0";
        $dato->idTipo = "2";
        $dato->idEst = "1";
        $dato->save();*/

        return  $dato;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show( $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit($User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $User)
    {
        $dato = User::find($User);
        $dato->codMat = $request->get('codMat');
        $dato->dni = $request->get('dni');
        $dato->nomb = $request->get('nomb');
        $dato->apepa = $request->get('apepa');
        $dato->email = $request->get('email');
        $dato->fmat = $request->get('fmat');
        $dato->password = bcrypt($request->get('codMat'));
        $dato->idEst = $request->get('idEst');
        $dato->save();
        return  $dato;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy( $User)
    {
        //
    }
}
