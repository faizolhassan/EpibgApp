<?php

namespace App\Http\Controllers\Api\V1;

use App\Requests;
use App\Donation;
use Illuminate\Http\Request;
use App\Http\Resources\Api\V1\DonationResource;
use App\Http\Requests\Api\V1\StoreDonationRequest;
use App\Http\Requests\Api\V1\UpdateDonationRequest;
use App\Http\Filters\Api\V1\DonationFilter;

class DonationController extends ApiController
{
    protected $donation;
  
    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }
   

    public function index(Request $request, DonationFilter $filters)
    {
        $donation = $this->donation->filter($filters)->paginate(15);

        return DonationResource::collection($donation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDonationRequest $request)
    {
        $donation = $this->donation->create($request->all());

        return new DonationResource($donation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donation = Donation::findOrFail($id);
        return new DonationResource($donation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonationRequest $request, $id)
    {
        $donation = $this->donation->findOrFail($id);

        $donation->fill($request->except('id'));

        $donation->save();
        
        return new DonationResource($donation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donation = $this->donation->findOrFail($id);

        $donation->delete();

        return $this->response->noContent();
    }
}
