<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    use ApiResponser;

    public $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);
    }

    public function pay(Request $request)
    {
        return $this->successResponse($this->paymentService->pay($request->all()));
    }
}