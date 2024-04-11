@extends('m_base')

@section('content')

<p>상호명 : {{ $shop }}</p>
<p>날짜 : {{ $date }}</p>
<p>합계 금액 : {{ $amount }}</p>

@endsection()