@component('mail::message')
# Introduction

{{$contact->message}}

@component('mail::button', ['url' => '$url'])
Button Text
@endcomponent

@component('mail::panel')
Name:{{$contact->name}}
Email:{{$contact->email}}

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
