<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Open AI</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="h-full grid place-items-center p-6">
<div class="text-xs font-sans">

    {!! nl2br($verse) !!}

</div>
</body>
