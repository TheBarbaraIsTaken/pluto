@extends('layouts.app')

@section('title')

Felhasználói email: 
{{ auth()->user()->email }}

@endsection

@section('content')


<div class="row">
    <div class="col s10">
      <div class="card-panel teal">
        <span class="white-text">I am a very simple card. I am good at containing small bits of information.
        I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
        </span>
      </div>
    </div>
  </div>
              

@foreach ($banks as $bank)
<!-- TODO: cash/card symboles according to the rigth boolean value -->

<div class="row" style="margin-bottom:0px;">
  <div class="col s10">
    <ul class="collapsible">
      @if($bank->income)
      <li>
        <div class="collapsible-header teal lighten-2" >   
          <i class="material-icons">attach_money</i>       
          {{ $bank->amount }}
          <span class="badge" data-badge-caption="{{ $bank->created_at }}"></span>
        </div>
        <div class="collapsible-body teal lighten-3">
          <p>{{ $bank->notes }}</p>
        </div>
      </li>
      @else
      <li>
        <div class="collapsible-header red lighten-2">
          <i class="material-icons">credit_card</i>              
          {{ $bank->amount }}
          <span class="badge" data-badge-caption="{{ $bank->created_at }}"></span>
        </div>
        <div class="collapsible-body red lighten-3">
          <p>{{ $bank->notes }}</p>
        </div>
      </li>
      @endif
    </ul>
  </div>

    <div class="col s2">
      <div class="valign-wrapper">
          <p>
            <a class="btn-floating btn-medium waves-effect waves-light blue lighten-4" style="margin-right: 2pt"><i class="material-icons">edit</i></a>
            <a class="btn-floating btn-medium waves-effect waves-light red lighten-2"><i class="material-icons">delete</i></a>
          </p>
    </div>
  </div>
</div>

@endforeach

@endsection

