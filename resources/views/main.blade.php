@extends('master')

@section('body')
    <div class="header">
        <div class="box-score" style="float: left;">
            <label>SCORE</label>
            <br>
            <span id="score">{{ auth()->user()->point ?? 0 }}</span>
        </div>
        <div class="box-score" style="float: left;margin-left: 15px;">
            <label>WORDS</label>
            <br>
            <span id="word_number">{{ auth()->user()->words_count ?? 0 }}</span>
        </div>
        <button type="button" class="btn-logout">
            <span><i class="fas fa-power-off"></i></span>
        </button>
    </div>

    <div class="box-category">
        <span>Topic</span>
    </div>

    <div class="box-answer">
        <div class="answer-wrapper">
            <div class="outline">
                <span class="notification correct hidden">correct +10</span>
                <div class="answer"></div>
            </div>
        </div>
    </div>

    <div class="box-button">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(function() {
            var answer = '';
            var word_id = 0;
            var score = {{ auth()->user()->point ?? 0 }};
            var word_number = {{ auth()->user()->words_count ?? 0 }};

            function erase() {
                answer = '';
                $('.answer').empty();
                $('.box-button button').prop('disabled', false);
                $('.notification').hide();
            }

            function buildButton(word) {
                $('.box-button').empty();

                for(i = 0; i < word.length; i++) {
                    $('.box-button').append('<button type="button"><span>' + word[i] + '</span></button>');

                    if (i == 2 || i == 5) {
                        $('.box-button').append('<br>');
                    }
                }

                $('.box-button').append('<button type="button" class="btn-erase"><span><i class="fas fa-eraser"></i></span></button>');
            }

            function getWord() {
                $.ajax({
                    method: 'GET',
                    url: '{{ route('game.word') }}'
                }).done(function(data) {
                    erase();
                    buildButton(data.word);

                    word_id = data.id;

                    $('.box-category span').html(data.category);

                    $('.box-button button').bind('click', function() {
                        $(this).prop('disabled', true);
                        $('.answer').append('<button class="btn-small"><span>' + $(this).html() + '</span></button>');

                        answer += $(this).children().html();

                        if (answer.length == data.word.length) {
                            $('.btn-erase').prop('disabled', true);

                            checkAnswer(word_id, answer);
                        }
                    });

                    $('.btn-erase').bind('click', function() {
                        erase();
                    });
                });
            }

            function checkAnswer(id, data) {
                $.ajax({
                    method: 'POST',
                    url: '{{ route('game.answer') }}',
                    data: {'_token'  : $('meta[name="csrf-token"]').attr('content'),'word_id': id, 'answer': data},
                }).done(function(data) {
                    if (data.status == 'correct') {
                        score += data.point;
                        $("#score").html(score);
                        word_number++;
                        $("#word_number").html(word_number);

                        $('.notification').removeClass('wrong').addClass('correct').html(data.status + ' +' + data.point).fadeIn(1000).fadeOut(3000);
                        setTimeout(function() {
                            getWord();
                            $('.btn-erase').prop('disabled', false);
                        }, 3000);
                    } else if (data.status == 'wrong') {
                        score += data.point;
                        $("#score").html(score);

                        $('.notification').removeClass('correct').addClass('wrong').html(data.status + ' ' + data.point).fadeIn(1000).fadeOut(3000);
                    $('.btn-erase').prop('disabled', false);
                    }
                });
            }

            $('.btn-logout').click(function() {
                window.location.replace('/logout');
            });

            getWord();
        });
    </script>
@endsection