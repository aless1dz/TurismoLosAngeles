<!DOCTYPE html>
<html>
<head>
    <title>Confirmar Código</title>
</head>
<body>
    <form action="{{ route('confirmar.codigo') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ old('email') }}">
        <input type="text" name="confirmation_code" placeholder="Código de Confirmación">
        @error('confirmation_code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <button type="submit">Confirmar Código</button>
    </form>
</body>
</html>
