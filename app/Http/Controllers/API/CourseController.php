<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function view($courseId)
    {
        $course = Course::with(['category', 'instructor'])->find($courseId);

        return response()->json([
            'data' => $course,
        ], 200);
    }

    public function viewList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'string',
            // 'category_id' => 'integer',
            'start_time' => 'date_format:"Y-m-d H:i:s"',
            'end_time' => 'date_format:"Y-m-d H:i:s"',
            'insructor_user_id' => 'integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->messages(),
            ], 400);
        }
        $input = $request->input();

        $queryArray = $this->createQueryArray($input);

        $name = '';
        if(isset($input['name']) && $input['name'] != ""){
            $name = $input['name'];
        }
        $startTime = '1970-01-01 00:00:01';
        if(isset($input['start_time']) && $input['start_time'] != ""){
            $startTime = $input['start_time'];
        }
        $endTime = '9999-12-31 00:00:01';
        if(isset($input['end_time']) && $input['end_time'] != ""){
            $endTime = $input['end_time'];
        }

        $course = Course::with(['category', 'instructor'])
        ->where($queryArray)
        ->where('subject', 'like', '%' . $name . '%')
        ->where('start_time', '>=', $startTime)
        ->where('end_time', '<=', $endTime)
        ->get();

        return response()->json([
            'data' => $course,
        ], 200);
    }

    public function myList(Request $request)
    {
        $user = $request->user();

        $course = Course::with(['category', 'instructor'])
            ->where('instructor_user_id', $user->id)
            ->get();

        return response()->json([
            'data' => $course,
        ], 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'subject' => 'required|string',
            'start_time' => 'required|date_format:"Y-m-d H:i:s"',
            'end_time' => 'required|date_format:"Y-m-d H:i:s"',
            'number_of_student' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->messages(),
            ], 400);
        }
        $input = $request->input();
        $user = $request->user();
        if ($user->type != "Instructor") {
            return response()->json([
                'message' => "Only Instuctor can create course",
            ], 401);
        }
        $course = new Course();
        $course->name = $input['name'];
        $course->description = $input['description'];
        $course->category_id = $input['category_id'];
        $course->subject = $input['subject'];
        $course->start_time = $input['start_time'];
        $course->end_time = $input['end_time'];
        $course->number_of_student = $input['number_of_student'];
        $course->instructor_user_id = $user->id;
        if ($course->save()) {
            return response()->json([
                'data' => $course,
            ], 200);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'subject' => 'required|string',
            'start_time' => 'required|date_format:"Y-m-d H:i:s"',
            'end_time' => 'required|date_format:"Y-m-d H:i:s"',
            'number_of_student' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->messages(),
            ], 400);
        }
        $input = $request->input();
        $user = $request->user();

        $course = Course::find($input['id']);
        if ($course == null) {
            return response()->json([
                'message' => 'Course not found',
            ], 404);
        }
        if ($course->instructor_user_id != $user->id) {
            return response()->json([
                'message' => 'You are not course owner',
            ], 404);
        }

        $course->fill($input);
        $course->save();

        return response()->json([
            'data' => $course,
        ], 200);
    }

    public function createQueryArray($input)
    {
        $queryArray = array();
        if (isset($input['category_id']) && $input['category_id'] != "") {
            $queryArray = array_merge($queryArray, ['category_id' => $input['category_id']]);
        }
        if (isset($input['instructor_user_id']) && $input['instructor_user_id'] != "") {
            $queryArray = array_merge($queryArray, ['instructor_user_id' => $input['instructor_user_id']]);
        }

        return $queryArray;
    }
}
