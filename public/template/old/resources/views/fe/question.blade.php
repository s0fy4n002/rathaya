@extends('fe.layouts.app')
@section('content')
    <section class="pt-10 pb-20 akm-container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-xl font-bold text-primary">{{ __('fe11faq.question') }}</h3>
                <h3 class="lg:text-5xl text-3xl font-bold mt-4 leading-tight">
                    FAQ
                </h3>
                <br>
                <style>
.accordion {
  background-color: #d1d5db;
  color: #000;
  cursor: pointer;
  padding: 12px;
  width: 100%;
  border: none;
  text-align: Justify;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
  border-bottom: 1px dotted #5a5a5a;
}

.active, .accordion:hover {
  background-color: #f16521; 
  color : #fff 
}

.panel {
  padding-top: 12px;
  padding-bottom: 12px;
  padding-left: 4px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>


<button class="accordion">Apa dan Dimana Pantai Gabut itu ?</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Mengapa Pantai Gabut itu ?</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Lestarikan Pantai Gabut</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
            </div>
            <div>
                <img src="{{ asset('imgfe/img-about.jpg') }}" class="rounded-3xl" alt="">
            </div>
        </div>
    </section>
@endsection
