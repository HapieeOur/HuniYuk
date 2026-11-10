<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers;
use App\Services\Implementation\KostServices;
use App\Http\Resources\KostResource;
use App\Http\Requests\KostRequest;

class KostController extends Controller
{

    protected $kostservices;

    public function __construct(KostServices $kostservices) {

        $this->kostservices = $kostservices;

    }


    public function store(KostRequest $request) {

        try {

            

          

        }

    }
    //
}
