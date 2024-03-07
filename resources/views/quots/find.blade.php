@extends('app.app')

@push('new_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endpush

@section('konten')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-center">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Quots of the day</h5>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="text-center">
                            <div id="inputCategory" class="mb-3">
                                <label for="category" class="form-label">Kategori Quotes</label>
                                <select class="form-control" id="category" aria-describedby="emailHelp"></select>
                            </div>
                            <div id="result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('new_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            var categoryTags = [
                "age", "alone", "amazing", "anger", "architecture", "art", "attitude", "beauty", "best",
                "birthday",
                "business", "car", "change", "communication", "computers", "cool", "courage", "dad", "dating",
                "death",
                "design", "dreams", "education", "environmental", "equality", "experience", "failure", "faith",
                "family",
                "famous", "fear", "fitness", "food", "forgiveness", "freedom", "friendship", "funny", "future",
                "god",
                "good", "government", "graduation", "great", "happiness", "health", "history", "home", "hope",
                "humor",
                "imagination", "inspirational", "intelligence", "jealousy", "knowledge", "leadership",
                "learning", "legal",
                "life", "love", "marriage", "medical", "men", "mom", "money", "morning", "movies", "success"
            ];

            $('#category').select2({
                placeholder: 'Pilih kategori quotes',
                data: categoryTags.map(function(category) {
                    return {
                        id: category,
                        text: category
                    };
                })
            });
        });

        $(document).ready(function() {
            $('#category').on('change', function() {
                var cat = $('#category').val();
                console.log(cat);
                if (cat) {
                    var url = "{{ route('findQuots', ':category') }}";
                    url = url.replace(':category', cat);
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data.error) {
                                $('#result').html('<p>' + data.error + '</p>');
                            } else {
                                $('#inputCategory').hide();
                                var html = '<figure><blockquote class="blockquote">';
                                html += '<p>' + data[0].quote + '</p>';
                                html += '</blockquote>';
                                html += '<figcaption class="blockquote-footer">';
                                html += data[0].author + ' <cite title="Source Title">(' + data[0]
                                    .category + ')</cite>';
                                html += '</figcaption></figure>';
                                $('#result').html(html);
                            }
                        }
                    });
                } 
            });
        })
    </script>
@endpush
