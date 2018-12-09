@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="{{url('/form')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Add Form</button>
                    </form>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Form Title</th>
                                <th>Form Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0;?>
                            @foreach ($forms as $form)
                            <?php $no++?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$form->title}}</td>
                                <td>{{$form->description}}</td>
                                <td>
                                    <a href="{{url('form/'.$form->id.'/question')}}"><button type="button" class="btn btn-primary">Details</button></a>
                                    <form action="{{url('/form/delete/'.$form->id)}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input class="btn btn-danger " type="submit" value="Delete Form">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
