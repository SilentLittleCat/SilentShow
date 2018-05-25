@extends('friends.layout-content')

@section('header')
<style type="text/css">

</style>
@endsection

@section('content')
    <section class="content">
        <div class="box container">
            <div class="box-header">
                <h3 class="box-title">{{ $modal_name }}列表</h3>
            </div>
            <div class="box-tools row">
                <div class="col-sm-4">
                    <form method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" name="keywords" value="{{ request('keywords') }}" placeholder="输入{{ $modal_name }}名称搜索">
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-primary" type="button">搜索</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4 pull-right">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-sm btn-danger" id="sg-delete-many">批量删除</button>
                        <a type="button" class="btn btn-sm btn-success" href="{{ $pre_uri }}create">创建</a>
                    </div>
                </div>
            </div>
            <div class="box-body row" id="sg-table">
                <table class="table table-hover table-responsive table-striped">
                    <tbody>
                        <tr>
                            <th><input class="sg-icheck-all" type="checkbox" id="sg-icheck-all"></th>
                            <th>用户fuId</th>
                            <th>内容</th>
                            <th>操作</th>
                        </tr>
                        @if($list->count() == 0)
                            <tr>
                                <td colspan="4" class="sg-empty-table-hint">暂无{{ $modal_name }}！</td>
                            </tr>
                        @else
                            @foreach($list as $item)
                                <tr>
                                    <td>
                                        <input class="sg-icheck" type="checkbox" value="{{ $item->id }}" name="delete_ids[]">
                                    </td>
                                    <td>{{ $item->fuId }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-primary" href="{{ $pre_uri }}edit?id={{ $item->id }}">编辑</a>
                                            <a class="btn btn-sm btn-info" href="{{ $pre_uri }}detail?id={{ $item->id }}">详情</a>
                                            <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $item->id }}">删除</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <div class="col-sm-4">
                    <div class="sg-pagination-info">
                        {{ $list->count() . '条记录，' . '共' . $list->total() . '页，' . '这是第' . $list->currentPage() . '页' }}
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="">
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ $pre_uri }}delete">
                    {{ csrf_field() }}
                    <input id="delete-input-id" type="hidden" name="id">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="delete-modal-label">确定要删除？</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-danger">删除</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete-many-modal" tabindex="-1" role="dialog" aria-labelledby="delete-many-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ $pre_uri }}deleteMany">
                    {{ csrf_field() }}
                    <input id="delete-many-input-id" type="hidden" name="delete_ids">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="delete-modal-label">确定要删除所有选中项目？</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-danger">删除</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script type="text/javascript">
    $(function () {
        $('#sg-table').on('click', '.btn-delete', function () {
            $('#delete-input-id').val($(this).attr('data-id'));
            $('#delete-modal').modal('show');
        });
        $('.sg-icheck, .sg-icheck-all').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue',
            increaseArea: '20%' // optional
        });
        $('#sg-icheck-all').on('ifChecked', function () {
            $('.sg-icheck').iCheck('check');
        }).on('ifUnchecked', function () {
            $('.sg-icheck').iCheck('uncheck');
        });
        $('#sg-delete-many').on('click', function () {
            var list = [];
           $('.sg-icheck:checked').each(function () {
               list.push($(this).val());
           });
           $('#delete-many-input-id').val(list.join(','));
           $('#delete-many-modal').modal('show');
        });
    });
</script>
@endsection