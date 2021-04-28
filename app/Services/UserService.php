<?php
namespace App\Services;

use App\Models\User as Model;
use MetasisMedia\LaravelGenerator\Support\Crud as Base;
class UserService extends Base
{
    public function __construct()
    {
        parent::__construct(new Model());
    }

}
