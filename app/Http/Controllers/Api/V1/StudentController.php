<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Requests;
use App\Student;
use App\Http\Requests\Api\V1\StoreStudentRequest;
use App\Http\Requests\Api\V1\UpdateStudentRequest;
use App\Http\Resources\Api\V1\StudentResource;
use App\Http\Filters\Api\V1\StudentFilter;

class StudentController extends ApiController
{
    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function index(Request $request, StudentFilter $filters)
    {
        $student = $this->student->filter($filters)->result();

        return StudentResource::collection($student);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $student = $this->student->create($request->all());
        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        $student = $this->student->findOrFail($id);

        $student->fill($request->except('id'));

        $student->save();
        
        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = $this->student->findOrFail($id);

        $student->delete();

        return $this->response->noContent();
    }
}
