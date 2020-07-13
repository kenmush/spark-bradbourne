<?php

namespace App\Http\Requests\Auth;
use Laravel\Spark\Http\Requests\Auth\RegisterRequest as SparkRegisterRequest;
use Laravel\Spark\Contracts\Http\Requests\Auth\RegisterRequest as Contract;
/**
* This is for programmatically registering users; used after registering via a social platform.
*
* Class RegisterRequest
* @package App\Http\Requests\Auth
*/
class RegisterRequest extends SparkRegisterRequest implements Contract
{
   //
}