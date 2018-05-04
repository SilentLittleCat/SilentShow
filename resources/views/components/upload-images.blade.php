<div class="sg-upload-image-container-sg" id="sg-{{ $name }}-sg">
    <div class="sg-upload-image-content-sg">
        <div class="sg-upload-image-btn-sg">
            <div class="sg-upload-image-icon-sg">
                <i class="fa fa-upload"></i>
            </div>
        </div>
    </div>
    <input id="sg-{{ $name }}-input-sg" type="hidden" name="data[{{ $name }}]">
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
                                        <input type="file" accept="image/*" name="files[]" multiple="multiple">\
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
            updateInputAndImages(value.split(","));
        }

        function updateInputAndImages(list) {
            $(imageList + ' .sg-upload-image-card-sg').remove();
            for (var i = 0; i < list.length; ++i) {
                html = '<div class="sg-upload-image-card-sg">\
                                        <div class="sg-upload-image-delete-sg"><span class="fa fa-times"></span></div>\
                                        <img src="' + list[i] + '" width="100px">\
                                    </div>';
                $(imageList).prepend(html);
            }
            $(uploadInput).val(list.join(','));
        }

        $(id).on('click', '.sg-upload-image-btn-sg', function () {
            $(input).trigger("click");
        }).on('click', '.sg-upload-image-delete-sg', function () {
            $(this).parent().remove();
            $(uploadInput).val('');
            console.log($(uploadInput).val());
        });
        $(input).change(function () {
            var formData = new FormData($(form)[0]);
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
                        updateInputAndImages(data['fileList']);
                    }
                },
                error(jqXHR, textStatus, errorThrown) {

                }
            });
        });
    });
</script>