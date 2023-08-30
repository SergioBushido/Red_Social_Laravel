@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')
            @foreach($images as $image)
            <div class="card pub_image">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        @if($image->user->image)
                        <div class="container-avatar">
                            <img src="{{ route('user.avatar', ['filename'=> $image->user->image]) }}" class="avatar"/>
                        </div>
                        @endif
                        <div class="data-user" style="margin-left: 20px;">
                            <strong>{{ $image->user->name.' '.$image->user->surname }}</strong> | {{ '@'.$image->user->nick }}
                        </div>
                    </div>
                </div>

                <div class="card-body">

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
