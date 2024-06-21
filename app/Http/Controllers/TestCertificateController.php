<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestCertificateController extends Controller
{
    public function verify(Request $request): StudentResource | JsonResponse
    {
        $student = Student::where('validation_token', $request->token)->first();

        if ($student) return new StudentResource($student);

        return response()->json([
            'message' => 'Registro no encontrado',
        ], 404);
    }
}
