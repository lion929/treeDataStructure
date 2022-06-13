<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tree;
use Illuminate\Support\Facades\Session;

class TreeController extends Controller
{
    public function manageNode() {
        
        $nodes = Tree::where('parent_id', '=', 0)->get();
        $allNodes = Tree::pluck('name', 'id')->all();

        return view('treeView', compact('nodes', 'allNodes'));
    }

    public function addNode(Request $request) {

        $this->validate($request, [
            'name' => 'required|unique:nodes,name|min:2',
        ], [
            'name.required' => 'The name must be entered.',
            'name.unique' => 'The name must be unique.',
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Tree::create($input);
        return back()->with('success');
    }

    public function deleteNode(Request $request) {

        $this->validate($request, [
            'id' => 'required',
        ], [
            'id.required' => 'The node must be selected.',
        ]);

        $input = $request->all();
        Tree::where('parent_id', $input['id'])->delete();
        Tree::findOrfail($input['id'])->delete();
        return back()->with('success');
    }

    public function updateNode(Request $request) {

        $this->validate($request, [
            'id' => 'required',
            'name' => 'required|unique:nodes,name|min:2',
        ], [
            'id.required' => 'The node must be selected.',
            'name.required' => 'The name must be entered.',
            'name.unique' => 'The name must be unique.',
        ]);

        $input = $request->all();
        $cat = Tree::findOrfail($input['id']);
        $cat->name = $request->name;
        $cat->save();

        return back()->with('success');
    }

    public function moveNode(Request $request) {

        $this->validate($request, [
            'id' => 'required',
        ], 
        [
            'id.required' => 'The node must be selected.',
        ]);

        $input = $request->all();
        $cat = Tree::findOrfail($input['id']);
        $cat->parent_id = $request->id1;

        $cat['parent_id'] = empty($cat['parent_id']) ? 0 : $cat['parent_id'];

        if ($request->id == $request->id1) {
            Session::flash('err', 'Cannot add node to the this location.');
            return back()->with('success');
        } else {
            $cat->save();
            return back()->with('success');
        }
    }

    public function sortNodes(Request $request) {

        $input = $request->selection_list;

        if ($input == 1) {
            Session::flash('sorting', $input);
        } else if ($input == 2) {
            Session::flash('sorting', $input);
        } else if ($input == 3) {
            Session::flash('sorting', $input);
        } else if ($input == 4) {
            Session::flash('sorting', $input);
        } else if ($input == 5) {
            Session::flash('sorting', $input);
        } else if ($input == 6) {
            Session::flash('sorting', $input);
        } else {
            Session::flash('sorting', 0);
        }

        return back()->with('success');
    }
}
