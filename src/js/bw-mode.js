 $(document).ready(function () {
            $(".bw-mode").show('click', function () {
                $('#shadow').toggleClass("turnedOff");
                $(".bw-mode").on('click', function () {
                    $('#shadow').toggleClass("turnedOff");
                });
            });
        });