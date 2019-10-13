@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="">Name <span class="required">*</span></label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control">
            </div>

            <div class="form-group">
                <label for="">City</label>
                <input type="text" name="city" class="form-control">
            </div>

            <div class="form-group">
                <label for="">State</label>
                <input type="text" name="state" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Postal</label>
                <input type="text" name="postal" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Country</label>
                <input type="text" name="country" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection