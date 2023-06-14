@php
$toasteroptions = [
    "positionClass" => "toast-top-right", 
    "progressBar"=>"true",
    "timeOut"=> "1000",
    "extendedTimeOut"=> "500",
    "closeButton"=> "true",
    "showDuration"=> "100",
    "hideDuration"=> "500",
    "preventDuplicates"=> true,
    "preventOpenDuplicates"=> true,
    "onclick"=> null,
];
@endphp

@if ($message = Session::get('success'))
@php
    Brian2694\Toastr\Facades\Toastr::success($message, '', $toasteroptions);
    Session::forget('success');
@endphp
@endif

@if ($message = Session::get('error'))
@php
    Brian2694\Toastr\Facades\Toastr::error($message, '', $toasteroptions);
@endphp
@endif

@if ($message = Session::get('warning'))
@php
    Brian2694\Toastr\Facades\Toastr::warning($message, '', $toasteroptions);
@endphp
@endif

@if ($message = Session::get('info'))
@php
    Brian2694\Toastr\Facades\Toastr::info($message, '', $toasteroptions);
@endphp
@endif

@if ($errors->any())
@php
    $message = 'Form Input Error';
    Brian2694\Toastr\Facades\Toastr::warning($message, '', $toasteroptions);
    
@endphp
@endif

 {!! Toastr::message() !!}