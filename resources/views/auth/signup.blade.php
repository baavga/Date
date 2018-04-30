 <html>
        <body>
    {{Form::open(array('url' => 'thanks')) }}
        {{Form::label('email', 'Email')}} <br>
        {{Form::text('email')}}<br>
        {{Form::label('os', 'OS operating system')}}<br>
        {{Form::select('os', array(
            
            'linux'=>'Linux',
            'mac' => 'Mac OS X',
            'windows'=>'Windows'
        
        ))}}<br>
        {{Form::label('comment','Comments')}}<br>
        {{Form::textarea('comment', '', array(
            'placeholder' => 'What are your interests?'
        ))}}<br>
        {{Form::checkbox('agree','yes',false)}}<br>
        {{Form::label('agree','I agree to your terms')}}<br>
        {{Form::submit('Sign Up')}}<br>
      {{ Form::close() }}
        </body>
 </html>