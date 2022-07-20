@extends('layouts/layout')

@section('content')
<div>
    <div class="float-start">
        <h4 class="pb-3">Reports</h4>
    </div>
    <div class="clearfix"></div>
</div>

{{ $total_math_student }}
{{ $total_math_score }}
{{ $total_math_score/$total_math_student }}

@endsection