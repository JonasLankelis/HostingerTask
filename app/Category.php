<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $table = 'cat';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_name', 'parent_id',
    ];
    
    public function childs() {
        return $this->hasMany('App\Category','parent_id','id');
    }
    
    public function sorted() {
        return $this->childs()->orderBy('cat_name','DESC');
    }
    
    function saves(string $name, $id)
    {
        $msg = "fail";
        if($id==0) $id=NULL;
        try {
            if(($this->checkParent($id))&&(!$this->checkCatName($name, $id))){
                DB::table('cat')->insert(
                ['cat_name' => $name, 'parent_id' => $id]); 
                $msg = "success";
            }
            else if(!$this->checkParent($id)) {
                $msg = "noparent";
            }
            else if($this->checkCatName($name, $id)){
                $msg = 'exists';
            }
        } catch (\PDOException $e) {
            $msg = "fail";
        }
        
        return $msg;
    }
    
    /**
    *
    * Checks whether parent is exist
    */
    function checkParent($id){
        if($id==NULL) return true;
        return DB::table('cat')->where([
            ['id', '=', (int)$id]
        ])->exists();
    }
    
     /**
    *
    * Checks whether folder name already exist
    */
    function checkCatName(string $name,$id){
        return DB::table('cat')->where([
            ['cat_name', '=', $name],
            ['parent_id', '=', $id]
        ])->exists();
    }

}
