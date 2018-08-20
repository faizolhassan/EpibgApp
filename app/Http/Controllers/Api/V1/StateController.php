<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Requests;
use App\State;
use App\Http\Filters\Api\V1\StateFilter;
use App\Http\Resources\Api\V1\StateResource;
use MaatWebsite\Excel\Facades\Excel;

class StateController extends ApiController
{
    protected $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, StateFilter $filters)
    {
        $state = $this->state->filter($filters)->result();

        return StateResource::collection($state);
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
    public function store(Request $request)
    {
      if($request->file('import_file'))
      {
                $path = $request->file('import_file')->getRealPath();
                

                Excel::load($path)->each(function (Collection $csvLine) {

                    DB::table('state')
                        ->where('id', $csvLine->get('id'))
                        ->update([
                            'state' => $csvLine->get('NEGERI'),
                        ]);

               });
               return view('imported')->with('success', 'Course updated');


       }
    
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
