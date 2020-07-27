<?php

use Illuminate\Database\Seeder;
use App\EstadoCcpu;
use App\TipoCcpu;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $modelo = new EstadoCcpu();
        $modelo->descr = "ACTIVO";
        $modelo->save();
        $modelo = new EstadoCcpu();
        $modelo->descr = "INACTIVO";
        $modelo->save();
        $modelo = new TipoCcpu();
        $modelo->descr = "ADMINISTRADOR";
        $modelo->idEst = 1;
        $modelo->save();
        $modelo = new TipoCcpu();
        $modelo->descr = "CONTADOR";
        $modelo->idEst = 1;
        $modelo->save();

$modelo = new User();
$modelo->codMat = "00000000";
$modelo->dni = "71043266";
$modelo->nomb = "Danny Manuel";
$modelo->apepa = "Chavez Herrera";
$modelo->email = "dannychavez141@gmail.com";
$modelo->password = Hash::make("lightofmoon");
$modelo->fmat = "2020-01-01";
$modelo->ext = "0";
$modelo->idEst = "1";
$modelo->idTipo = "1";
$modelo->save();


    }
}
