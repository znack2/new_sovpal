@if(isset($model_id))
    {{ $title }}
    <p class="minitext text-center"> {!! trans('sovpal.forms.UpdateRoom_message') !!} </p>
@else
    <h4 class="form-heading text-center"> {{ trans('sovpal.forms.CreateRoom') }} </h4>
    <p class="minitext text-center"> {!! trans('sovpal.forms.CreateRoom_message') !!} </p>
@endif

<style>
      .slider {
          height: 18.75em;
          left: 50%;
          margin: -9.875em -13em;
          padding: .5em;
          position: absolute;
          top: 50%;
          width: 25em;
      }
      .slider input {
          display: none;
      }  
      .slider:hover label {
          opacity: 1;
          visibility: visible;
      }
      .slider input:checked + label {
          background-color: #fff;
      }
      .slider:hover li:nth-child(1) label {
          left: 10px;
      }
      .slider:hover li:nth-child(2) label {
          left: 50px;
      }
      .slider:hover li:nth-child(3) label {
          left: 70px;
      }
      .slider:hover li:nth-child(4) label {
          left: 100px;
      }
      /* Slides */

      .slider li {
          box-shadow: 0 -1px 0 2px hsla(0,0%,0%,.03);
          list-style:none;
          position: absolute;
      }

      /* Images */

      .slider img {
          height: 18.75em;
          opacity: 0;
          transition: .25s;
          width: 25em;
          vertical-align: top;
          visibility: hidden;
      }
      .slider li input:checked ~ img {
          opacity: 1;
          visibility: visible;
          z-index: 10;
      }
      /* Navigation */

      .slider label {
          background-color: #111;
          background-image: linear-gradient(transparent, hsla(0,0%,0%,.25));
          border: 5px solid transparent;
          bottom: 2px;
          border-radius: 100%;
          cursor: pointer;
          display: block;
          height: 30px;
          left: 370px;
          opacity: 0;
          position: absolute;
          transition: .3s;
          width: 20px;
          visibility: hidden;
          z-index: 30;
      }
      .slider label:after {
          border-radius: 100%;
          bottom: -2px;
          box-shadow: inset 0 0 0 .2em #111,
                      inset 0 2px 2px #000,
                      0 1px 1px hsla(0,0%,100%,.25);
          content: '';
          left: -2px;
          position: absolute;
          right: -2px;
          top: -2px;
      }


        /* Frame */
      /*
          .slider:before {
              background-color: #22130c;
              bottom: -2.5em;
              box-shadow: inset 0 1px 1px 1px hsla(0,0%,100%,.2),
                          inset 0 -2px 1px hsla(0,0%,0%,.4),
                          0 5px 50px hsla(0,0%,0%,.25),
                          0 20px 20px -15px hsla(0,0%,0%,.2),
                          0 30px 20px -15px hsla(0,0%,0%,.15),
                          0 40px 20px -15px hsla(0,0%,0%,.1);
              content: '';
              left: -2.5em;
              position: absolute;
              right: -2.5em;
              top: -2.5em;
              z-index: -1;
          }*/

          /* Mat */

          .slider:after {
              background-color: #fff5e5;
              bottom: -1.5em;
      /*        box-shadow: 0 2px 1px hsla(0,0%,100%,.2),
                          0 -1px 1px 1px hsla(0,0%,0%,.4),
                          inset 0 2px 3px 1px hsla(0,0%,0%,.2),
                          inset 0 4px 3px 1px hsla(0,0%,0%,.2),
                          inset 0 6px 3px 1px hsla(0,0%,0%,.1);*/
              content: '';
              left: -1.5em;
              position: absolute;
              right: -1.5em;
              top: -1.5em;
              z-index: -1;
          }
</style>


<div class="col-md-12 form-horizontal">
  <div class="form-group text-center">
    <ul class="slider">
      @foreach($tagrooms as $tag_room)
          <li>
              <input type="radio" id="slide{{ $tag_room->id }}" name="slide" value="{{$tag_room->id}}" 
              checked="{{ (old('room')==$tag_room->id) ? 'checked' : '' }}">
              <label for="slide{{ $tag_room->id }}"></label>
              <img src="{{ asset('assets/images/tags/room/'.$tag_room->name) }}.png" 
              alt="{{ trans('tags.'.$tag_room->name) }}" width="100%" height="200px">
          </li>
       @endforeach 
    </ul>
  </div>
</div>

