@extends('layouts.dashboard')

@section('title', 'Import Products')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Import Products</li>
@endsection

@section('content')

    <form action="{{ route('dashboard.') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <x-form.input label="Products Count" class="form-control-lg" role="input" name="count"  />
        </div>

        <button type="submit" class="btn-primary">Import</button>
    </form>

@endsection
