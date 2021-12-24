<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>    
    <div class="container mx-auto">
        <div class="m-10">
            <livewire:userdatatable model="App\Models\User" 
                editable
            />
        </div>
    </div>    
    @livewireScripts 
</body>
</html>