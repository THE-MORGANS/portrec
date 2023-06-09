@php
$toasteroptions = [
    "positionClass" => "toast-top-right", 
    "progressBar"=>"true",
    "timeOut"=> "1500",
    "closeButton"=> "true",
];
@endphp

@if ($message = Session::get('success'))
@php
    Brian2694\Toastr\Facades\Toastr::success($message, '', $toasteroptions);
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
    Brian2694\Toastr\Facades\Toastr::info($message, '', $toasteroptions);
@endphp
@endif

 {!! Toastr::message() !!}