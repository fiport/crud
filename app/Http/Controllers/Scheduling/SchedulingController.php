<?php

namespace App\Http\Controllers\Scheduling;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SchedulingService;

class SchedulingController extends Controller
{
    protected $schedulingService;

    public function __construct(SchedulingService $schedulingService)
    {
        $this->schedulingService = $schedulingService;
    }

    public function storeScheduling(Request $request)
    {
        $store = $this->schedulingService->storeScheduling($request->all());

        if ($store['status']) {
            return response()->json(true);
        }

        return response()->json(false);
    }

    public function getScheduling()
    {
        $data = $this->schedulingService->getScheduling();

        if ($data['status']) {
            return response()->json($data['data']);
        }

        return response()->json(false);
    }

    public function editScheduling(Request $request, $id)
    {
        $data = $request->all();
        $edit = $this->schedulingService->editScheduling($id, $data);

        if ($edit['status']) {
            return response()->json(true);
        }

        return response()->json(false);
    }

    public function delScheduling($id)
    {
        $delete = $this->schedulingService->delScheduling($id);

        if ($delete['status']) {
            return response()->json(true);
        }

        return response()->json(false);
    }
}
