<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Segment;
use App\Helpers\Helper;
use Exception;

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

        if ($responseIcon['status'] == true) {
            $validatedData['icon'] = $responseIcon['file_name_to_storage'];
        } else {
            return response(['message' => 'Erro ao salvar o ícone'], 422);
        }

        if ($responseBackgroundImage['status'] == true) {
            $validatedData['background_image'] = $responseBackgroundImage['file_name_to_storage'];
        } else {
            return response(['message' => 'Erro ao salvar plano de fundo'], 422);
        }

        return Segment::create($validatedData);
    }

    public function show($id)
    {
        $segment =  Segment::find($id);

        if (!empty($segment)) {
            return $segment;
        } else {
            return response(['message' => 'Segmento não encontrada'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $segment = Segment::find($id);

        if (!empty($segment)) {
            $responseIcon = null;
            $responseBackgroundImage = null;

            try {
                if ($request->hasFile('icon')) {
                    Helper::deleteImageStorage($segment->icon);
                    $responseIcon = Helper::uploadImage($request, 'icon');
                }

                if ($request->hasFile('icon')) {
                    Helper::deleteImageStorage($segment->icon);
                    $responseBackgroundImage = Helper::uploadImage($request, 'background_image');
                }
            } catch (Exception $ex) {
                return response(['message' => 'Erro ao fazer upload das imagens'], 422);
            }

            if ($responseIcon != null) {
                $validatedData['icon'] = $responseIcon['file_name_to_storage'];
            }

            if ($responseBackgroundImage != null) {
                $validatedData['background_image'] = $responseIcon['file_name_to_storage'];
            }

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
                try {
                    Helper::deleteImageStorage($segment->icon);
                    Helper::deleteImageStorage($segment->background_image);
                } catch (Exception $ex) {
                    return response(['message' => 'Erro ao fazer remover imagens do storage', 'exception' => $ex->getMessage()], 422);
                }
                return response(['message' => 'Segmento excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Segmento não encontrada'], 422);
        }
    }
}
