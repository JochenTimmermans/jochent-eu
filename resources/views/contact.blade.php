@extends('layouts.base')

@section('content')
<h1>&lt;?Contact</h1>

<div class="canvas projectcanvas">
  
  <form action="{{ route('contact.post') }}" method="post">

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="cf_name" placeholder="Your name"/>
    </div>
  
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="cf_email" placeholder="Your email address"/>
    </div>
  
    <div class="form-group">
      <label for="subject">Subject</label>
      <input type="text" id="subject" name="cf_subject" placeholder="Subject of your message"/>
    </div>
    
    <div class="form-group">
      <label for="message">Message</label>
      <textarea id="message" name="cf_message" placeholder="Your message goes here..."></textarea>      
    </div>

    {{ csrf_field() }}

    <input type="hidden" name="cf_form" value="go"/>
    <input type="submit" class="btn" value="Send message"/>
  </form>
</div>
@endsection