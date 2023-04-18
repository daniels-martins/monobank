<x-mail::message>
    New Lead for Web Dev services

    Client Information:

    Client Email: {{ $requestData['email'] }}
    Client Fullname: {{ $requestData['fullname'] }}
    Subject: {{ $requestData['subject'] }}
    Message Body: {{ $requestData['message'] }}
    {{-- <x-mail::button :url="''">
        Button Text
    </x-mail::button> --}}
    Thanks,
    The Marxon Team

    Marxon Inc® Copyright© {{ date('Y') }}
</x-mail::message>
