<div>
    <div class="card">
        <div class="card-body">
            <div class="form-group" wire:ignore>
                <textarea name="content" class="form-control summernote">{{$content}}</textarea>
            </div>
            <button wire:click.prevent="store()" class="btn btn-success">Save</button>
        </div>
    </div>
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script type="text/javascript">
          
            $('.summernote').summernote({
                tabsize: 2,
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                    @this.set('content', contents);
                }
            }
            });
        </script>
    @endsection
</div>
