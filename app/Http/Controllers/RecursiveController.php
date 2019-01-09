<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TreeStorage;

class RecursiveController extends Controller {

    public function show() {
        $treeHolder = TreeStorage::loadTree();
        return view('recursive')->with('treeHolder', $treeHolder);
    }

    public function add(Request $request) {
        $name = $request->input('catName');
        $parent = $request->input('parentNode');
        $id = now()->timestamp;

        TreeStorage::addNode($id, $name, $parent);

        return RecursiveController::show();
    }
}
