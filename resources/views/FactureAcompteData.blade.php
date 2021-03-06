@extends('layout')
@section('info')
    	{{-- <div class="maincard"> --}}
			<table border="0" width="90%" align="center" style="text-align:left;">
				<tbody>

					{{-- header  --}}
					<tr >
						<td style="padding-bottom:100px;" scope="row" width="50%">
							<h1 id="title">Facture {{$data->uid}} </h1>
							<h1 id="date">{{$data->created_at}}</h1>
									
						</td>
						{{-- <td style="text-align: center; padding-bottom:100px;">
							<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/1200px-Instagram_logo_2016.svg.png" width="100px" height="100px" alt="Fatourat logo">
						</td> --}}
					</tr>

					
					{{-- info --}}
					<tr >
						<td scope="row">
							<div class="info-people">
								<strong class="from"> From :</strong>
							</div>
							<div class="From-info" style="margin-left: 5%;">
							
								<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
												{{$data->user->name}} 
								</p>
								<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
												{{$data->user->email}}
								</p>
								<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
												212000101999
								</p>
								<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
												{{$data->user->User_Ville}}, Maroc
								</p>
							</div>
						</td>
						<td>
							<div class="info-people">
								<strong class="to" > To :</strong>
							</div>
							<div class="From-info" style="margin-left: 5%;">

								@if($data->devis->client != null)
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													{{$data->devis->client->Client_Nom ." " . $data->devis->client->Client_Nom}} 
									</p>
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													{{ $data->devis->client->Client_Prenom }}
									</p>
									
									@foreach($data->devis->client->nums as $number)	
										<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
														{{$number->Num_value}}
										</p>
									@endforeach

									@foreach($data->devis->client->adresses as $adrs)
										<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
														{{$adrs->Adress_value}}
										</p>
									@endforeach 
								@else
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													{{$data->devis->societe->Societe_Nom}} 
									</p>
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													{{$data->devis->societe->Societe_Nom}}
									</p>
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													212000101999
									</p>
									<p style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 5px; vertical-align: top;text-align: left;padding-left: 60px; ">
													{{$data->devis->societe->Societe_Ville}}, Maroc
									</p>
								@endif
							</div>
						</td>
					</tr>
					
					
					{{-- details  --}}
					<tr>
						<td scope="row" colspan="2" style="">
							<h3 style="text-align: left; margin-top:40px;" id="detail">DETAILS</h3>
							<table  border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding table">
								<thead>
									<tr>
										<th scope="col" class="table-header"><strong>Description</strong></th>
										<th scope="col" class="table-header"> <strong>Total excl tax </strong></th>
									</tr>
								</thead>
								<tbody>
									<tr>
                                        <td class="table-data"> 
										Deposit of {{$data->montant}}% for the quotation {{$data->devis->id}} of {{$data->devis->total_ttc}}. Dh excl tax
										</td>
										<td class="table-data">{{$data->devis->total_ttc * ($data->montant / 100)}} Dh</td>
									</tr>

								</tbody>
							</table>
						</td>
			
					</tr>



					{{-- Total cost  --}}
					
					<tr style="text-align:right;">
						<td scope="row">
						
						</td>
						<td >
							<div > 
								<table width="100%" style="margin-top:30px;">
									
									<tbody>
										<tr>
											<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">Total excl tax </td>
											<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right;"> {{ $preTax = $data->devis->total_ttc * ($data->montant / 100)}} dh</td>
										</tr>
										<tr>
										<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; "><strong>VAT ({{$data->tva}}%) </strong> </td>
											<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right;"> {{ $tva = ( $preTax ) *  ($data->tva / 100)  }} dh
										</td>
										</tr>
										
										<tr>
											<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">Total incl tax </td>
											<td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right;">{{$preTax + $tva}} Dh</td>
										</tr>
									</tbody>
								</table>
							</div>
						</td>
					</tr>

					{{-- terms  --}}
					<tr>
						<td scope="row" colspan="2" width="100%">
							<h3 style="text-align: left; " id="conditions">CONDITIONS</h3>
							<div>
								<table class="" >
									
									<tbody>
										<tr id="S1">
											<td style=" font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;"><strong>CONDITIONS DE RÈGLEMENT:</strong> </td>
											<td style=" font-size: 12px; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">{{$data->reglement->condition_reglement->Condition_value}}</td>
										</tr>
										<tr id="S1">
											<td style=" font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;"><strong>MODE DE RÈGLEMENT :</strong> </td>
											<td style=" font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">{{$data->reglement->mode_reglement->mode_value}}</td>
										</tr>
										
									
									</tbody>
								</table>
							</div>
						</td>
					</tr>


				</tbody>
			</table>	
		{{-- </div> --}}
@endsection
