<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Segment;
use App\Helpers\Helper;

class SegmentController extends Controller
{
    public function index()
    {
        $segment =  Segment::all();
        return $segment;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $responseIcon = Helper::uploadImage($request, 'icon');
        $responseBackgroundImage = Helper::uploadImage($request, 'background_image');

        if($responseIcon['status'] == true) {
            $validatedData['icon'] = $responseIcon['file_name_to_storage'];
        } else {
            return response(['message' => 'Erro ao salvar o ícone'], 422);
        }

        if($responseBackgroundImage['status'] == true) {
            $validatedData['background_image'] = $responseIcon['file_name_to_storage'];
        } else {
            return response(['message' => 'Erro ao salvar plano de fundo'], 422);
        }

        return Segment::create($validatedData);
    }

    public function show($id)
    {
        $segment =  Segment::find($id);
        return $segment;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cnpj' => 'formato_cnpj',
            'telephone' => 'telefone_com_ddd',
            'company_address_id' => 'integer|exists:company_addresses,id',
            'user_id' => 'integer|exists:users,id',
            'segment_id' => 'integer|exists:segments,id'
        ]);

        $segment = Segment::find($id);

        if (!empty($segment)) {
            $segment->fill($validatedData);
            $segment->save();
            return $segment;
        } else {
            return response(['message' => 'Segmento não encontrada'], 422);
        }
    }

    public function destroy($id)
    {
        $segment = Segment::find($id);

        if (!empty($segment)) {
            if ($segment->delete()) {
                return response(['message' => 'Segmento excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Segmento não encontrada'], 422);
        }
    }
}
