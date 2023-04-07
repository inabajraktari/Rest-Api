<?php

namespace App\Models;

use App\Models\Agents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    use HasFactory;

    public function agents(){
        return $this ->belongsTo(Agents::class);
    }
}
