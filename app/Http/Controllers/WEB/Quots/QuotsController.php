<?php

namespace App\Http\Controllers\WEB\Quots;

use App\Http\Controllers\Controller;
use App\Repository\QuotsRepo;
use Illuminate\Http\Request;

class QuotsController extends Controller
{
    private QuotsRepo $quots;

    protected $data = array();

    public function __construct(QuotsRepo $quots, )
    {
        $this->data['dir_view'] = "quots.";
        $this->data['title'] = "Quots";
        $this->quots = $quots;
    }

    public function dashQuots() {
        $data = $this->quots->getQuots();
        $ref = $this->data;

        return view('index', compact('data', 'ref'));
    }

    public function Quots() {
        $data = $this->quots->getQuots();
        $ref = $this->data;

        return view($this->data['dir_view'] . 'index', compact('data', 'ref'));
    }

    public function showSearch() {
        $ref = $this->data;

        return view($this->data['dir_view'] . 'find', compact('ref'));
    }

    public function findQuots(Request $request, $category) {
        if ($request->ajax()) {
            $data = $this->quots->getQuotsByCategory($category);
            if (isset($data['error'])) {
                return response()->json(['error' => 'Data tidak ditemukan']);
            } else {
                return response()->json($data);
            }
        } else {
            return json_encode(['data' => null]);
        }
    }
}
