@include('session.header')
<style>
  .user_input{width: 100% ! important;}
  textarea{width:100%}
</style>
<div id="main-wrapper">
  <div id="content-wrapper">
      <div class="green-full-width Sign In">
          <div class="content-body">
              <div class="row"  >
                  <div class="col-sm-4" style="padding-left:55px; padding-top:20px" >
                    <img  src="img/contact_icon1.png" width="300", height="300">
                </div>
                <div class="col-sm-offset-1 col-sm-7 content">
                  {{Form::open(array('class' =>'form-inline', URL::to(Request::segment(1))))}} 
                    <div class="row">
                      <div class="form-group col-sm-8" style="margin-bottom:25px">
                          {{Form::label('Email', 'E-Mail Address: ')}}
                        <h3> {{Form::input('text','Email','',array('class' => 'form-control user_input','autofocus'))}} </h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-8" style="margin-bottom:25px">
                         {{Form::label('name', 'Enter Full Name: ')}}
                        <h3>{{Form::input('text','name','',array('class' => 'form-control user_input'))}}</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-8 comment" style="margin-bottom:25px">
                         {{Form::label('msg', 'Enter your Message: ')}}
                          {{Form::textarea('text','','',array('class' => 'form-control user_input'))}}
                      </div>
                    </div>
                    <div class="row">
                      <p>{{ HTML::image(Captcha::img(), 'Captcha image') }} </p>
                      {{ Form::text('captcha','', array('class' => 'form-control')) }}
                    </div>
                    <div class="row">
                      <?php if (Request::getMethod() == 'POST')
                          {
                              $rules =  array('captcha' => array('required', 'captcha'));
                              $validator = Validator::make(Input::all(), $rules);
                              if ($validator->fails())
                              {
                                  echo '<p style="color: #ff0000;">The captcha is Incorrect!</p>';
                              }
                              else
                              {
                                  echo '<p style="color: #00ff30;">Matched :)</p>';
                              }
                          }?>
                      <div class="form-group col-sm-offset-4 col-sm-4"  style=" margin-top:15px; margin-right:130px;">
                        {{Form::submit('Send Message',array('class' => 'btn btn-success')) }}
                      </div>
                    </div>
                  {{Form:: close()}}
                </div>
              </div>
          </div>
      </div>
      <ul class="account-extra">
        <li  class="col-1">
          <h3 style="color:#A70000">Student Program</h3>
          <div style="height:140px;"><p style="line-height:23px;">At Quantum Victoria we believe that all children can excel in STEM disciplines, including computer science, which they will need to work in the multi-disciplinary...</p></div>
          <a href="#" title="" class="button" >Read more</a>
        </li>

        <li class="col-2">
            <h3 style="color:#A70000">Student Showcase</h3>
            <div style="height:140px;"><p style="line-height:23px;">The current works of students involved in our programs will be highlighted - Check regularly for photo's, video's, games and other examples of amazing work being produced...</p></div>
            <a href="#" title="" class="button" >Read more</a>
        </li>

        <li class="col-3">
            <h3 style="color:#A70000">Teacher Development</h3>
            <div style="height:140px;"><p style="line-height:23px;">New and innovative forms of teacher professional development are the cornerstone to building teacher capacity in the 21st century. To excite the next generation...</p></div>
            <a href="#" title="" class="button" >Read More</a>
        </li>
    </ul>   
  </div>
</div><!-- end main-wrapper -->
<div id="footer-wrapper">
  <ul>
      <li>Copyright &copy; 2014  <a href="http://quantumvictoria.vic.edu.au">Quantum Victoria</a>. All Rights Reserved.</li>
      <li>QV Resource portal is designed efficiently for easy access.</li> 
  </ul>
</div>
</body>
</html>