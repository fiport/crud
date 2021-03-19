<?php

namespace App\Http\Controllers\agendamento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AgendamentoService;

class AgendamentoController extends Controller
{
    protected $agendamentoService;

    public function __construct(AgendamentoService $agendamentoService)
    {
        $this->agendamentoService = $agendamentoService;
    }

    public function storeAgendamento(Request $request)
    {
        $store = $this->agendamentoService->storeAgendamento($request->all());

        if ($store['status']) {
            return response()->json(true);
        }

        return response()->json(false);
    }

    public function getAgendamento()
    {
        $data = $this->agendamentoService->getAgendamento();

        if ($data['status']) {
            return response()->json($data['data']);
        }

        return response()->json(false);
    }

    public function editAgendamento(Request $request, $id)
    {
        $data = $request->all();
        $edit = $this->agendamentoService->editAgendamento($id, $data);
        
        if ($edit['status']) {
            return response()->json(true);
        }

        return response()->json(false);
    }

    public function delAgendamento($id)
    {
        $delete = $this->agendamentoService->delAgendamento($id);
        dd($delete);
        if ($delete['status']) {
            return response()->json(true);
        }

        return response()->json(false);
    }
}
