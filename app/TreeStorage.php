<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Tree\Node;
use App\Tree\TreeHolder;

class TreeStorage extends Model {

    static private $fileName = 'tree.txt';

    static public function loadTree() {
        $result = new TreeHolder();
        $result->options = array();

        if (!Storage::exists(TreeStorage::$fileName)) {
            Storage::append(Treestorage::$fileName, '0|Main Category|-1');
        }
        $tree = null;
        $handle = Storage::readStream(Treestorage::$fileName);

        while ($line = fgets($handle)) {
            $item = explode("|", $line);
            $node = TreeStorage::findNodeById($tree, $item[2]);
            if ($node == null) {
                $node = new Node($item[0], $item[1], $item[2]);
                array_push($result->options, $node);
            } else {
                $temp = new Node($item[0], $item[1], $item[2]);
                $node->addChildNode($temp);
                array_push($result->options, $temp);
            }
            if ($tree == null) {
                $tree = $node;
            }
        }

        fclose($handle);
        $result->tree = $tree;
        if (count($result->options) < 1) {
            Storage::delete(Treestorage::$fileName);
            return TreeStorage::loadTree();
        }
        return $result;
    }

    static public function findNodeById($node, $id) {
        if ($node == null) {
            return null;
        }
        if (((int) $node->id) == ((int) $id)) {
            return $node;
        }
        $result = null;
        foreach ($node->children as $value) {
            $step = TreeStorage::findNodeById($value, $id);
            if ($step != null) {
                $result = $step;
                break;
            }
        }
        return $result;
    }

    static function addNode($id, $name, $parent) {
        $line = "$id|$name|$parent";
        Storage::append(Treestorage::$fileName, $line);
    }

}
