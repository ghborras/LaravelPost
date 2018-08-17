<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class ExtensionImage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   

    public function handle($request, Closure $next)
    {
        
        if ($request->hasFile('post_img')){
            $file = $request->file('post_img');
        }

        else $file = $request->file('img_url');

        if(null !== $file){
            $extension = $file->getClientOriginalExtension(); 
            if ($extension <> 'jpg' && $extension <> 'png'){
                flash('La extensión de la imagen es '.$extension.' : solo validas jpg-png')->error()->important();

                return Redirect::back()->withInput(Input::all());
            }
       }
        
        return $next($request);
        
    }
}
