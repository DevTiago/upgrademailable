@extends('layouts.app')

@section('content')
    <div class="container">
           <div class="row">
               <form action="{{route('sendEmail')}}" method="POST" id="emailsForm">
                   @csrf
                   <h4>Envio de email de Natal 2020</h4>
                   <div class="form-group mt-2">
                       <label for="exampleInputEmail1">Emails de envio <span style="font-size: 34px">(separados por ponto e virgula ; )</span></label>
                       <input type="text" class="form-control" name="emails" id="emails"  placeholder="Emails de envio">
                   </div>
                   <button type="submit" class="btn btn-primary mt-2">Enviar</button>
               </form>
           </div>
        @if ($count)
            <div class="alert alert-success mt-4">
                <span>Foram enviados {{$count}} emails com sucesso!</span>
            </div>
        @endif
    </div>
    @endsection
