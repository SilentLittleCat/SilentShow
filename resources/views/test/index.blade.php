@extends('admin.layout')

@section('header')
    <style type="text/css">

    </style>
@endsection

@section('content')
    <section class="content">
        <div>
            <form method="POST" enctype="multipart/form-data" action="/upload/images">
                {{ csrf_field() }}
                <input type="file" accept="image/*" name="files" multiple="multiple">
                <button type="submit">提交</button>
            </form>
        </div>
    </section>
@endsection

@section('footer')
    <script type="text/javascript">
        $(function () {

        });
    </script>
@endsection