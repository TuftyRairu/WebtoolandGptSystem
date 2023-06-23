<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\WebtoolsService;
use App\Models\Token;


class WebtoolsController extends Controller
{
    use ApiResponser;

    public $webtoolsservice;

    public function __construct(WebtoolsService $webtoolsservice)
    {
        $this->webtoolsservice = $webtoolsservice;
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);
    }

    public function urlencode(Request $request)
    {    
        $token = auth()->user()->tokens;

        if ($token > 0)
        {
            Token::where('id', auth()->user()->id)->limit(1)->update(array("tokens" => $token - 1));
            return $this->successResponse($this->webtoolsservice->urlencode($request->all()));
        }

        return $this->errorResponse("No account tokens", 403);

    }

    public function urldecode(Request $request)
    {    
        $token = auth()->user()->tokens;

        if ($token > 0)
        {
            Token::where('id', auth()->user()->id)->limit(1)->update(array("tokens" => $token - 1));
            return $this->successResponse($this->webtoolsservice->urldecode($request->all()));
        }

        return $this->errorResponse("No account tokens", 403);

    }

    public function baseencode(Request $request)
    {    
        $token = auth()->user()->tokens;

        if ($token > 0)
        {
            Token::where('id', auth()->user()->id)->limit(1)->update(array("tokens" => $token - 1));
            return $this->successResponse($this->webtoolsservice->baseencode($request->all()));
        }

        return $this->errorResponse("No account tokens", 403);

    }

    public function basedecode(Request $request)
    {    
        $token = auth()->user()->tokens;

        if ($token > 0)
        {
            Token::where('id', auth()->user()->id)->limit(1)->update(array("tokens" => $token - 1));
            return $this->successResponse($this->webtoolsservice->basedecode($request->all()));
        }

        return $this->errorResponse("No account tokens", 403);

    }
    public function linkgenerator(Request $request)
    {    
        $token = auth()->user()->tokens;

        if ($token > 0)
        {
            Token::where('id', auth()->user()->id)->limit(1)->update(array("tokens" => $token - 1));
            return $this->successResponse($this->webtoolsservice->linkgenerator($request->all()));
        }

        return $this->errorResponse("No account tokens", 403);

    }
}