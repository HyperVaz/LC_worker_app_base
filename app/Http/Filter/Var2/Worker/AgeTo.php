<?php

namespace App\Http\Filter\Var2\Worker;

use Illuminate\Database\Eloquent\Builder;

class AgeTo
{
    public function handle(Builder $builder, \Closure $next)
    {
        if (request('to')) {
            $builder->where('age', '<', request('to'));
        }
        return $next($builder);
    }
}
