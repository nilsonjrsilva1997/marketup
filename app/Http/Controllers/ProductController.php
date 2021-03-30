<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use App\Helpers\Helper;
use App\Models\Tag;

class ProductController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $product =  Product::where(['user_id' => $userId])
            ->with('item_type')
            ->with('unity')
            ->with('category')
            ->with('subcategory')
            ->with('brand')
            ->with('tags')
            ->with('price')
            ->get();

        return $product;
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $request['user_id'] = $userId;

        $validatedData = $request->validate([
            'bar_code' => 'required|string|max:255',
            'status' => 'required|in:ACTIVE,DISABLED',
            'description' => 'required|string|max:255',
            'item_type_id' => 'required|integer|exists:item_types,id',
            'user_id' => 'required|integer|exists:users,id',
            'unity_id' => 'required|integer|exists:unities,id',
            'category_id' => 'required|integer|exists:categories,id',
            'subcategory_id' => 'integer|exists:subcategories,id',
            'balance_code' => 'required|string|max:4',
            'brand_id' => 'required|integer|exists:brands,id',
            'model' => 'required|string|max:255',
            'internal_code' => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $photoResponse = Helper::uploadImage($request, 'photo');

            if ($photoResponse['status'] == true) {
                $validatedData['photo'] = $photoResponse['file_name_to_storage'];
            }
        } else {
            return response(['message' => 'A imagem do produto é obrigatória']);
        }

        $product = Product::create($validatedData);

        foreach($request->tags['names'] as $tag) {
            Tag::create([
                'name' => $tag,
                'product_id' => $product->id
            ]);
        }

        return $product;
    }

    public function show($id)
    {
        $product =  Product::with('item_type')
        ->with('unity')
        ->with('category')
        ->with('subcategory')
        ->with('brand')
        ->with('tags')
        ->with('price')
        ->where(['id' => $id])
        ->first();

        if (!empty($product)) {
            $userId = Auth::id();

            if ($product->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para vizualizar esses dados']);
            }

            return $product;
        } else {
            return response(['message' => 'Produto não encontrado'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bar_code' => 'string|max:255',
            'status' => 'in:ACTIVE,DISABLED',
            'description' => 'string|max:255',
            'item_type_id' => 'integer|exists:item_types,id',
            'user_id' => 'integer|exists:users,id',
            'unity_id' => 'integer|exists:unities,id',
            'category_id' => 'integer|exists:categories,id',
            'subcategory_id' => 'integer|exists:subcategories,id',
            'balance_code' => 'string|max:4',
            'brand_id' => 'integer|exists:product,id',
            'model' => 'string|max:255',
            'internal_code' => 'string|max:255',
        ]);

        $product = Product::find($id);

        if (!empty($product)) {
            $userId = Auth::id();

            if ($product->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para alterar esses dados']);
            }

            $product->fill($validatedData);
            $product->save();
            return $product;
        } else {
            return response(['message' => 'Produto não encontrado'], 422);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!empty($product)) {
            $userId = Auth::id();

            if ($product->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para deletar esses dados']);
            }

            if ($product->delete()) {
                return response(['message' => 'Produto excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Produto não encontrado'], 422);
        }
    }
}
