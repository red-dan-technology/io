<?php

namespace Rdt\IO\app\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Rdt\IO\App\Http\Request\FingerPrintEventRequest;
use Rdt\IO\App\Models\FingerPrintEvents;
use PDO;

class DeviceController extends Controller
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
     * @param FingerPrintEventRequest $request
     * @return void
     */
    function start(FingerPrintEventRequest $request)
    {
        $this->stop($request);
        return FingerPrintEvents::create($request->all());
    }

    /**
     * Undocumented function
     *
     * @param FingerPrintEventRequest $request
     * @return void
     */
    function stop(FingerPrintEventRequest $request)
    {
        return FingerPrintEvents::where('token', $request->token)->delete();
    }

    /**
     * Undocumented function
     *
     * @param [type] $token
     * @return void
     */
    function event($token): FingerPrintEvents
    {
        return FingerPrintEvents::find($token);
    }

    /**
     * Undocumented function
     *
     * @param FingerPrintEventRequest $request
     * @return void
     */
    function register(FingerPrintEventRequest $request)
    {
        $types = $request->types;
        $fingerprint = $request->fingerprint;
        $statustemplate = $request->statustemplate;
        $photo = $request->photo;
        $token = $request->token;
        DB::transaction(function ($conection) use ($types, $fingerprint, $statustemplate, $photo, $token) {
            $pdo = $conection->getPdo();
            $query = "UPDATE finger_print_events SET fingerprint = :fingerprint, types = :types, statustemplate= :statustemplate, photo = :photo WHERE token = :token";
            $statement = $pdo->prepare($query);
            $statement->bindParam(':types', $types);
            $statement->bindParam(':fingerprint', $fingerprint, PDO::PARAM_LOB);
            $statement->bindParam(':statustemplate', $statustemplate, PDO::PARAM_LOB);
            $statement->bindParam(':photo', $photo);
            $statement->bindParam(':token', $token);
            $statement->execute();
        });
        return $this->event($request->token);
    }

    /**
     * Undocumented function
     *
     * @param FingerPrintEventRequest $request
     * @return void
     */
    function update(FingerPrintEventRequest $request)
    {
        $event = $this->event($request->token);
        $event->fill($request->all())->save();
        return $this->event($request->token);
    }
}