<?php

namespace Rdt\IO\App\Models;

use Illuminate\Database\Eloquent\Model;

class TestVerification extends Model
{
    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $table = "test_verification";

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $primaryKey = 'id';

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
    protected $fillable = ['name', 'template', 'identifier', 'photo', 'orientation', 'finger'];

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $binaries = ['template'];
}