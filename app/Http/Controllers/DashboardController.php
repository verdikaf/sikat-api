<?php

namespace App\Http\Controllers;

use App\t_logistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class DashboardController extends Controller
{
    public function chartLogistik(){
        $logistik=DB::table('t_logistik')
        ->join('t_kategori_logistik','t_logistik.id_kategori','=','t_kategori_logistik.id')
        ->join('t_supplier','t_logistik.id_supplier','=','t_supplier.id')
        ->select('t_logistik.id_logistik', 't_logistik.nama_barang', 't_logistik.stok', 't_logistik.expired', 't_logistik.created_at')
        ->get();

        return Response::json($logistik);
    }
}
