<?php

namespace App\Http\Controllers\address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AddressService;

class AddressController extends Controller
{
    protected $addressService;

    public function __construct(AddressService $addressService){

        $this->addressService = $addressService;
    }

    public function fetchAddress($cep) 
    {
        $data = $this->addressService->fetchAddress($cep);

        $arrayAddress = [
            'cep' => $data['data']->cep,
            'logradouro' => $data['data']->logradouro,
            'complemento' => $data['data']->complemento,
            'bairro' => $data['data']->bairro,
            'localidade' => $data['data']->localidade,
            'uf' => $data['data']->uf,
            'ibge' => $data['data']->ibge,
            'ddd' => $data['data']->ddd
        ];

        if ($data['status']) {
            return ['status' => true, 'msg' => 'Consulta realizada!', 'data' => $arrayAddress];
        }

        return ['status' => false, 'msg' => 'Consulta não realizada!'];
    }
}
