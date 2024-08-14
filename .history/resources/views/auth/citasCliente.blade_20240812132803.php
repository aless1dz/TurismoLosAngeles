<!-- resources/views/citas/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Citas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citas as $cita)
                <tr>
                    <td>{{ $cita->fecha }}</td>
                    <td>{{ $cita->descripcion }}</td>
                    <td>{{ $cita->estado }}</td>
                    <td>
                        @if($cita->estado === 'programada')
                            <form action="{{ route('citas.cancel', $cita->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger">Cancelar</button>
                            </form>
                        @else
                            <span class="text-muted">Cancelada</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
