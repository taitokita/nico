@extends('layouts.app')
@include('commons.error_messages')
{!! Form::open(['route' => 'login.post']) !!}
<div class="cont">
 <div class="demo">
   <div class="login">
     <div class="login__check"></div>
     <div class="login__form">
       <div class="login__row">
         <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
           <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
         </svg>
         <input type="text" class="login__input" name="name" placeholder="Username"/>
         
       </div>
       <div class="login__row">
         <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
           <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
         </svg>
         <input type="password" class="login__input pass" name="password" placeholder="Password"/>
       </div>
       <div class="text-right">
           
           
           {!! form::submit('Log in', ['class' => 'btn btn-link']) !!}
       </div>
           {!! form::close() !!}

       <p class="login__signup">Don't have an account? &nbsp;<a href="{{ route('signup.get') }}">Sign up</a></p>
     </div>
   </div>
   <div class="app">
     <div class="app__top">
       <div class="app__menu-btn">
         <span></span>
       </div>
       <svg class="app__icon search svg-icon" viewBox="0 0 20 20">
