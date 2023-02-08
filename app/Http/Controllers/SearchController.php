<?php

namespace App\Http\Controllers;

use App\Models\CerejurUniversities;
use Illuminate\Http\Request;

use App\Models\Universitas;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $search = $request->get('search');
        if($search == "UIN"){
            $universities = CerejurUniversities::where('name', 'like', '%'.'Universitas Islam Negeri'.'%')->paginate(5);
        }elseif($search=="UIN BANDUNG" && $search=="uin bandung"){
            $universities = CerejurUniversities::where('name', 'like', '%'.'Universitas Islam Negeri Sunan Gunung jati'.'%')->paginate(5);
        }elseif($search=="IT"){
            $universities = CerejurUniversities::where('name', 'like', '%'.'Institut Teknologi'.'%')->paginate(5);
        }elseif($search=="ITB"){
            $universities = CerejurUniversities::where('name', 'like', '%'.'Institut Teknologi Bandung'.'%')->paginate(5);
        }elseif($search=="UNISBA"){
            $universities = CerejurUniversities::where('name', 'like', '%'.'Universitas Islam Bandung'.'%')->paginate(5);
        }else{
            $universities= CerejurUniversities::where('name', 'like', '%'.$search.'%')->paginate(5);
        }
        return view('/search',[
            'search' => $search,
            'universities' => $universities
        ]);
    }
}
