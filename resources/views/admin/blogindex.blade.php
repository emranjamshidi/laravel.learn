@extends('layouts.app')

@section('content')


    <div class="row container">
        <div class=" col-lg-12 col-md-6">

            <div class="card" style="background-color: rgb(255, 255, 255)">
                <div class="card-header">
                    <h3 class="card-title text-right">لیست تمام بلاگ سایت</h3>
                </div>

                @if (session('flash_message'))
                    <div class="alert text-right alert-success alert-dismissible fade show mt-4" role="alert">
                        {{ Session::get('flash_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <script>
                        $('.alert').alert()
                    </script>

                @endif
                <div class="col">

                    @if ($all->count() > 0)


                        <ul class="text-right" style="list-style: none">
                            @foreach ($all as $b)
                                <li style="background-color: rgb(255, 239, 239);font-size: 23px;"
                                    class="text-right text-primary">
                                    {{ $b->title }}</li>
                                <li style="background-color: rgb(212, 240, 241);font-size: 20px;"
                                    class="text-right  text-black">
                                    {{ $b->body }}</li>


                                <a href="{{ route('blog.destroy', $b->id) }}">
                                    <button type="button" class="btn btn-group bt-outline-danger"
                                        style="background-color: red;margin-top:3px">

                                        Delete

                                    </button>
                                </a>
                            @endforeach
                            @if (session('message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ Session::get('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <script>
                                    $('.alert').alert()
                                </script>

                            @endif
                        </ul>
                </div>

            @else


            </div>

        </div>
        <button class="btn-outline-primary text-right float-right">

            <a href=" {{ route('blog.create') }}" style="color: inherit;">
                create new
                blog
            </a>
        </button>

        @endif



    </div>



@endsection
