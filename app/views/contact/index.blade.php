      <?php
      if (Request::getMethod() == 'POST')
        {
            $rules =  array('captcha' => array('required', 'captcha'));
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails())
            {
                echo '<p style="color: #ff0000;">Entered captcha is Incorrect!</p>';
            }
            else
            {
                echo '<p style="color: #00ff30;">The message has been submitted :)</p>';
            }
        }
       ?>
            
       
        
        <html>
        <head>
            <title></title>
        </head>
        <body>
             {{Form::open(array(URL::to(Request::segment(1))))}} 
         <p>{{ HTML::image(Captcha::img(), 'Captcha image') }} </p>
         <p>{{ Form::text('captcha') }}</p>
         <p> {{Form::submit('Check') }}</p>
         <p>{{ Form::close() }}</p>
        </body>
        </html>