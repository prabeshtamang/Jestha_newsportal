<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Hello, {{ $admin->name }}</h1>

    <p><strong>Name:</strong>{{ $contact->name }}</p>
    <p><strong>Email:</strong>{{ $contact->email }}</p>
    <p><strong>Phone:</strong>{{ $contact->phone }}</p>
    <p><strong>Company_Name:</strong>{{ $contact->company_name }}</p>
    <p><strong>Service_Type:</strong>{{ $contact->service_type }}</p>
    <p><strong>Message:</strong>{{ $contact->message }}</p>
    @if ($contact->banner)
        <p><strong>File:</strong></p>
        <img src="{{ asset('storage/' . $contact->banner) }}" alt="Uploaded File" style="max-width: 500px; width: 100%;">
    @endif

</body>

</html>
