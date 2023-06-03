<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 

use Illuminate\Support\Facades\DB; // Import the DB class


/** 
*@OA\Info(
 *     title="My API",
 *     version="1.0.0",
 *     description="API documentation for My API",
 *     @OA\Contact(
 *         email="contact@example.com"
 *     )
 * )
 * 
*@OA\Get(path="/api/viewStudent",
 *     tags={"students"},
 *     summary="Get a list of students",
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     )
 * )
 * 
*@OA\Get(path="/api/messageWithProperResponse",
 *     tags={"students"},
 *     summary="Get a simple hello",
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     )
 * )
 *
*@OA\Post(path="/api/createStudent",
 *     tags={"students"},
 *     summary="Insert Student",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 required={"fname", "lname", "email", "password"},
 *                 @OA\Property(
 *                     property="fname",
 *                     type="string",
 *                     example="John"
 *                 ),
 *                 @OA\Property(
 *                     property="lname",
 *                     type="string",
 *                     example="Doe"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     example="john@example.com"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string",
 *                     example="password123"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="success",
 *                 type="boolean",
 *                 example=true
 *             ),
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Student created successfully"
 *             ),
 *             @OA\Property(
 *                 property="student",
 *                 type="object",
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     example=1
 *                 ),
 *                 @OA\Property(
 *                     property="fname",
 *                     type="string",
 *                     example="John"
 *                 ),
 *                 @OA\Property(
 *                     property="lname",
 *                     type="string",
 *                     example="Doe"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     example="john@example.com"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     )
 * )
 *
 * 
 * 
 * 
*@OA\Get(path="/api/viewStudent/{id}", 
 *     tags={"students"},
 *     summary="Get Student by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the student",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="fname",
 *                 type="string",
 *                 example="John"
 *             ),
 *             @OA\Property(
 *                 property="lname",
 *                 type="string",
 *                 example="Doe"
 *             ),
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 example="john@example.com"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Student not found"
 *     )
 * )
 * 
*@OA\Delete(path="/api/deleteStudent/{id}",
 *     tags={"students"},
 *     summary="Delete Student by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the student",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Student deleted successfully"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Student not found"
 *     )
 * )
 * 
*@OA\Put(path="/api/updateStudentById/{id}",
 *     tags={"students"},
 *     summary="Update Student by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the student",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="fname",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="lname",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="fname",
 *                 type="string",
 *                 example="John"
 *             ),
 *             @OA\Property(
 *                 property="lname",
 *                 type="string",
 *                 example="Doe"
 *             ),
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 example="john@example.com"
 *             ),
 *             @OA\Property(
 *                 property="password",
 *                 type="string",
 *                 example="newPassword"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Student not found"
 *     )
 * )
 * 
*@OA\Delete(path="/api/deleteStudentByFname/{Fname}",
 *     tags={"students"},
 *     summary="Delete Student by First Name",
 *     @OA\Parameter(
 *         name="Fname",
 *         in="path",
 *         description="First name of the student",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Student deleted by First Name successfully"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Student not found"
 *     )
 * )
 **/

class ApiController extends Controller
{
    public function create(Request $request){
        $students = new Student();
        $students->fname = $request->input('fname');
        $students->lname = $request->input('lname');
        $students->email = $request->input('email');
        $students->password = $request->input('password');
        $students->save();
        return response()->json($students);
    }

    public function viewStudent(){
        $students = Student::all();
        return response()->json($students);
    }
 
    public function viewStudentById($id){
        $student = Student::find($id);
        return response()->json($student);
    }

    public function updateStudentById(Request $request, $id){
        $student = Student::find($id);
        $student ->fname = $request->input('fname');
        $student ->lname = $request->input('lname');
        $student ->email = $request->input('email');
        $student ->password = $request->input('password');
        $student->save();
        return response()->json($student);
    }

    public function deleteStudentById($id){
        $student = Student::find($id);
        $student->delete();
        return response()->json("success");
    }

    public function deleteStudentByFname($Fname){
        $student = Student::where('Fname', $Fname)->first();
        $student->delete();
        return response()->json("delete by Fname success!");
    }

    public function getChecksum()
    {
        $query = 'CHECKSUM TABLE students';
        $result = DB::select($query);
        $checksum = reset($result)->Checksum;
        return response()->json(['result' => $checksum]);
    }
 
}
