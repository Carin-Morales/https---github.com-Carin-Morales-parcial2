<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    
    {
        $students= Student ::all();
        
        return view('students.index',compact('students'));

        //alternativas a compact
        //return view('students.index')->with('students', $students);
        //return view('students.index', ['students' => $students]);
    }


    public function create()
    {
        
        return view('students.create');
    }


    public function store(Request $request)
    {
        $request->validate([
        
            'tipo' => 'required|string|min:1|max:255',
            'nombre' => 'required|string|min:1|max:255',
            'edad' => 'required|integer|min:1',
            'discapacidad' => 'required|string|min:1|max:255',
            'enfermedad' => 'required|string|min:1|max:255',
            'f_rescate' => 'required|date|min:1|max:255',
    ]);

        // Crear un nuevo estudiante usando el método `create` del modelo
            Student::create($request->all());

        // Redireccionar a la vista de listado de estudiantes
            return redirect()->route('students.index');
        

}


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }


    public function update(Request $request, string $id)
    {
         // Validar los datos del formulario
        $request->validate([
            'tipo' => 'required|string|min:1|max:255',
            'nombre' => 'required|string|min:1|max:255',
            'edad' => 'required|integer|min:1',
            'discapacidad' => 'required|string|min:1|max:255',
            'enfermedad' => 'required|string|min:1|max:255',
            'f_rescate' => 'required|date|min:1|max:255',
        
        ]);

    
        // Buscar el estudiante por su ID
        $student = Student::findOrFail($id);

        // Actualizar los datos del estudiante
        $student->update($request->all());

        // Redireccionar a la vista de listado de estudiantes
        return redirect()->route('students.index');
    }


    public function destroy(string $id)
    {
        
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index');
    }


    public function search(Request $request)
{
    $search = $request->search ? $request->search : '';

    // Realizar la búsqueda solo en la columna 'nombre'
    $students = Student::where('nombre', 'LIKE', '%' . $search . '%')->get();

    // Devolver los resultados de la búsqueda a la vista
    return view('students.index', compact('students'));
}

}
