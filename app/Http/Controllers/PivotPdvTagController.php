<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PivotPdvTag;

class PivotPdvTagController extends Controller
{
    public function partner(Request $request)
    {
        $validatedData = $request->validate([
            'pdv_id' => 'required|integer|exists:pdvs,id',
            'tag_id' => 'required|integer|exists:pdv_tags,id',
        ]);

        return PivotPdvTag::create($validatedData);
    }

    public function disassociate(Request $request)
    {
        $validatedData = $request->validate([
            'pdv_id' => 'required|integer|exists:pdvs,id',
            'tag_id' => 'required|integer|exists:pdv_tags,id',
        ]);

        $pivotPdvTag = PivotPdvTag::where(['pdv_id' => $validatedData['pdv_id']])->where(['tag_id' => $validatedData['tag_id']])->first();

        if(!empty($pivotPdvTag)) {
            $pivotPdvTag->delete();
        } else {
            return response(['message' => 'Dados não encontrados'], 422);
        }
    }
}
