@extends('layouts.base')

@section('content')
<h1>&lt;?Contact</h1>

<div class="canvas projectcanvas">
  
  <form action="{{ route('contact.post') }}" method="post">

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul style="text-align: left;margin-left: 20px;">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="user_name" placeholder="Your name"/>
    </div>
  
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="user_email" placeholder="Your email address"/>
    </div>
  
    <div class="form-group">
      <label for="subject">Subject</label>
      <input type="text" id="subject" name="subject" placeholder="Subject of your message"/>
    </div>
    
    <div class="form-group">
      <label for="message">Message</label>
      <textarea id="message" name="message" placeholder="Your message goes here..."></textarea>
    </div>

      @csrf

    <input type="submit" class="btn" value="Send message"/>
  </form>
</div>
@endsection