@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="single-blog-post" style="color:white">
            <h1>{{$product->name}}</h1>

            <p class="time-and-author">
                {{$product->created_at->diffForHumans()}}

            </p>

            <div class="single-blog-post-ContentImage" data-aos="fade-left">
                <img src="/storage/{{$product->image}}" alt="" />
            </div>
            <h1>Reviews And ratings</h1>
            <div class="row pt-5">
                @foreach($reviews as $review)
                    <div class="col-8 pb-4">
                        <h3>{{$review->user->name}} {{$review->user->surname}}</h3>
                        <p>

                        <div class="rated-box">
                            @for($i =0; $i < $review->rate;$i++ )
                                <i class="star selected fa fa-star" style="color: yellow"></i>
                                @endfor
                            <span style="padding-left: 5px">{{$review->created_at->diffForHumans()}}</span>
                        </div>


                        </p>
                        <p>{{$review->comment}}</p>
                    </div>
                @endforeach
            </div>

            <div class="wrapper">
                <div class="master">
                        <h2>How was your experience about our product?</h2>
                        @if(Auth::user())
                        <form name="frm" method="POST" action="/reviews">
                            @csrf
                            <div class="rating-component">
                                <div class="status-msg">
                                    <label>
                                        <input  class="rating_msg" type="hidden" name="rating_msg" value=""/>
                                    </label>
                                </div>
                                <div class="stars-box">
                                    <i class="star fa fa-star" title="1 star" data-message="Poor" data-value="1"></i>
                                    <i class="star fa fa-star" title="2 stars" data-message="Too bad" data-value="2"></i>
                                    <i class="star fa fa-star" title="3 stars" data-message="Average quality" data-value="3"></i>
                                    <i class="star fa fa-star" title="4 stars" data-message="Nice" data-value="4"></i>
                                    <i class="star fa fa-star" title="5 stars" data-message="very good qality" data-value="5"></i>
                                </div>
                                <div class="starrate">
                                    <label>
                                        <input  class="ratevalue" type="hidden" name="rate_value" value=""/>
                                        <input   type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                                    </label>
                                </div>
                            </div>

                            <div class="feedback-tags">
                                <div class="tags-container" data-tag-set="1">
                                    <div class="question-tag">
                                        Why was your experience so bad?
                                    </div>
                                </div>
                                <div class="tags-container" data-tag-set="2">
                                    <div class="question-tag">
                                        Why was your experience so bad?
                                    </div>

                                </div>

                                <div class="tags-container" data-tag-set="3">
                                    <div class="question-tag">
                                        Why was your average rating experience ?
                                    </div>
                                </div>
                                <div class="tags-container" data-tag-set="4">
                                    <div class="question-tag">
                                        Why was your experience good?
                                    </div>
                                </div>

                                <div class="tags-container" data-tag-set="5">
                                    <div class="make-compliment">
                                        <div class="compliment-container" style="color:white">
                                            Give a compliment
                                            <i class="far fa-smile-wink"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="tags-box">

                                    <textarea name="comment" class="tag form-control" id="inlineFormInputName" cols="50" rows="2" placeholder="please enter your review"></textarea>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                </div>

                            </div>

                            <div class="button-box">
                                <button type="submit" class="done btn btn-warning" disabled="disabled">Add review</button>
                            </div>

                            <div class="submited-box">
                                <div class="loader"></div>
                                <div class="success-message">
                                    Thank you!
                                </div>
                            </div>
                        </form>
                    @else
                        <h4>Login/Register to add a review</h4>
                        @endif
                    </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(".rating-component .star").on("mouseover", function () {
            var onStar = parseInt($(this).data("value"), 10); //
            $(this).parent().children("i.star").each(function (e) {
                if (e < onStar) {
                    $(this).addClass("hover");
                } else {
                    $(this).removeClass("hover");
                }
            });
        }).on("mouseout", function () {
            $(this).parent().children("i.star").each(function (e) {
                $(this).removeClass("hover");
            });
        });

        $(".rating-component .stars-box .star").on("click", function () {
            var onStar = parseInt($(this).data("value"), 10);
            var stars = $(this).parent().children("i.star");
            var ratingMessage = $(this).data("message");

            var msg = "";
            if (onStar > 1) {
                msg = onStar;
            } else {
                msg = onStar;
            }
            $('.rating-component .starrate .ratevalue').val(msg);



            $(".fa-smile-wink").show();

            $(".button-box .done").show();

            if (onStar === 5) {
                $(".button-box .done").removeAttr("disabled");
            } else {
                $(".button-box .done").attr("disabled", "true");
            }

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass("selected");
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass("selected");
            }

            $(".status-msg .rating_msg").val(ratingMessage);
            $(".status-msg").html(ratingMessage);
            $("[data-tag-set]").hide();
            $("[data-tag-set=" + onStar + "]").show();
        });

        $(".feedback-tags  ").on("click", function () {
            var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
            choosedTagsLength = choosedTagsLength + 1;

            if ($(this).hasClass("choosed")) {
                $(this).removeClass("choosed");
                choosedTagsLength = choosedTagsLength - 2;
            } else {
                $(this).addClass("choosed");
                $(".button-box .done").removeAttr("disabled");
            }

            console.log(choosedTagsLength);

            if (choosedTagsLength <= 0) {
                $(".button-box .done").attr("enabled", "false");
            }
        });



        $(".compliment-container .fa-smile-wink").on("click", function () {
            $(this).fadeOut("slow", function () {
                $(".list-of-compliment").fadeIn();
            });
        });



        $('form[name="frm"]').submit(function (e) {
            var form = this;
            e.preventDefault();
            $(".rating-component").hide();
            $(".feedback-tags").hide();
            $(".button-box").hide();
            $(".submited-box").show();
            $(".submited-box .loader").show();

            setTimeout(function () {
                $(".submited-box .loader").hide();
                form.submit();
            }, 5000);
            $(".submited-box .success-message").show();
        });
    </script>
@endsection
