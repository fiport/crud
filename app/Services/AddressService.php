<?php

namespace App\Services;

class AddressService 
{
    public function fetchAddress($cep)
    {
        try {
            $url = 'https://viacep.com.br/ws/'.$cep.'/json/ ';

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);

            $data = json_decode($result);
            
            return ['status' => true, 'data' => $data];

        } catch (\Exception $e) {
            return ['status' => false, 'msg' => $e];
        }
    }
}