<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.pricebtn').on('click', function() {
            var price = $(this).data('price');
            $.ajax({
                url: "{{ route('getproducts') }}",
                method: 'GET',
                data: {
                    price: price
                },
                success: function(response) {
                    $('.response').html('');
                    $('.response').html(response.data);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

        $('#search').on('change', function() {
            var name = $('#search').val();
            $.ajax({
                url: "{{route('searchPostByName')}}",
                method: 'POST',
                data: {
                    name: name
                },
                success: function(response) {
                    $('.response').html('');
                    // $('.response').html(response.data);
                },
                error: function(error) {}
            });
        });
    });
</script>
