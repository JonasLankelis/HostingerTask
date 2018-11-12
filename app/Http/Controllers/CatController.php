<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlServiceProvider;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Support\Collection;

class CatController extends Controller
{
    
    public function create()
    {
        $cat = new Category;
        $cat->cat_name = Input::get('cat_name');
        $cat->parent_id = Input::get('parent_id');
        $message = $cat->saves($cat->cat_name, $cat->parent_id);
        $this->notification($message);
        
        return redirect::back();
    }
    
    public function notification($message)
    {
       // session()->put('warning',$message);
        if($message == 'success')
            session()->put('success','Folder created successfully.');
        else if ($message == 'noparent')
            session()->put('warning','Parent doesnt exist!');
        else if ($message == 'exists')
            session()->put('warning','Another folder with the same name already exist on the same path.');
        else 
            session()->put('error','Something went wrong, try again!');
    }
    
    public function getAll()
    {
        $categories = Category::where('parent_id', '=', NULL)->get();
        $allCategories = Category::pluck('cat_name','id')->all();
        return view('recursiveTree',compact('categories','allCategories'));
    }
    
    public function recursiveTree()
    {
        $categories = Category::where('parent_id', '=', NULL)->get();
        $allCategories = Category::all();
        $recursiveTree = $this->createRecursive($allCategories, null);
        $allCategories = $recursiveTree;
        $allCategories = Category::pluck('cat_name','id');

        return view('recursiveTree',compact('categories','allCategories'));
    }
    
    
    /*
     * Source: https://stackoverflow.com/questions/29384548/php-how-to-build-tree-structure-list
     */
    public function createRecursive($categories, $parent_id)
    {
        $branch = array();
        foreach ($categories as $element) {
            if ($element->parent_id == $parent_id) {
                $children = $this->createRecursive($categories, $element->id);
                if ($children) {
                    $element->children = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
    
    public function iterativeTree()
    {
        $categories = Category::where('parent_id', '=', NULL)->orderBy('cat_name','ASC')->get();
        $allCategories = Category::all();
        
        
        
        return view('iterativeTree',compact('categories','allCategories'));
    }

}
