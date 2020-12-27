<?php

      // Payout Rates
      $payout_rates = unserialize(get_option_db('payout_rates'));
      $countries = get_countries(true);
      uasort($payout_rates, function ($a, $b) {
      if (!isset($a[1]) || !isset($b[1])) {
            return 0;
      }
      if ($a[1] == $b[1]) {
            return 0;
      }

      return ($a[1] < $b[1]) ? 1 : -1;
      });


      // withdrawal_methods
      $withdrawal_methods = unserialize(get_option_db('withdrawal_methods'));

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css@3.4.2/css/flag-icon.min.css"/>
<style>
      #methods_section{
            margin-top: 100px
      }
      .flag-icon {
            width: 3em;
            line-height: 2.25em;
      }
      .table {
      text-align: left;
      overflow: hidden;
      box-shadow: 0px 0px 29px 0px #bfbfbf;
      border-radius: 20px;
      }
       td, #payout-rates th {
            vertical-align: middle;
      }
      .table tbody tr td:nth-child(odd) {
      background: #fff;
      }
      .table tbody tr td:nth-child(even) {
      background: #f2f2f2;
      }
      thead{
            background-color: #140850;
            color: #fff;
      }
      
</style>

@extends('custom_blades.layout')

@section('content')


      <!--- Withdrawal Method	 --->
      <section class="ftco-section" id="methods_section">
            <div class="container">
                  <h2>Withdrawal Method	</h2>
                  <hr style="border-top: 3px solid rgb(20 8 80) ">
                  <br>
                  <div class="row justify-content-center">
                        <div class="col-md-12 text-left heading-section ftco-animate" >

                              <table class="table table-responsive-sm ">
                                    <thead>
                                          <tr>
                                          <th>{{ __('Withdrawal Method') }}</th>
                                          <th>{{ __('Minimum Withdrawal Amount') }}</th>
                                          </tr>
                                    </thead>
                                    @foreach( $withdrawal_methods as $withdrawal_method)
                                        @if($withdrawal_method['status'] === "1")
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($withdrawal_method['image']) }}" alt="{{ $withdrawal_method['name'] }}"
                                                         width="100" data-toggle="tooltip" data-placement="right"
                                                         title="{{ $withdrawal_method['name'] }}">
                                                </td>
                                                <td>{{ display_price_currency($withdrawal_method['amount']) }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                              </table>

                        </div>
                  </div>
            </div>
      </section>
      











      <!--- PayOut Rates --->
      <section class="ftco-section" id="payout_section">
            <div class="container">
                  <h2>Payout rates</h2>
                  <hr style="border-top: 3px solid rgb(20 8 80) ">
                  <br>
                  <div class="row justify-content-center">
                        <div class="col-md-12 text-left heading-section ftco-animate" >

                              <table class="table table-responsive-sm table-striped">
                                    <thead>
                                          <tr>
                                                <th>{{ __('Country') }}</th>
                                                <th>{{ __('Earnings per 1000 Views') }}</th>
                                          </tr>
                                    </thead>
                                    @foreach($payout_rates as $key => $value)
                                        <?php
                                        if (empty($value[1])) {
                                            continue;
                                        } ?>
                                        <tr>
                                            <td>
                                                <span class="flag-icon flag-icon-{{ strtolower($key) }}"></span> {{ $countries[$key] }}
                                            </td>
                                            <td>
                                                <?= display_price_currency($value[1]) ?>
                                            </td>
                                        </tr>
                                    @endforeach
                              </table>

                        </div>
                  </div>
            </div>
      </section>

@endsection