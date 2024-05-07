@extends('m_base')

@section('content')
<div class="row mt-4">
    <form method="post" action="#">
        @csrf
        @foreach ($datas as $data)
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">영수증 {{ $data['number'] }}</h5>
                <div class="card-body">
                    <img class="img-fluid d-flex mx-auto my-4 rounded" src="{{ $data['image'] }}">
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