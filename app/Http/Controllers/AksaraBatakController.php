<?php

namespace App\Http\Controllers;

use App\Models\Translit;
use Illuminate\Http\Request;

class AksaraBatakController extends Controller
{
    public function getByDialect(Request $request, $dialect){
        $perPage = $request->get('per_page',12);
        $translits = Translit::with('aksaraBatak')
            ->where('dialect', $dialect)
            ->paginate($perPage);

        return response()->json($translits);
    }
}
