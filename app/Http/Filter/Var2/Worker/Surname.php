<?php

namespace App\Http\Filter\Var2\Worker;

use Illuminate\Database\Eloquent\Builder;

class Surname
{
    public function handle(Builder $builder, \Closure $next)
    {
        if (request('surname')) {
            $builder->where('surname', request('surname'));
        }
        return $next($builder);
    }
}
