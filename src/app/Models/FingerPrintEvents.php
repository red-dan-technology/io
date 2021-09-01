<?php

namespace Rdt\IO\App\Models;

use Illuminate\Database\Eloquent\Model;

class FingerPrintEvents extends Model
{
    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $primaryKey = 'token';

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Undocumented variable
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * Undocumented variable blob
     *
     * @var array
     */
    protected $fillable = ['token', 'statustemplate', 'types', 'fingerprint', 'photo'];


    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $binaries = ['photo'];
}