<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Requests;
use App\Activity;
use App\Http\Resources\Api\V1\ActivityResource;
use App\Http\Requests\Api\V1\StoreActivityRequest;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class ActivityController extends ApiController
{
    protected $activity;


    public function __construct(Activity $activity)
    {
       $this->activity = $activity;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity = Activity::all();
        return $activity;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivityRequest $request)
    {
        $activity = $this->activity->create($request->all());// create activity dulu

        $image_file = $request->file('image_path');

        $activity_file_name = $image_file->getClientOriginalName(); //baru bleh file name

        return $activity_file_name;
       
        $activity_file_path = $image_file->getPathName();

        $activity_image->addMedia($activity_file_path)->usingFileName($activity_file_name)->toMediaCollection('activity');

        $activity_formatted = [
            "id" => $activity_image->id,
            "nama" => $activity_image->activity_name,
            "sekolah" => $activity_image->activity_school,
            "lokasi" => $activity_image->activity_location,
            "tarikh" => $activity_image->activity_date,
            "maklumat lanjut" => $activity_image->activity_detail,
            "koleksi" => $activity_image->getFirstMediaPath('image'),
            ];
    
            return $activity_formatted;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
