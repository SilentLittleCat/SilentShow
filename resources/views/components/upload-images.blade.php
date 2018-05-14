<div class="sg-upload-image-container-sg" id="sg-{{ $name }}-sg">
    <div class="sg-upload-image-content-sg">
        <div class="sg-upload-image-btn-sg">
            <div class="sg-upload-image-icon-sg">
                <i class="fa fa-upload"></i>
            </div>
        </div>
    </div>
    <input id="sg-{{ $name }}-input-sg" type="hidden" name="data[{{ $name }}]">
    <div class="sg-upload-hint-sg">文件小于2M</div>
</div>

<script type="text/javascript">
    $(function () {
        var formContainerHtml;
        var type = "{{ $type == 'multi' ? 'multi' : 'single' }}";
        if(type === 'single') {
            formContainerHtml = '<div class="sg-upload-image-input-sg" id="sg-{{ $name }}-form-container-sg">\
                                    <form id="sg-{{ $name }}-form-sg" method="POST" enctype="multipart/form-data">\
                                        <input id="sg-{{ $name }}-form-file-sg" type="file" accept="image/*" name="files[]">\
                                        <input type="text" name="class" value="{{ isset($class) ? $class : '未分类' }}">\
                                    </form>\
                                 </div>';
        } else {
            formContainerHtml = '<div class="sg-upload-image-input-sg" id="sg-{{ $name }}-form-container-sg">\
                                    <form id="sg-{{ $name }}-form-sg" method="POST" enctype="multipart/form-data">\
                                        <input id="sg-{{ $name }}-form-file-sg" type="file" accept="image/*" name="files[]" multiple="multiple">\
                                        <input type="text" name="class" value="{{ isset($class) ? $class : '未分类' }}">\
                                    </form>\
                                 </div>';
        }
        $('body').append(formContainerHtml);

        var id = "#sg-{{ $name }}-sg";
        var input = '#sg-{{ $name }}-form-file-sg';
        var form = "#sg-{{ $name }}-form-sg";
        var uploadInput = "#sg-{{ $name }}-input-sg";
        var imageList = id + ' .sg-upload-image-content-sg';
        var value = $.trim("{{ $value }}");
        if(value !== "") {
            sgUpdateInputAndImages(value.split(","));
        }

        function sgUpdateInputAndImages(list) {
            if(type === 'single') {
                $(imageList + ' .sg-upload-image-card-sg').remove();
            }
            var html = '';
            for (var i = 0; i < list.length; ++i) {
                html += '<div class="sg-upload-image-card-sg">\
                                        <div class="sg-upload-image-delete-sg" data-url="' + list[i] + '"><span class="fa fa-times"></span></div>\
                                        <img src="' + list[i] + '" width="100px">\
                                    </div>';
            }
            $(imageList + ' .sg-upload-image-btn-sg').before(html);
            // console.log(list);
            if(type === 'single') {
                $(uploadInput).val(list.join(','));
            } else {
                var list_new = list.concat($(uploadInput).val().split(','));
                $(uploadInput).val(list_new.join(','));
            }

            // console.log($(uploadInput).val());
        }

        $(id).on('click', '.sg-upload-image-btn-sg', function () {
            $(input).trigger("click");
        }).on('click', '.sg-upload-image-delete-sg', function () {
            var url = $(this).attr('data-url');
            $(this).parent().remove();
            if(type === 'single') {
                $(uploadInput).val('');
            } else {
                var list = $(uploadInput).val().split(',');
                var list_new = list;
                for(var i = 0; i < list.length; ++i) {
                    if(list[i] === url) {
                        list_new = list.splice(i, 1);
                        console.log('ok');
                    }
                }
                $(uploadInput).val(list_new.join(','));
            }
            // console.log($(uploadInput).val(), url);
        });
        $(input).change(function () {
            var formData = new FormData($(form)[0]);
            var files = $(input)[0].files;
            if(files.length !== 0) {
                var maxSize = files[0].size;
                for(var i = 0; i < files.length; ++i) {
                    maxSize = Math.max(maxSize, files[i].size);
                }
                if(maxSize < 2 * 1024 * 1024) {
                    $.ajax({
                        url: '/uploadFile/images',
                        method: 'POST',
                        processData: false,
                        contentType: false,
                        cache: false,
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        data: formData,
                        success: function (data) {
                            var html;
                            if (data.status === 'success') {
                                sgUpdateInputAndImages(data['fileList']);
                                // console.log($(uploadInput).val());
                            }
                        },
                        error(jqXHR, textStatus, errorThrown) {

                        }
                    });
                }
            }
        });
    });
</script>