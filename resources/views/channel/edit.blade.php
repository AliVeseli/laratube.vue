@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Channel Settings</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/channel/{{$channel->slug}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="col-form-label">Channel Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $channel->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug" class="col-form-label">Channel slug</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text  @error('slug') border-danger @enderror">{{config('app.url')}}/channel/</span></div>
                                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') ?? $channel->slug }}" required autocomplete="slug" autofocus>
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Channel Description</label>
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ old('description') ?? $channel->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-success"> Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
