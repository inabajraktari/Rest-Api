<?php

namespace App\Filters\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class ShipmentsFilter extends ApiFilter {

        protected $safeParms = [
        'agents_id' => ['eq'],
        'type' => ['eq'],
        'status' => ['eq'],
    ];

    protected $columnMap = [];

    protected $operatorMap = [
        'eq' => '=',];

}
