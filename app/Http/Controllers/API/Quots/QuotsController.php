<?php

namespace App\Http\Controllers\API\Quots;

use App\Http\Controllers\Controller;
use App\Repository\QuotsRepo;
use Illuminate\Http\Request;

class QuotsController extends Controller
{
    private QuotsRepo $quots;

    public function __construct(QuotsRepo $quots, )
    {
        $this->quots = $quots;
    }

    public function showQuots() {
        $data = $this->quots->getQuots();

        if ($data !== null) {
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Ini quots anda hari ini',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Terjadi kesalahan',
                'data' => $data
            ]);
        }
        
    }

    public function showByCategory(Request $request) {
        try {
            $category = $request->input('category');

            if (!$category) {
                return response()->json([
                    'success' => false,
                    'status' => 400,
                    'message' => 'Kategori tidak boleh kosong',
                    'data' => null
                ]);
            }
    
            $data = $this->quots->getQuotsByCategory($category);
            
            if ($data !== null) {
                return response()->json([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Quots berdasarkan pencarian anda',
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'status' => 400,
                    'message' => 'Terjadi kesalahan',
                    'data' => null
                ]);
            }
            
        } catch (\Throwable $th) {
            if (env('APP_DEBUG')) {
                return response()->json(['error' => $th->getMessage()], 500);
            }
            return response()->json(['error' => 'Terjadi kesalahn saat mencari quots anda'], 500);
        }
    }
}
