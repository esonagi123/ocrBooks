@extends('base')

@section('content')
<link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
<div class="row mt-4">
    <form method="post" action="{{ url('/save_result') }}">
        @csrf
        <input type="hidden" name="uid" value="{{ $userData['uid'] }}"/>
        @foreach ($datas as $data)
        <div class="col">
            <div class="card mb-4">
                <h5 class="card-header">영수증 {{ $data['number'] }}</h5>
                <input type="hidden" name="number[]" value="{{ $data['number'] }}"/>
                <div class="card-body">
                    <img style="width: 100%;" class="img-fluid d-flex mx-auto my-4 rounded" src="{{ $data['image'] }}">
                    <div class="mb-3">
                        <label for="shop" class="form-label">상호</label>
                        <input type="text" class="form-control" id="shop" name="shop{{ $data['number'] }}" value="{{ $data['shop'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">날짜</label>
                        <input type="date" class="form-control" id="date" name="date{{ $data['number'] }}" value="{{ $data['date'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">합계 금액</label>
                        <input type="text" class="form-control" id="total" name="total{{ $data['number'] }}" value="{{ $data['total'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">카테고리</label>
                        <select class="form-select" name="category{{ $data['number'] }}" id="category">
                          <option selected="">선택하세요</option>
                          <option value="fa-basket-shopping">쇼핑</option>
                          <option value="fa-utensils">식비</option>
                          <option value="fa-bus">교통비</option>
                          <option value="fa-book">문화</option>
                          <option value="fa-gas-pump">주유</option>
                          <option value="fa-ellipsis">기타</option>
                        </select>
                    </div>                    
                    <div class="mb-3">
                        <label class="form-label" for="memo">메모</label>
                        <textarea id="memo" class="form-control" name="memo{{ $data['number'] }}" placeholder="이 지출에 대한 메모를 입력할 수 있습니다."></textarea>
                    </div>                                 
                </div>
            </div>
        </div>
        @endforeach
        <div class="text-end">
            <button type="submit" class="btn btn-primary">저장</button>
        </div>
    </form>
</div>

@endsection()