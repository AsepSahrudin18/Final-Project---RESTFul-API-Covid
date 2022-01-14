<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//ini file import dari model
use App\Models\Patient;



class PatientController extends Controller
{
    // Membuat method index untuk menampilkan semua resource
    public function index()
    {
        //fungsi all di elequent untuk mengambil data di database
        $patients = Patient::all();

        $data = [
            'message' => 'Get All Resource',
            'data' => $patients
        ];


        return response()->json($data, 200);
    }


    // Membuat method store untuk menambahkan resource
    public function store(Request $request)
    {   
        $input = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'in_date_at' => $request->in_date_at,
            'out_date_at' => $request->out_date_at
        ];

        $patient = Patient::create($input);

        $data = [
            'message' => 'Resource is added successfully',
            'data' => $patient
        ];

        return response()->json($data, 201);
    }
    

    // Membuat method show untuk mendapatkan data berdasarkan id
    public function show($id){
        $patient = Patient::find($id);

        if ($patient){
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $patient
    
            ];
    
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Resource not found',
            ];
            
            return response()->json($data, 404);
    }   
}

    // Membuat Method update
    public function update(Request $request, $id)
    {
        // Cara update data
        // Cari data yang ingin di update apakah datanya ada atau tidak
        // Jika ada, maka update datanya
        // Jika tidak ada, maka munculkan data tidak ada
        
        $patient = Patient::find($id);

        if ($patient){
            $input =[
                'name' => $request->name ?? $patient->name,
                'phone' => $request->phone ?? $patient->phone,
                'address' => $request->address ?? $patient->address,
                'status' => $request->status ?? $patient->status,
                'in_date_at' => $request->in_date_at ?? $patient->in_date_at,
                'out_date_at' => $request->out_date_at ?? $patient->out_date_at
            ];

            $patient->update($input);

            $data = [
                'message' => 'Resource is update successfully',
                'data' => $patient
            ];

            return response()->json($data, 200);
        }
        else{
            $data = [
                'message' => 'Resource not found',
            ];
            
            return response()->json($data, 404);
        }
    }


    // Membuat method destroy untuk menghapus data
    public function destroy($id){
        // Cari id
        // Jika ada hapus data
        // Jika datanya tidak ada, maka munculkan pesan data tidak ada

        $patient = Patient::find($id);

        if ($patient){
            $patient->delete();

            $data = [
                'message' => 'Resource is delete successfully'
            ];

            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Resource not found',
            ];
            
            return response()->json($data, 404);
        }
    }
}