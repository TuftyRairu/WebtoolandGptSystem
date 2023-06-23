<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\GPTService;
use App\Models\Token;


class GPTController extends Controller
{
    use ApiResponser;

    public $gptservice;

    public function __construct(GPTService $gptservice)
    {
        $this->gptservice = $gptservice;
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);
    }

    public function chat(Request $request)
    {
        $token = auth()->user()->tokens;

        if ($token > 0)
        {
            Token::where('id', auth()->user()->id)->limit(1)->update(array("tokens" => $token - 1));
            return $this->successResponse($this->gptservice->chat($request->all()));
        }

        return $this->errorResponse("No account tokens", 403);

    }
}