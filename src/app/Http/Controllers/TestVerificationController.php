<?php

namespace Rdt\IO\app\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Rdt\IO\App\Http\Request\TestVerificationRequest;
use Rdt\IO\App\Models\TestVerification;
use PDO;

class TestVerificationController extends Controller
{

    /**
     * Undocumented function
     */
    function __construct()
    {
        $this->middleware(Config::get('IO.middleware'));
    }

    /**
     * Undocumented function
     *
     * @param String $id
     * @return void
     */
    function show($id)
    {
        return TestVerification::where('identifier', $id)->get();
    }

    /**
     * Undocumented function
     *
     * @param TestVerificationRequest $request
     * @return void
     */
    function store(TestVerificationRequest $request)
    {
        return TestVerification::create($request->all());
    }

    /**
     * Undocumented function
     *
     * @param String $id
     * @return void
     */
    function destroy($id)
    {
        return TestVerification::destroy($id);
    }
}