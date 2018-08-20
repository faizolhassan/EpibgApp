<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Requests;
use App\EpibgCommittee;
use App\Http\Resources\Api\V1\EpibgCommitteeResource;
use App\Http\Requests\Api\V1\StoreEpibgCommitteeRequest;
use App\Http\Requests\Api\V1\UpdateEpibgCommitteeRequest;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class EpibgCommitteeController extends ApiController
{
    protected $image;
    protected $epibgcommittee;

    public function __construct(EpibgCommittee $epibgcommittee)
    {
       $this->epibgcommittee = $epibgcommittee;
    }

    public function index()
    {
        $epibgcommittee = EpibgCommittee::all();

        $epibgcommitteelist = $epibgcommittee->map(function ($pibg){
            return [
                "id" => $pibg -> id,
                "name" =>$pibg-> name,
                "work_occupation" =>$pibg-> work_occupation,
                "Jawatan Pibg" =>$pibg -> pibg_position,
                "emel" =>$pibg -> email,
                "biodata" =>$pibg -> biodata,
                "media" => $pibg->getFirstMediaPath('image'),
            ];
        });
        return $epibgcommitteelist;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEpibgCommitteeRequest $request)
    {
        $pibgcom = $this->epibgcommittee->create($request->all());// create epibg comittee dulu

        $image_file = $request->file('image_path');
        
        $image_file_name = $image_file->getClientOriginalName(); //baru bleh file name
       
        $image_file_path = $image_file->getPathName();

        $pibgcom->addMedia($image_file_path)->usingFileName($image_file_name)->toMediaCollection('image');

        $epibgcomm_formatted = [
        "id" => $pibgcom-> id,
        "nama" => $pibgcom-> name,
        "jawatan" => $pibgcom-> pibg_position,
        "emel" => $pibgcom-> email,
        "biodata" => $pibgcom-> biodata,
        "koleksi" => $pibgcom->getFirstMediaPath('image'),
        ];

        return $epibgcomm_formatted;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pibgcom = EpibgCommittee::findOrFail($id);
        
        $epibgcomm_formatted = [
            "id" => $pibgcom->id,
            "nama" => $pibgcom->name,
            "jawatan" => $pibgcom->pibg_position,
            "emel" => $pibgcom->email,
            "biodata" => $pibgcom->biodata,
            "koleksi" => $pibgcom->getFirstMediaPath('image'),
            ]; //utk display jah
    
        return $epibgcomm_formatted;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEpibgCommitteeRequest $request, $id)
    {
        $epibgcommittee = $this->epibgcommittee->findOrFail($id);

        $image_file = $request->file('image_path');

        $image_file_name = $image_file->getClientOriginalName(); //baru bleh file name
       
        $image_file_path = $image_file->getPathName();
     
        $epibgcommittee->addMedia($image_file_path)->usingFileName($image_file_name)->toMediaCollection('image');

        $epibgcommittee->save();
        
        $epibgcomm_formatted = [
            "id" => $pibgcom->id,
            "nama" => $pibgcom->name,
            "jawatan" => $pibgcom->pibg_position,
            "emel" => $pibgcom->email,
            "biodata" => $pibgcom->biodata,
            "koleksi" => $pibgcom->getFirstMediaPath('image'),
            ];
    
        return $epibgcomm_formatted;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pibgcom = EpibgCommittee::findOrFail($id);

        $pibgcom ->delete();
        
        $pibgcom->clearMediaCollection('image'); // media kena delete doh lah...suddohhhh!!!

        return $this->response->noContent();

    }
}
