<!-- resources/views/formalities/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Formalidades</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha</th>
                <th>Tipo de Transporte</th>
                <th>Pasajeros</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formalities as $formality)
                <tr>
                    <td>{{ $formality->user_name }}</td>
                    <td>{{ $formality->user_email }}</td>
                    <td>{{ $formality->user_date }}</td>
                    <td>{{ $formality->type_transport }}</td>
                    <td>{{ $formality->user_pasajeros }}</td>
                    <td>{{ $formality->status }}</td>
                    <td>
                        @if($formality->status === 'active')
                            <form action="{{ route('formalities.cancel', $formality->id) }}" method="POST" style="display:inline;">
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
