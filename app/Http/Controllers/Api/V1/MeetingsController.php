<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Requests;
use App\Meeting;
use App\Http\Requests\Api\V1\StoreMeetingRequest;
use App\Http\Requests\Api\V1\UpdateMeetingRequest;
use App\Http\Resources\Api\V1\MeetingResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class MeetingsController extends ApiController
{
    protected $meeting;

    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }
    
    public function index()
    {
        $meeting = Meeting::paginate(15);
        return MeetingResource::collection($meeting);
    }
   
    public function store(StoreMeetingRequest $request)
    {
        $meeting = $this->meeting->create($request->all());

        // Log::info($meeting, ['request' => $request->all()]);
       
        return new MeetingResource($meeting);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meeting = Meeting::findOrFail($id);
        return new MeetingResource($meeting);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetingRequest $request, $id)
    {
        $meeting = $this->meeting->findOrFail($id);

        $meeting->fill($request->except('id'));

        $meeting->save();
        
        return new MeetingResource($meeting);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meeting = $this->meeting->findOrFail($id);
        //$meeting = meeting::with('meeting')->find($id);

        $meeting->delete();

        return $this->response->noContent();
    }
}
