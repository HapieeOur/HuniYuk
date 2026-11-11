<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHandler;
use App\Services\Implementasi\KostServices;
use App\Http\Resources\KostResource;
use App\Http\Requests\KostRequest;
use Throwable;

class KostController extends Controller
{

    protected $kostservices;

    public function __construct(KostServices $kostservices) {

        $this->kostservices = $kostservices;

    }


    public function store(KostRequest $request) {

        try {

            $data_kost = $this->kostservices->tambah_kost($request->validated());

            return ResponseHandler::success(
                "kost berhasil ditambahkan",

                new KostResource($data_kost)
            );

        }catch(Throwable $e) {

            return ResponseHandler::error(

                "kost gagal ditambahkan",
                $data_kost


            );

        }

    }
    //
}
