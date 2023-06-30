<?php

namespace App\Swep\Repositories;
 
use App\Swep\BaseClasses\BaseRepository;
use App\Swep\Interfaces\DocumentFolderInterface;


use App\Models\DocumentFolder;


class DocumentFolderRepository extends BaseRepository implements DocumentFolderInterface {
	



    protected $doc_folder;




	public function __construct(DocumentFolder $doc_folder){

        $this->doc_folder = $doc_folder;
        parent::__construct();

    }






    public function fetch($request){

       $key = str_slug($request->fullUrl(), '_');
       $entries = isset($request->e) ? $request->e : 20;

        $doc_folder = $this->doc_folder->newQuery();

        if(isset($request->q)){
            $this->search($doc_folder, $request->q);
        }

        return $this->populate($doc_folder, $entries);

        $doc_folders = $this->cache->remember('document_folders:fetch:' . $key, 240, function() use ($request, $entries){

            $doc_folder = $this->doc_folder->newQuery();
            
            if(isset($request->q)){
                $this->search($doc_folder, $request->q);
            }

            return $this->populate($doc_folder, $entries);

        });

        return $doc_folders;

    }






    public function store($request){

        $doc_folder = new DocumentFolder;
        $doc_folder->slug = $this->str->random(16);
        $doc_folder->folder_code = $request->folder_code;
        $doc_folder->description = $request->description;
        $doc_folder->created_at = $this->carbon->now();
        $doc_folder->updated_at = $this->carbon->now();
        $doc_folder->ip_created = request()->ip();
        $doc_folder->ip_updated = request()->ip();
        $doc_folder->user_created = $this->auth->user()->user_id;
        $doc_folder->user_updated = $this->auth->user()->user_id;
        $doc_folder->save();

        return $doc_folder;

    }






    public function update($request, $slug){

        $doc_folder = $this->findBySlug($slug);
        $doc_folder->folder_code = $request->folder_code;
        $doc_folder->description = $request->description;
        $doc_folder->updated_at = $this->carbon->now();
        $doc_folder->ip_updated = request()->ip();
        $doc_folder->user_updated = $this->auth->user()->user_id;
        $doc_folder->save();

        return $doc_folder;

    }






    public function destroy($slug){

        $doc_folder = $this->findBySlug($slug);
        $doc_folder->delete();

        return $doc_folder;

    }






    public function findBySlug($slug){
        return $this->doc_folder->where('slug', $slug)->first();
        $doc_folder = $this->cache->remember('document_folders:findBySlug:' . $slug, 240, function() use ($slug){
            return $this->doc_folder->where('slug', $slug)->first();
        });
        
        if(empty($doc_folder)){
            abort(404);
        }
        
        return $doc_folder;

    }






    public function search($model, $key){

        return $model->where(function ($model) use ($key) {
                $model->where('folder_code', 'LIKE', '%'. $key .'%')
                      ->orwhere('description', 'LIKE', '%'. $key .'%');
        });

    }






    public function populate($model, $entries){

        return $model->select('folder_code', 'description', 'slug')
                     ->orderBy('updated_at', 'desc')
                     ->paginate($entries);

    }






    public function getAll(){
        return $this->doc_folder->select('folder_code')->get();
        $doc_folders = $this->cache->remember('document_folders:getAll', 240, function(){
            return $this->doc_folder->select('folder_code')->get();
        });
        
        return $doc_folders;

    }







}