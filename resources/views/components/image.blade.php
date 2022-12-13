
@section('styles')
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
@endsection

<div class="container">
    <h3>Upload Images</h3>
    <form method="post" action="{{route('upload.image')}}" enctype="multipart/form-data" 
                  class="dropzone" id="dropzone">
        <input type="hidden" name="image_id" value="{{$spare->id}}">

        @php
        $spareImages = \App\Models\SmartImage::where('image_id',$spare->id)->get();
        @endphp
        

        @if (!$spareImages->isEmpty())
            @foreach ($spareImages as $image )
                <div class="dz-preview dz-processing dz-image-preview dz-complete">  
                    <div>
                        <img style="width:120px; height:120px;"  alt="user.png" src="{{asset('images/')}}/{{$image->filename}}">
                        <a class="dz-remove image_file" data-image="{{$image->filename}}" href="javascript:undefined;" >Remove file</a>
                    </div> 
                    

                    
                </div>
            @endforeach
        @endif

        
        
    @csrf
</form> 
</div>
    

@section('scripts')
<script type="text/javascript">


    Dropzone.options.dropzone =
     {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file) 
        {
            var name = file.upload.filename;
            deleteFile(name);
            var fileRef;
            return (fileRef = file.previewElement) != null ? 
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
   
        success: function(file, response) 
        {
            toastr.success('File addedd successfully');
            console.log(response);
        },
        error: function(file, response)
        {
           return false;
        }
};
function deleteFile(name){
    $.ajax({
                headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                type: 'POST',
                url: '{{ route("delete.image") }}',
                data: {filename: name},
                success: function (data){
                    toastr.success('File has been successfully removed!!');
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    toastr.danger(e);
                    console.log(e);
                }});
}

$('.image_file').click(function(){
    var name = $(this).data('image');
    deleteFile(name);
    $(this).parent().remove();
});



</script>
@endsection