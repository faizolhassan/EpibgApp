<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Requests;
use App\District;
use App\Http\Requests\Api\V1\StoreDistrictRequest;
use App\Http\Resources\Api\V1\DistrictResource;
use App\Http\Filters\Api\V1\DistrictFilter;

class DistrictController extends ApiController
{

    protected $district;

    public function __construct(District $district)
    {
        $this->district = $district;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, DistrictFilter $filters)
    {
        $district = $this->district->filter($filters)->result();

        return DistrictResource::collection($district);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistrictRequest $request)
    {
        $district = $this->district->create($request->all());
        return new DistrictResource($district);
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
