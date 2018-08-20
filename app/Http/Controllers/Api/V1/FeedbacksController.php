<?php

namespace App\Http\Controllers\Api\V1;

use App\Requests;
use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Resources\Api\V1\FeedbackResource;
use App\Http\Requests\Api\V1\StoreFeedbackRequest;
use App\Http\Requests\Api\V1\UpdateFeedbackRequest;
use App\Http\Filters\Api\V1\FeedbackFilter;

class FeedbacksController extends ApiController
{
    protected $feedback;

    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
        //check access permission
        //$this->middleware('role_guard');
    }
   
    public function index(Request $request, FeedbackFilter $filters)
    {
        $feedbacks = $this->feedback->filter($filters)->result();

        return FeedbackResource::collection($feedbacks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeedbackRequest $request)
    {
        $feedback = $this->feedback->create($request->all());

        return new FeedbackResource($feedback);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return new FeedbackResource($feedback);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeedbackRequest $request, $id)
    {
        $feedback = $this->feedback->findOrFail($id);

        $feedback->fill($request->except('id'));

        $feedback->save();
        
        return new FeedbackResource($feedback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = $this->feedback->findOrFail($id);

        $feedback->delete();

        return $this->response->noContent();
    }
}
