@extends('layouts.master')

@section('content')
<style>


.wrapper {
  padding: 100px 0;
  width: 550px;

}

.slider {
  position: relative;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.slider .arrow {
  cursor: pointer;
  width: 50px;
 
}
.slider .arrow:hover {
  opacity: .8;
}
.slider .arrow.right {
  transform: rotate(180deg);
   color:black !important;
}
.slider .container-images {
  position: relative;
  width: 400px;
  height: 250px;
  overflow: hidden;
  -webkit-box-shadow: 10px 10px 61px -10px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 10px 10px 61px -10px rgba(0, 0, 0, 0.75);
  box-shadow: 10px 10px 61px -10px rgba(0, 0, 0, 0.75);
}
.slider .container-images img {
  width: 100%;
  position: absolute;
  top: 50%;
  transition-duration: .5s;
  transform: translateY(-50%);
}
.slider.right .container-images img {
  left: -100%;
  z-index: -1;
}
.slider.right .container-images img.active {
  z-index: 1;
  left: 0;
}
.slider.right .container-images img.to_right {
  left: 100%;
}
.slider.left .container-images img {
  right: -100%;
  z-index: -1;
}
.slider.left .container-images img.active {
  z-index: 1;
  right: 0;
}
.slider.left .container-images img.to_left {
  right: 100%;
}

</style>
<div class="wrapper ">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="slider right">
			
			<div class="arrow left">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 292.359 292.359">
					<path d="M222.979 5.424C219.364 1.807 215.08 0 210.132 0c-4.949 0-9.233 1.807-12.848 5.424L69.378 133.331c-3.615 3.617-5.424 7.898-5.424 12.847s1.809 9.233 5.424 12.847l127.906 127.907c3.614 3.617 7.898 5.428 12.848 5.428 4.948 0 9.232-1.811 12.847-5.428 3.617-3.614 5.427-7.898 5.427-12.847V18.271c-.001-4.949-1.81-9.229-5.427-12.847z" fill="#FFFFFF"/>
				</svg>
			</div>

			<div class="container-images">
				<img class="active" src="https://picsum.photos/600/400/?image=661">
				<img src="https://picsum.photos/600/400/?image=57">
				<img src="https://picsum.photos/600/400/?image=976">
				<img src="https://picsum.photos/600/400/?image=476">
                <img src="https://picsum.photos/600/400/?image=47">
                <img src="https://picsum.photos/600/400/?image=46">
			</div>

			<div class="arrow right">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 292.359 292.359">
					<path d="M222.979 5.424C219.364 1.807 215.08 0 210.132 0c-4.949 0-9.233 1.807-12.848 5.424L69.378 133.331c-3.615 3.617-5.424 7.898-5.424 12.847s1.809 9.233 5.424 12.847l127.906 127.907c3.614 3.617 7.898 5.428 12.848 5.428 4.948 0 9.232-1.811 12.847-5.428 3.617-3.614 5.427-7.898 5.427-12.847V18.271c-.001-4.949-1.81-9.229-5.427-12.847z" fill="#FFFFFF"/>
				</svg>
			</div>

		</div>
    </div>
  </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<script>
$(window).on('load', function() {

let nbImg = 0;
$('.slider .container-images img').each(function() {
    nbImg += 1;
});

$('.slider .arrow').click(function() {
    let n = imageActive();
    
    $('.slider').removeClass('right left');

    if($(this).hasClass('left')) { 
        n -= 1;
        $('.slider').addClass('left');
        setTimeout(function() {
            $('.slider .container-images img.active').addClass('to_left');
        }, 50)
    }
    else if($(this).hasClass('right')) { 
        n += 1;
        $('.slider').addClass('right');
        setTimeout(function() {
            $('.slider .container-images img.active').addClass('to_right');
        }, 50)
    }

    if(n > nbImg) n = 1;
    if(n < 1) n = nbImg;

    setTimeout(function() {
        $('.slider .container-images img').removeClass('active');
        $('.slider .container-images img:nth-child('+n+')').addClass('active');
    
        setTimeout(function() {
            $('.slider .container-images img').removeClass('to_left');
            $('.slider .container-images img').removeClass('to_right');
        }, 500)
    }, 50)
});

function imageActive() {
    let n = 1;
    $('.slider .container-images img').each(function(index) {
        if($(this).hasClass('active')) {
            n += index;
        }
    });
    return n;
}

});
</script>

@stop