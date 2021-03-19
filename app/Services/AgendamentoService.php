<?php

namespace App\Services;

use App\Agendamento;

class AgendamentoService 
{
    public function storeAgendamento($request)
    {
        try {

            $store = new Agendamento();

            $store->inputName = $request['inputName'];
            $store->inputNumber = $request['inputNumber'];
            $store->inputEmail = $request['inputEmail'];
            $store->inputEndereco = $request['inputEndereco'];
            $store->inputCEP = $request['inputCEP'];
            $store->intpuN = $request['intpuN'];
            $store->inputCity = $request['inputCity'];
            $store->inputBairro = $request['inputBairro'];
            $store->inputEstado = $request['inputEstado'];

            $store->save();
            
            return ['status' => true, 'msg' => 'Agendamento realizado!'];

        } catch (\Exception $e) {

            return ['status' => false, 'msg' => $e];

        }
    }

    public function getAgendamento(){

        try {

            $data = Agendamento::select('agendamentos.*')
            ->get();

            return ['status' => true, 'msg' => 'Dados localizados!', 'data' => $data];

        } catch(\Exception $e) {

            return ['status' => false, 'msg' => $e];

        }

    }

    public function editAgendamento($id, $data){
        try {

            Agendamento::where('id', $id)
            ->update($data);

            return ['status' => true];

        } catch(\Exception $e) {

            return ['status' => false, 'msg' => $e];

        }

    }

    public function delAgendamento($id){
        try {

           $delete = Agendamento::where('id', $id);
           $delete->delete();

            return ['status' => true];

        } catch(\Exception $e) {

            return ['status' => false, 'msg' => $e];

        }

    }
}