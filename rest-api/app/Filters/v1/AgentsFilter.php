<?php

namespace App\Filters\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Filters\ApiFilter; 

class AgentsFilter extends ApiFilter {
    
    protected $safeParms = [
        'first_name' => ['eq'],
        'last_name' => ['eq'],
        'email' => ['eq'],
        'phone_number' => ['eq'],
    ];
    

    protected $columnMap = [
        'phone_number' => 'phone_number'
    ];

    protected $operatorMap = [
        'eq' => '=',
    ];

    public function transform(Request $request){
        $eloQuery = [];

        foreach ($this->safeParms as $parm => $operators) {
            $query = $request->query($parm);

            if (!isset($query)){
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])){
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}
