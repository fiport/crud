<?php

namespace App\Services;

use App\Entities\Scheduling;

class SchedulingService
{
    public function storeScheduling($request)
    {
        try {

            $store = new Scheduling();

            $store->input_name = $request['inputName'];
            $store->input_number = $request['inputNumber'];
            $store->input_email = $request['inputEmail'];
            $store->input_address = $request['inputAddress'];
            $store->input_cep = $request['inputCEP'];
            $store->intpu_n = $request['inputN'];
            $store->input_city = $request['inputCity'];
            $store->input_district = $request['inputDistrict'];
            $store->input_state = $request['inputState'];

            $store->save();

            return ['status' => true, 'msg' => 'Agendamento realizado!'];

        } catch (\Exception $e) {

            return ['status' => false, 'msg' => $e];

        }
    }

    public function getScheduling(){

        try {
            $data = Scheduling::select('schedules.*')
                ->get();

            return ['status' => true, 'msg' => 'Dados localizados!', 'data' => $data];

        } catch(\Exception $e) {

            return ['status' => false, 'msg' => $e];

        }

    }

    public function editScheduling($id, $data){
        try {

            Scheduling::where('id', $id)
            ->update($data);

            return ['status' => true];

        } catch(\Exception $e) {

            return ['status' => false, 'msg' => $e];

        }

    }

    public function delScheduling($id){
        try {

           $delete = Scheduling::where('id', $id);
           $delete->delete();

            return ['status' => true];

        } catch(\Exception $e) {

            return ['status' => false, 'msg' => $e];

        }

    }
}
