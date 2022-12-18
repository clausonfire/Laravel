<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateId
{
    /**
     * Handle an incoming request. cege el id de la ruta
     * verifica que sea un nro
     * y verifica que sea mayor o igual a 0 y si cumple deja que la
     * peticion siga su curso
     * si falla devuelve un error con status 422
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //1.coger el id
        $id = $request->id;
        //2.validar
        if(!is_numeric($id) || $id < 0){
            return response('error',422);
        }
        //3.dejar seguir o tirar patras
        return $next($request);
        // return $next($request);
        // return response('todo mal',422);
    }
}
