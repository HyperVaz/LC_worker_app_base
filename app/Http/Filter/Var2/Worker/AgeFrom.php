<?php

namespace App\Http\Filter\Var2\Worker;

use Illuminate\Database\Eloquent\Builder;

class AgeFrom
{
    public function handle(Builder $builder, \Closure $next)
    {
        if (request('from')) {
            $builder->where('age', '>', request('from'));
        }
        return $next($builder);
    }
}
