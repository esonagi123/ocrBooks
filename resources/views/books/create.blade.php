@extends('base')

@section('content')
<link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
<div class="row mt-4">
    <form method="post" action="{{ url('/save_result2') }}">
        @csrf
        <input type="hidden" name="uid" value="{{ $userData['uid'] }}"/>
        <div class="col">
            <div class="card mb-4">
                <h5 class="card-header">직접 입력</h5>
                <div class="card-body">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                    @endif                    
                    <div class="mb-3">
                        <label for="shop" class="form-label">상호</label>
                        <input type="text" class="form-control" id="shop" name="shop" value="">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">날짜</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') ? old('date') : date('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">합계 금액</label>
                        <input type="text" class="form-control" id="total" name="total" value="{{ old('total') }}">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">카테고리</label>
                        <select class="form-select" name="category" id="category">
                          <option selected="">선택하세요</option>
                          <option value="1">쇼핑</option>
                          <option value="2">식비</option>
                          <option value="3">교통비</option>
                          <option value="4">문화</option>
                          <option value="5">주유</option>
                          <option value="6">기타</option>
                        </select>
                    </div>                    
                    <div class="mb-3">
                        <label class="form-label" for="memo">메모</label>
                        <textarea id="memo" class="form-control" name="memo" placeholder="이 지출에 대한 메모를 입력할 수 있습니다.">{{ old('memo') }}</textarea>
                    </div>                                 
                </div>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">저장</button>
        </div>
    </form>
</div>

@endsection()