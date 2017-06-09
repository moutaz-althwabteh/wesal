var photo_counter = 0;
Dropzone.options.realDropzone = {

    dictDefaultMessage: '<strong>نحميل الصورة</strong><br/><small class="muted">اختر الصورة من جهازك</small>',
    uploadMultiple: false,
    parallelUploads: 100,
    maxFilesize: 8,
    autoProcessQueue: false,
    previewsContainer: '#dropzonePreview',
    previewTemplate: document.querySelector('#preview-template').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'حذف',
    dictFileTooBig: 'حجم الصورة أكبر من 8MB',

    // The setting up of the dropzone
    init:function() {

      var myDropzone = this;

      $('#submitfiles').on("click", function (e) {

        e.preventDefault();
        e.stopPropagation();

        if(myDropzone.getQueuedFiles().length > 0){

          myDropzone.processQueue();
        }else{
          alert('لايوجد صور للتحميل!');
        }

      });
        this.on("removedfile", function(file) {

            $.ajax({
                type: 'POST',
                url: 'upload/delete',
                data: {id: $('.serverfilename', file.previewElement).val() , _token: $('#csrf-token').val()},
                dataType: 'html',
                success: function(data){

                }
            });

        } );
        this.on('sending', function(file, xhr, formData){
            formData.append('ImageName', $('#imageName', file.previewElement).val());
            formData.append('albumId', $('#albumId', file.previewElement).val());

        });
    }
}
