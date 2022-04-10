@extends('layouts.app')
<link href="{{ asset('plugins/jquery.steps-1.1.0/jquery.steps.css') }}" rel="stylesheet">
@section('script_additional')
<script type="text/javascript">
    console.log('prueba');
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#btnSubmit").click(function(event) {

            //stop submit the form, we will post it manually.
            event.preventDefault();
            // Get form
            var form = $('#currency-exchange-rate')[0];
            // Create an FormData object 
            var data = new FormData(form);
            // disabled the submit button
            $("#btnSubmit").prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ url('currency') }}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                success: function(data) {
                    console.log(data + 'data');
                    $("#output").html(data);
                    $("#btnSubmit").prop("disabled", false);
                },
                error: function(e) {
                    console.log(data + 'error');

                    $("#output").html('Error de conexion con la API');
                    console.log("ERROR : ", e);
                    $("#btnSubmit").prop("disabled", false);
                }
            });
        });
    });
</script>
@endsection
@section('content')
<div class="card wizard-content">
    <div class="card-body">Conversor de Divisas</h4>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    Conversor Pulpoline
                </div>
                <div class="card-body">
                    <form id="currency-exchange-rate" class="form-group">
                        <!-- <form id="currency-exchange-rate" action="{{ route('currency') }}" method="post" class="form-group"> -->

                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" name="amount" class="form-control" value="1">
                                @guest
                                <input type="hidden" name="idGuest" class="form-control" value="{{ $id }}">
                                @endguest
                            </div>
                            <div class="col-md-4">
                                <select name="from_currency" class="form-control">
                                    <option value='AUD'>AUD</option>
                                    <option value='BGN'>BGN</option>
                                    <option value='BRL'>BRL</option>
                                    <option value='CAD'>CAD</option>
                                    <option value='CHF'>CHF</option>
                                    <option value='CNY'>CNY</option>
                                    <option value='CZK'>CZK</option>
                                    <option value='DKK'>DKK</option>
                                    <option value='EUR'>EUR</option>
                                    <option value='GBP'>GBP</option>
                                    <option value='HKD'>HKD</option>
                                    <option value='HRK'>HRK</option>
                                    <option value='HUF'>HUF</option>
                                    <option value='IDR'>IDR</option>
                                    <option value='ILS'>ILS</option>
                                    <option value='INR'>INR</option>
                                    <option value='ISK'>ISK</option>
                                    <option value='JPY'>JPY</option>
                                    <option value='KRW'>KRW</option>
                                    <option value='MXN'>MXN</option>
                                    <option value='MYR'>MYR</option>
                                    <option value='NOK'>NOK</option>
                                    <option value='NZD'>NZD</option>
                                    <option value='PHP'>PHP</option>
                                    <option value='PLN'>PLN</option>
                                    <option value='RON'>RON</option>
                                    <option value='RUB'>RUB</option>
                                    <option value='SEK'>SEK</option>
                                    <option value='SGD'>SGD</option>
                                    <option value='THB'>THB</option>
                                    <option value='TRY'>TRY</option>
                                    <option value='USD'>USD</option>
                                    <option value='ZAR'>ZAR</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="to_currency" class="form-control">
                                    <option value='AUD'>AUD</option>
                                    <option value='BGN'>BGN</option>
                                    <option value='BRL'>BRL</option>
                                    <option value='CAD'>CAD</option>
                                    <option value='CHF'>CHF</option>
                                    <option value='CNY'>CNY</option>
                                    <option value='CZK'>CZK</option>
                                    <option value='DKK'>DKK</option>
                                    <option value='EUR'>EUR</option>
                                    <option value='GBP'>GBP</option>
                                    <option value='HKD'>HKD</option>
                                    <option value='HRK'>HRK</option>
                                    <option value='HUF'>HUF</option>
                                    <option value='IDR'>IDR</option>
                                    <option value='ILS'>ILS</option>
                                    <option value='INR'>INR</option>
                                    <option value='ISK'>ISK</option>
                                    <option value='JPY'>JPY</option>
                                    <option value='KRW'>KRW</option>
                                    <option value='MXN'>MXN</option>
                                    <option value='MYR'>MYR</option>
                                    <option value='NOK'>NOK</option>
                                    <option value='NZD'>NZD</option>
                                    <option value='PHP'>PHP</option>
                                    <option value='PLN'>PLN</option>
                                    <option value='RON'>RON</option>
                                    <option value='RUB'>RUB</option>
                                    <option value='SEK'>SEK</option>
                                    <option value='SGD'>SGD</option>
                                    <option value='THB'>THB</option>
                                    <option value='TRY'>TRY</option>
                                    <option value='USD'>USD</option>
                                    <option value='ZAR'>ZAR</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="button" name="submit" id="btnSubmit" class="btn btn-primary " value="Convertir">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <span id="output"></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection