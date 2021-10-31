@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg-12">

            <div class="card text-right">
                <div class="card-header">
                    <h3 class="card-title">فرم ایجاد بلاگ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {{-- <div id="attributes" data-attributes="{{ json_encode(\App\Attribute::all()->pluck('name')) }}"></div> --}}
                <form class="form-horizontal" action="{{ route('blog.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">نام بلاگ</label>
                            <input type="text" name="title" class="form-control text-right" id="inputEmail3"
                                placeholder="نام بلاگ را وارد کنید" value="{{ old('title') }}">
                        </div>



                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">توضیحات</label>
                            <textarea class="form-control text-right" name="body" id="description" cols="30"
                                rows="10">{{ old('body') }}</textarea>
                        </div>





                        <div class="form-group">
                            <select name="category">
                                <option value="">دسته بندی راانتخاب کنید</option>
                                @foreach (\App\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت بلاگ</button>
                        <a href="{{ route('blog.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection
