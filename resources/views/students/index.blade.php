<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formulario de Mascota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-blue-500 overflow-hidden shadow-xl sm:rounded-lg">
                
            

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Tipo</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Nombre</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Edad</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">discapacidad</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">enfermedad</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Fecha de rescate</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->tipo }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->nombre }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->edad }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->discapacidad}}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->enfermedad }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->f_rescate }}</td>
                                

                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center">
                                        <a href="{{ route('students.edit', $student->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                                        <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $student->id }}')">Eliminar</button>

                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

            

                <div class="mb-5">
                    <br/>
                        <a href="{{ route('students.create') }}" class="bg-green-500 dark:bg-green-700 hover:bg-green-600 dark:hover:bg-green-800 text-white font-bold py-3 px-6 rounded">Nuevo</a>
                    </div>
            </div>
            
        </div>

        
    </div>
</x-app-layout>

<script>
    // forma 1
    function confirmDelete(id) {
        alertify.confirm("¿Confirm delete record?",
        function(){
            let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/students/' + id;
                    form.innerHTML = '@csrf @method("DELETE")';
                    document.body.appendChild(form);
                    form.submit();
            alertify.success('Ok');
        },
        function(){
            alertify.error('Cancel');
        });
    }

// forma 2
/* function confirmDelete(id) {
    alertify.confirm("¿Confirm delete record?", function (e) {
        if (e) {
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '/students/' + id;
            form.innerHTML = '@csrf @method("DELETE")';
            document.body.appendChild(form);
            form.submit();
        } else {
            alertify.error('Cancel');
            return false;
        }
    });
} */
</script>